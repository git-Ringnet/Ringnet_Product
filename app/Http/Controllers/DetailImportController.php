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
use App\Models\User;
use App\Models\userFlow;
use App\Models\Warehouse;
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
    private $userFlow;
    private $provides;
    private $users;
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
        $this->userFlow = new userFlow();
        $this->provides = new Provides();
        $this->users = new User();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Đơn mua hàng';
        $perPage = 10;
        $import = DetailImport::where('workspace_id', Auth::user()->current_workspace)
            ->orderBy('id', 'desc');
        if (Auth::check()) {
            if (Auth::user()->getRoleUser->roleid == 4) {
                $import->where('user_id', Auth::user()->id);
            }
        }
        $import = $import->get();
        // ->paginate($perPage);
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;
        $provides = $this->detailImport->getProvideInDetail();
        $users = $this->detailImport->getUserInDetail();
        // $import = $this->import->getAllImport();
        return view('tables.import.import', compact('title', 'import', 'users', 'provides', 'workspacename'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Tạo đơn mua hàng";
        $provides = Provides::where('workspace_id', Auth::user()->current_workspace)->get();
        $project = Project::all();
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;
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
            // Thêm sản phẩm vào tồn kho
            $this->product->addProductDefault($request->all());
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
        $import = DetailImport::where('id', $id);
        if (Auth::check()) {
            if (Auth::user()->getRoleUser->roleid == 4) {
                $import->where('user_id', Auth::user()->id);
            }
        }
        $import = $import->first();
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;
        if ($import) {
            $provides = Provides::all();
            $title = $import->quotation_number;
            $product = QuoteImport::leftjoin('products', 'products.product_name', 'quoteimport.product_name')
                ->where('detailimport_id', $import->id)
                ->select('quoteimport.*', 'products.product_inventory')
                ->where('products.workspace_id', Auth::user()->current_workspace)
                ->get();
            $project = Project::all();
            $history = HistoryImport::where('detailImport_id', $id)->get();

            return view('tables.import.showImport', compact('import', 'title', 'provides', 'product', 'project', 'history', 'workspacename'));
        } else {
            return redirect()->route('import.index', $workspacename)->with('warning', 'Không tìm thấy trang hợp lệ !');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $workspace, string $id)
    {
        $import = DetailImport::where('id', $id);
        if (Auth::check()) {
            if (Auth::user()->getRoleUser->roleid == 4) {
                $import->where('user_id', Auth::user()->id);
            }
        }
        $import = $import->first();

        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;
        if ($import) {
            $represent = ProvideRepesent::where('provide_id', $import->provide_id)->get();
            $price_effect = DateForm::where('workspace_id', Auth::user()->current_workspace)->where('form_field', 'import')->get();
            $terms_pay = DateForm::where('workspace_id', Auth::user()->current_workspace)->where('form_field', 'termpay')->get();
            $id_priceeffect = DateForm::where('form_desc', $import->price_effect)
                ->where('form_field', 'import')
                ->first();
            $id_termpay = DateForm::where('form_desc', $import->terms_pay)
                ->where('form_field', 'termpay')
                ->first();

            $provides = Provides::where('workspace_id', Auth::user()->current_workspace)->get();
            $title = $import->quotation_number;
            $product = QuoteImport::leftjoin('products', 'products.product_name', 'quoteimport.product_name')
                ->where('detailimport_id', $import->id)
                ->select('quoteimport.*', 'products.product_inventory')
                ->where('products.workspace_id', Auth::user()->current_workspace)
                ->get();
            $project = Project::all();
            $warehouse = Warehouse::where('workspace_id', Auth::user()->current_workspace)->get();
            $history = HistoryImport::where('detailImport_id', $id)
                ->orderBy('id', 'desc')
                ->get();
            return view('tables.import.editImport', compact('import', 'title', 'provides', 'product', 'project', 'history', 'workspacename', 'represent', 'price_effect', 'terms_pay', 'id_priceeffect', 'id_termpay', 'warehouse'));
        } else {
            return redirect()->route('import.index', $workspacename)->with('warning', 'Không tìm thấy trang hợp lệ !');
        }
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
            if ($this->detailImport->checkStatus($id) == false) {
                return redirect()->route('import.index', $workspacename)->with('warning', 'Không tìm thấy đơn hàng cần chỉnh sửa !');
            } else {
                // Cập nhật thông tin đơn hàng
                $this->detailImport->updateImport($request->all(), $id, 1);

                if ($this->detailImport->checkStatus($id) == 1) {
                    // Cập nhật sản phẩm
                    $this->quoteImport->updateImport($request->all(), $id);
                    // Lưu lịch sử
                    $this->history_import->addHistoryImport($request->all(), $id);
                }
                return redirect()->route('import.index', $workspacename)->with('msg', 'Chỉnh sửa đơn mua hàng thành công !');
            }
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
                $yes = true;
                return view('tables.reciept.insertReciept', compact('yes', 'title', 'reciept', 'recieptProduct', 'show_receive', 'workspacename'));
            }
        } else {
            $checkPay = PayOder::where('detailimport_id', $request->detail_id)->first();
            if ($checkPay) {
                return redirect()->route('import.index', $workspacename)->with('warning', 'Thanh toán mua hàng đã được tạo !');
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
            $dataUserFlow = [
                'user_id' => Auth::user()->id,
                'activity_type' => "DMH",
                'activity_description' => "Xóa đơn mua hàng"
            ];
            DB::table('user_flow')->insert($dataUserFlow);
            $this->attachment->deleteFileAll($id, 'DMH');
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
                ->whereRaw("SUBSTRING_INDEX(quotation_number, '/', 1) = ?", [Carbon::now()->format('dmY')])
                ->first();
            if ($date) {
                $date = explode('/', $date->quotation_number)[0];
            }
            $count = DetailImport::where('provide_id', $provide->id)
                ->where('workspace_id', Auth::user()->current_workspace)
                ->whereRaw("SUBSTRING_INDEX(quotation_number, '/', 1) = ?", [$date])
                ->count();
            $lastDetailImport = DetailImport::where('provide_id', $provide->id)
                ->orderBy('id', 'desc')
                ->whereRaw("SUBSTRING_INDEX(quotation_number, '/', 1) = ?", [Carbon::now()->format('dmY')])
                ->first();

            if ($lastDetailImport) {
                $parts = explode('-', $lastDetailImport->quotation_number);
                $getNumber = end($parts);

                $count = $getNumber + 1;
            } else {
                $count = $count == 0 ? $count += 1 : $count;
            }
            if ($count < 10) {
                $count = "0" . $count;
            }
            $resultNumber = ($date == "" ? Carbon::now()->setTimezone('Asia/Ho_Chi_Minh')->format('dmY') : $date) . "/RN-" . $provide->key . "-" . $count;
            $result = [
                'provide' => $provide,
                'count' => $count,
                'key' => $provide->key,
                'date' => ($date == "" ? Carbon::now()->format('dmY') : $date),
                'resultNumber' => $resultNumber
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
        if ($check == null) {
            $checkKey = Provides::where('workspace_id', Auth::user()->current_workspace)
                ->where('key', $request->key)
                ->first();
            if ($checkKey) {
                // Tên viết tắt đã tồn tại, thực hiện logic thay đổi giá trị key
                $newKey = $request->key;

                // Kiểm tra xem key mới đã tồn tại chưa
                $counter = 1;
                while (Provides::where('workspace_id', Auth::user()->current_workspace)
                    ->where('key', $newKey)
                    ->exists()
                ) {
                    // Kiểm tra xem key có kết thúc bằng số không
                    if (preg_match('/\d+$/', $newKey)) {
                        // Tăng số đằng sau
                        $newKey = preg_replace_callback('/(\d+)$/', function ($matches) {
                            return ++$matches[1];
                        }, $newKey);
                    } else {
                        // Nếu không có số, thêm số 1 vào sau key
                        $newKey .= '1';
                    }
                }

                $msg = response()->json([
                    'success' => false,
                    'msg' => 'Tên viết tắt đã tồn tại!',
                    'key' => $newKey,
                ]);
            } else {
                $key = isset($request->key) ? $request->key : $this->generateKey($request->provide_name_display);
                $data = [
                    'provide_name_display' => $request->provide_name_display,
                    'provide_name' => $request->provide_name,
                    'provide_address' => $request->provide_address,
                    'key' => $key,
                    'provide_code' => $request->provide_code,
                    'provide_debt' => 0,
                    'workspace_id' => Auth::user()->current_workspace,
                    'user_id' => Auth::user()->id
                ];
                $new_provide = DB::table('provides')->insertGetId($data);
                if ($new_provide) {
                    $dataRepresent = [
                        'provide_id' => $new_provide,
                        'represent_name' => $request->provide_represent,
                        'represent_email' => $request->provide_email,
                        'represent_phone' => $request->provide_phone,
                        'represent_address' => $request->provide_address_delivery,
                        'workspace_id' => Auth::user()->current_workspace,
                        'user_id' => Auth::user()->id
                    ];
                    if ($request->provide_represent != null || $request->provide_email != null || $request->provide_phone != null) {
                        // Thêm người đại diện
                        $id_represent = DB::table('represent_provide')->insertGetId($dataRepresent);
                    }
                }
                $provide = Provides::findOrFail($new_provide);
                $price_effect = DateForm::where('form_field', 'import')
                    ->where('workspace_id', Auth::user()->current_workspace)
                    ->get();

                $terms_pay = DateForm::where('form_field', 'termpay')
                    ->where('workspace_id', Auth::user()->current_workspace)
                    ->get();
                $msg = response()->json([
                    'success' => true, 'msg' => 'Thêm mới nhà cung cấp thành công',
                    'id' => $new_provide, 'name' => $provide->provide_name_display, 'key' => $key,
                    'id_represent' => isset($id_represent) ? $id_represent : "", 'represent_name' => $request->provide_represent,
                    'price_effect' => $price_effect, 'terms_pay' => $terms_pay
                ]);
            }
        } else {
            $msg = response()->json(['success' => false, 'msg' => 'Mã số thuế hoặc tên hiển thị đã tồn tại']);
        }
        return $msg;
    }

    private function generateKey($name)
    {
        $key = preg_match_all('/[A-ZĐ]/u', $name, $matches);
        if ($key > 0) {
            $key = implode('', $matches[0]);
        } else {
            $key = ucfirst($name);
            $key = preg_match_all('/[A-ZĐ]/u', $key, $matches);
            $key = implode('', $matches[0]);
            $key = $key ?: "RN";
        }

        return $key;
    }

    public function updateProvide(Request $request)
    {
        $data = $request->all();
        $check = DB::table('provides')
            ->where('workspace_id', Auth::user()->current_workspace)
            ->where(function ($query) use ($data) {
                $query->where('provide_code', $data['provide_code'])
                    ->orWhere('provide_name_display', $data['provide_name_display']);
            })
            ->where('id', '!=', $request->id)
            ->first();

        if ($check) {
            return response()->json(['success' => false, 'msg' => 'Thông tin khách hàng đã tồn tại']);
        } else {
            $provide = Provides::where('id', $request->id)
                ->where('workspace_id', Auth::user()->current_workspace)
                ->first();

            if ($provide) {
                $checkKey = Provides::where('workspace_id', Auth::user()->current_workspace)
                    ->where('id', '!=', $request->id)
                    ->where('key', $data['key'])
                    ->first();

                if ($checkKey) {
                    // Tên viết tắt đã tồn tại, thực hiện logic thay đổi giá trị key
                    $newKey = $data['key'];

                    // Tăng số đằng sau cho đến khi không còn trùng
                    while (Provides::where('workspace_id', Auth::user()->current_workspace)
                        ->where('key', $newKey)
                        ->exists()
                    ) {
                        // Kiểm tra xem key có kết thúc bằng số không
                        if (preg_match('/\d+$/', $newKey)) {
                            // Tăng số đằng sau
                            $newKey = preg_replace_callback('/(\d+)$/', function ($matches) {
                                return ++$matches[1];
                            }, $newKey);
                        } else {
                            // Nếu không có số, thêm số 1 vào sau key
                            $newKey .= '1';
                        }
                    }

                    return response()->json([
                        'success' => false,
                        'msg' => 'Tên viết tắt đã tồn tại!',
                        'key' => $newKey,
                    ]);
                } else {
                    $key = isset($data['key']) ? $data['key'] : $this->generateKey($data['provide_name_display']);
                    $dataProvide = [
                        'provide_code' => $data['provide_code'],
                        'provide_name_display' => $data['provide_name_display'],
                        'key' => $key,
                        'provide_name' => $data['provide_name'],
                        'provide_address' => $data['provide_address'],
                    ];

                    DB::table('provides')->where('id', $request->id)->update($dataProvide);

                    $date = DetailImport::where('provide_id', $provide->id)->orderBy('id', 'desc')
                        ->where('workspace_id', Auth::user()->current_workspace)
                        ->whereRaw("SUBSTRING_INDEX(quotation_number, '/', 1) = ?", [Carbon::now()->format('dmY')])
                        ->first();
                    if ($date) {
                        $date = explode('/', $date->quotation_number)[0];
                    }
                    $count = DetailImport::where('provide_id', $provide->id)
                        ->where('workspace_id', Auth::user()->current_workspace)
                        ->whereRaw("SUBSTRING_INDEX(quotation_number, '/', 1) = ?", [$date])
                        ->count();
                    $lastDetailImport = DetailImport::where('provide_id', $provide->id)
                        ->orderBy('id', 'desc')
                        ->whereRaw("SUBSTRING_INDEX(quotation_number, '/', 1) = ?", [Carbon::now()->format('dmY')])
                        ->first();

                    if ($lastDetailImport) {
                        $parts = explode('-', $lastDetailImport->quotation_number);
                        $getNumber = end($parts);

                        $count = $getNumber + 1;
                    } else {
                        $count = $count == 0 ? $count += 1 : $count;
                    }
                    if ($count < 10) {
                        $count = "0" . $count;
                    }
                    $resultNumber = ($date == "" ? Carbon::now()->setTimezone('Asia/Ho_Chi_Minh')->format('dmY') : $date) . "/RN-" . $key . "-" . $count;

                    $msg = response()->json([
                        'success' => true, 'msg' => 'Chỉnh sửa nhà cung cấp thành công', 'provide_id' => $request->id, 'key' => $key, 'resultNumber' => $resultNumber
                    ]);
                }
            }
        }

        return $msg;
    }

    // Hiển thị tất cả Mã sản phẩm
    public function getAllProducts()
    {
        $data = Products::where('workspace_id', Auth::user()->current_workspace)
            ->where('type', 1)
            ->get();
        return $data;
    }
    // Hiển thị tên sản phẩm theo id đã chọn
    public function showProductName()
    {
        return Products::where('workspace_id', Auth::user()->current_workspace)
            ->where('type', 1)
            ->get();
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
        $listProduct = [];
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
                    array_push($listProduct, $data['listProductName'][$i]);
                }
            }
        }
        $result = [
            'status' => $status,
            'productName' => $productName,
            'list' => $listProduct
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
            if ($folder == "BG") {
                $arrCapNhatKH = [
                    'name' => 'BG',
                    'des' => 'Tải file đính kèm'
                ];
                $this->userFlow->addUserFlow($arrCapNhatKH);
            }
            if ($folder == "GH") {
                $arrCapNhatKH = [
                    'name' => 'GH',
                    'des' => 'Tải file đính kèm'
                ];
                $this->userFlow->addUserFlow($arrCapNhatKH);
            }
            if ($folder == "HDBH") {
                $arrCapNhatKH = [
                    'name' => 'HDBH',
                    'des' => 'Tải file đính kèm'
                ];
                $this->userFlow->addUserFlow($arrCapNhatKH);
            }
            if ($folder == "TT") {
                $arrCapNhatKH = [
                    'name' => 'TT',
                    'des' => 'Tải file đính kèm'
                ];
                $this->userFlow->addUserFlow($arrCapNhatKH);
            }
            $headers = [
                'Content-Type' => 'application/octet-stream',
            ];
            $dataUserFlow = [
                'user_id' => Auth::user()->id,
                'activity_type' => 'DMH',
                'activity_description' => "Tải xuống file đính kèm"
            ];
            DB::table('user_flow')->insert($dataUserFlow);
            return Response::download($filePath, $file, $headers);
        } else {
            return back()->with('error', 'Tệp backup không tồn tại.');
        }
    }
    public function deleteFile(Request $request, $folder, $file)
    {
        $this->attachment->deleteFile($file, $request->table_id, $folder);
        if ($folder == "BG") {
            $arrCapNhatKH = [
                'name' => 'BG',
                'des' => 'Xóa file đính kèm'
            ];
            $this->userFlow->addUserFlow($arrCapNhatKH);
        }
        if ($folder == "GH") {
            $arrCapNhatKH = [
                'name' => 'GH',
                'des' => 'Xóa file đính kèm'
            ];
            $this->userFlow->addUserFlow($arrCapNhatKH);
        }
        if ($folder == "HDBH") {
            $arrCapNhatKH = [
                'name' => 'HDBH',
                'des' => 'Xóa file đính kèm'
            ];
            $this->userFlow->addUserFlow($arrCapNhatKH);
        }
        if ($folder == "TT") {
            $arrCapNhatKH = [
                'name' => 'TT',
                'des' => 'Xóa file đính kèm'
            ];
            $this->userFlow->addUserFlow($arrCapNhatKH);
        }
        if ($folder == "DMH") {
            $dataUserFlow = [
                'user_id' => Auth::user()->id,
                'activity_type' => 'DMH',
                'activity_description' => "Xóa file đính kèm"
            ];
            DB::table('user_flow')->insert($dataUserFlow);
        }
        if ($folder == "DNH") {
            $dataUserFlow = [
                'user_id' => Auth::user()->id,
                'activity_type' => 'DNH',
                'activity_description' => "Xóa file đính kèm"
            ];
            DB::table('user_flow')->insert($dataUserFlow);
        }
        if ($folder == "HDMH") {
            $dataUserFlow = [
                'user_id' => Auth::user()->id,
                'activity_type' => 'HDMH',
                'activity_description' => "Xóa file đính kèm"
            ];
            DB::table('user_flow')->insert($dataUserFlow);
        }
        if ($folder == "TTMH") {
            $dataUserFlow = [
                'user_id' => Auth::user()->id,
                'activity_type' => 'TTMH',
                'activity_description' => "Xóa file đính kèm"
            ];
            DB::table('user_flow')->insert($dataUserFlow);
        }
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
            if (isset($request->table)) {
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
            } else {
                $provide = Provides::where('id', $request->id)->first();
                return $provide;
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
                'default' => 0,
                'user_id' => Auth::user()->id
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
                    'user_id' => Auth::user()->id
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
                    'success' => true, 'msg' => 'Chỉnh sửa thông tin thành công', 'data' => $request->provide_represent,
                    'id' => $request->present_id
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
                    $data['status'] = 0;
                } else {
                    DB::table('represent_provide')
                        ->where('id', $request->id)
                        ->update(['default' => 1]);
                    $checkF->date_form_id = $request->id;
                    $checkF->save();
                    $data['status'] = 1;
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
                    $data['status'] = 0;
                } else {
                    DB::table('date_form')
                        ->where('id', $request->id)
                        ->where('form_field', $request->form)
                        ->update(['default_form' => 1]);
                    $checkF->date_form_id = $request->id;
                    $checkF->save();
                    $data['status'] = 1;
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

    public function getInventory(Request $request)
    {
        $data = [];
        $product = Products::where('product_name', $request->product_name)->first();
        if ($product) {
            $history = QuoteImport::leftJoin('detailimport', 'detailimport.id', 'quoteimport.detailimport_id')
                ->where('quoteimport.product_name', $request->product_name)
                ->where('quoteimport.workspace_id', Auth::user()->current_workspace)
                ->where('detailimport.status', 2)
                ->get();
            $data['history'] = $history;
        }
        $data['products'] = $product;
        return $data;
    }

    public function getHistoryImport(Request $request)
    {
        $data = [];
        if ($request->type) {
            $product = Products::where('product_name', $request->product_name)
                ->select('product_name', 'product_unit', 'product_inventory', 'product_tax')
                ->first();
            $data['product'] = $product;
        } else {
            $product = Products::where('product_name', $request->product_name)->first();
            if ($product) {
                $history = QuoteImport::leftJoin('detailimport', 'detailimport.id', 'quoteimport.detailimport_id')
                    ->leftJoin('provides', 'provides.id', 'detailimport.provide_id')
                    ->where('quoteimport.product_name', $request->product_name)
                    ->where('quoteimport.workspace_id', Auth::user()->current_workspace)
                    ->whereIn('detailimport.status', [0, 2])
                    ->select('quoteimport.*', 'provides.provide_name_display as nameProvide', 'detailimport.created_at as create')
                    ->get();
                $data['history'] = $history;
            }
            $data['products'] = $product;
        }

        return $data;
    }

    public function searchImport(Request $request)
    {
        $data = $request->all();
        $filters = [];
        if (isset($data['quotenumber']) && $data['quotenumber'] !== null) {
            $filters[] = ['value' => 'Đơn mua hàng: ' . count($data['quotenumber']) . ' số báo giá', 'name' => 'quotenumber', 'icon' => 'po'];
        }
        if (isset($data['provides']) && $data['provides'] !== null) {
            $filters[] = ['value' => 'Nhà cung cấp: ' . $data['provides'], 'name' => 'provides', 'icon' => 'user'];
        }
        if (isset($data['reference_number']) && $data['reference_number'] !== null) {
            $filters[] = ['value' => 'Số tham chiếu: ' . $data['reference_number'], 'name' => 'reference_number', 'icon' => 'po'];
        }
        if (isset($data['users']) && $data['users'] !== null) {
            $filters[] = ['value' => 'Người tạo: ' . count($data['users']) . ' người tạo', 'name' => 'users', 'icon' => 'user'];
        }
        $statusText = '';
        if (isset($data['status']) && $data['status'] !== null) {
            $statusValues = [];
            if (in_array(1, $data['status'])) {
                $statusValues[] = '<span style="color: #858585;">Draft</span>';
            }
            if (in_array(2, $data['status'])) {
                $statusValues[] = '<span style="color: #08AA36BF;">Close</span>';
            }
            if (in_array(0, $data['status'])) {
                $statusValues[] = '<span style="color: #E8B600;">Approve</span>';
            }
            $statusText = implode(', ', $statusValues);
            $filters[] = ['value' => 'Trạng thái: ' . $statusText, 'name' => 'status', 'icon' => 'status'];
        }
        $statusTextReceive = '';
        if (isset($data['receive']) && $data['receive'] !== null) {
            $statusValues = [];
            if (in_array(0, $data['receive'])) {
                $statusValues[] = '<span style="color: #858585;">Chưa giao</span>';
            }
            if (in_array(2, $data['receive'])) {
                $statusValues[] = '<span style="color: #08AA36BF;">Đã nhận</span>';
            }
            if (in_array(1, $data['receive'])) {
                $statusValues[] = '<span style="color: #E8B600;">Một phần</span>';
            }
            $statusTextReceive = implode(', ', $statusValues);
            $filters[] = ['value' => 'Nhận hàng: ' . $statusTextReceive, 'name' => 'receive', 'icon' => 'status'];
        }
        $statusTextReceipt = '';
        if (isset($data['reciept']) && $data['reciept'] !== null) {
            $statusValues = [];
            if (in_array(0, $data['reciept'])) {
                $statusValues[] = '<span style="color: #858585;">Chưa tạo</span>';
            }
            if (in_array(2, $data['reciept'])) {
                $statusValues[] = '<span style="color: #08AA36BF;">Chính thức</span>';
            }
            if (in_array(1, $data['reciept'])) {
                $statusValues[] = '<span style="color: #E8B600;">Một phần</span>';
            }
            $statusTextReceipt = implode(', ', $statusValues);
            $filters[] = ['value' => 'Hoá đơn: ' . $statusTextReceipt, 'name' => 'reciept', 'icon' => 'status'];
        }
        $statusTextPay = '';
        if (isset($data['pay']) && $data['pay'] !== null) {
            $statusValues = [];
            if (in_array(0, $data['pay'])) {
                $statusValues[] = '<span style="color: #858585;">Chưa thanh toán</span>';
            }
            if (in_array(2, $data['pay'])) {
                $statusValues[] = '<span style="color: #08AA36BF;">Thanh toán đủ</span>';
            }
            if (in_array(1, $data['pay'])) {
                $statusValues[] = '<span style="color: #E8B600;">Một phần</span>';
            }
            $statusTextPay = implode(', ', $statusValues);
            $filters[] = ['value' => 'Thanh toán: ' . $statusTextPay, 'name' => 'pay'];
        }
        if (isset($data['total']) && $data['total'][1] !== null) {
            $filters[] = ['value' => 'Tổng tiền: ' . $data['total'][0] . ' ' . $data['total'][1], 'name' => 'total', 'icon' => 'money'];
        }
        if (isset($data['date']) && $data['date'][1] !== null) {
            $date_start = date("d/m/Y", strtotime($data['date'][0]));
            $date_end = date("d/m/Y", strtotime($data['date'][1]));
            $filters[] = ['value' => 'Ngày báo giá: từ ' . $date_start . ' đến ' . $date_end, 'name' => 'date', 'icon' => 'date'];
        }
        if ($request->ajax()) {
            $import = $this->detailImport->ajax($data);
            return response()->json([
                'data' => $import,
                'filters' => $filters,
            ]);
        }
        return false;
    }

    public function getDataImport(Request $request)
    {
        $data = [];

        $checked = [];
        $list = [];
        $detailImport = DetailImport::where('id', $request->id)->first();
        if ($detailImport) {
            $quoteImport = QuoteImport::where('detailimport_id', $detailImport->id)
                ->where('workspace_id', Auth::user()->current_workspace)
                ->get();
            if ($quoteImport) {
                foreach ($quoteImport as $qt) {
                    $product = Products::where('product_name', $qt->product_name)
                        ->where(DB::raw('COALESCE(product_inventory,0)'), '>', 0)
                        ->where('workspace_id', Auth::user()->current_workspace)
                        ->first();

                    if ($request->type == "receive") {
                        if ($qt->receive_qty != 0) {
                            $data['status'] = false;
                            $data['msg'] = "Đơn nhận hàng đã được tạo";
                            break;
                        } else {
                            $productImport = QuoteImport::where('product_name', $qt->product_name)
                                ->where('workspace_id', Auth::user()->current_workspace)
                                ->first();

                            if ($productImport) {
                                $CBSN = ProductImport::where('quoteImport_id', $productImport->id)
                                    ->where('workspace_id', Auth::user()->current_workspace)
                                    ->where('receive_id', '!=', 'null')
                                    ->first();
                            }
                            if ($product) {
                                array_push($list, $product->check_seri);
                                array_push($checked, 'disabled');
                            } else if ($CBSN) {
                                array_push($list, $CBSN->cbSN);
                                array_push($checked, 'disabled');
                            } else {
                                array_push($list, 0);
                                array_push($checked, 'endable');
                            }
                            $data['checked'] = $checked;
                            $data['cb'] = $list;
                            $data['status'] = true;
                        }
                    } else if ($request->type == "reciept") {
                        if ($qt->reciept_qty != 0) {
                            $data['status'] = false;
                            $data['msg'] = "Đơn nhận hàng đã được tạo";
                            break;
                        } else {
                            $count = Reciept::where('workspace_id', Auth::user()->current_workspace)->count();

                            $lastReceive = Reciept::where('workspace_id', Auth::user()->current_workspace)
                                ->orderBy('id', 'desc')
                                ->first();

                            if ($lastReceive) {
                                $parts = explode('-', $lastReceive->number_bill);
                                $getNumber = end($parts);
                                $count = (int)$getNumber + 1;
                            } else {
                                $count = $count == 0 ? $count += 1 : $count;
                            }
                            if ($count < 10) {
                                $count = "0" . $count;
                            }
                            $resultNumber = "SHD-" . $count;
                            $data['resultNumber'] = $resultNumber;
                            $data['total'] = $detailImport->total_tax;
                            $data['status'] = true;
                        }
                    } else {
                        $payment = PayOder::where('detailimport_id', $detailImport->id)->first();
                        if ($payment) {
                            $data['prePayment'] = $payment->payment;
                        }
                        $data['total'] = $detailImport->total_tax;
                        $data['status'] = true;
                    }
                }
                if ($product) {
                    $data['inventory'] = $product->product_inventory;
                }
                $data['product'] = $quoteImport;
                $data['quotation_number'] = $detailImport->quotation_number;
                $data['provide_name'] = $detailImport->provide_name;
            }
        }
        return $data;
    }
    public function checkAction(Request $request)
    {
        $data = [];
        $detailImport = DetailImport::where('id', $request->id)->first();
        if ($detailImport) {
            $checkReceive = Receive_bill::where('detailimport_id', $detailImport->id)->first();
            $checkReciept = Reciept::where('detailimport_id', $detailImport->id)->first();
            $checkPayment = PayOder::where('detailimport_id', $detailImport->id)->first();
            if ($checkReceive) {
                $data['receive'] = true;
            }
            if ($checkReciept) {
                $data['reciept'] = true;
            }
            if ($checkPayment) {
                if ($checkPayment->debt == 0) {
                    $data['payment'] = true;
                } else {
                    $data['title_payment'] = "Thanh toán mua hàng";
                }
            }
        }
        return $data;
    }



    public function getWarehouse()
    {
        return Warehouse::where('workspace_id', Auth::user()->current_workspace)->get();
    }
}
