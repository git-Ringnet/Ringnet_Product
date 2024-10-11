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
            'initial_amount' => str_replace(',', '', $request->amount),
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
        $fundReceipts = DB::table('cash_receipts')
            ->join('funds', 'cash_receipts.fund_id', '=', 'funds.id')
            ->select(
                'cash_receipts.fund_id',
                'funds.name as fund_name',
                'cash_receipts.created_at',
                'cash_receipts.amount',
                'cash_receipts.date_created',
                'cash_receipts.receipt_code',
                'cash_receipts.id as id'
            )
            ->where('cash_receipts.fund_id', $fund->id)
            ->get()
            ->map(function ($item) {
                $item->source_id = 'cash_receipts';
                return $item;
            });

        $fundPayments = DB::table('pay_order')
            ->join('funds', 'pay_order.fund_id', '=', 'funds.id')
            ->select(
                'pay_order.fund_id',
                'funds.name as fund_name',
                'pay_order.created_at',
                'pay_order.payment',
                'pay_order.payment_date',
                'pay_order.payment_code',
                'pay_order.id as id'
            )
            ->where('pay_order.fund_id', $fund->id)
            ->get()
            ->map(function ($item) {
                $item->source_id = 'pay_order';
                $item->date_created = $item->payment_date;
                return $item;
            });
        return view('tables.funds.show', compact('fund', 'title', 'workspacename', 'fundReceipts', 'fundPayments'));
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

        // Process amount to remove thousand separators and convert to float
        $amount = str_replace(',', '', $request->amount);
        $amount = floatval($amount);

        // Check if the fund name already exists
        $isNameDuplicate = DB::table('funds')
            ->where('name', $request->name)
            ->where('id', '!=', $fund->id)
            ->exists();

        if ($isNameDuplicate) {
            return redirect()->back()->with('warning', 'Tên quỹ đã tồn tại!');
        }

        // Calculate total payments and receipts
        $total_payments = DB::table('pay_order')
            ->where('fund_id', $fund->id)
            ->sum('payment');

        $total_receipts = DB::table('cash_receipts')
            ->where('fund_id', $fund->id)
            ->sum('amount');

        // Calculate the new initial amount
        $initial_amount = $amount + $total_receipts - $total_payments;

        // Update the fund record
        $fund->update([
            'name' => $request->name,
            'description' => $request->description,
            'amount' => $amount,
            'bank_name' => $request->bank_name,
            'bank_account_number' => $request->bank_account_number,
            'bank_account_holder' => $request->bank_account_holder,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'initial_amount' => $initial_amount,
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
    public function search(Request $request)
    {
        $data = $request->all();
        $filters = [];
        if (isset($data['fundName']) && $data['fundName'] !== null) {
            $filters[] = ['value' => 'Tên quỹ: ' . $data['fundName'], 'name' => 'tenquy', 'icon' => 'name'];
        }
        if (isset($data['fundAmount'][0]) && isset($data['fundAmount'][1])) {
            $filters[] = ['value' => 'Tiền quỹ: ' . $data['fundAmount'][0] . $data['fundAmount'][1], 'name' => 'tienquy', 'icon' => 'money'];
        }
        if (isset($data['date']) && $data['date'][1] !== null) {
            $date_start = date("d/m/Y", strtotime($data['date'][0]));
            $date_end = date("d/m/Y", strtotime($data['date'][1]));
            $filters[] = ['value' => 'Ngày: từ ' . $date_start . ' đến ' . $date_end, 'name' => 'date', 'icon' => 'date'];
        }
        $fund = new Fund();
        if ($request->ajax()) {
            $funds = $fund->searchFilter($data);
            return response()->json([
                'data' => $funds,
                'filters' => $filters,
            ]);
        }
        return false;
    }
    public function searchDetailFund(Request $request)
    {
        $data = $request->all();
        $filters = [];
        if (isset($data['chungtu']) && $data['chungtu'] !== null) {
            $filters[] = ['value' => 'Chứng từ: ' . $data['chungtu'], 'name' => 'chungtu', 'icon' => 'document'];
        }
        if (isset($data['thu'][0]) && isset($data['thu'][1])) {
            $filters[] = ['value' => 'Thu: ' . $data['thu'][0] . $data['thu'][1], 'name' => 'thu', 'icon' => 'money'];
        }

        if (isset($data['chi'][0]) && isset($data['chi'][1])) {
            $filters[] = ['value' => 'Chi: ' . $data['chi'][0] . $data['chi'][1], 'name' => 'chi', 'icon' => 'money'];
        }
        if (isset($data['date']) && $data['date'][1] !== null) {
            $date_start = date("d/m/Y", strtotime($data['date'][0]));
            $date_end = date("d/m/Y", strtotime($data['date'][1]));
            $filters[] = ['value' => 'Ngày: từ ' . $date_start . ' đến ' . $date_end, 'name' => 'date', 'icon' => 'calendar'];
        }
        $fund = new Fund();
        if ($request->ajax()) {

            $funds = $fund->searchDetailFilter($data);
            return response()->json([
                'data' => $funds,
                'filters' => $filters,
            ]);
        }
        return false;
    }
}
