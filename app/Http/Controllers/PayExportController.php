<?php

namespace App\Http\Controllers;

use App\Models\BillSale;
use App\Models\DetailExport;
use App\Models\history_Pay_Export;
use App\Models\PayExport;
use App\Models\productPay;
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
    private $productPay;

    public function __construct()
    {
        $this->billSale = new BillSale();
        $this->product = new Products();
        $this->payExport = new PayExport();
        $this->productPay = new productPay();
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
                'pay_export.id as idThanhToan',
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
        $pay_id = $this->payExport->addPayExport($request->all());
        $this->productPay->addProductPay($request->all(), $pay_id);
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
    public function edit(string $id)
    {
        $title = "Thanh toán bán hàng";
        $payExport = PayExport::where('pay_export.id', $id)
            ->leftJoin('detailexport', 'pay_export.detailexport_id', 'detailexport.id')
            ->leftJoin('guest', 'pay_export.guest_id', 'guest.id')
            ->select(
                '*',
                'pay_export.id as idTT',
                'pay_export.created_at as ngayTT',
                DB::raw('(COALESCE(detailexport.total_price, 0) + COALESCE(detailexport.total_tax, 0)) as tongTienNo')
            )
            ->first();
        $thanhToan = DB::table('history_payment_export')
            ->select(DB::raw('SUM(payment) as tongThanhToan'))
            ->where('pay_id', $id)
            ->first();
        $duNo = DB::table('history_payment_export')
            ->select('debt as noConLai')
            ->orderBy('id', 'desc')
            ->where('pay_id', $id)
            ->first();
        if ($duNo !== null) {
            $noConLaiValue = $duNo->noConLai;
        } else {
            $noConLaiValue = $payExport->tongTienNo;
        }
        $product = PayExport::join('product_pay', 'pay_export.id', '=', 'product_pay.pay_id')
            ->join('quoteexport', 'product_pay.product_id', '=', 'quoteexport.product_id')
            ->where('pay_export.id', $id)
            ->select(
                'pay_export.*',
                'product_pay.*',
                'quoteexport.*',
            )
            ->get();
        $history = history_Pay_Export::where('pay_id', $id)->get();
        return view('tables.export.pay_export.edit', compact('title', 'payExport', 'product', 'history', 'thanhToan', 'noConLaiValue'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $payExport = PayExport::find($id);
        if ($payExport) {
            $this->payExport->updateDetailExport($request->all(), $payExport->detailexport_id);
            return redirect()->route('payExport.index')->with('msg', 'Xác nhận thanh toán thành công!');
        }
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
            ->leftJoin('quoteexport', 'quoteexport.detailexport_id', 'detailexport.id')
            ->leftJoin('pay_export', 'pay_export.detailexport_id', 'detailexport.id')
            ->leftJoin('history_payment_export', 'history_payment_export.pay_id', 'pay_export.id')
            ->select(
                'detailexport.guest_id',
                'guest.guest_name_display',
                'detailexport.quotation_number',
                DB::raw('(COALESCE(detailexport.total_price, 0) + COALESCE(detailexport.total_tax, 0)) as tongTienNo'),
                DB::raw('SUM(history_payment_export.payment) as tongThanhToan')
            )
            ->groupBy(
                'detailexport.guest_id',
                'guest.guest_name_display',
                'detailexport.total_price',
                'detailexport.total_tax',
                'detailexport.quotation_number',
            )
            ->first();
        return $delivery;
    }
    public function getProductPay(Request $request)
    {
        $data = $request->all();
        $delivery = DetailExport::leftJoin('quoteexport', 'quoteexport.detailexport_id', 'detailexport.id')
            ->where('detailexport.id', $data['idQuote'])
            ->whereRaw('COALESCE(quoteexport.product_qty, 0) - COALESCE(quoteexport.qty_payment, 0) > 0')
            ->get();
        return $delivery;
    }
}
