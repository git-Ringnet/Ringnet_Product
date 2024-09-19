<?php

namespace App\Http\Controllers;

use App\Models\Commission;
use App\Models\DetailExport;
use App\Models\Groups;
use App\Models\Guest;
use App\Models\Promotion;
use App\Models\QuoteExport;
use App\Models\Role;
use App\Models\User;
use App\Models\Workspace;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommissionController extends Controller
{
    private $workspaces;
    private $quoteE;
    private $detailExport;
    public function __construct()
    {
        $this->workspaces = new Workspace();
        $this->quoteE = new QuoteExport();
        $this->detailExport = new DetailExport();
    }


    // Hoa hồng Sale
    public function commissionSale(Request $request)
    {
        $title = 'Hoa hồng sale';
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;
        // Lấy sản phẩm trong đơn đó
        $users = User::all();
        $groups = Groups::where('grouptype_id', 1)->where('workspace_id', Auth::user()->current_workspace)->get();
        $roles = Role::where('id', '!=', 1)->get();

        $productDelivered = $this->quoteE->sumProductsQuoteSale();
        // // Get All đơn
        $allDelivery = $this->detailExport->getSumDetailESale();
        $groupUsers = Groups::where('grouptype_id', 1)->where('workspace_id', Auth::user()->current_workspace)->get();
        $guest = Guest::where('workspace_id', Auth::user()->current_workspace)->get();

        return view('tables.user.commission', compact('title', 'groupUsers', 'users', 'guest', 'productDelivered', 'allDelivery'));
    }
    // Tạo mới hoặc cập nhật hoa hồng sale
    public function updateOrCreate(Request $request)
    {
        // Xác thực dữ liệu
        $validated = $request->validate([
            'month' => 'required|string',
            'sale' => 'required|integer',
            'quote' => 'required|integer',
            'value' => 'nullable|string',
        ]);

        $validated['value'] = str_replace(',', '', $validated['value']);
        $total_amount = $request->qty * $validated['value'];
        // Tạo mới hoặc cập nhật bản ghi
        $record = Commission::updateOrCreate(
            ['sale_id' => $validated['sale'], 'quoteE_id' => $validated['quote']],
            [
                'amount' => $validated['value'],
                'month' => $validated['month'],
                'total_amount' => $total_amount,
            ]
        );

        return response()->json(['success' => true, 'data' => $record]);
    }
    public function updateStatusCommission(Request $request)
    {
        // Xác thực dữ liệu
        $validated = $request->validate([
            'sale' => 'required|integer',
            'quote' => 'required|integer',
        ]);

        // Xác định giá trị của status
        $status = $request->isChecked;
        // Tìm bản ghi và cập nhật trạng thái
        $record = Commission::where('sale_id', $validated['sale'])
            ->where('quoteE_id', $validated['quote'])
            ->update(['status' => $status]);

        return response()->json(['success' => true, 'data' => $record]);
    }

    public function promotionGuest()
    {
        $title = 'Chương trình khuyến mãi';
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;

        $productDelivered = $this->quoteE->sumProductsQuoteSale();
        // // Get All đơn
        $today = Carbon::now()->format('Y-m-d');
        $dateArray = [
            'today' => $today,
        ];

        $allDelivery = $this->detailExport->getSumDetailESale($dateArray);
        $groupGuests = Groups::where('grouptype_id', 2)->where('workspace_id', Auth::user()->current_workspace)->get();
        $guest = Guest::where('workspace_id', Auth::user()->current_workspace)->get();
        $promotions = Promotion::where('month', Carbon::now()->month)
            ->get();
        return view('tables.guests.promotion', compact('title', 'promotions', 'groupGuests', 'guest', 'productDelivered', 'allDelivery'));
    }

    // Tạo mới hoặc cập nhật khuyến mãi KH
    public function promotionGuestAjax(Request $request)
    {
        // Xác thực dữ liệu
        $validated = $request->validate([
            'month' => 'required|string',
            'year' => 'required|string',
            'guest' => 'required|integer',
            'type' => 'required|string',
            'desc' => 'nullable|string',
            'value' => 'nullable|string',
            'product_quantity' => 'nullable|string',
            'cash_value' => 'nullable|string',
            'gold_value' => 'nullable|string',
        ]);

        // Loại bỏ dấu phẩy khỏi các giá trị để xử lý chính xác số
        $validated['cash_value'] = str_replace(',', '', $validated['cash_value']);
        $validated['product_quantity'] = str_replace(',', '', $validated['product_quantity']);
        $validated['gold_value'] = str_replace(',', '', $validated['gold_value']);

        // Tạo mảng dữ liệu cần lưu
        $data = [
            'guest_id' => $validated['guest'],
            'month' => $validated['month'],
            'year' => $validated['year'],
            'description' => $validated['desc'],
        ];

        // Cập nhật dữ liệu dựa trên loại
        if ($validated['type'] == 'cash') {
            $data['cash_value'] = $validated['cash_value'];
        } elseif ($validated['type'] == 'gold') {
            $data['gold_value'] = $validated['gold_value'];
        } elseif ($validated['type'] == 'quantity') {
            $data['product_quantity'] = $validated['product_quantity'];
        }

        // Tạo mới hoặc cập nhật bản ghi
        $record = Promotion::updateOrCreate(
            ['guest_id' => $validated['guest'], 'month' => $validated['month'], 'year' => $validated['year']],
            $data
        );

        // Trả về phản hồi JSON
        return response()->json(['success' => true, 'data' => $record]);
    }

    public function search(Request $request)
    {
        $data = $request->all();
        $filters = [];
        if (isset($data['date']) && $data['date'][1] !== null) {
            $date_start = date("d/m/Y", strtotime($data['date'][0]));
            $date_end = date("d/m/Y", strtotime($data['date'][1]));
            $filters[] = ['value' => 'Ngày báo giá: từ ' . $date_start . ' đến ' . $date_end, 'name' => 'date', 'icon' => 'date'];
        }
        $promotionQuery = Promotion::query();

        if (isset($data['monthYear']) && $data['monthYear'][1] !== null) {
            $month = $data['monthYear'][0];
            $year = $data['monthYear'][1];

            // Thêm vào mảng filters (nếu cần)
            $filters[] = ['value' => 'CTKM: tháng ' . $month . ' năm ' . $year, 'name' => 'monthYear', 'icon' => 'monthYear'];

            // Lọc theo tháng và năm
            $promotionQuery->where('month', $month)
                ->where('year', $year);
        }

        // Thực hiện truy vấn
        $promotion = $promotionQuery->get();
        if ($request->ajax()) {
            $result = $this->detailExport->ajax($data);
            return response()->json([
                'data' => $result,
                'filters' => $filters,
                'promotion' => $promotion,
            ]);
        }
        return false;
    }
}
