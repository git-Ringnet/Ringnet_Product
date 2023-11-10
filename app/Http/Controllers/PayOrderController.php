<?php

namespace App\Http\Controllers;

use App\Models\PayOder;
use App\Models\QuoteImport;
use App\Models\Reciept;
use Illuminate\Http\Request;

class PayOrderController extends Controller
{
    private $payment;
    public function __construct()
    {
        $this->payment = new PayOder();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Thanh toán mua hàng";
        $payment = PayOder::all();
        return view('tables.paymentOrder.paymentOrder',compact('title','payment'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title ="Tạo mới hóa đơn thanh toán";
        $reciept = Reciept::where('status', '=', 1)->get();
        return view('tables.paymentOrder.insertPaymentOrder',compact('title','reciept'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->payment->addNewPayment($request->all());
        return redirect()->route('paymentOrder.index')->with('msg', ' Tạo mới thanh toán hóa đơn thành công !');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $payment = PayOder::findOrFail($id);
        $title = $payment->id;
        $product = QuoteImport::where('receive_id',$payment->reciept_id)->get();
        return view('tables.paymentOrder.editPaymentOrder',compact('payment','title','product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->payment->updatePayment($request->all(),$id);
        return redirect()->route('paymentOrder.index')->with('msg', ' Tạo mới thanh toán hóa đơn thành công !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
