<?php

namespace App\Http\Controllers;

use App\Models\CashReceipt;
use App\Models\Delivery;
use App\Models\Fund;
use App\Models\Guest;
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
    public function __construct()
    {
        $this->workspaces = new Workspace();
        $this->guest = new Guest();
        $this->cash_receipts = new CashReceipt();
    }
    public function index()
    {
        $title = 'Phiếu thu';
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;
        $cashReceipts = CashReceipt::with(['guest', 'fund', 'user', 'workspace'])->get();
        return view('tables.cash_receipts.index', compact('cashReceipts', 'title', 'workspacename'));
    }

    public function create()
    {
        $title = 'Tạo phiếu thu';
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;
        $funds = Fund::all();
        $guest = Guest::where('workspace_id', Auth::user()->current_workspace)->get();

        $deliveries = Delivery::leftJoin('detailexport', 'detailexport.id', 'delivery.detailexport_id')
            ->select(
                'delivery.id',
                'delivery.guest_id',
                'delivery.quotation_number',
                'delivery.code_delivery',
                'delivery.shipping_unit',
                'delivery.shipping_fee',
                'delivery.id as maGiaoHang',
                'delivery.created_at as ngayGiao',
                'delivery.status as trangThai',
                'users.name',
                'detailexport.guest_name',
                'delivery.promotion',
                DB::raw('(SELECT 
                        CASE 
                            WHEN JSON_UNQUOTE(JSON_EXTRACT(delivery.promotion, "$.type")) = 1 THEN COALESCE(SUM(product_total_vat), 0) - CAST(JSON_UNQUOTE(JSON_EXTRACT(delivery.promotion, "$.value")) AS DECIMAL) -- Giảm số tiền trực tiếp
                            WHEN JSON_UNQUOTE(JSON_EXTRACT(delivery.promotion, "$.type")) = 2 THEN (COALESCE(SUM(product_total_vat), 0) * (100 - CAST(JSON_UNQUOTE(JSON_EXTRACT(delivery.promotion, "$.value")) AS DECIMAL)) / 100) -- Giảm phần trăm trên tổng giá trị sản phẩm
                            ELSE COALESCE(SUM(product_total_vat), 0) -- Không có khuyến mãi
                        END
                    FROM delivered WHERE delivered.delivery_id = delivery.id) as totalProductVat')
            )
            ->leftJoin('users', 'users.id', 'delivery.user_id')
            ->where('delivery.workspace_id', Auth::user()->current_workspace)
            ->where('delivery.status', 2)
            ->groupBy(
                'delivery.id',
                'delivery.guest_id',
                'delivery.quotation_number',
                'delivery.code_delivery',
                'delivery.shipping_unit',
                'delivery.shipping_fee',
                'users.name',
                'delivery.created_at',
                'delivery.status',
                'detailexport.guest_name',
                'delivery.promotion',
            )
            ->orderBy('delivery.id', 'desc');
        if (Auth::check()) {
            if (Auth::user()->getRoleUser->roleid == 4) {
                $deliveries->where('delivery.user_id', Auth::user()->id);
            }
        }
        $deliveries = $deliveries->get();
        // dd($deliveries);
        $invoiceAuto = $this->cash_receipts->getQuoteCount();
        return view('tables.cash_receipts.create', compact('title', 'invoiceAuto', 'deliveries', 'guest', 'funds', 'workspacename'));
    }

    public function store(Request $request)
    {

        dd($request->all());
        $cash_receipts = $this->cash_receipts->addCashReciept($request->all());
        return redirect()->route('tables.cash_receipts.index')->with('success', 'Phiếu thu đã được tạo thành công.');
    }

    public function show($id)
    {
        $cashReceipt = CashReceipt::with(['guest', 'fund', 'user', 'workspace'])->findOrFail($id);
        return view('tables.cash_receipts.show', compact('cashReceipt'));
    }

    public function edit($id)
    {
        $cashReceipt = CashReceipt::findOrFail($id);
        return view('tables.cash_receipts.edit', compact('cashReceipt'));
    }
    public function getInfoDeliveryReciepts(Request $request)
    {
        $data = $request->all();
        $delivery = $this->cash_receipts->getDelivery($data);
        return response()->json($delivery);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'receipt_code' => 'required|string|max:255',
            'date_created' => 'nullable|date',
            'guest_id' => 'nullable|integer|exists:guests,id',
            'payer' => 'nullable|string|max:255',
            'amount' => 'required|numeric',
            'content' => 'nullable|string',
            'fund_id' => 'nullable|integer|exists:funds,id',
            'user_id' => 'nullable|integer|exists:users,id',
            'note' => 'nullable|string',
            'workspace_id' => 'nullable|integer|exists:workspaces,id',
        ]);

        $cashReceipt = CashReceipt::findOrFail($id);
        $cashReceipt->update($validatedData);

        return redirect()->route('tables.cash_receipts.index')->with('success', 'Phiếu thu đã được cập nhật thành công.');
    }

    public function destroy($id)
    {
        $cashReceipt = CashReceipt::findOrFail($id);
        $cashReceipt->delete();

        return redirect()->route('tables.cash_receipts.index')->with('success', 'Phiếu thu đã được xóa thành công.');
    }
}
