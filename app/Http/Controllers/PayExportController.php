<?php

namespace App\Http\Controllers;

use App\Models\BillSale;
use App\Models\DetailExport;
use App\Models\PayExport;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
            ->select(
                'detailexport.*',
                'guest.*',
                'pay_export.*',
                DB::raw('(COALESCE(detailexport.total_price, 0) + COALESCE(detailexport.total_tax, 0)) as tongTienNo')
            )
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
        $numberQuote = DetailExport::all();
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
        $delivery = DetailExport::where('detailexport.id', $data['idQuote'])
            ->leftJoin('guest', 'guest.id', 'detailexport.guest_id')
            ->leftJoin('bill_sale', 'bill_sale.detailexport_id', 'detailexport.id')
            ->select(
                'detailexport.*',
                'guest.*',
                'bill_sale.id as maThanhToan',
            )
            ->first();
        return $delivery;
    }
    public function getProductPay(Request $request)
    {
        $data = $request->all();
        $delivery = DetailExport::leftJoin('quoteexport', 'quoteexport.detailexport_id', 'detailexport.id')
            ->where('detailexport.id', $data['idQuote'])
            ->get();
        return $delivery;
    }
}
