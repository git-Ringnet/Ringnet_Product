<?php

namespace App\Http\Controllers;

use App\Models\Fund;
use App\Models\Workspace;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FundController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $workspaces;
    public function __construct()
    {
        $this->workspaces = new Workspace();
    }
    public function index()
    {
        $funds = Fund::where('workspace_id', Auth::user()->current_workspace)
            ->orderby('id', 'desc')
            ->get();
        $title = "Quỹ";
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;
        return view('tables.funds.index', compact('title', 'funds', 'workspacename'));
    }

    public function create()
    {
        $title = "Tạo quỹ";
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;
        return view('tables.funds.create', compact('title', 'workspacename'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
            'amount' => 'required',
            'bank_name' => 'nullable|string',
            'bank_account_number' => 'nullable|string',
            'bank_account_holder' => 'nullable|string',
            'workspace_id' => 'nullable|numeric',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
        ]);

        // Kiểm tra xem tên quỹ có bị trùng lặp không
        $isNameDuplicate = DB::table('funds')
            ->where('name', $request->name)
            ->exists();

        if ($isNameDuplicate) {
            return redirect()->back()->withErrors(['name' => 'Tên quỹ đã tồn tại.'])->withInput();
        }

        $dataFunds = [
            'name' => $request->name,
            'description' => $request->description,
            'amount' => str_replace(',', '', $request->amount),
            'bank_name' => $request->bank_name,
            'bank_account_number' => $request->bank_account_number,
            'bank_account_holder' => $request->bank_account_holder,
            'workspace_id' => Auth::user()->current_workspace,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date ?? Carbon::now(),
        ];

        DB::table('funds')->insert($dataFunds);

        return redirect()->route('funds.index')->with('msg', 'Tạo quỹ mới thành công!');
    }

    public function show(Fund $fund)
    {
        $title = "Quỹ";
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;
        return view('tables.funds.show', compact('fund', 'title', 'workspacename'));
    }

    public function edit(Fund $fund)
    {
        $title = "Quỹ";
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;
        return view('tables.funds.edit', compact('fund', 'title', 'workspacename'));
    }

    public function update(Request $request, Fund $fund)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
            'amount' => 'required',
            'bank_name' => 'nullable|string',
            'bank_account_number' => 'nullable|string',
            'bank_account_holder' => 'nullable|string',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
        ]);

        // Xử lý amount để loại bỏ dấu phân cách hàng nghìn
        $amount = str_replace(',', '', $request->amount);

        // Kiểm tra xem tên quỹ có bị trùng lặp không
        $isNameDuplicate = DB::table('funds')
            ->where('name', $request->name)
            ->where('id', '!=', $fund->id)
            ->exists();

        if ($isNameDuplicate) {
            return redirect()->back()->with('warning', 'Tên quỹ đã tồn tại!');
        }

        // Cập nhật dữ liệu quỹ
        $fund->update([
            'name' => $request->name,
            'description' => $request->description,
            'amount' => $amount,
            'bank_name' => $request->bank_name,
            'bank_account_number' => $request->bank_account_number,
            'bank_account_holder' => $request->bank_account_holder,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);

        return redirect()->route('funds.index')->with('msg', 'Cập nhật quỹ thành công!');
    }

    public function destroy(Fund $fund)
    {
        $fund->delete();
        return redirect()->route('funds.index')->with('msg', 'Xóa quỹ thành công!');
    }
    public function calculateFunds($id, $money)
    {
        // Lấy thông tin quỹ
        $fund = Fund::where('id', $id)->first();
        if ($fund) {
            $total = $fund->amount + str_replace(',', '', $money);
            $fund->amount = $total;
            $fund->save();
        }
    }
}
