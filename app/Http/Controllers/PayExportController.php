<?php

namespace App\Http\Controllers;

use App\Models\BillSale;
use App\Models\PayExport;
use App\Models\Products;
use Illuminate\Http\Request;

class PayExportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $billSale;
    private $product;
    private $payExport;

    public function __construct()
    {
        $this->billSale = new BillSale();
        $this->product = new Products();
        $this->payExport = new PayExport();
    }
    public function index()
    {
        $title = "Thanh toán bán hàng";
        $payExport = PayExport::leftJoin('detailexport', 'pay_export.detailexport_id', 'detailexport.id')
        ->leftJoin('guest', 'pay_export.guest_id', 'guest.id')
        ->get();
        return view('tables.export.pay_export.list-payExport', compact('title', 'payExport'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Tạo đơn thanh toán";
        $product = $this->product->getAllProducts();
        $numberQuote = BillSale::leftJoin('detailexport', 'bill_sale.detailexport_id', 'detailexport.id')
            ->where('bill_sale.status', 1)->get();
        return view('tables.export.pay_export.create-payExport', compact('title', 'numberQuote', 'product'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $payExport = $this->payExport->addPayExport($request->all());
        return redirect()->route('payExport.index')->with('msg', ' Tạo đơn thanh toán hàng thành công !');
    }

    /**
     * Display the specified resource.
     */
    public function show(PayExport $payExport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PayExport $payExport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PayExport $payExport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PayExport $payExport)
    {
        //
    }
    public function getInfoPay(Request $request)
    {
        $data = $request->all();
        $delivery = BillSale::where('detailexport.id', $data['idQuote'])
            ->leftJoin('detailexport', 'bill_sale.detailexport_id', 'detailexport.id')
            ->leftJoin('guest', 'guest.id', 'detailexport.guest_id')
            ->select('*', 'bill_sale.id as maThanhToan')
            ->first();
        return $delivery;
    }
    public function getProductPay(Request $request)
    {
        $data = $request->all();
        $delivery = BillSale::leftJoin('detailexport', 'bill_sale.detailexport_id', 'detailexport.id')
            ->leftJoin('quoteexport', 'quoteexport.detailexport_id', 'detailexport.id')
            ->where('detailexport.id', $data['idQuote'])->get();
        return $delivery;
    }
}
