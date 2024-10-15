<?php

namespace App\Http\Controllers;

use App\Models\CashReceipt;
use App\Models\ContentGroups;
use App\Models\ContentImportExport;
use App\Models\Delivery;
use App\Models\DetailExport;
use App\Models\Fund;
use App\Models\Guest;
use App\Models\Provides;
use App\Models\ReturnImport;
use App\Models\User;
use App\Models\Workspace;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CashReceiptController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $workspaces;
    private $guest;
    private $cash_receipts;
    private $fund;
    public function __construct()
    {
        $this->workspaces = new Workspace();
        $this->guest = new Guest();
        $this->cash_receipts = new CashReceipt();
        $this->fund = new Fund();
    }
    public function index()
    {
        $title = 'Phiếu thu';
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;
        $cashReceipts = CashReceipt::with(['guest', 'fund', 'user', 'workspace'])->where('workspace_id', Auth::user()->current_workspace)
            ->orderby('id', 'DESC')
            ->get();
        $content = ContentGroups::where('contenttype_id', 1)->get();
        $userIds = $cashReceipts->pluck('user_id')->toArray();
        // Truy vấn thông tin người dùng dựa trên user_id
        $users = User::whereIn('id', $userIds)->get();
        return view('tables.cash_receipts.index', compact('cashReceipts', 'title', 'users', 'content', 'workspacename'));
    }

    public function create()
    {
        $title = 'Tạo phiếu thu';
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;
        $funds = Fund::where('workspace_id', Auth::user()->current_workspace)->get();
        $guest = Guest::where('workspace_id', Auth::user()->current_workspace)->get();
        $provide = Provides::where('workspace_id', Auth::user()->current_workspace)->get();
        $content = ContentGroups::where('contenttype_id', 1)->where('workspace_id', Auth::user()->current_workspace)->get();

        // $deliveries = Delivery::select(
        //     'delivery.id',
        //     'delivery.guest_id',
        //     'delivery.quotation_number',
        //     'delivery.code_delivery',
        //     'delivery.shipping_unit',
        //     'delivery.shipping_fee',
        //     'delivery.id as maGiaoHang',
        //     'delivery.created_at as ngayGiao',
        //     'delivery.status as trangThai',
        //     'users.name',
        //     'delivery.promotion',
        //     DB::raw('(
        //                 SELECT 
        //                     CASE 
        //                         WHEN JSON_UNQUOTE(JSON_EXTRACT(delivery.promotion, "$.value")) != 0 THEN 
        //                             CASE 
        //                                 WHEN JSON_UNQUOTE(JSON_EXTRACT(delivery.promotion, "$.type")) = 1 THEN 
        //                                     (COALESCE(SUM(product_total_vat), 0) - CAST(JSON_UNQUOTE(JSON_EXTRACT(delivery.promotion, "$.value")) AS DECIMAL)) * (1 + (COALESCE(MAX(products.product_tax), 0) / 100)) -- Giảm số tiền trực tiếp và áp dụng thuế
        //                                 WHEN JSON_UNQUOTE(JSON_EXTRACT(delivery.promotion, "$.type")) = 2 THEN 
        //                                     ((COALESCE(SUM(product_total_vat), 0) * (100 - CAST(JSON_UNQUOTE(JSON_EXTRACT(delivery.promotion, "$.value")) AS DECIMAL)) / 100)) * (1 + (COALESCE(MAX(products.product_tax), 0) / 100)) -- Giảm phần trăm trên tổng giá trị sản phẩm và áp dụng thuế
        //                                 ELSE 
        //                                     COALESCE(SUM(product_total_vat), 0) -- Không có khuyến mãi
        //                             END
        //                         ELSE
        //                             COALESCE(SUM(product_total_vat), 0) -- Giá trị ban đầu nếu $.value = 0
        //                     END
        //                 FROM delivered 
        //                 LEFT JOIN products ON delivered.product_id = products.id
        //                 WHERE delivered.delivery_id = delivery.id
        //             ) as totalProductVat')
        // )
        //     ->leftJoin('users', 'users.id', 'delivery.user_id')
        //     ->where('delivery.workspace_id', Auth::user()->current_workspace)
        //     ->where('delivery.status', 2)
        //     ->where('delivery.totalVat', '>', 0)
        //     ->groupBy(
        //         'delivery.id',
        //         'delivery.guest_id',
        //         'delivery.quotation_number',
        //         'delivery.code_delivery',
        //         'delivery.shipping_unit',
        //         'delivery.shipping_fee',
        //         'users.name',
        //         'delivery.created_at',
        //         'delivery.status',
        //         'delivery.promotion',
        //     )
        //     ->orderBy('delivery.id', 'desc');
        // if (Auth::check()) {
        //     if (Auth::user()->getRoleUser->roleid == 4) {
        //         $deliveries->where('delivery.user_id', Auth::user()->id);
        //     }
        // }
        // $deliveries = $deliveries->get();
        // dd($deliveries);
        $detailOwed = DetailExport::where('workspace_id', Auth::user()->current_workspace)->where('amount_owed', '>', 0)->get();
        $invoiceAuto = $this->cash_receipts->getQuoteCount();

        // Trả hàng NCC
        $returnImport = ReturnImport::where('workspace_id', Auth::user()->current_workspace)
            ->where(DB::raw('COALESCE(total,0)'), '!=', DB::raw('COALESCE(payment,0)'))
            ->get();
        $listDetail = CashReceipt::with(['guest', 'fund', 'user', 'workspace'])->where('workspace_id', Auth::user()->current_workspace)->get();
        $listUser = User::where('current_workspace', Auth::user()->current_workspace)->get();
        return view('tables.cash_receipts.create', compact(
            'title',
            'invoiceAuto',
            'detailOwed',
            'guest',
            'funds',
            'workspacename',
            'content',
            'returnImport',
            'listDetail',
            'listUser',
            'provide'
        ));
    }

    public function store(string $workspace, Request $request)
    {
        $this->cash_receipts->addCashReciept($request->all());
        $total = isset($request->total) ? str_replace(',', '', $request->total) : 0;
        if ($request->action == 2) {
            $this->fund->calculateFunds($request->fund_id, $total, '+');
        }

        // Cộng tiền

        return redirect()->route('cash_receipts.index', $workspace)->with('msg', 'Phiếu thu đã được tạo thành công.');
    }
    public function edit($workspacename, $id)
    {
        $title = 'Xem phiếu thu';
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;
        $funds = Fund::all();
        $guest = Guest::where('workspace_id', Auth::user()->current_workspace)->get();
        $content = ContentGroups::where('contenttype_id', 1)->where('workspace_id', Auth::user()->current_workspace)->get();

        $detailOwed = DetailExport::where('workspace_id', Auth::user()->current_workspace)->where('amount_owed', '>', 0)->get();
        // dd($deliveries);
        $invoiceAuto = $this->cash_receipts->getQuoteCount();

        $cashReceipt = CashReceipt::with(['guest', 'fund', 'user', 'content', 'workspace', 'delivery'])->findOrFail($id);
        $disabled = ($cashReceipt->status == 2) ? 'disabled' : '';
        $listDetail = CashReceipt::with(['guest', 'fund', 'user', 'workspace'])->where('workspace_id', Auth::user()->current_workspace)->get();
        $listUser = User::where('current_workspace', Auth::user()->current_workspace)->get();
        return view('tables.cash_receipts.edit', compact(
            'title',
            'invoiceAuto',
            'detailOwed',
            'guest',
            'cashReceipt',
            'disabled',
            'funds',
            'workspacename',
            'content',
            'listDetail',
            'listUser'
        ));
    }
    public function update(string $workspace, Request $request, string $id)
    {
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;
        // 
        $this->cash_receipts->updateCashReceipt($request->all(), $id);
        // Cộng tiền
        $this->fund->calculateFunds($request->fund_id, $request->total, '+');
        return redirect()->route('cash_receipts.index', $workspacename)->with('msg', 'Phiếu thu đã được tạo thành công.');
    }

    public function destroy(string $workspace, $id)
    {
        $cashReceipt = CashReceipt::findOrFail($id);

        if ($cashReceipt->delivery_id) {
            $delivery = Delivery::find($cashReceipt->delivery_id);
            $delivery->totalVat = $delivery->totalVat + $cashReceipt->amount;
            $delivery->save();
            //
            $detailExport = DetailExport::where('id', $delivery->detailexport_id)->first();
            $detailExport->amount_owed = $detailExport->amount_owed + $cashReceipt->amount;
            $detailExport->save();
        }
        if ($cashReceipt->returnImport_id != null) {
            $returnImport = ReturnImport::where('id', $cashReceipt->returnImport_id)->first();
            if ($returnImport) {
                $returnImport->payment = $returnImport->payment - $cashReceipt->amount;
                $returnImport->save();
            }
        } else {
            if ($cashReceipt->status == 2) {
                $this->fund->calculateFunds($cashReceipt->fund_id, $cashReceipt->amount, '-');
            }
        }
        // + tiền công nợ lại khi xoá phiếu
        if ($cashReceipt->provide_id != 0) {
            $provide = Provides::find($cashReceipt->provide_id);
            $provide->provide_debt = $provide->provide_debt + $cashReceipt->amount;
            $provide->save();
        }
        if ($cashReceipt->guest_id != 0) {
            $guest = Guest::find($cashReceipt->guest_id);
            $guest->guest_debt = $guest->guest_debt + $cashReceipt->amount;
            $guest->save();
        }

        $cashReceipt->delete();
        return redirect()->route('cash_receipts.index', ['workspace' => $workspace])->with('msg', 'Xóa phiếu thu thành công!');
    }
    public function getInfoDeliveryReciepts(Request $request)
    {
        $data = $request->all();
        $delivery = $this->cash_receipts->fetchDelivery($data);
        return response()->json($delivery);
    }

    public function getInfoDeliveryRecieptsEdit(Request $request)
    {
        $data = $request->all();
        $detailOwed = DetailExport::leftJoin('guest', 'detailexport.guest_id', 'guest.id')
            ->where('detailexport.workspace_id', Auth::user()->current_workspace)
            ->where('detailexport.id',  $data['detail_id'])
            ->select('detailexport.*', 'guest.guest_name_display as nameGuest')
            ->first();
        return response()->json($detailOwed);
    }

    public function search(Request $request)
    {
        $data = $request->all();
        $filters = [];
        if (isset($data['date']) && isset($data['date'][1])) {
            $date_start = date("d/m/Y", strtotime($data['date'][0]));
            $date_end = date("d/m/Y", strtotime($data['date'][1]));
            $filters[] = ['value' => 'Ngày lập: từ ' . $date_start . ' đến ' . $date_end, 'name' => 'date', 'icon' => 'date'];
        }

        if (isset($data['return_code']) && $data['return_code'] !== null) {
            $filters[] = ['value' => 'Mã số phiếu: ' . $data['return_code'], 'name' => 'return_code', 'icon' => 'document'];
        }

        if (isset($data['customers']) && $data['customers'] !== null) {
            $filters[] = ['value' => 'Khách hàng: ' . $data['customers'], 'name' => 'customers', 'icon' => 'user'];
        }

        if (isset($data['guests']) && $data['guests'] !== null) {
            $filters[] = ['value' => 'Người nộp: ' . $data['guests'], 'name' => 'guests', 'icon' => 'user'];
        }

        if (isset($data['content']) && $data['content'] !== null) {
            $contents = new ContentGroups();
            $content = $contents->getNameContent($data['content']);
            $contenttring = implode(', ', $content);
            $filters[] = ['value' => 'Nội dung: ' . count($data['content']) . ' đã chọn', 'name' => 'content', 'icon' => 'user'];
        }

        if (isset($data['amount']) && $data['amount'][1] !== null) {
            $filters[] = ['value' => 'Số tiền: ' . $data['amount'][0] . ' ' . $data['amount'][1], 'name' => 'amount', 'icon' => 'money'];
        }

        if (isset($data['fund']) && $data['fund'] !== null) {
            $filters[] = ['value' => 'Quỹ: ' . $data['fund'], 'name' => 'fund', 'icon' => 'fund'];
        }
        if (isset($data['users']) && $data['users'] !== null) {
            $user = new User();
            $users = $user->getNameUser($data['users']);
            $userstring = implode(', ', $users);
            $filters[] = ['value' => 'Người tạo: ' . $userstring, 'name' => 'users', 'icon' => 'user'];
        }

        if (isset($data['note']) && $data['note'] !== null) {
            $filters[] = ['value' => 'Ghi chú: ' . $data['note'], 'name' => 'note', 'icon' => 'note'];
        }

        if (isset($data['status']) && $data['status'] !== null) {
            $statusValues = [];
            if (in_array(1, $data['status'])) {
                $statusValues[] = '<span style="color: #858585;">Nháp</span>';
            }
            if (in_array(2, $data['status'])) {
                $statusValues[] = '<span style="color: #08AA36BF;">Đã thu</span>';
            }
            $statusText = implode(', ', $statusValues);
            $filters[] = ['value' => 'Trạng thái: ' . $statusText, 'name' => 'status', 'icon' => 'status'];
        }

        if ($request->ajax()) {
            $cash_receipts = $this->cash_receipts->ajax($data);
            return response()->json([
                'data' => $cash_receipts,
                'filters' => $filters,
            ]);
        }
        return false;
    }
}
