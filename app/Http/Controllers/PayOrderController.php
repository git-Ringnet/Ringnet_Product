<?php

namespace App\Http\Controllers;

use App\Models\Attachment;
use App\Models\DetailImport;
use App\Models\HistoryPaymentOrder;
use App\Models\PayOder;
use App\Models\ProductImport;
use App\Models\QuoteImport;
use App\Models\Workspace;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PayOrderController extends Controller
{
    private $payment;
    private $productImport;
    private $historyPayment;
    private $workspaces;
    private $attachment;
    public function __construct()
    {
        $this->payment = new PayOder();
        $this->productImport = new ProductImport();
        $this->historyPayment = new HistoryPaymentOrder();
        $this->workspaces = new Workspace();
        $this->attachment = new Attachment();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Thanh toán mua hàng";
        $perPage = 10;
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;
        $payment = PayOder::where('workspace_id', Auth::user()->current_workspace)->orderBy('id', 'desc')->paginate($perPage);
        $today = Carbon::now();
        // dd($payment[0]->formatDate($payment[0]->payment_date)->diffInDays($today));
        return view('tables.paymentOrder.paymentOrder', compact('title', 'payment', 'today', 'workspacename'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Tạo mới hóa đơn thanh toán";
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;
        $reciept = DetailImport::leftJoin('quoteimport', 'detailimport.id', '=', 'quoteimport.detailimport_id')
            ->where('quoteimport.product_qty', '>', 'quoteimport.receive_qty')
            ->where('quoteimport.workspace_id', Auth::user()->current_workspace)
            ->where('detailimport.status_pay', '=', 0)
            ->distinct()
            ->orderBy('id', 'desc')
            ->select('detailimport.quotation_number', 'detailimport.id')
            ->get();
        // $reciept = Reciept::where('status', '=', 1)->get();
        return view('tables.paymentOrder.insertPaymentOrder', compact('title', 'reciept', 'workspacename'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $id = $request->detailimport_id;
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;
        // Tạo sản phẩm theo đơn nhận hàng
        $this->productImport->addProductImport($request->all(), $id, 'payOrder_id', 'payment_qty');
        // Tạo mới thanh toán hóa đơn
        $payment = $this->payment->addNewPayment($request->all(), $id);

        // Lưu lịch sử
        if ($payment) {
            $this->historyPayment->addHistoryPayment($request->all(), $payment);
            return redirect()->route('paymentOrder.index', $workspacename)->with('msg', ' Tạo mới thanh toán hóa đơn thành công !');
        } else {
            return redirect()->route('paymentOrder.index', $workspacename)->with('msg', 'Không tìm thấy !');
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
    public function edit(string $workspaces, string $id)
    {
        $payment = PayOder::findOrFail($id);
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;
        if ($payment) {
            $title = $payment->id;
            $detail = DetailImport::where('id', $payment->detailimport_id)->first();
            if ($detail && $detail->getNameRepresent) {
                $nameRepresent = $detail->getNameRepresent->represent_name;
            } else {
                $nameRepresent = "";
            }
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
            $history = HistoryPaymentOrder::leftjoin('pay_order','pay_order.id','history_payment_order.payment_id')
            ->where('history_payment_order.payment_id', $payment->id)
            ->select('history_payment_order.*','pay_order.payment_code')
            ->get();
            return view('tables.paymentOrder.editPaymentOrder', compact('payment', 'title', 'product', 'history', 'workspacename', 'nameRepresent'));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(string $workspace, Request $request, string $id)
    {
        // Cập nhật trạng thái
        $result = $this->payment->updatePayment($request->all(), $id);
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;
        if ($result) {
            $this->historyPayment->addHistoryPayment($request->all(), $id);
            return redirect()->route('paymentOrder.index', $workspacename)->with('msg', 'Thanh toán hóa đơn thành công !');
        } else {
            return redirect()->route('paymentOrder.index', $workspacename)->with('warning', 'Hóa đơn đã được thanh toán !');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $workspace, string $id)
    {
        $status = $this->payment->deletePayment($id);
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;
        if ($status) {
            $this->attachment->deleteFileAll($id,'TTMH');
            return redirect()->route('paymentOrder.index', $workspacename)->with('msg', 'Xóa thanh toán mua hàng thành công !');
        } else {
            return redirect()->route('paymentOrder.index', $workspacename)->with('warning', 'Không tìn thấy thanh toán mua hàng cần xóa !');
        }
    }

    public function getPaymentOrder(Request $request)
    {
        return QuoteImport::leftJoin('detailimport', 'detailimport.id', 'quoteimport.detailimport_id')
            ->leftJoin('pay_order', 'detailimport.id', 'pay_order.detailimport_id')
            ->where('quoteimport.detailimport_id', $request->id)
            ->where('quoteimport.workspace_id', Auth::user()->current_workspace)
            // ->where('product_qty', '>', DB::raw('COALESCE(payment_qty,0)'))
            ->get();
    }
    public function searchPaymentOrder(Request $request)
    {
        $data = $request->all();
        $filters = [];
        if ($request->ajax()) {
            $payment = $this->payment->ajax1($data);
            return response()->json([
                'data' => $payment,
                'filters' => $filters,
            ]);
        }
        return false;
    }
}
