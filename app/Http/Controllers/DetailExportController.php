<?php

namespace App\Http\Controllers;

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
        return view('tables.export.quote.see-quote', compact('title', 'guest', 'product', 'detailExport', 'quoteExport', 'workspacename'));
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

        $dataForm = [
            'location' => $this->date_form->findFormByField('location'),
            'quote' => $this->date_form->findFormByField('quote'),
            'delivery' => $this->date_form->findFormByField('delivery'),
            'goods' => $this->date_form->findFormByField('goods'),
            'payment' => $this->date_form->findFormByField('payment'),
        ];
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;
        return view('tables.export.quote.edit-quote', compact('title', 'guest', 'product', 'detailExport', 'quoteExport', 'date_form', 'dataForm', 'workspacename'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(string $workspace, Request $request, string $id)
    {
        $detailExport = DetailExport::find($id);
        // dd($request->all());
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
                return redirect()->route('detailExport.index', ['workspace' => $workspace])->with('warning', 'Cập nhật không thành công!');
            }
        }
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
            $yes = true;
            $getInfoQuote = $this->delivery->getInfoQuote($request->detailexport_id);
            $getProductQuote = $this->delivery->getProductQuote($request->detailexport_id);
            if ($getProductQuote->isEmpty()) {
                return redirect()->route('delivery.index')->with('warning', 'Đơn giao hàng đã tạo hết!');
            } else {
                return view('tables.export.delivery.create-delivery', [
                    'active' => 'active', 'yes' => $yes, 'getInfoQuote' => $getInfoQuote, 'getGuestbyId' => $getGuestbyId, 'data' => $data, 'title' => $title, 'numberQuote' => $numberQuote,
                    'product' => $product, 'getProductQuote' => $getProductQuote
                ]);
            }
        }
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
            $yes = true;
            $getInfoDelivery = $this->billSale->getProductDelivery($request->detailexport_id);
            if ($getInfoDelivery->isEmpty()) {
                return redirect()->route('billSale.index')->with('warning', 'Hóa đơn bán hàng đã được tạo hết!');
            } else {
                return view('tables.export.bill_sale.create-billSale', ['yes' => $yes, 'getInfoDelivery' => $getInfoDelivery, 'getGuestbyId' => $getGuestbyId, 'title' => $title, 'data' => $data, 'numberQuote' => $numberQuote, 'product' => $product, 'quoteExport' => $quoteExport]);
            }
        }
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
            $yes = true;
            $delivery = $this->payExport->getProductPay($request->detailexport_id);
            if ($delivery->isEmpty()) {
                return redirect()->route('payExport.index')->with('warning', 'Thanh toán bán hàng đã được tạo hết!');
            } else {
                return view('tables.export.pay_export.create-payExport', ['yes' => $yes, 'delivery' => $delivery, 'getGuestbyId' => $getGuestbyId, 'title' => $title, 'data' => $data, 'numberQuote' => $numberQuote, 'product' => $product, 'quoteExport' => $quoteExport]);
            }
        }
        if ($request->action == "action_5") {
            $delivery = Delivery::where('detailexport_id', $id)->get();
            $billSale = BillSale::where('detailexport_id', $id)->get();
            $pay = PayExport::where('detailexport_id', $id)->get();

            if ($delivery->isEmpty() && $billSale->isEmpty() && $pay->isEmpty()) {
                $detailExport = DetailExport::find($id);

                if ($detailExport) {
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
        if ($request->action == "action_6") {
            $dataImport = $this->detailImport->dataImport($request->all());
            $title = "Tạo đơn mua hàng";
            $provides = Provides::all();
            $project = Project::all();
            return view('tables.import.insertImport', ['dataImport' => $dataImport, 'title' => $title, 'provides' => $provides, 'project' => $project]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    //Tìm kiếm khách hàng
    public function searchGuest(Request $request)
    {
        $data = [];
        $data = $request->all();
        $guest = Guest::findOrFail($data['idGuest']);
        // $guest = Guest::where('id', $data['idGuest'])->first();
        if ($guest) {
            $count = DetailExport::where('guest_id', $guest->id)->count();
            $date = DetailExport::where('guest_id', $guest->id)->orderBy('id', 'desc')->first();
            if ($date) {
                $date = explode('/', $date->quotation_number)[0];
            }
            $data = [
                'guest' => $guest,
                'count' => $count,
                'key' => $guest->key,
                'date' => $date
            ];
        }
        return $data;
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
        $checkQuotetion = DetailExport::where('quotation_number', $data['quotetion_number']);
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
        $checkQuotetion = DetailExport::where('quotation_number', $data['quotetion_number']);
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
        if ($check == null) {
            if (isset($request->key)) {
                $key = $request->key;
            } else {
                $key = preg_match_all('/[A-ZĐ]/u', $request->guest_name_display, $matches);
                if ($key > 0) {
                    $key = implode('', $matches[0]);
                } else {
                    $key =  ucfirst($request->guest_name_display);
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
                'guest_name_display' => $request->guest_name_display,
                'guest_name' => $request->guest_name,
                'guest_address' => $request->guest_address,
                'guest_code' => $request->guest_code,
                'guest_email' => $request->guest_email,
                'key' => $request->key,
                'guest_phone' => $request->guest_phone,
                'guest_receiver' => $request->guest_receiver,
                'guest_email_personal' => $request->guest_email_personal,
                'guest_phone_receiver' => $request->guest_phone_receiver,
                'guest_debt' => 0,
                'workspace_id' => Auth::user()->current_workspace,
                'guest_note' => $request->guest_note,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
            $new_guest = DB::table('guest')->insertGetId($data);
            $msg = response()->json([
                'success' => true, 'msg' => 'Thêm mới khách hàng thành công', 'id' => $new_guest,
                'guest_name_display' => $request->guest_name_display, 'key' => $request->key
            ]);
        } else {
            $msg = response()->json(['success' => false, 'msg' => 'Mã số thuế hoặc tên khách hàng đã tồn tại']);
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
}
