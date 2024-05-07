<?php

namespace App\Http\Controllers;

use App\Models\Attachment;
use App\Models\BillSale;
use App\Models\Delivered;
use App\Models\DetailExport;
use App\Models\history_Pay_Export;
use App\Models\PayExport;
use App\Models\productBill;
use App\Models\productPay;
use App\Models\Products;
use App\Models\QuoteExport;
use App\Models\Serialnumber;
use App\Models\User;
use App\Models\userFlow;
use App\Models\Workspace;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
    private $workspaces;
    private $attachment;
    private $userFlow;
    private $users;

    public function __construct()
    {
        $this->billSale = new BillSale();
        $this->product = new Products();
        $this->payExport = new PayExport();
        $this->productPay = new productPay();
        $this->workspaces = new Workspace();
        $this->attachment = new Attachment();
        $this->userFlow = new userFlow();
        $this->users = new User();
    }
    public function index()
    {
        if (Auth::check()) {
            $title = "Thanh toán bán hàng";
            $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
            $workspacename = $workspacename->workspace_name;
            $users = $this->payExport->getUserInPayEx();
            $payExport = PayExport::leftJoin('detailexport', 'pay_export.detailexport_id', 'detailexport.id')
                ->leftJoin('history_payment_export', 'pay_export.id', 'history_payment_export.pay_id')
                ->leftJoin('users', 'users.id', 'pay_export.user_id')
                ->where('pay_export.workspace_id', Auth::user()->current_workspace)
                ->orderBy('pay_export.id', 'DESC')
                ->select(
                    'detailexport.quotation_number',
                    'detailexport.guest_name',
                    'pay_export.payment_date',
                    'pay_export.total',
                    'pay_export.id as id',
                    'pay_export.debt',
                    'pay_export.status',
                    'pay_export.payment',
                    'pay_export.code_payment',
                    'users.name',
                    DB::raw('(COALESCE(detailexport.total_price, 0) + COALESCE(detailexport.total_tax, 0)) as tongTienNo'),
                    DB::raw('SUM(history_payment_export.payment) as tongThanhToan')
                )
                ->groupby(
                    'detailexport.quotation_number',
                    'detailexport.guest_name',
                    'pay_export.payment_date',
                    'pay_export.total',
                    'pay_export.id',
                    'detailexport.total_price',
                    'detailexport.total_tax',
                    'pay_export.debt',
                    'pay_export.status',
                    'pay_export.payment',
                    'pay_export.code_payment',
                    'users.name',
                )
                ->get();
            return view('tables.export.pay_export.list-payExport', compact('title', 'users', 'payExport', 'workspacename'));
        } else {
            return redirect()->back()->with('warning', 'Vui lòng đăng nhập!');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Tạo đơn thanh toán";
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;
        $product = $this->product->getAllProducts();
        $numberQuote = DetailExport::leftJoin('quoteexport', 'detailexport.id', '=', 'quoteexport.detailexport_id')
            ->where('quoteexport.status', 1)
            ->where('quoteexport.product_qty', '>', DB::raw('COALESCE(quoteexport.qty_payment,0)'))
            ->where('detailexport.workspace_id', Auth::user()->current_workspace)
            ->select('detailexport.quotation_number', 'detailexport.id')
            ->distinct()
            ->get();
        return view('tables.export.pay_export.create-payExport', compact('title', 'numberQuote', 'product', 'workspacename'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(string $workspace, Request $request)
    {
        $pay_id = $this->payExport->addPayExport($request->all());
        $this->productPay->addProductPay($request->all(), $pay_id);
        $arrCapNhatKH = [
            'name' => 'TT',
            'des' => 'Xác nhận'
        ];
        if ($request->pdf_export == 1) {
            // Sau khi lưu xong tất cả thông tin, set session export_id
            $request->session()->put('pdf_info.pay_id', $pay_id);
        }
        $this->userFlow->addUserFlow($arrCapNhatKH);
        if ($request->redirect == 'payExport') {
            return redirect()->route('detailExport.index', ['workspace' => $workspace])->with('msg', ' Tạo đơn thanh toán hàng thành công !');
        } else {
            return redirect()->route('payExport.index', ['workspace' => $workspace])->with('msg', ' Tạo đơn thanh toán hàng thành công !');
        }
    }

    public function downloadPdf()
    {
        // Kiểm tra xem có session export_id không
        $exportId = session('pdf_info.pay_id');

        if ($exportId) {
            // Xóa session delivery_id trước khi tạo và trả về PDF
            session()->forget('pdf_info.pay_id');

            $payExport = PayExport::where('pay_export.id', $exportId)
                ->where('pay_export.workspace_id', Auth::user()->current_workspace)
                ->leftJoin('detailexport', 'pay_export.detailexport_id', 'detailexport.id')
                ->select(
                    '*',
                    'pay_export.id as idTT',
                    'pay_export.created_at as ngayTT',
                    'pay_export.status as trangThai',
                    DB::raw('(COALESCE(detailexport.total_price, 0) + COALESCE(detailexport.total_tax, 0)) as tongTienNo')
                )
                ->first();
            $product = PayExport::join('quoteexport', 'pay_export.detailexport_id', '=', 'quoteexport.detailexport_id')
                ->leftJoin('product_pay', function ($join) {
                    $join->on('product_pay.pay_id', '=', 'pay_export.id');
                    $join->on('product_pay.product_id', '=', 'quoteexport.product_id');
                })
                ->where('quoteexport.status', 1)
                ->where('pay_export.id', $exportId)
                ->where(function ($query) {
                    $query->where('quoteexport.product_delivery', null)
                        ->orWhere('quoteexport.product_delivery', 0);
                })
                ->join('products', 'products.id', 'product_pay.product_id')
                ->select(
                    'quoteexport.product_id',
                    'quoteexport.product_code',
                    'quoteexport.product_name',
                    'quoteexport.product_unit',
                    'quoteexport.price_export',
                    'quoteexport.product_tax',
                    'quoteexport.product_note',
                    'quoteexport.product_total',
                    'quoteexport.product_ratio',
                    'quoteexport.price_import',
                    'product_pay.pay_qty as deliver_qty'
                )
                ->groupBy(
                    'quoteexport.product_id',
                    'quoteexport.product_code',
                    'quoteexport.product_name',
                    'quoteexport.product_unit',
                    'quoteexport.price_export',
                    'quoteexport.product_tax',
                    'quoteexport.product_note',
                    'quoteexport.product_total',
                    'quoteexport.product_ratio',
                    'quoteexport.price_import',
                    'product_pay.pay_qty'
                )
                ->get();
            $serinumber = Serialnumber::leftJoin('pay_export', 'pay_export.detailexport_id', 'serialnumber.detailexport_id')
                ->where('pay_export.id', $exportId)
                ->select('*', 'serialnumber.id as idSeri')
                ->get();
            $bg = url('dist/img/logo-2050x480-1.png');
            $workspace = Workspace::where('id', Auth::user()->current_workspace)->first();
            $data = [
                'delivery' => $payExport,
                'product' => $product,
                'serinumber' => $serinumber,
                'date' => $payExport->ngayTT,
                'workspace' => $workspace,
                'bg' => $bg,
            ];
            $pdf = Pdf::loadView('pdf.delivery', compact('data'))
                ->setPaper('A4', 'portrait')
                ->setOptions([
                    'defaultFont' => 'sans-serif',
                    'dpi' => 100,
                    'isHtml5ParserEnabled' => true,
                    'isPhpEnabled' => true,
                    'enable_remote' => false,

                ]);
            if (Auth::user()->current_workspace == 2) {
                $pdf = Pdf::loadView('pdf.delivery-ringnet', compact('data'))
                    ->setPaper('A4', 'portrait')
                    ->setOptions([
                        'defaultFont' => 'sans-serif',
                        'dpi' => 100,
                        'isHtml5ParserEnabled' => true,
                        'isPhpEnabled' => true,
                        'enable_remote' => false,
                    ]);
                return $pdf->download('delivery-ringnet.pdf');
            }
            return $pdf->download('payExport.pdf');
        } else {
            // Nếu không có session export_id, chuyển hướng hoặc xử lý theo nhu cầu của bạn
            return redirect()->back()->with('error', 'Không có PDF để tải xuống.');
        }
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
    public function edit(string $workspace, string $id)
    {
        $title = "Thanh toán bán hàng";
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;
        $payExport = PayExport::where('pay_export.id', $id)
            ->where('pay_export.workspace_id', Auth::user()->current_workspace)
            ->leftJoin('detailexport', 'pay_export.detailexport_id', 'detailexport.id')
            ->leftJoin('guest', 'pay_export.guest_id', 'guest.id')
            ->leftJoin('represent_guest', 'detailexport.represent_id', 'represent_guest.id')
            ->select(
                '*',
                'pay_export.id as idTT',
                'pay_export.created_at as ngayTT',
                'pay_export.status as trangThai',
                DB::raw('(COALESCE(detailexport.total_price, 0) + COALESCE(detailexport.total_tax, 0)) as tongTienNo')
            )
            ->first();
        if (!$payExport) {
            abort('404');
        }
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
        $product = PayExport::join('quoteexport', 'pay_export.detailexport_id', '=', 'quoteexport.detailexport_id')
            ->leftJoin('product_pay', function ($join) {
                $join->on('product_pay.pay_id', '=', 'pay_export.id');
                $join->on('product_pay.product_id', '=', 'quoteexport.product_id');
            })
            ->where('quoteexport.status', 1)
            ->where('pay_export.id', $id)
            ->where(function ($query) {
                $query->where('quoteexport.product_delivery', null)
                    ->orWhere('quoteexport.product_delivery', 0);
            })
            ->join('products', 'products.id', 'product_pay.product_id')
            ->select(
                'quoteexport.product_id',
                'quoteexport.product_code',
                'quoteexport.product_name',
                'quoteexport.product_unit',
                'quoteexport.price_export',
                'quoteexport.product_tax',
                'quoteexport.product_note',
                'quoteexport.product_total',
                'quoteexport.product_ratio',
                'quoteexport.price_import',
                'product_pay.pay_qty'
            )
            ->groupBy(
                'quoteexport.product_id',
                'quoteexport.product_code',
                'quoteexport.product_name',
                'quoteexport.product_unit',
                'quoteexport.price_export',
                'quoteexport.product_tax',
                'quoteexport.product_note',
                'quoteexport.product_total',
                'quoteexport.product_ratio',
                'quoteexport.price_import',
                'product_pay.pay_qty'
            )
            ->get();
        $history = history_Pay_Export::where('pay_id', $id)
            ->where('history_payment_export.workspace_id', Auth::user()->current_workspace)
            ->leftJoin('pay_export', 'pay_export.id', 'history_payment_export.pay_id')
            ->select('history_payment_export.*', 'pay_export.code_payment', 'history_payment_export.payment_type')
            ->orderBy('history_payment_export.created_at', 'desc')
            ->get();
        return view('tables.export.pay_export.edit', compact('title', 'payExport', 'product', 'history', 'thanhToan', 'noConLaiValue', 'workspacename'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(string $workspace, Request $request, string $id)
    {
        if ($request->action == "action_1") {
            $payExport = PayExport::find($id);
            if ($payExport) {
                $this->payExport->updateDetailExport($request->all(), $payExport->detailexport_id);
                $arrCapNhatKH = [
                    'name' => 'TT',
                    'des' => 'Xác nhận ở trang chi tiết'
                ];
                $this->userFlow->addUserFlow($arrCapNhatKH);
                if ($request->redirect == 'payExport') {
                    return redirect()->route('detailExport.index', ['workspace' => $workspace])->with('msg', 'Xác nhận thanh toán thành công!');
                } else {
                    return redirect()->route('payExport.index', ['workspace' => $workspace])->with('msg', 'Xác nhận thanh toán thành công!');
                }
            }
        }
        if ($request->action == "action_2") {
            $this->payExport->deletePayExport($id);
            $table_id = $id;
            $table_name = 'TT';
            $this->attachment->deleteFileAll($table_id, $table_name);
            //
            $arrCapNhatKH = [
                'name' => 'TT',
                'des' => 'Xóa đơn thanh toán'
            ];
            $this->userFlow->addUserFlow($arrCapNhatKH);
            return redirect()->route('payExport.index', ['workspace' => $workspace])->with('msg', 'Xóa đơn thanh toán thành công!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $workspace, string $id)
    {
        $this->payExport->deletePayExport($id);
        $table_id = $id;
        $table_name = 'TT';
        $this->attachment->deleteFileAll($table_id, $table_name);
        $arrCapNhatKH = [
            'name' => 'TT',
            'des' => 'Xóa đơn thanh toán'
        ];
        $this->userFlow->addUserFlow($arrCapNhatKH);
        return redirect()->route('payExport.index', ['workspace' => $workspace])->with('msg', 'Xóa đơn thanh toán thành công!');
    }

    public function getInfoPay(Request $request)
    {
        $data = $request->all();
        $delivery = DetailExport::where('detailexport.id', $data['idQuote'])
            ->where('detailexport.workspace_id', Auth::user()->current_workspace)
            // ->leftJoin('guest', 'guest.id', 'detailexport.guest_id')
            // ->leftJoin('represent_guest', 'represent_guest.id', 'detailexport.represent_id')
            ->leftJoin('quoteexport', 'quoteexport.detailexport_id', 'detailexport.id')
            ->leftJoin('pay_export', 'pay_export.detailexport_id', 'detailexport.id')
            ->leftJoin('history_payment_export', 'history_payment_export.pay_id', 'pay_export.id')
            ->select(
                'detailexport.guest_id',
                'detailexport.guest_name',
                'detailexport.quotation_number',
                'detailexport.represent_name',
                DB::raw('(COALESCE(detailexport.total_price, 0) + COALESCE(detailexport.total_tax, 0)) as tongTienNo'),
                DB::raw('SUM(history_payment_export.payment) as tongThanhToan')
            )
            ->groupBy(
                'detailexport.guest_id',
                'detailexport.guest_name',
                'detailexport.total_price',
                'detailexport.total_tax',
                'detailexport.quotation_number',
                'detailexport.represent_name',
            )
            ->first();
        $lastPayExportId = DB::table('pay_export')
            ->where('pay_export.workspace_id', Auth::user()->current_workspace)
            ->max(DB::raw('CAST(SUBSTRING_INDEX(code_payment, "-", -1) AS UNSIGNED)'));
        $delivery['lastPayExportId'] = $lastPayExportId == null ? 0 : $lastPayExportId;
        return $delivery;
    }
    public function getProductPay(Request $request)
    {
        $data = $request->all();
        $delivery = DetailExport::leftJoin('quoteexport', 'quoteexport.detailexport_id', 'detailexport.id')
            ->where('detailexport.id', $data['idQuote'])
            ->where('quoteexport.status', 1)
            ->where('detailexport.workspace_id', Auth::user()->current_workspace)
            ->whereRaw('COALESCE(quoteexport.product_qty, 0) - COALESCE(quoteexport.qty_payment, 0) > 0')
            ->where(function ($query) {
                $query->where('quoteexport.product_delivery', null)
                    ->orWhere('quoteexport.product_delivery', 0);
            })
            ->get();
        return $delivery;
    }
    public function searchPayExport(Request $request)
    {
        $data = $request->all();
        $filters = [];
        if (isset($data['quotenumber']) && $data['quotenumber'] !== null) {
            $filters[] = ['value' => 'Số báo giá: ' . $data['quotenumber'], 'name' => 'quotenumber', 'icon' => 'po'];
        }
        if (isset($data['guests']) && $data['guests'] !== null) {
            $filters[] = ['value' => 'Khách hàng: ' . $data['guests'], 'name' => 'guests', 'icon' => 'user'];
        }
        if (isset($data['code_payment']) && $data['code_payment'] !== null) {
            $payExport = $this->payExport->code_paymentById($data['code_payment']);
            $payExportString = implode(', ', $payExport);
            $filters[] = ['value' => 'Mã thanh toán: ' . count($data['code_payment']) . ' hoá đơn', 'name' => 'code_payment', 'icon' => 'po'];
        }
        if (isset($data['users']) && $data['users'] !== null) {
            $users = $this->users->getNameUser($data['users']);
            $userstring = implode(', ', $users);
            $filters[] = ['value' => 'Người tạo: ' . count($data['users']) . ' người tạo', 'name' => 'users', 'icon' => 'user'];
        }
        $statusText = '';
        if (isset($data['status']) && $data['status'] !== null) {
            $statusValues = [];
            if (in_array(1, $data['status'])) {
                $statusValues[] = '<span style="color: #858585;">Chưa thanh toán</span>';
            }
            if (in_array(2, $data['status'])) {
                $statusValues[] = '<span style="color: #08AA36BF;">Thanh toán đủ</span>';
            }
            if (in_array(6, $data['status'])) {
                $statusValues[] = '<span style="color: #E8B600;">Đến hạn</span>';
            }
            if (in_array(4, $data['status'])) {
                $statusValues[] = '<span style="color: #EC212D;">Quá hạn</span>';
            }
            if (in_array(5, $data['status'])) {
                $statusValues[] = '<span style="color: #0052CC;">Thanh toán 1 phần</span>';
            }
            if (in_array(3, $data['status'])) {
                $statusValues[] = '<span style="color: #0052CC;">Gần đến hạn</span>';
            }
            if (in_array(7, $data['status'])) {
                $statusValues[] = '<span style="color: #0052CC;">Đặt cọc</span>';
            }
            $statusText = implode(', ', $statusValues);
            $filters[] = ['value' => 'Trạng thái: ' . $statusText, 'name' => 'status', 'icon' => 'status'];
        }
        if (isset($data['total']) && $data['total'][1] !== null) {
            $filters[] = ['value' => 'Tổng tiền: ' . $data['total'][0] . ' ' . $data['total'][1], 'name' => 'total', 'icon' => 'money'];
        }
        if (isset($data['payment']) && $data['payment'][1] !== null) {
            $filters[] = ['value' => 'Đã nhận: ' . $data['payment'][0] . ' ' . $data['payment'][1], 'name' => 'payment', 'icon' => 'money'];
        }
        if (isset($data['debt']) && $data['debt'][1] !== null) {
            $filters[] = ['value' => 'Dư nợ: ' . $data['debt'][0] . ' ' . $data['debt'][1], 'name' => 'debt', 'icon' => 'money'];
        }
        if (isset($data['date']) && $data['date'][1] !== null) {
            $date_start = date("d/m/Y", strtotime($data['date'][0]));
            $date_end = date("d/m/Y", strtotime($data['date'][1]));
            $filters[] = ['value' => 'Hạn thanh toán: từ ' . $date_start . ' đến ' . $date_end, 'name' => 'date', 'icon' => 'date'];
        }
        if ($request->ajax()) {
            $payExport = $this->payExport->ajaxdas($data);
            return response()->json([
                'data' => $payExport,
                'filters' => $filters,
            ]);
        }
        return false;
    }
    public function checkCodePayment(Request $request)
    {
        $check = PayExport::where('code_payment', $request['numberValue'])
            ->where('workspace_id', Auth::user()->current_workspace)
            ->first();

        if ($check) {
            $response = ['success' => false, 'msg' => 'Mã thanh toán đã tồn tại!'];
        } else {
            $response = ['success' => true];
        }

        return response()->json($response);
    }
}
