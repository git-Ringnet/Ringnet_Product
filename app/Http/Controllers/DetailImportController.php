<?php

namespace App\Http\Controllers;

use App\Models\Attachment;
use App\Models\DateForm;
use App\Models\DetailImport;
use App\Models\GuestFormDate;
use App\Models\HistoryImport;
use App\Models\HistoryPaymentOrder;
use App\Models\PayOder;
use App\Models\ProductCode;
use App\Models\ProductImport;
use App\Models\Products;
use App\Models\Project;
use App\Models\ProvideRepesent;
use App\Models\Provides;
use App\Models\QuoteImport;
use App\Models\Receive_bill;
use App\Models\Reciept;
use App\Models\Serialnumber;
use App\Models\Workspace;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class DetailImportController extends Controller
{
    private $detailImport;
    private $sn;
    private $provide;
    private $quoteImport;
    private $receiver_bill;
    private $product;
    private $productImport;
    private $reciept;
    private $payment;
    private $history_import;
    private $historyPayment;
    private $attachment;
    private $workspaces;
    public function __construct()
    {
        $this->detailImport = new DetailImport();
        $this->provide = new Provides();
        $this->quoteImport = new QuoteImport();
        $this->receiver_bill = new Receive_bill();
        $this->product = new Products();
        $this->sn = new Serialnumber();
        $this->productImport = new ProductImport();
        $this->reciept = new Reciept();
        $this->payment = new PayOder();
        $this->history_import = new HistoryImport();
        $this->historyPayment = new HistoryPaymentOrder();
        $this->attachment = new Attachment();
        $this->workspaces = new Workspace();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Đơn mua hàng';
        $perPage = 10;
        $import = DetailImport::where('workspace_id', Auth::user()->current_workspace)
            ->orderBy('id', 'desc')->paginate($perPage);
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;
        // $import = $this->import->getAllImport();
        return view('tables.import.import', compact('title', 'import', 'workspacename'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Tạo đơn mua hàng";
        // $provides = Provides::all();
        $provides = Provides::where('workspace_id', Auth::user()->current_workspace)->get();
        $project = Project::all();
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;
        // $products = Products::all();
        return view('tables.import.insertImport', compact('title', 'provides', 'project', 'workspacename'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Thêm thông tin đơn hàng
        $result = $import_id = $this->detailImport->addImport($request->all());
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;
        if ($result['status']) {
            $import_id = $result['detail_id'];
            // Thêm sản phẩm theo đơn hàng, thêm vào lịch sử
            $this->quoteImport->addQuoteImport($request->all(), $import_id);
            return redirect()->route('import.index', $workspacename)->with('msg', 'Tạo mới đơn nhập hàng thành công !');
        } else {
            return redirect()->route('import.index', $workspacename)->with('warning', 'Số đơn mua hàng đã tồn tại !');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $workspace, string $id)
    {
        $import = DetailImport::findOrFail($id);
        $provides = Provides::all();
        $title = $import->quotation_number;
        $product = QuoteImport::where('detailimport_id', $import->id)->get();
        $project = Project::all();
        $history = HistoryImport::where('detailImport_id', $id)->get();
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;
        return view('tables.import.showImport', compact('import', 'title', 'provides', 'product', 'project', 'history', 'workspacename'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $workspace, string $id)
    {
        $import = DetailImport::findOrFail($id);
        if ($import) {
            $represent = ProvideRepesent::where('provide_id', $import->provide_id)->get();
            $price_effect = DateForm::where('workspace_id', Auth::user()->current_workspace)->where('form_field', 'import')->get();
            $terms_pay = DateForm::where('workspace_id', Auth::user()->current_workspace)->where('form_field', 'termpay')->get();
        }
        // $provides = Provides::all();
        $provides = Provides::where('workspace_id', Auth::user()->current_workspace)->get();
        $title = $import->quotation_number;
        $product = QuoteImport::where('detailimport_id', $import->id)->get();
        $project = Project::all();
        $history = HistoryImport::where('detailImport_id', $id)->get();
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;
        return view('tables.import.editImport', compact('import', 'title', 'provides', 'product', 'project', 'history', 'workspacename', 'represent', 'price_effect', 'terms_pay'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(string $workspace, Request $request, string $id)
    {
        $title = "";
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;
        if ($request->action == 'action_1') {
            // Cập nhật thông tin đơn hàng
            $this->detailImport->updateImport($request->all(), $id, 1);
            // Cập nhật sản phẩm
            $this->quoteImport->updateImport($request->all(), $id);
            // Lưu lịch sử
            $this->history_import->addHistoryImport($request->all(), $id);
            return redirect()->route('import.index', $workspacename)->with('msg', 'Chỉnh sửa đơn mua hàng thành công !');
        } else if ($request->action == 'action_2') {
            $receiver_bill = $this->receiver_bill->getProduct_receive($request->detail_id);
            $show_receive = $this->receiver_bill->show_receive($request->detail_id);
            $data = $request->all();
            if ($receiver_bill['quoteImport']->isEmpty()) {
                return redirect()->route('import.index', $workspacename)->with('warning', 'Đã tạo hết đơn nhận hàng !');
            } else {
                $title = "Tạo đơn nhận hàng";
                $listDetail = DetailImport::leftJoin('quoteimport', 'detailimport.id', '=', 'quoteimport.detailimport_id')
                    ->where('quoteimport.product_qty', '>', DB::raw('COALESCE(quoteimport.receive_qty,0)'))
                    ->where('detailimport.id', $request->detail_id)
                    ->select('detailimport.quotation_number', 'detailimport.id')
                    ->distinct()
                    ->get();
                $yes = true;
                return view('tables.receive.insertReceive', compact('title', 'listDetail', 'receiver_bill', 'data', 'yes', 'show_receive', 'workspacename'));
            }
        } elseif ($request->action == "action_3") {
            $recieptProduct = $this->reciept->getProduct_reciept($request->detail_id);
            $show_receive = $this->receiver_bill->show_receive($request->detail_id);
            $title = "Tạo mới hóa đơn mua hàng";
            if ($recieptProduct->isEmpty()) {
                return redirect()->route('import.index', $workspacename)->with('warning', 'Hóa đơn đã được tạo hết !');
            } else {
                $reciept = DetailImport::leftJoin('quoteimport', 'detailimport.id', '=', 'quoteimport.detailimport_id')
                    ->where('quoteimport.product_qty', '>', DB::raw('COALESCE(quoteimport.reciept_qty,0)'))
                    ->where('detailimport.id', $request->detail_id)
                    ->distinct()
                    ->select('detailimport.quotation_number', 'detailimport.id')
                    ->get();
                // dd($show_receive);
                $yes = true;
                return view('tables.reciept.insertReciept', compact('yes', 'title', 'reciept', 'recieptProduct', 'show_receive', 'workspacename'));
            }
        } else {
            $getPaymentOrder = $this->payment->getPaymentOrder($request->detail_id);
            $show_receive = $this->receiver_bill->show_receive($request->detail_id);
            if ($getPaymentOrder->isEmpty()) {
                return redirect()->route('import.index', $workspacename)->with('warning', 'Hóa đơn thanh toán đã được tạo hết!');
            } else {
                $title = "Tạo mới hóa đơn thanh toán";
                $reciept = DetailImport::leftJoin('quoteimport', 'detailimport.id', '=', 'quoteimport.detailimport_id')
                    ->where('quoteimport.product_qty', '>', 'quoteimport.receive_qty')
                    ->where('detailimport.id', $request->detail_id)
                    ->distinct()
                    ->select('detailimport.quotation_number', 'detailimport.id')
                    ->get();
                $yes = true;
                return view('tables.paymentOrder.insertPaymentOrder', compact('yes', 'title', 'reciept', 'getPaymentOrder', 'show_receive', 'workspacename'));
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $workspace, string $id)
    {
        $status = $this->detailImport->deleteDetail($id);
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;
        if ($status['status']) {
            return redirect()->route('import.index', $workspacename)->with('msg', 'Xóa đơn mua hàng thành công !');
        } else {
            return redirect()->route('import.index', $workspacename)->with('warning', $status['msg']);
        }
    }
    // Hiển thị thông tin nhà cung cấp theo id đã chọn
    public function show_provide(Request $request)
    {
        $result = [];
        $data = $request->all();
        $provide = Provides::where('id', $data['provides_id'])
            ->where('workspace_id', Auth::user()->current_workspace)
            ->first();
        if ($provide) {
            $date = DetailImport::where('provide_id', $provide->id)->orderBy('id', 'desc')
                ->where('workspace_id', Auth::user()->current_workspace)
                ->first();
            if ($date) {
                $date = explode('/', $date->quotation_number)[0];
            }
            $count = DetailImport::where('provide_id', $provide->id)
                ->where('workspace_id', Auth::user()->current_workspace)
                ->whereRaw("SUBSTRING_INDEX(quotation_number, '/', 1) = ?", [$date])
                ->count();
            $result = [
                'provide' => $provide,
                'count' => $count,
                'key' => $provide->key,
                'date' => ($date == "" ? Carbon::now()->format('dmy') : $date)
            ];
        }
        return $result;
    }

    public function checkQuotetion(Request $request)
    {
        $result = [];
        $data = $request->all();
        if (isset($data['quotetion_number'])) {
            $checkQuotetion = DetailImport::where('quotation_number', $data['quotetion_number'])
                ->where('provide_id', $data['provide_id'])
                ->where('workspace_id', Auth::user()->current_workspace);
            if (isset($data['detail_id'])) {
                $checkQuotetion->where('id', '!=', $data['detail_id']);
            }
            $checkQuotetion = $checkQuotetion->first();
            if ($checkQuotetion) {
                $result = [
                    'status' => false,
                ];
            } else {
                $result = [
                    'status' => true,
                ];
            }
        } elseif (isset($data['delivery_code'])) {
            $delivery_code = Receive_bill::where('delivery_code', $data['delivery_code'])
                ->where('workspace_id', Auth::user()->current_workspace)->first();
            if ($delivery_code) {
                $result = [
                    'status' => false,
                ];
            } else {
                $result = [
                    'status' => true,
                ];
            }
        } elseif (isset($data['number_bill'])) {
            $number_bill = Reciept::where('number_bill', $data['number_bill'])
                ->where('workspace_id', Auth::user()->current_workspace)->first();
            if ($number_bill) {
                $result = [
                    'status' => false,
                ];
            } else {
                $result = [
                    'status' => true,
                ];
            }
        } else {
            $payment_code = PayOder::where('payment_code', $data['payment_code'])
                ->where('workspace_id', Auth::user()->current_workspace)->first();
            if ($payment_code) {
                $result = [
                    'status' => false,
                ];
            } else {
                $result = [
                    'status' => true,
                ];
            }
        }
        return $result;
    }
    // Thêm mới nhà cung cấp
    public function addNewProvide(Request $request)
    {

        $check = Provides::where('workspace_id', Auth::user()->current_workspace)
            ->where(function ($query) use ($request) {
                $query->where('provide_code', $request->provide_code)
                    ->orWhere('provide_name_display', $request->provide_name_display);
            })
            ->first();
        // $check = Provides::where('provide_code', $request->provide_code)
        //     ->orwhere('provide_name_display', $request->provide_name_display)
        //     ->where('workspace_id', Auth::user()->current_workspace)
        //     ->first();

        if ($check == null) {
            if (isset($request->key)) {
                $key = $request->key;
            } else {
                $key = preg_match_all('/[A-ZĐ]/u', $request->provide_name_display, $matches);
                if ($key > 0) {
                    $key = implode('', $matches[0]);
                } else {
                    $key =  ucfirst($request->provide_name_display);
                    $key = preg_match_all('/[A-ZĐ]/u', $key, $matches);
                    $key = implode('', $matches[0]);
                    if ($key) {
                        $key = $key;
                    } else {
                        $key = "RN";
                    }
                }
            }
            $data = [
                'provide_name_display' => $request->provide_name_display,
                'provide_name' => $request->provide_name,
                'provide_address' => $request->provide_address,
                'key' => $key,
                'provide_code' => $request->provide_code,
                'provide_debt' => 0,
                'workspace_id' => Auth::user()->current_workspace
            ];
            $new_provide = DB::table('provides')->insertGetId($data);
            if ($new_provide) {
                $dataRepresent = [
                    'provide_id' => $new_provide,
                    'represent_name' => $request->provide_represent,
                    'represent_email' => $request->provide_email,
                    'represent_phone' => $request->provide_phone,
                    'represent_address' => $request->provide_address_delivery,
                    'workspace_id' => Auth::user()->current_workspace
                ];
                if ($request->provide_represent != null || $request->provide_email != null || $request->provide_phone != null) {
                    // Thêm người đại diện
                    $id_represent = DB::table('represent_provide')->insertGetId($dataRepresent);
                }
            }
            $provide = Provides::findOrFail($new_provide);
            $msg = response()->json([
                'success' => true, 'msg' => 'Thêm mới nhà cung cấp thành công',
                'id' => $new_provide, 'name' => $provide->provide_name_display, 'key' => $key,
                'id_represent' => isset($id_represent) ? $id_represent : "", 'represent_name' => $request->provide_represent
            ]);
        } else {
            $msg = response()->json(['success' => false, 'msg' => 'Mã số thuế hoặc tên hiển thị đã tồn tại']);
        }
        return $msg;
    }

    // Hiển thị tất cả Mã sản phẩm
    public function getAllProducts()
    {
        $data = Products::where('workspace_id', Auth::user()->current_workspace)->get();
        return $data;
    }
    // Hiển thị tên sản phẩm theo id đã chọn
    public function showProductName()
    {
        return Products::where('workspace_id', Auth::user()->current_workspace)->get();
    }
    // Hiển thị thông tin Dự án
    function show_project(Request $request)
    {
        $data = $request->all();
        $project = Project::findOrFail($data['project_id']);
        return $project;
    }

    public function checkSN(Request $request)
    {
        $data = $request->all();
        $result = [];
        $status = "success";
        $productName = "123";
        for ($i = 0; $i < count($data['listProductName']); $i++) {
            $check = Products::where('product_name', $data['listProductName'][$i])
                ->where('workspace_id', Auth::user()->current_workspace)
                ->where(DB::raw('COALESCE(product_inventory,0)'), '>', 0)
                ->first();
            if ($check && $check->check_seri == 1 && $data['checkSN'][$i] == 1) {
                if ($data['listQty'][$i] != $data['listSN'][$i]) {
                    $status = "false";
                    $productName = $check->product_name;
                }
            }
            if (!$check) {
                if ($data['listQty'][$i] != $data['listSN'][$i] && $data['checkSN'][$i] == 1) {
                    $status = "false";
                    $productName = $data['listProductName'][$i];
                }
            }
        }
        $result = [
            'status' => $status,
            'productName' => $productName,
        ];
        return $result;
    }
    public function checkduplicateSN(Request $request)
    {
        return $this->sn->checkSN($request->all());
    }
    public function addAttachment(Request $request)
    {
        $status = $this->attachment->addAttachment($request->all(), $request->detail_id, $request->table_name);
        if ($status) {
            return redirect()->back()->with('msg', 'Thêm file thành công !');
        } else {
            return redirect()->back()->with('warning', 'File đã tồn tại !');
        }
    }

    public function downloadFile($folder, $file)
    {
        $backupPath = storage_path('backup/' . $folder . '/');
        $filePath = $backupPath . $file;

        if (file_exists($filePath)) {
            $headers = [
                'Content-Type' => 'application/octet-stream',
            ];
            return Response::download($filePath, $file, $headers);
        } else {
            return back()->with('error', 'Tệp backup không tồn tại.');
        }
    }
    public function deleteFile(Request $request, $folder, $file)
    {
        $this->attachment->deleteFile($file, $request->table_id, $folder);
        return back()->with('msg', 'Xóa file thành công!');
    }

    public function getDataForm(Request $request)
    {
        $data = [];
        if ($request->status == "add") {

            $represent = ProvideRepesent::where('provide_id', $request->id)
                ->where('workspace_id', Auth::user()->current_workspace)
                ->get();

            $price_effect = DateForm::where('form_field', 'import')
                ->where('workspace_id', Auth::user()->current_workspace)
                ->get();

            $terms_pay = DateForm::where('form_field', 'termpay')
                ->where('workspace_id', Auth::user()->current_workspace)
                ->get();

            $defaltPrice = DateForm::join('guest_dateform', 'date_form.id', 'guest_dateform.date_form_id')
                ->where('date_form.default_form', 1)
                ->where('date_form.form_field', 'import')
                ->where('guest_dateform.guest_id', $request->id)
                ->get();
            $defaltTerm = DateForm::join('guest_dateform', 'date_form.id', 'guest_dateform.date_form_id')
                ->where('date_form.default_form', 1)
                ->where('date_form.form_field', 'termpay')
                ->where('guest_dateform.guest_id', $request->id)
                ->get();
            if ($defaltPrice || $defaltTerm) {
                $data['default_price'] = $defaltPrice;
                $data['default_term'] = $defaltTerm;
            }

            $data['represent'] = $represent;
            $data['price_effect'] = $price_effect;
            $data['terms_pay'] = $terms_pay;
            return $data;
        } else {
            if ($request->table == 'represent') {
                $represent = ProvideRepesent::where('id', $request->id)
                    ->where('workspace_id', Auth::user()->current_workspace)
                    ->first();
                $data['represent'] = $represent;
            } else {
                $dateForm = DateForm::where('id', $request->id)
                    ->where('workspace_id', Auth::user()->current_workspace)
                    ->first();
                $data[$request->table] = $dateForm;
                $data['table'] = $request->table;
            }

            return $data;
        }
    }
    public function addNewForm(Request $request)
    {
        if ($request->table == "addRepresent") {
            $dataRepresent = [
                'provide_id' => $request->provides_id,
                'represent_name' => $request->provide_represent,
                'represent_email' => $request->provide_email,
                'represent_phone' => $request->provide_phone,
                'represent_address' => $request->provide_address_delivery,
                'workspace_id' => Auth::user()->current_workspace,
                'default' => 0
            ];
            if ($request->provide_represent != null || $request->provide_email != null || $request->provide_phone != null) {
                // Thêm người đại diện
                $check = ProvideRepesent::where('represent_name', $request->provide_represent)
                    ->where('represent_phone', $request->provide_phone)->first();
                if ($check) {
                    $msg = response()->json([
                        'success' => true, 'msg' => 'Người đại diện dã tồn tại'
                    ]);
                } else {
                    $new = DB::table('represent_provide')->insertGetId($dataRepresent);
                    $msg = response()->json([
                        'success' => true, 'msg' => 'Thêm mới người đại diện thành công', 'data' => $request->provide_represent, 'id' => $new
                    ]);
                }
            }
        } else {
            $checkF = DateForm::where('form_name', $request->inputName)
                ->where('form_field', $request->table)
                ->where('form_desc', $request->inputDesc)
                ->where('workspace_id', Auth::user()->current_workspace)
                ->first();
            if ($checkF) {
                $msg = response()->json([
                    'success' => false, 'msg' => $request->table == "import" ? 'Hiệu lực báo giá đã tồn tại' : "Điều khoản thanh toán đã tồn tại"
                ]);
            } else {
                $dataForm = [
                    'form_name' => $request->inputName,
                    'form_field' => $request->table,
                    'form_desc' => $request->inputDesc,
                    'default_form' => 0,
                    'default_guest' => 0,
                    'workspace_id' => Auth::user()->current_workspace,
                    'created_at' => Carbon::now(),
                ];
                $newId = DB::table('date_form')->insertGetId($dataForm);
                $msg = response()->json([
                    'success' => true, 'msg' => $request->table == "import" ? 'Tạo mới hiệu lực báo giá thành công' : 'Tạo mới điều khoản thanh toán thành công',
                    'data' => $request->inputDesc, 'id' => $newId, 'inputName' => $request->inputName
                ]);
            }
        }
        return $msg;
    }
    public function updateForm(Request $request)
    {
        if ($request->table == "addRepresent") {
            $check = ProvideRepesent::where('id', '!=', $request->present_id)
                ->where('represent_name', $request->provide_represent)
                ->where('represent_phone', $request->provide_phone)
                ->where('workspace_id', Auth::user()->current_workspace)
                ->first();
            if ($check) {
                $msg = response()->json([
                    'success' => false, 'msg' => 'Người đại diện đã trùng'
                ]);
            } else {
                $dataRepresent = [
                    'represent_name' => $request->provide_represent,
                    'represent_email' => $request->provide_email,
                    'represent_phone' => $request->provide_phone,
                    'represent_address' => $request->provide_address_delivery
                ];
                DB::table('represent_provide')
                    ->where('id', $request->present_id)
                    ->update($dataRepresent);
                $msg = response()->json([
                    'success' => true, 'msg' => 'Chỉnh sửa thông tin thành công', 'data' => $request->provide_represent
                ]);
            }
        } else {
            $checkF = DateForm::where('id', '!=', $request->present_id)
                ->where('form_name', $request->inputName)
                ->where('form_field', $request->inputField)
                ->where('form_desc', $request->inputDesc)
                ->where('workspace_id', Auth::user()->current_workspace)
                ->first();
            if ($checkF) {
                $msg = response()->json([
                    'success' => false, 'msg' => 'Thông tin đã tồn tại'
                ]);
            } else {
                $dataForm = [
                    'form_name' => $request->inputName,
                    'form_desc' => $request->inputDesc
                ];
                DB::table('date_form')
                    ->where('id', $request->present_id)
                    ->update($dataForm);
                $msg = response()->json([
                    'success' => true, 'msg' => 'Chỉnh sửa thông tin thành công', 'id' => $request->present_id,
                    'form_name' => $request->inputName, 'form_desc' => $request->inputDesc
                ]);
            }
        }

        return $msg;
    }
    public function deleteForm(Request $request)
    {
        // return $request->all();
        if ($request->table == "represent") {
            $check = ProvideRepesent::where('id', $request->id)
                ->where('workspace_id', Auth::user()->current_workspace)
                ->first();
            if ($check) {
                $check_exist = DetailImport::where('represent_id', $request->id)
                    ->where('workspace_id', Auth::user()->current_workspace)
                    ->first();
                if ($check_exist) {
                    $msg = response()->json([
                        'success' => false, 'msg' => 'Người đại diện đã tồn tại trong đơn mua hàng khác'
                    ]);
                } else {
                    $msg = response()->json([
                        'success' => true, 'msg' => 'Xóa người đại diện thành công', 'id' => $check->id, 'list' => "listRepresent"
                    ]);
                    $check->delete();
                }
            } else {
                $msg = response()->json([
                    'success' => false, 'msg' => 'Không tìm thấy dữ liệu cần xóa'
                ]);
            }
        } else {
            $check = DateForm::where('id', $request->id)
                ->where('workspace_id', Auth::user()->current_workspace)
                ->first();
            if ($check) {
                $msg = response()->json([
                    'success' => true, 'msg' => 'Xóa thành công', 'id' => $check->id, 'list' => $request->table == 'priceeffect' ? "listPriceEffect" : "listTermsPay"
                ]);
                $check->delete();
            } else {
                $msg = response()->json([
                    'success' => false, 'msg' => 'Không tìm thấy dữ liệu cần xóa'
                ]);
            }
        }

        return $msg;
    }

    public function setDefault(Request $request)
    {
        $data = [];
        $checkF = GuestFormDate::where('guest_id', $request->provides_id)
            ->where('form_field', $request->form)
            ->where('workspace_id', Auth::user()->current_workspace);
        if ($request->form == 'represent') {
            $checkF = $checkF->first();
            if ($checkF) {
                DB::table('represent_provide')
                    ->where('id', $checkF->date_form_id)
                    ->update(['default' => 0]);
                if ($checkF->date_form_id == $request->id) {
                    $checkF->date_form_id = 0;
                    $checkF->save();
                } else {
                    DB::table('represent_provide')
                        ->where('id', $request->id)
                        ->update(['default' => 1]);
                    $checkF->date_form_id = $request->id;
                    $checkF->save();
                }
            } else {
                $dataForm = [
                    'form_field' => $request->form,
                    'guest_id' => $request->provides_id,
                    'date_form_id' => $request->id,
                    'workspace_id' => Auth::user()->current_workspace
                ];
                GuestFormDate::insert($dataForm);
                DB::table('represent_provide')
                    ->where('id', $request->id)
                    ->update(['default' => 1]);
            }
            $data[$request->form] = ProvideRepesent::where('id', $request->id)->first();
        } else {
            $checkF = $checkF->where('form_field', $request->form)->first();
            if ($checkF) {
                DB::table('date_form')
                    ->where('id', $checkF->date_form_id)
                    ->where('form_field', $request->form)
                    ->update(['default_form' => 0]);
                if ($checkF->date_form_id == $request->id) {
                    $checkF->date_form_id = 0;
                    $checkF->save();
                } else {
                    DB::table('date_form')
                        ->where('id', $request->id)
                        ->where('form_field', $request->form)
                        ->update(['default_form' => 1]);
                    $checkF->date_form_id = $request->id;
                    $checkF->save();
                }
            } else {
                $dataForm = [
                    'form_field' => $request->form,
                    'guest_id' => $request->provides_id,
                    'date_form_id' => $request->id,
                    'workspace_id' => Auth::user()->current_workspace
                ];
                GuestFormDate::insert($dataForm);
                DB::table('date_form')
                    ->where('id', $request->id)
                    ->update(['default_form' => 1]);
            }
            $data[$request->form] = DateForm::where('id', $request->id)->first();
        }

        return $data;
    }

    public function showData(Request $request)
    {
        $data = [];
        if ($request->table == 'search-represent') {
            $represent = ProvideRepesent::where('id', $request->id)->first();
            $data[$request->table] = $represent;
            $data['table'] = $request->table;
        } else if ($request->table == "search-price-effect") {
            $price_effect = DateForm::where('id', $request->id)->first();
            $data[$request->table] = $price_effect;
            $data['table'] = $request->table;
        } else {
            $price_effect = DateForm::where('id', $request->id)->first();
            $data[$request->table] = $price_effect;
            $data['table'] = $request->table;
        }
        return $data;
    }
}
