<?php

namespace App\Http\Controllers;

use App\Models\Attachment;
use App\Models\ContentGroups;
use App\Models\DetailImport;
use App\Models\Fund;
use App\Models\Guest;
use App\Models\HistoryPaymentOrder;
use App\Models\PayOder;
use App\Models\ProductImport;
use App\Models\Provides;
use App\Models\QuoteImport;
use App\Models\ReturnExport;
use App\Models\ReturnImport;
use App\Models\ReturnProduct;
use App\Models\User;
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
    private $users;

    public function __construct()
    {
        $this->payment = new PayOder();
        $this->productImport = new ProductImport();
        $this->historyPayment = new HistoryPaymentOrder();
        $this->workspaces = new Workspace();
        $this->attachment = new Attachment();
        $this->users = new User();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Phiếu chi";
        $perPage = 10;
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;

        $payment = PayOder::where('pay_order.workspace_id', Auth::user()->current_workspace)->orderBy('pay_order.id', 'desc');
        if (Auth::check() && Auth::user()->getRoleUser->roleid == 4) {
            $payment->join('detailimport', 'detailimport.id', 'pay_order.detailimport_id')
                ->where('detailimport.user_id', Auth::user()->id);
        }
        $payment->select('pay_order.*');

        $payment = $payment->get();


        // $payment = PayOder::join('detailimport', 'detailimport.id', 'pay_order.detailimport_id')

        //     ->orderBy('pay_order.id', 'desc')->get();
        // dd($payment);
        // if (Auth::check() && Auth::user()->getRoleUser->roleid == 4) {
        //     $payment->where('pay_order.workspace_id', Auth::user()->current_workspace)
        //     ->where('detailimport.user_id', Auth::user()->id);
        // }
        // $payment->select(
        //     'pay_order.*'
        //     // DB::raw('SUM(pay_order.payment) as total_payment')
        // );

        // $payment = $payment->get();
        $users = $this->payment->getUserInPayOrder();
        $today = Carbon::now();
        return view('tables.paymentOrder.paymentOrder', compact('title', 'payment', 'users', 'today', 'workspacename'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Tạo mới phiếu chi";
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;
        // $reciept = DetailImport::leftJoin('quoteimport', 'detailimport.id', '=', 'quoteimport.detailimport_id')
        //     // ->where('quoteimport.product_qty', '>', 'quoteimport.payment_qty')
        //     ->where('quoteimport.product_qty', '>', DB::raw('COALESCE(quoteimport.payment_qty,0)'))
        //     ->where('quoteimport.workspace_id', Auth::user()->current_workspace)
        //     ->where('detailimport.status_pay', '=', 0)
        //     ->distinct()
        //     ->orderBy('id', 'desc');


        // if (Auth::check() && Auth::user()->getRoleUser->roleid == 4) {
        //     $reciept->where('detailimport.user_id', Auth::user()->id);
        // }

        // $reciept->select('detailimport.quotation_number', 'detailimport.id');
        // $reciept = $reciept->get();


        $reciept = DetailImport::where('workspace_id', Auth::user()->current_workspace)
            ->where('status_pay', '!=', 2)
            ->get();

        // $funds = Fund::all();
        $funds = Fund::where('workspace_id', Auth::user()->current_workspace)->get();

        $guest = Guest::where('workspace_id', Auth::user()->current_workspace)->get();
        $provides = Provides::where('workspace_id', Auth::user()->current_workspace)->get();
        $content = ContentGroups::where('contenttype_id', 2)->where('workspace_id', Auth::user()->current_workspace)->get();
        // Lấy đơn trả hàng KH
        $returnExport = ReturnExport::where('workspace_id', Auth::user()->current_workspace)
            ->whereRaw('CAST(total_return AS DECIMAL(20, 2)) > CAST(payment AS DECIMAL(20, 2))')->get();
        // dd($returnExport);

        $getQuoteCount = $this->payment->getQuoteCount();

        $listDetail = PayOder::where('pay_order.workspace_id', Auth::user()->current_workspace)->orderBy('pay_order.id', 'desc');
        if (Auth::check() && Auth::user()->getRoleUser->roleid == 4) {
            $listDetail->join('detailimport', 'detailimport.id', 'pay_order.detailimport_id')
                ->where('detailimport.user_id', Auth::user()->id);
        }
        $listDetail->select('pay_order.*');

        $listDetail = $listDetail->get();
        //danh sách nhân viên
        $listUser = User::where('origin_workspace', Auth::user()->current_workspace)->get();

        return view('tables.paymentOrder.insertPaymentOrder', compact('title', 'reciept', 'workspacename', 'funds', 'guest', 'provides', 'listUser', 'content', 'returnExport', 'getQuoteCount', 'listDetail'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (isset($request->id_import)) {
            $id = $request->id_import;
        } elseif (isset($request->detailimport_id)) {
            $id = $request->detailimport_id;
        } else {
            $id = $request->returnImport_id;
        }

        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;
        // if (isset($request->id_import) || isset($request->detailimport_id)) {
        //     // Tạo sản phẩm theo đơn nhận hàng
        //     $this->productImport->addProductImport($request->all(), $id, 'payOrder_id', 'payment_qty');
        // }

        if (isset($request->returnImport_id)) {
            // Cập nhật tiền đã trả cho khách khi trả hàng
            $returnE = ReturnExport::findOrFail($request->returnImport_id);
            $total = (int) str_replace(',', '', $request->total);

            $returnE->payment = $returnE->payment + $total;
            $returnE->save();
            return redirect()->route('import.index', $workspacename)->with('msg', ' Tạo mới thanh toán hóa đơn thành công !');
        } else {
            // Tạo mới thanh toán hóa đơn
            $payment = $this->payment->addNewPayment($request->all(), $id);
            // Trừ tiền vào quỹ
            $this->payment->calculateFunds($request->fund_id, $request->total);
        }

        if ($payment) {
            $dataUserFlow = [
                'user_id' => Auth::user()->id,
                'activity_type' => "TTMH",
                'activity_description' => "Xác nhận thanh toán mua hàng",
                'created_at' => Carbon::now()
            ];

            DB::table('user_flow')->insert($dataUserFlow);


            // Lưu lịch sử
            $this->historyPayment->addHistoryPayment($request->all(), $payment);

            if (isset($request->id_import)) {
                return redirect()->route('import.index', $workspacename)->with('msg', ' Tạo mới thanh toán hóa đơn thành công !');
            } else {
                return redirect()->route('paymentOrder.index', $workspacename)->with('msg', ' Tạo mới thanh toán hóa đơn thành công !');
            }
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
                ->join('products', 'quoteimport.product_name', 'products.product_name')
                ->where('products_import.detailimport_id', $payment->detailimport_id)
                ->where('products_import.payOrder_id', $payment->id)
                ->where('products.workspace_id', Auth::user()->current_workspace)
                ->select(
                    'quoteimport.product_code',
                    'quoteimport.product_name',
                    'quoteimport.product_unit',
                    'products_import.product_qty',
                    'quoteimport.price_export',
                    'quoteimport.product_tax',
                    'quoteimport.product_note',
                    'products_import.product_id',
                    'products.product_inventory as inventory',
                    DB::raw('products_import.product_qty * quoteimport.price_export as product_total')
                )
                ->get();
            $history = HistoryPaymentOrder::leftjoin('pay_order', 'pay_order.id', 'history_payment_order.payment_id')
                ->where('history_payment_order.payment_id', $payment->id)
                ->select('history_payment_order.*', 'pay_order.payment_code')
                ->get();
            $listDetail = PayOder::where('pay_order.workspace_id', Auth::user()->current_workspace)->orderBy('pay_order.id', 'desc');
            if (Auth::check() && Auth::user()->getRoleUser->roleid == 4) {
                $listDetail->join('detailimport', 'detailimport.id', 'pay_order.detailimport_id')
                    ->where('detailimport.user_id', Auth::user()->id);
            }
            $listDetail->select('pay_order.*');

            $listDetail = $listDetail->get();
            $guest = Provides::where('workspace_id', Auth::user()->current_workspace)->get();
            //danh sách nhân viên
            $listUser = User::where('origin_workspace', Auth::user()->current_workspace)->get();
            return view('tables.paymentOrder.editPaymentOrder', compact(
                'payment',
                'title',
                'product',
                'history',
                'workspacename',
                'nameRepresent',
                'listDetail',
                'guest',
                'listUser'
            ));
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
            // Thêm user flow
            $dataUserFlow = [
                'user_id' => Auth::user()->id,
                'activity_type' => "TTMH",
                'activity_description' => "Xác nhận thanh toán mua hàng",
                'created_at' => Carbon::now()
            ];

            DB::table('user_flow')->insert($dataUserFlow);
            // Thêm lịch sử thanh toán
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
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;

        // Cập nhật tiền đã trả cho khách khi trả hàng
        $phieuChi = PayOder::findOrFail($id);
        if ($phieuChi->return_id != 0) {
            $returnE = ReturnExport::findOrFail($phieuChi->return_id);
            $returnE->payment = $returnE->payment - $phieuChi->payment;
            $returnE->save();
        } else {
            //cập nhật công nợ
            $provide = Provides::where('id', $phieuChi->guest_id)->first();
            $provide->provide_debt = $provide->provide_debt + $phieuChi->payment;
            $provide->save();
            $status = $this->payment->deletePayment($id);
        }

        if ($status) {
            $dataUserFlow = [
                'user_id' => Auth::user()->id,
                'activity_type' => "TTMH",
                'activity_description' => "Xóa thanh toán mua hàng",
                'created_at' => Carbon::now()
            ];

            DB::table('user_flow')->insert($dataUserFlow);
            $this->attachment->deleteFileAll($id, 'TTMH');
            return redirect()->route('paymentOrder.index', $workspacename)->with('msg', 'Xóa thanh toán mua hàng thành công !');
        } else {
            return redirect()->route('paymentOrder.index', $workspacename)->with('warning', 'Không tìn thấy thanh toán mua hàng cần xóa !');
        }
    }

    public function getPaymentOrder(Request $request)
    {
        $data = [];
        $quoteImport = QuoteImport::leftJoin('detailimport', 'detailimport.id', 'quoteimport.detailimport_id')
            ->join('products', 'products.product_name', 'quoteimport.product_name')
            ->leftJoin('pay_order', 'detailimport.id', 'pay_order.detailimport_id')
            ->where('quoteimport.detailimport_id', $request->id)
            ->where('quoteimport.workspace_id', Auth::user()->current_workspace)
            ->where('products.workspace_id', Auth::user()->current_workspace)
            ->select('detailimport.*', 'pay_order.*', 'quoteimport.*', 'products.product_inventory as inventory')
            ->get();

        // Lấy tổng tiền đã tạo đơn
        $payment = PayOder::where('detailimport_id', $request->id)->sum('payment');
        $data['payment'] = $payment;
        $data['quoteImport'] = $quoteImport;
        return $data;
    }
    public function searchPaymentOrder(Request $request)
    {
        $data = $request->all();
        $filters = [];
        if (isset($data['quotenumber']) && $data['quotenumber'] !== null) {
            $filters[] = ['value' => 'Đơn mua hàng: ' . $data['quotenumber'], 'name' => 'quotenumber', 'icon' => 'po'];
        }
        if (isset($data['provides']) && $data['provides'] !== null) {
            $filters[] = ['value' => 'Nhà cung cấp: ' . $data['provides'], 'name' => 'provides', 'icon' => 'user'];
        }
        if (isset($data['payment_code']) && $data['payment_code'] !== null) {
            $payOrder = $this->payment->code_paymentById($data['payment_code']);
            $payOrderString = implode(', ', $payOrder);
            $filters[] = ['value' => 'Mã thanh toán: ' . count($data['payment_code']) . ' mã thanh toán', 'name' => 'payment_code', 'icon' => 'po'];
        }
        if (isset($data['users']) && $data['users'] !== null) {
            $users = $this->users->getNameUser($data['users']);
            $userstring = implode(', ', $users);
            $filters[] = ['value' => 'Người tạo: ' . count($data['users']) . ' người tạo', 'name' => 'users', 'icon' => 'user'];
        }
        if (isset($data['date']) && $data['date'][1] !== null) {
            $date_start = date("d/m/Y", strtotime($data['date'][0]));
            $date_end = date("d/m/Y", strtotime($data['date'][1]));
            $filters[] = ['value' => 'Hạn thanh toán: từ ' . $date_start . ' đến ' . $date_end, 'name' => 'date', 'icon' => 'date'];
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
            if (in_array(3, $data['status'])) {
                $statusValues[] = '<span style="color: #0052CC;">Gần đến hạn</span>';
            }
            if (in_array(4, $data['status'])) {
                $statusValues[] = '<span style="color: #EC212D;">Quá hạn</span>';
            }
            if (in_array(6, $data['status'])) {
                $statusValues[] = '<span style="color: #08AA36BF;">Đặt cọc</span>';
            }
            if (in_array(5, $data['status'])) {
                $statusValues[] = '<span style="color: #08AA36BF;">Đến hạn</span>';
            }
            if (in_array(7, $data['status'])) {
                $statusValues[] = '<span style="color: #08AA36BF;">Thanh toán 1 phần</span>';
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
        if ($request->ajax()) {
            $payment = $this->payment->ajax1($data);
            return response()->json([
                'data' => $payment,
                'filters' => $filters,
            ]);
        }
        return false;
    }



    public function getReturnProduct(Request $request)
    {
        $data = [];
        $total = 0;
        if (isset($request->status)) {
            $returnImport = ReturnImport::where('id', $request->detail_id)->first();
            if ($returnImport) {
                // $total1 = 0;
                // foreach ($returnProduct as $value) {
                //     $getQuoteImport = QuoteImport::where('id', $value->quoteimport_id)->first();
                //     if ($getQuoteImport) {
                //         $promotionArray = json_decode($getQuoteImport->promotion, true);
                //         $promotionValue = isset($promotionArray['value'])
                //             ? $promotionArray['value']
                //             : 0;
                //         $promotionOption = isset($promotionArray['t ype'])
                //             ? $promotionArray['type']
                //             : '';
                //         $temp = $getQuoteImport->price_export * $value->qty;
                //         $total1 += ($promotionOption == 1 ? ($temp - $promotionValue) : ($temp * $promotionValue / 100));
                //         $total += $total1;
                //     }
                // }
                $data['payment'] = $returnImport->payment;
                $data['total'] = $returnImport->total;
                $data['status'] = true;
            } else {
                $data['status'] = false;
            }
        } else {
            $returnExport = ReturnExport::leftJoin('guest', 'guest.id', 'return_export.guest_id')
                ->select('guest.guest_name_display as nameGuest', 'return_export.*')
                ->where('return_export.id', $request->detail_id)->first();
            $data['return'] = $returnExport;
            $data['total'] = $total;
            $data['status'] = true;
        }




        return $data;
    }
}
