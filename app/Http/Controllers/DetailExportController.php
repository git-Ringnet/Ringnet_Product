<?php

namespace App\Http\Controllers;

use App\Models\Attachment;
use App\Models\BillSale;
use App\Models\Delivered;
use App\Models\Delivery;
use App\Models\DetailExport;
use App\Models\DetailImport;
use App\Models\Guest;
use App\Models\GuestFormDate;
use App\Models\PayExport;
use App\Models\productBill;
use App\Models\ProductCode;
use App\Models\productPay;
use App\Models\Products;
use App\Models\Project;
use App\Models\Provides;
use App\Models\QuoteExport;
use App\Models\DateForm;
use App\Models\representGuest;
use App\Models\userFlow;
use App\Models\Workspace;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DetailExportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $detailExport;
    private $guest;
    private $quoteExport;
    private $project;
    private $product;
    private $delivery;
    private $delivered;
    private $billSale;
    private $productBill;
    private $payExport;
    private $productPay;
    private $detailImport;
    protected $date_form;
    protected $guest_dateForm;
    private $workspaces;
    private $represent_guest;
    private $attachment;
    private $userFlow;

    public function __construct()
    {
        $this->date_form = new DateForm();
        $this->guest_dateForm = new GuestFormDate();
        $this->detailExport = new DetailExport();
        $this->detailImport = new DetailImport();
        $this->guest = new Guest();
        $this->quoteExport = new QuoteExport();
        $this->product = new Products();
        $this->project = new Project();
        $this->delivered = new Delivered();
        $this->delivery = new Delivery();
        $this->billSale = new BillSale();
        $this->productBill = new productBill();
        $this->payExport = new PayExport();
        $this->productPay = new productPay();
        $this->workspaces = new Workspace();
        $this->represent_guest = new representGuest();
        $this->attachment = new Attachment();
        $this->userFlow = new userFlow();
    }
    public function index()
    {
        if (Auth::check()) {
            $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
            $workspacename = $workspacename->workspace_name;
            $title = "Báo giá";
            $quoteExport = $this->detailExport->getAllDetailExport();
            return view('tables.export.quote.list-quote', compact('title', 'quoteExport', 'workspacename'));
        } else {
            return redirect()->back()->with('warning', 'Vui lòng đăng nhập!');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Tạo báo giá";
        $guest = $this->guest->getAllGuest();
        $date_form = $this->date_form->getDateForm();
        $project = $this->project->getAllProject();
        $product = $this->product->getAllProducts();

        $dataForm = [
            'location' => $this->date_form->findFormByField('location'),
            'quote' => $this->date_form->findFormByField('quote'),
            'delivery' => $this->date_form->findFormByField('delivery'),
            'goods' => $this->date_form->findFormByField('goods'),
            'payment' => $this->date_form->findFormByField('payment'),
        ];
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;

        // dd($data);
        return view('tables.export.quote.create-quote', compact('title', 'guest', 'product', 'project', 'date_form', 'dataForm', 'workspacename'));
    }
    public function searchFormByGuestId(Request $request)
    {
        $data = $request->all();
        $dateForm = $this->guest_dateForm->getFormFieldIdsByGuestId($data['idGuest']);
        return $dateForm;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(string $workspace, Request $request)
    {
        $export_id = $this->detailExport->addExport($request->all());
        $this->quoteExport->addQuoteExport($request->all(), $export_id);
        $arrLuuNhap = [
            'name' => 'BG',
            'des' => 'Lưu nháp'
        ];
        $this->userFlow->addUserFlow($arrLuuNhap);
        $dateForms = $request->idDate;
        $fieldDates = $request->fieldDate;
        $guestId = $request->guest_id;
        foreach ($dateForms as $key => $dateFormId) {
            $formField = $fieldDates[$key];
            $this->guest_dateForm->insertFormGuest($guestId, $dateFormId, $formField);
        }
        return redirect()->route('detailExport.index', ['workspace' => $workspace])->with('msg', ' Tạo mới đơn báo giá thành công !');
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
    public function seeInfo(string $workspace, string $id)
    {
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;
        $title = 'Chi tiết đơn báo giá';
        $guest = $this->guest->getAllGuest();
        $product = $this->product->getAllProducts();
        $detailExport = $this->detailExport->getDetailExportToId($id);
        if (!$detailExport) {
            abort('404');
        }
        $quoteExport = $this->detailExport->getProductToId($id);
        $history = $this->quoteExport->history($id);
        return view('tables.export.quote.see-quote', compact('title', 'history', 'guest', 'product', 'detailExport', 'quoteExport', 'workspacename'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $workspace, string $id)
    {
        $title = 'Chỉnh sửa đơn báo giá';
        $guest = $this->guest->getAllGuest();
        $product = $this->product->getAllProducts();
        $detailExport = $this->detailExport->getDetailExportToId($id);
        if (!$detailExport) {
            abort('404');
        }
        $quoteExport = $this->detailExport->getProductToId($id);
        $date_form = $this->date_form->getDateForm();
        $project = $this->project->getAllProject();
        $dataForm = [
            'location' => $this->date_form->findFormByField('location'),
            'quote' => $this->date_form->findFormByField('quote'),
            'delivery' => $this->date_form->findFormByField('delivery'),
            'goods' => $this->date_form->findFormByField('goods'),
            'payment' => $this->date_form->findFormByField('payment'),
        ];
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;
        return view('tables.export.quote.edit-quote', compact('project', 'title', 'guest', 'product', 'detailExport', 'quoteExport', 'date_form', 'dataForm', 'workspacename'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(string $workspace, Request $request, string $id)
    {
        $detailExport = DetailExport::find($id);
        //Đơn báo giá
        if ($request->action == "action_1") {
            if ($detailExport->status == 1) {
                $export_id = $this->detailExport->updateExport($request->all(), $id);
                $this->quoteExport->updateQuoteExport($request->all(), $export_id);
                $dateForms = $request->idDate;
                $fieldDates = $request->fieldDate;
                $guestId = $request->guest_id;
                foreach ($dateForms as $key => $dateFormId) {
                    $formField = $fieldDates[$key];
                    $this->guest_dateForm->insertFormGuest($guestId, $dateFormId, $formField);
                }
                return redirect()->route('detailExport.index', ['workspace' => $workspace])->with('msg', 'Cập nhật đơn báo giá thành công!');
            } else {
                if ($detailExport) {
                    $detailExport->reference_number = $request->reference_number;
                    $detailExport->save();
                    return redirect()->route('detailExport.index', ['workspace' => $workspace])->with('msg', 'Cập nhật đơn báo giá thành công!');
                } else {
                    return redirect()->route('detailExport.index', ['workspace' => $workspace])->with('warning', 'Không tìm thấy đơn báo giá!');
                }
            }
        }
        //Đơn giao hàng
        if ($request->action == "action_2") {
            $title = "Tạo đơn giao hàng";
            $numberQuote = DetailExport::leftJoin('quoteexport', 'detailexport.id', '=', 'quoteexport.detailexport_id')
                ->where('quoteexport.product_qty', '>', DB::raw('COALESCE(quoteexport.qty_delivery,0)'))
                ->select('detailexport.quotation_number', 'detailexport.id')
                ->distinct()
                ->get();
            $product = $this->product->getAllProducts();
            $quoteExport = $this->quoteExport->getProductsbyId($request->product_id);
            $data = $request->all();
            $getGuestbyId = $this->guest->getGuestbyId($request->guest_id);
            $getRepresentbyId = $this->represent_guest->getRepresentbyId($request->represent_id);
            $yes = true;
            $getInfoQuote = $this->delivery->getInfoQuote($request->detailexport_id);
            $getProductQuote = $this->delivery->getProductQuote($request->detailexport_id);
            $arrCapNhatKH = [
                'name' => 'BG',
                'des' => 'Tạo đơn giao hàng'
            ];
            $this->userFlow->addUserFlow($arrCapNhatKH);
            if ($getProductQuote->isEmpty()) {
                return redirect()->route('delivery.index', ['workspace' => $workspace])->with('warning', 'Đơn giao hàng đã tạo hết!');
            } else {
                return view('tables.export.delivery.create-delivery', [
                    'active' => 'active', 'yes' => $yes, 'getInfoQuote' => $getInfoQuote, 'getGuestbyId' => $getGuestbyId, 'getRepresentbyId' => $getRepresentbyId, 'data' => $data, 'title' => $title, 'numberQuote' => $numberQuote,
                    'product' => $product, 'getProductQuote' => $getProductQuote, 'workspacename' => $workspace
                ]);
            }
        }
        //Hóa đơn
        if ($request->action == "action_3") {
            $title = "Tạo Hóa đơn bán hàng";
            $data = $request->all();
            $numberQuote = DetailExport::leftJoin('quoteexport', 'detailexport.id', '=', 'quoteexport.detailexport_id')
                ->where('quoteexport.product_qty', '>', DB::raw('COALESCE(quoteexport.qty_bill_sale,0)'))
                ->select('detailexport.quotation_number', 'detailexport.id')
                ->distinct()
                ->get();;
            $product = $this->product->getAllProducts();
            $quoteExport = $this->quoteExport->getProductsbyId($request->product_id);
            $getGuestbyId = $this->guest->getGuestbyId($request->guest_id);
            $getRepresentbyId = $this->represent_guest->getRepresentbyId($request->represent_id);
            $yes = true;
            $getInfoDelivery = $this->billSale->getProductDelivery($request->detailexport_id);
            $arrCapNhatKH = [
                'name' => 'BG',
                'des' => 'Tạo hóa đơn'
            ];
            $this->userFlow->addUserFlow($arrCapNhatKH);
            if ($getInfoDelivery->isEmpty()) {
                return redirect()->route('billSale.index', ['workspace' => $workspace])->with('warning', 'Hóa đơn bán hàng đã được tạo hết!');
            } else {
                return view('tables.export.bill_sale.create-billSale', ['yes' => $yes, 'getInfoDelivery' => $getInfoDelivery, 'getGuestbyId' => $getGuestbyId, 'getRepresentbyId' => $getRepresentbyId, 'title' => $title, 'data' => $data, 'numberQuote' => $numberQuote, 'product' => $product, 'quoteExport' => $quoteExport, 'workspacename' => $workspace]);
            }
        }
        //Thanh toán
        if ($request->action == "action_4") {
            $title = "Tạo đơn thanh toán";
            $product = $this->product->getAllProducts();
            $numberQuote = DetailExport::leftJoin('quoteexport', 'detailexport.id', '=', 'quoteexport.detailexport_id')
                ->where('quoteexport.product_qty', '>', DB::raw('COALESCE(quoteexport.qty_payment,0)'))
                ->select('detailexport.quotation_number', 'detailexport.id')
                ->distinct()
                ->get();
            $data = $request->all();
            $quoteExport = $this->quoteExport->getProductsbyId($request->product_id);
            $getGuestbyId = $this->guest->getGuestbyId($request->guest_id);
            $getRepresentbyId = $this->represent_guest->getRepresentbyId($request->represent_id);
            $yes = true;
            $delivery = $this->payExport->getProductPay($request->detailexport_id);
            $arrCapNhatKH = [
                'name' => 'BG',
                'des' => 'Tạo đơn thanh toán'
            ];
            $this->userFlow->addUserFlow($arrCapNhatKH);
            if ($delivery->isEmpty()) {
                return redirect()->route('payExport.index', ['workspace' => $workspace])->with('warning', 'Thanh toán bán hàng đã được tạo hết!');
            } else {
                return view('tables.export.pay_export.create-payExport', ['yes' => $yes, 'delivery' => $delivery, 'getGuestbyId' => $getGuestbyId, 'getRepresentbyId' => $getRepresentbyId, 'title' => $title, 'data' => $data, 'numberQuote' => $numberQuote, 'product' => $product, 'quoteExport' => $quoteExport, 'workspacename' => $workspace]);
            }
        }
        //Xóa đơn báo giá
        if ($request->action == "action_5") {
            $delivery = Delivery::where('detailexport_id', $id)->get();
            $billSale = BillSale::where('detailexport_id', $id)->get();
            $pay = PayExport::where('detailexport_id', $id)->get();

            if ($delivery->isEmpty() && $billSale->isEmpty() && $pay->isEmpty()) {
                $detailExport = DetailExport::find($id);

                if ($detailExport) {
                    $table_id = $id;
                    $table_name = 'BG';
                    $this->attachment->deleteFileAll($table_id, $table_name);
                    //
                    $arrCapNhatKH = [
                        'name' => 'BG',
                        'des' => 'Xóa đơn báo giá'
                    ];
                    $this->userFlow->addUserFlow($arrCapNhatKH);
                    QuoteExport::where('detailexport_id', $id)->delete();
                    $detailExport->delete();
                    return redirect()->route('detailExport.index', ['workspace' => $workspace])->with('msg', 'Xóa đơn bán hàng thành công!');
                } else {
                    return redirect()->route('detailExport.index', ['workspace' => $workspace])->with('warning', 'Không tìm thấy đơn bán hàng để xóa!');
                }
            } else {
                return redirect()->route('detailExport.index', ['workspace' => $workspace])->with('warning', 'Xóa đơn bán hàng thất bại!');
            }
        }
        //Đơn mua hàng
        if ($request->action == "action_6") {
            $dataImport = $this->detailImport->dataImport($request->all());
            $title = "Tạo đơn mua hàng";
            // $provides = Provides::all();
            $provides = Provides::where('workspace_id', Auth::user()->current_workspace)->get();
            $project = Project::all();
            $arrCapNhatKH = [
                'name' => 'BG',
                'des' => 'Tạo đơn mua hàng'
            ];
            $this->userFlow->addUserFlow($arrCapNhatKH);
            return view('tables.import.insertImport', ['dataImport' => $dataImport, 'title' => $title, 'provides' => $provides, 'project' => $project, 'workspacename' => $workspace]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $workspace, string $id)
    {
        $delivery = Delivery::where('detailexport_id', $id)->get();
        $billSale = BillSale::where('detailexport_id', $id)->get();
        $pay = PayExport::where('detailexport_id', $id)->get();

        if ($delivery->isEmpty() && $billSale->isEmpty() && $pay->isEmpty()) {
            $detailExport = DetailExport::find($id);

            if ($detailExport) {
                QuoteExport::where('detailexport_id', $id)->delete();
                $detailExport->delete();
                $table_id = $id;
                $table_name = 'BG';
                $this->attachment->deleteFileAll($table_id, $table_name);
                //
                $arrCapNhatKH = [
                    'name' => 'BG',
                    'des' => 'Xóa đơn báo giá'
                ];
                $this->userFlow->addUserFlow($arrCapNhatKH);
                return redirect()->route('detailExport.index', ['workspace' => $workspace])->with('msg', 'Xóa đơn bán hàng thành công!');
            } else {
                return redirect()->route('detailExport.index', ['workspace' => $workspace])->with('warning', 'Không tìm thấy đơn bán hàng để xóa!');
            }
        } else {
            return redirect()->route('detailExport.index', ['workspace' => $workspace])->with('warning', 'Xóa đơn bán hàng thất bại!');
        }
    }
    //Tìm kiếm khách hàng
    public function searchGuest(Request $request)
    {
        $result = [];
        $data = $request->all();
        $guest = Guest::where('id', $data['idGuest'])
            ->where('workspace_id', Auth::user()->current_workspace)
            ->first();
        if ($guest) {
            $date = DetailExport::where('guest_id', $guest->id)->orderBy('id', 'desc')
                ->where('workspace_id', Auth::user()->current_workspace)
                ->whereRaw("SUBSTRING_INDEX(quotation_number, '/', 1) = ?", [Carbon::now()->format('dmY')])
                ->first();
            if ($date) {
                $date = explode('/', $date->quotation_number)[0];
            }
            $count = DetailExport::where('guest_id', $guest->id)
                ->where('workspace_id', Auth::user()->current_workspace)
                ->whereRaw("SUBSTRING_INDEX(quotation_number, '/', 1) = ?", [$date])
                ->count();
            $lastDetailImport = DetailExport::where('guest_id', $guest->id)
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
            $resultNumber = ($date == "" ? Carbon::now()->setTimezone('Asia/Ho_Chi_Minh')->format('dmY') : $date) . "/RN-" . $guest->key . "-" . $count;
            $result = [
                'guest' => $guest,
                'count' => $count,
                'key' => $guest->key,
                'date' => ($date == "" ? Carbon::now()->format('dmY') : $date),
                'resultNumber' => $resultNumber
            ];
        }
        return $result;
    }
    public function searchRepresent(Request $request)
    {
        $data = $request->all();
        $guest = representGuest::findOrFail($data['idGuest']);
        return $guest;
    }

    //Tìm kiếm project
    public function searchProject(Request $request)
    {
        $data = $request->all();
        $project = Project::where('id', $data['idProject'])->first();
        return $project;
    }

    public function checkQuotetionExport(Request $request)
    {
        $result = [];
        $data = $request->all();
        $checkQuotetion = DetailExport::where('quotation_number', $data['quotetion_number'])->where('workspace_id', Auth::user()->current_workspace);
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
        return $result;
    }
    public function checkQuotetionExportEdit(Request $request)
    {
        $result = [];
        $data = $request->all();
        $checkQuotetion = DetailExport::where('quotation_number', $data['quotetion_number'])
            ->where('workspace_id', Auth::user()->current_workspace);
        if (isset($data['detailexport_id'])) {
            $checkQuotetion->where('id', '!=', $data['detailexport_id']);
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
        return $result;
    }
    //Thêm khách hàng
    public function addGuest(Request $request)
    {
        $check = Guest::where('workspace_id', Auth::user()->current_workspace)
            ->where(function ($query) use ($request) {
                $query->where('guest_code', $request->guest_code)
                    ->orWhere('guest_name_display', $request->guest_name_display);
            })
            ->first();

        if ($check === null) {
            $checkKey = Guest::where('workspace_id', Auth::user()->current_workspace)
                ->where('key', $request->key)
                ->first();

            if ($checkKey) {
                // Tên viết tắt đã tồn tại, thực hiện logic thay đổi giá trị key
                $newKey = $request->key;

                // Tăng số đằng sau cho đến khi không còn trùng
                while (Guest::where('workspace_id', Auth::user()->current_workspace)
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

                $response = [
                    'success' => false,
                    'msg' => 'Tên viết tắt đã tồn tại!',
                    'key' => $newKey,
                ];
            } else {
                $key = isset($request->key) ? $request->key : $this->generateKey($request->guest_name_display);
                $data = [
                    'guest_name_display' => $request->guest_name_display,
                    'guest_name' => $request->guest_name,
                    'guest_address' => $request->guest_address,
                    'guest_code' => $request->guest_code,
                    'guest_email' => $request->guest_email,
                    'key' => $key,
                    'guest_phone' => $request->guest_phone,
                    'guest_receiver' => $request->guest_receiver,
                    'guest_email_personal' => $request->guest_email_personal,
                    'guest_phone_receiver' => $request->guest_phone_receiver,
                    'guest_debt' => 0,
                    'workspace_id' => Auth::user()->current_workspace,
                    'guest_note' => $request->guest_note,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];

                $new_guest = DB::table('guest')->insertGetId($data);

                if ($request->update == 1) {
                    $arrThemKH = [
                        'name' => 'BG',
                        'des' => 'Thêm khách hàng ở trang chỉnh sửa'
                    ];
                    $this->userFlow->addUserFlow($arrThemKH);
                } else {
                    $arrThemKH = [
                        'name' => 'BG',
                        'des' => 'Thêm khách hàng'
                    ];
                    $this->userFlow->addUserFlow($arrThemKH);
                }

                if (!empty($request->represent_guest_name)) {
                    $dataRepresent = [
                        'guest_id' => $new_guest,
                        'represent_name' => $request->represent_guest_name,
                        'workspace_id' => Auth::user()->current_workspace,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];

                    $newRepresentId = DB::table('represent_guest')->insertGetId($dataRepresent);
                } else {
                    $newRepresentId = null;
                }

                $response = [
                    'success' => true,
                    'msg' => 'Thêm mới khách hàng thành công',
                    'id' => $new_guest,
                    'guest_name_display' => $request->guest_name_display,
                    'key' => $key,
                    'represent_name' => $request->represent_guest_name,
                    'id_represent' => $newRepresentId,
                ];
            }
        } else {
            $response = ['success' => false, 'msg' => 'Mã số thuế hoặc tên khách hàng đã tồn tại'];
        }

        return response()->json($response);
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
    //Thông tin chi tiết khách
    public function editGuest(Request $request)
    {
        $data = $request->all();
        $guest = $this->guest->getGuestRepresentbyId($data['itemId']);
        return $guest;
    }
    //Cập nhật thông tin khách hàng
    public function updateGuest(Request $request)
    {
        $data = $request->all();
        $updateGuest = $this->guest->updateGuestRepresent($data);
        if ($data['update'] == 2) {
            $arrCapNhatKH = [
                'name' => 'BG',
                'des' => 'Cập nhật khách hàng ở trang chỉnh sửa'
            ];
            $this->userFlow->addUserFlow($arrCapNhatKH);
        } else {
            $arrCapNhatKH = [
                'name' => 'BG',
                'des' => 'Cập nhật khách hàng'
            ];
            $this->userFlow->addUserFlow($arrCapNhatKH);
        }
        return $updateGuest;
    }
    //Xóa khách hàng
    public function deleteGuest(Request $request)
    {
        $data = $request->all();
        $guest = $this->guest->deleteGuest($data['itemId']);
        if ($data['update'] == 2) {
            $arrCapNhatKH = [
                'name' => 'BG',
                'des' => 'Xóa khách hàng ở trang chỉnh sửa'
            ];
            $this->userFlow->addUserFlow($arrCapNhatKH);
        } else {
            $arrCapNhatKH = [
                'name' => 'BG',
                'des' => 'Xóa khách hàng'
            ];
            $this->userFlow->addUserFlow($arrCapNhatKH);
        }
        return $guest;
    }
    //Thêm dự án
    public function addProject(Request $request)
    {
        $check = Project::where('workspace_id', Auth::user()->current_workspace)
            ->where(function ($query) use ($request) {
                $query->where('project_name', $request->project_name);
            })
            ->first();
        if ($check == null) {
            $data = [
                'project_name' => $request->project_name,
                'workspace_id' => Auth::user()->current_workspace,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
            $new_guest = DB::table('project')->insertGetId($data);
            if ($request->update == 2) {
                $arrCapNhatKH = [
                    'name' => 'BG',
                    'des' => 'Thêm dự án ở trang chỉnh sửa'
                ];
                $this->userFlow->addUserFlow($arrCapNhatKH);
            } else {
                $arrCapNhatKH = [
                    'name' => 'BG',
                    'des' => 'Thêm dự án'
                ];
                $this->userFlow->addUserFlow($arrCapNhatKH);
            }
            $msg = response()->json([
                'success' => true, 'msg' => 'Thêm mới dự án thành công', 'id' => $new_guest,
                'project_name' => $request->project_name,
            ]);
        } else {
            $msg = response()->json(['success' => false, 'msg' => 'Thông tin dự án đã tồn tại']);
        }
        return $msg;
    }
    //Xóa dự án
    public function deleteProject(Request $request)
    {
        $data = $request->all();
        $project = $this->project->deleteProject($data['itemId']);
        if ($request->update == 2) {
            $arrCapNhatKH = [
                'name' => 'BG',
                'des' => 'Xóa dự án ở trang chỉnh sửa'
            ];
            $this->userFlow->addUserFlow($arrCapNhatKH);
        } else {
            $arrCapNhatKH = [
                'name' => 'BG',
                'des' => 'Xóa dự án'
            ];
            $this->userFlow->addUserFlow($arrCapNhatKH);
        }
        return $project;
    }
    //Thêm người đại diện
    public function addRepresentGuest(Request $request)
    {
        $check = representGuest::where('workspace_id', Auth::user()->current_workspace)
            ->where(function ($query) use ($request) {
                $query->where('represent_name', $request->represent_name)
                    ->where('guest_id', $request->guest_id);
            })
            ->first();
        if ($check == null) {
            $data = [
                'represent_name' => $request->represent_name,
                'represent_email' => $request->represent_email,
                'represent_phone' => $request->represent_phone,
                'represent_address' => $request->represent_address,
                'guest_id' => $request->guest_id,
                'default_guest' => 0,
                'workspace_id' => Auth::user()->current_workspace,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
            $new_guest = DB::table('represent_guest')->insertGetId($data);
            if ($request->update == 2) {
                $arrCapNhatKH = [
                    'name' => 'BG',
                    'des' => 'Thêm người đại diện ở trang chỉnh sửa'
                ];
                $this->userFlow->addUserFlow($arrCapNhatKH);
            } else {
                $arrCapNhatKH = [
                    'name' => 'BG',
                    'des' => 'Thêm người đại diện'
                ];
                $this->userFlow->addUserFlow($arrCapNhatKH);
            }
            $msg = response()->json([
                'success' => true, 'msg' => 'Thêm mới người đại diện thành công', 'id' => $new_guest,
                'represent_name' => $request->represent_name,
            ]);
        } else {
            $msg = response()->json(['success' => false, 'msg' => 'Thông tin người đại diện đã tồn tại']);
        }
        return $msg;
    }
    //Lấy thông tin sản phẩm
    public function getProduct(Request $request)
    {
        $data = $request->all();
        $product = Products::where('id', $data['idProduct'])->first();
        return $product;
    }
    //Lấy mã sản phẩm
    public function getProductCode(Request $request)
    {
        $data = $request->all();
        $productCode = ProductCode::where('id', $data['idCode'])->first();
        return $productCode;
    }
    //lấy danh sách người đại diện từ khách hàng
    public function getRepresentGuest(Request $request)
    {
        $data = $request->all();
        $represent_guest = $this->represent_guest->getRepresentGuest($data['idGuest']);
        return $represent_guest;
    }
    //Xóa người đại diện
    public function deleteRepresentGuest(Request $request)
    {
        $data = $request->all();
        $represent_guest = $this->represent_guest->deleteRepresentGuest($data['itemId']);
        if ($request->update == 2) {
            $arrCapNhatKH = [
                'name' => 'BG',
                'des' => 'Xóa người đại diện ở trang chỉnh sửa'
            ];
            $this->userFlow->addUserFlow($arrCapNhatKH);
        } else {
            $arrCapNhatKH = [
                'name' => 'BG',
                'des' => 'Xóa người đại diện'
            ];
            $this->userFlow->addUserFlow($arrCapNhatKH);
        }
        return $represent_guest;
    }
    //Thông tin chi tiết người đại diện
    public function editRepresent(Request $request)
    {
        $data = $request->all();
        $represent_guest = $this->represent_guest->editRepresentGuest($data['itemId']);
        return $represent_guest;
    }
    //Cập nhật thông tin người đại diện
    public function updateRepresent(Request $request)
    {
        $data = $request->all();
        $represent_guest = $this->represent_guest->updateRepresent($data['represent_id'], $data);
        if ($request->update == 2) {
            $arrCapNhatKH = [
                'name' => 'BG',
                'des' => 'Cập nhật người đại diện ở trang chỉnh sửa'
            ];
            $this->userFlow->addUserFlow($arrCapNhatKH);
        } else {
            $arrCapNhatKH = [
                'name' => 'BG',
                'des' => 'Cập nhật người đại diện'
            ];
            $this->userFlow->addUserFlow($arrCapNhatKH);
        }
        return $represent_guest;
    }
    public function defaultRepresent(Request $request)
    {
        $data = $request->all();
        $represent_guest = $this->represent_guest->defaultRepresent($data['represent_id'], $data['guest_id']);
        if ($request->update == 2) {
            $arrCapNhatKH = [
                'name' => 'BG',
                'des' => 'Ghim người đại diện ở trang chỉnh sửa'
            ];
            $this->userFlow->addUserFlow($arrCapNhatKH);
        } else {
            $arrCapNhatKH = [
                'name' => 'BG',
                'des' => 'Ghim người đại diện'
            ];
            $this->userFlow->addUserFlow($arrCapNhatKH);
        }
        return $represent_guest;
    }
    public function getRecentTransaction(Request $data)
    {
        $recentTransaction = QuoteExport::where('product_id', $data['idProduct'])
            ->leftJoin('detailexport', 'detailexport.id', 'quoteexport.detailexport_id')
            ->where('detailexport.status', '!=', 1)
            ->where('quoteexport.status', 1)
            ->where('quoteexport.workspace_id', Auth::user()->current_workspace)
            ->where('detailexport.workspace_id', Auth::user()->current_workspace)
            ->get();
        return $recentTransaction;
    }
    public function searchDetailExport(Request $request)
    {
        $data = $request->all();
        $filters = [];
        if ($request->ajax()) {
            $detailExport = $this->detailExport->ajax($data);
            return response()->json([
                'detailExport' => $detailExport,
                'filters' => $filters,
            ]);
        }
        return false;
    }
    public function checkProductExist(Request $request)
    {
        $data = $request->all();
        $product = Products::where('product_name', $data['productName'])
            ->where('workspace_id', Auth::user()->current_workspace)
            ->first();
        return $product;
    }
}
