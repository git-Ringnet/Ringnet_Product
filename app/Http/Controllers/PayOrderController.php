<?php

namespace App\Http\Controllers;

use App\Models\DetailImport;
use App\Models\HistoryPaymentOrder;
use App\Models\PayOder;
use App\Models\ProductImport;
use App\Models\QuoteImport;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PayOrderController extends Controller
{
    private $payment;
    private $productImport;
    private $historyPayment;
    public function __construct()
    {
        $this->payment = new PayOder();
        $this->productImport = new ProductImport();
        $this->historyPayment = new HistoryPaymentOrder();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Thanh toán mua hàng";
        $payment = PayOder::all();
        $today = Carbon::now();
        // dd($payment[0]->formatDate($payment[0]->payment_date)->diffInDays($today));
        return view('tables.paymentOrder.paymentOrder', compact('title', 'payment', 'today'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Tạo mới hóa đơn thanh toán";
        $reciept = DetailImport::leftJoin('quoteimport', 'detailimport.id', '=', 'quoteimport.detailimport_id')
            ->where('quoteimport.product_qty', '>', 'quoteimport.receive_qty')
            ->distinct()
            ->select('detailimport.quotation_number', 'detailimport.id')
            ->get();
        // $reciept = Reciept::where('status', '=', 1)->get();
        return view('tables.paymentOrder.insertPaymentOrder', compact('title', 'reciept'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $id = $request->detailimport_id;

        // Tạo sản phẩm theo đơn nhận hàng
        $this->productImport->addProductImport($request->all(), $id, 'payOrder_id', 'payment_qty');
        // Tạo mới thanh toán hóa đơn
        $payment = $this->payment->addNewPayment($request->all(), $id);

        // Lưu lịch sử
        if ($payment) {
            $this->historyPayment->addHistoryPayment($request->all(),$payment);
            return redirect()->route('paymentOrder.index')->with('msg', ' Tạo mới thanh toán hóa đơn thành công !');
        } else {
            return redirect()->route('paymentOrder.index')->with('msg', 'Không tìm thấy !');
        }
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
        if ($payment) {
            $title = $payment->id;
            // $product = QuoteImport::where('receive_id',$payment->reciept_id)->get();
            $product = ProductImport::join('quoteimport', 'quoteimport.id', 'products_import.quoteImport_id')
                ->where('products_import.detailimport_id', $payment->detailimport_id)
                ->where('products_import.payOrder_id', $payment->id)
                ->select(
                    'quoteimport.product_code',
                    'quoteimport.product_name',
                    'quoteimport.product_unit',
                    'products_import.product_qty',
                    'quoteimport.price_export',
                    'quoteimport.product_tax',
                    'quoteimport.product_note',
                    'products_import.product_id',
                    DB::raw('products_import.product_qty * quoteimport.price_export as product_total')
                )
                ->get();
            $history = HistoryPaymentOrder::where('payment_id',$payment->id)->get();
            return view('tables.paymentOrder.editPaymentOrder', compact('payment', 'title', 'product','history'));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Cập nhật trạng thái
        $result = $this->payment->updatePayment($request->all(), $id);
        if ($result) {
            return redirect()->route('paymentOrder.index')->with('msg', 'Thanh toán hóa đơn thành công !');
        } else {
            return redirect()->route('paymentOrder.index')->with('warning', 'Hóa đơn đã được thanh toán !');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function getPaymentOrder(Request $request)
    {
        return QuoteImport::leftJoin('detailimport','detailimport.id','quoteimport.detailimport_id')
        ->where('quoteimport.detailimport_id', $request->id)
        // ->where('product_qty', '>', DB::raw('COALESCE(payment_qty,0)'))
        ->get();
    }
}
