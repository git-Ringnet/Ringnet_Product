<?php

namespace App\Http\Controllers;

use App\Models\Commission;
use App\Models\DetailExport;
use App\Models\Groups;
use App\Models\Guest;
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

        // Tạo mới hoặc cập nhật bản ghi
        $record = Commission::updateOrCreate(
            ['sale_id' => $validated['sale'], 'quoteE_id' => $validated['quote']],
            ['amount' => $validated['value'], 'month' => $validated['month']]
        );

        return response()->json(['success' => true, 'data' => $record]);
    }
}
