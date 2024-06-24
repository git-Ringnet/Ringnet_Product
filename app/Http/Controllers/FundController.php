<?php

namespace App\Http\Controllers;

use App\Models\Fund;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FundController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $funds = Fund::all();
        return view('tables.funds.index', compact('funds'));
    }

    public function create()
    {
        return view('tables.funds.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
            'amount' => 'required|numeric',
            'bank_name' => 'nullable|string',
            'bank_account_number' => 'nullable|string',
            'bank_account_holder' => 'nullable|string',
            'workspace_id' => 'nullable|numeric',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
        ]);

        // Fund::create($request->all());
        $dataFunds = [
            'name' => $request->name,
            'description' => $request->description,
            'amount' => $request->amount,
            'bank_name' => $request->bank_name,
            'bank_account_number' => $request->bank_account_number,
            'bank_account_holder' => $request->bank_account_holder,
            'workspace_id' => Auth::user()->current_workspace,
            'start_date' => isset($request->start_date) ? $request->start_date : Carbon::now(),
            'end_date' => isset($request->end_date) ? $request->end_date : Carbon::now()
        ];

        DB::table('funds')->insert($dataFunds);
        return redirect()->route('funds.index')->with('success', 'Fund created successfully.');
    }

    public function show(Fund $fund)
    {
        return view('tables.funds.show', compact('fund'));
    }

    public function edit(Fund $fund)
    {
        return view('tables.funds.edit', compact('fund'));
    }

    public function update(Request $request, Fund $fund)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
            'amount' => 'required|numeric',
            'bank_name' => 'nullable|string',
            'bank_account_number' => 'nullable|string',
            'bank_account_holder' => 'nullable|string',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
        ]);

        $fund->update($request->all());
        return redirect()->route('funds.index')->with('success', 'Fund updated successfully.');
    }

    public function destroy(Fund $fund)
    {
        $fund->delete();
        return redirect()->route('funds.index')->with('success', 'Fund deleted successfully.');
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
