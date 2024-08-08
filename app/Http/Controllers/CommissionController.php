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
        $allDelivery = $this->detailExport->getSumDetailESale();
        $groupGuests = Groups::where('grouptype_id', 2)->where('workspace_id', Auth::user()->current_workspace)->get();
        $guest = Guest::where('workspace_id', Auth::user()->current_workspace)->get();

        return view('tables.guests.promotion', compact('title', 'groupGuests', 'guest', 'productDelivered', 'allDelivery'));
    }

    // Tạo mới hoặc cập nhật khuyến mãi KH
    public function promotionGuestAjax(Request $request)
    {
        // Xác thực dữ liệu
        $validated = $request->validate([
            'month' => 'required|string',
            'guest' => 'required|integer',
            'quote' => 'required|integer',
            'type' => 'required|string',
            'value' => 'nullable|string',
            'product_quantity' => 'nullable|string',
            'cash_value' => 'nullable|string',
            'gold_value' => 'nullable|string',
        ]);

        // Loại bỏ dấu phẩy khỏi các giá trị
        $validated['cash_value'] = str_replace(',', '', $validated['cash_value']);
        $validated['product_quantity'] = str_replace(',', '', $validated['product_quantity']);

        // Tạo mới hoặc cập nhật bản ghi
        $data = [
            'guest_id' => $validated['guest'],
            'quoteE_id' => $validated['quote'],
            'month' => $validated['month'],
        ];

        if ($validated['type'] == 'cash') {
            $data['cash_value'] = $validated['cash_value'];
        } elseif ($validated['type'] == 'gold') {
            $data['gold_value'] = $validated['gold_value'];
        } elseif ($validated['type'] == 'quantity') {
            $data['product_quantity'] = $validated['product_quantity'];
        }

        $record = Promotion::updateOrCreate(
            ['guest_id' => $validated['guest'], 'quoteE_id' => $validated['quote']],
            $data
        );

        return response()->json(['success' => true, 'data' => $record]);
    }
}
