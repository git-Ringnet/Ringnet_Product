<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
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
use App\Models\ProductWarehouse;
use App\Models\representGuest;
use App\Models\User;
use App\Models\userFlow;
use App\Models\Warehouse;
use App\Models\Workspace;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Auth\Access\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

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
    private $users;

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
        $this->users = new User();
    }
    public function index()
    {
        if (Auth::check()) {
            $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
            $workspacename = $workspacename->workspace_name;
            $title = "Phiếu bán hàng";
            $quoteExport = $this->detailExport->getAllDetailExport();
            $guests = $this->detailExport->getGuestInDetail();
            $users = $this->detailExport->getUserInDetail();
            return view('tables.export.quote.list-quote', compact('title', 'quoteExport', 'guests', 'users',  'workspacename'));
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
        //danh sách phiếu bán hàng
        $listDetail = $this->detailExport->getAllDetailExport();
        // dd($data);
        return view('tables.export.quote.create-quote', compact('title', 'guest', 'product', 'project', 'date_form', 'dataForm', 'workspacename', 'listDetail'));
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
        // dd($request->all());
        $export_id = $this->detailExport->addExport($request->all());
        $this->quoteExport->addQuoteExport($request->all(), $export_id);
        $arrLuuNhap = [
            'name' => 'BG',
            'des' => 'Lưu nháp'
        ];
        $this->userFlow->addUserFlow($arrLuuNhap);
        // $dateForms = $request->idDate;
        // $fieldDates = $request->fieldDate;
        // $guestId = $request->guest_id;
        // foreach ($dateForms as $key => $dateFormId) {
        //     $formField = $fieldDates[$key];
        //     $this->guest_dateForm->insertFormGuest($guestId, $dateFormId, $formField);
        // }
        if ($request->excel_export == 1) {
            // Sau khi lưu xong tất cả thông tin, set session export_id
            $request->session()->put('excel_info.export_id', $export_id);
        }
        if ($request->pdf_export == 1) {
            // Sau khi lưu xong tất cả thông tin, set session export_id
            $request->session()->put('pdf_info.export_id', $export_id);
        }
        return redirect()->route('detailExport.index', ['workspace' => $workspace])->with('msg', 'Tạo mới phiếu bán hàng thành công!');
    }

    public function downloadExcel()
    {
        $exportId = session('excel_info.export_id');

        if ($exportId) {
            $product = $this->product->getAllProducts();
            $detailExport = $this->detailExport->getDetailExportToId($exportId);
            $quoteExport = $this->detailExport->getProductToId($exportId);
            foreach ($quoteExport as $item) {
                $item->product_tax = ($item->product_tax == 99) ? "NOVAT" : $item->product_tax;
            }
            $data = ['detailExport' => $detailExport, 'quoteExport' => $quoteExport, 'product' => $product];
            // Lưu tệp Excel vào storage/app
            Excel::store(new UsersExport($data), 'users.xlsx', 'local');
            // Tải tệp Excel từ storage/app và sau đó xóa nó
            $excelFilePath = storage_path("app/users.xlsx");
            $response = response()->download($excelFilePath, 'users.xlsx')->deleteFileAfterSend();

            // Xóa session sau khi đã tải xuống tệp Excel
            session()->forget('excel_info');

            return $response;
        }

        return redirect()->route('detailExport.index')->with('error', 'Không có tệp Excel để tải xuống.');
    }

    public function downloadPdf()
    {
        // Kiểm tra xem có session export_id không
        $exportId = session('pdf_info.export_id');

        if ($exportId) {
            // Xóa session export_id trước khi tạo và trả về PDF
            session()->forget('pdf_info.export_id');

            // Tạo PDF từ dữ liệu và xuất nó
            $guest = $this->guest->getAllGuest();
            $product = $this->product->getAllProducts();
            $detailExport = $this->detailExport->getDetailExportToId($exportId);
            $quoteExport = $this->detailExport->getProductToId($exportId);
            $data = ['detailExport' => $detailExport, 'quoteExport' => $quoteExport, 'product' => $product];
            $pdf = Pdf::loadView('pdf.quote', compact('data'))
                ->setPaper('A4', 'portrait')
                ->setOptions([
                    'defaultFont' => 'sans-serif',
                    'dpi' => 140,
                    'isHtml5ParserEnabled' => true,
                    'isPhpEnabled' => true,
                    'enable_remote' => false,
                ]);
            return $pdf->download('invoice.pdf');
        } else {
            // Nếu không có session export_id, chuyển hướng hoặc xử lý theo nhu cầu của bạn
            return redirect()->back()->with('error', 'Không có PDF để tải xuống.');
        }
    }

    public function clearSession()
    {
        session()->forget('excel_info.export_id');
        return response()->json(['success' => true]);
    }

    public function clearPdfSession()
    {
        // Xóa session pdf_info.export_id
        session()->forget('pdf_info.export_id');

        // Trả về phản hồi JSON để xác nhận rằng session đã được xóa
        return response()->json(['success' => true]);
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
        $title = 'Chi tiết phiếu bán hàng';
        $guest = $this->guest->getAllGuest();
        $product = $this->product->getAllProducts();
        $detailExport = $this->detailExport->getDetailExportToId($id);
        //danh sách phiếu bán hàng
        $listDetail = $this->detailExport->getAllDetailExport();
        if (!$detailExport) {
            abort('404');
        }
        $quoteExport = $this->detailExport->getProductToId($id);
        $history = $this->quoteExport->history($id);
        // dd($history);
        return view('tables.export.quote.see-quote', compact(
            'title',
            'history',
            'guest',
            'product',
            'detailExport',
            'quoteExport',
            'workspacename',
            'listDetail',
        ));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $workspace, string $id)
    {
        $title = 'Chỉnh sửa phiếu bán hàng';
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
        $warehouse = Warehouse::where('workspace_id', Auth::user()->current_workspace)->get();
        return view('tables.export.quote.edit-quote', compact('project', 'title', 'guest', 'product', 'detailExport', 'warehouse', 'quoteExport', 'date_form', 'dataForm', 'workspacename'));
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
                // $dateForms = $request->idDate;
                // $fieldDates = $request->fieldDate;
                // $guestId = $request->guest_id;
                // foreach ($dateForms as $key => $dateFormId) {
                //     $formField = $fieldDates[$key];
                //     $this->guest_dateForm->insertFormGuest($guestId, $dateFormId, $formField);
                // }
                return redirect()->route('detailExport.index', ['workspace' => $workspace])->with('msg', 'Cập nhật phiếu bán hàng thành công!');
            } else {
                if ($detailExport) {
                    $detailExport->reference_number = $request->reference_number;
                    $detailExport->created_at = $request->date_quote;
                    $detailExport->save();
                    return redirect()->route('detailExport.index', ['workspace' => $workspace])->with('msg', 'Cập nhật phiếu bán hàng thành công!');
                } else {
                    return redirect()->route('detailExport.index', ['workspace' => $workspace])->with('warning', 'Không tìm thấy phiếu bán hàng!');
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
                    //Cập nhật công nợ khách hàng
                    $guestOld = Guest::find($detailExport->guest_id);
                    $guestOld->guest_debt = $guestOld->guest_debt - $detailExport->amount_owed;
                    $guestOld->save();

                    $table_id = $id;
                    $table_name = 'BG';
                    $this->attachment->deleteFileAll($table_id, $table_name);
                    //
                    $arrCapNhatKH = [
                        'name' => 'BG',
                        'des' => 'Xóa phiếu bán hàng'
                    ];
                    $this->userFlow->addUserFlow($arrCapNhatKH);
                    QuoteExport::where('detailexport_id', $id)->delete();
                    $detailExport->delete();
                    return redirect()->route('detailExport.index', ['workspace' => $workspace])->with('msg', 'Xóa phiếu bán hàng thành công!');
                } else {
                    return redirect()->route('detailExport.index', ['workspace' => $workspace])->with('warning', 'Không tìm thấy phiếu bán hàng để xóa!');
                }
            } else {
                return redirect()->route('detailExport.index', ['workspace' => $workspace])->with('warning', 'Xóa đơn bán hàng thất bại!');
            }
        }
        //Đơn mua hàng
        if ($request->action == "action_6") {
            $dataImport = $this->detailImport->dataImport($request->all());
            $title = "Tạo đặt hàng nhà cung cấp";
            // $provides = Provides::all();
            $provides = Provides::where('workspace_id', Auth::user()->current_workspace)->get();
            $project = Project::all();
            $arrCapNhatKH = [
                'name' => 'BG',
                'des' => 'Tạo đặt hàng nhà cung cấp'
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
                //Cập nhật công nợ khách hàng
                $guestOld = Guest::find($detailExport->guest_id);
                $guestOld->guest_debt = $guestOld->guest_debt - $detailExport->amount_owed;
                $guestOld->save();
                QuoteExport::where('detailexport_id', $id)->delete();
                $detailExport->delete();
                $table_id = $id;
                $table_name = 'BG';
                $this->attachment->deleteFileAll($table_id, $table_name);
                //
                $arrCapNhatKH = [
                    'name' => 'BG',
                    'des' => 'Xóa phiếu bán hàng'
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
            // Lấy ngày hiện tại dưới định dạng dmY
            $currentDate = Carbon::now()->format('dmy');

            // Lấy số lớn nhất của quotation_number cho ngày hiện tại
            $lastNumber =
                DetailExport::where('workspace_id', Auth::user()->current_workspace)
                // ->whereDate('created_at', now())
                ->count() + 1;
            // Nếu không có số lớn nhất, bắt đầu với số 01
            $count = ($lastNumber ? ($lastNumber + 1) : 1);
            // Đảm bảo số cuối cùng có đúng định dạng (ví dụ: 05 thay vì 5)
            $countFormatted = str_pad($count, 2, '0', STR_PAD_LEFT);
            // Tạo chuỗi resultNumber mới
            $resultNumber = "{$currentDate}/RN-{$guest->key}-{$countFormatted}";

            $lastInvoice = DetailExport::where('workspace_id', Auth::user()->current_workspace)
                ->max('quotation_number');
            $lastNumber = 0;
            if ($lastInvoice) {
                preg_match('/PBH(\d+)/', $lastInvoice, $matches);
                $lastNumber = isset($matches[1]) ? (int)$matches[1] : 0;
            }
            $newInvoiceNumber = $lastNumber + 1;
            $countFormattedInvoice = str_pad($newInvoiceNumber, 2, '0', STR_PAD_LEFT);
            $invoicenumber1 = "PBH{$countFormattedInvoice}-{$currentDate}";

            // Tạo DGH
            $lastInvoice = Delivery::where('workspace_id', Auth::user()->current_workspace)
                ->orderBy('created_at', 'desc')
                ->first();
            $getNumber = 0;
            if ($lastInvoice) {
                $pattern = '/PXK(\d+)-/';
                preg_match($pattern, $lastInvoice->invoice_number, $matches);
                $getNumber = isset($matches[1]) ? $matches[1] : 0;
            }
            $newInvoiceNumber = $getNumber + 1;
            $countFormattedInvoice = str_pad($newInvoiceNumber, 2, '0', STR_PAD_LEFT);
            $invoicenumber = "PXK{$countFormattedInvoice}-{$currentDate}";

            $result = [
                'guest' => $guest,
                'count' => $countFormatted,
                'key' => $guest->key,
                'date' => $currentDate,
                'resultNumber' => $invoicenumber1,
                'code_delivery' => $invoicenumber,
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
                    'user_id' => Auth::user()->id,
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
                        'user_id' => Auth::user()->id,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];

                    $newRepresentId = DB::table('represent_guest')->insertGetId($dataRepresent);
                } else {
                    $newRepresentId = null;
                }

                $currentDate = Carbon::now()->format('dmy');
                $lastDetailImport = DetailExport::where('workspace_id', Auth::user()->current_workspace)
                    ->orderBy('created_at', 'desc')
                    ->first();
                $getNumber = 0;
                if ($lastDetailImport) {
                    $pattern = '/PBH(\d+)-/';
                    preg_match($pattern, $lastDetailImport->quotation_number, $matches);
                    $getNumber = isset($matches[1]) ? $matches[1] : 0;
                }
                $newInvoiceNumber = $getNumber + 1;
                $countFormattedInvoice = str_pad($newInvoiceNumber, 2, '0', STR_PAD_LEFT);
                $Detail = "PBH{$countFormattedInvoice}-{$currentDate}";

                $response = [
                    'success' => true,
                    'msg' => 'Thêm mới khách hàng thành công',
                    'resultNumber' => $Detail,
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
                'user_id' => Auth::user()->id,
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

        // Lấy sản phẩm với điều kiện
        $product = Products::leftJoin('productwarehouse', 'productwarehouse.product_id', 'products.id')
            ->where('products.id', $data['idProduct'])
            ->where('productwarehouse.warehouse_id', $data['warehouse_id'])
            ->select('products.*', 'productwarehouse.qty as product_inventory')
            ->first();
        if (!$product) {
            $product = Products::where('id', $data['idProduct'])
                ->select('products.*')
                ->first();

            if ($product) {
                $product->product_inventory = 0;
            }
        }

        return $product;
    }

    public function getInventWH(Request $request)
    {
        $data = $request->all();
        $productWH = ProductWarehouse::where('product_id', $data['idProduct'])
            ->where('warehouse_id', $data['warehouse_id'])->select('productwarehouse.*', 'productwarehouse.qty as product_inventory')
            ->first();
        return $productWH;
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
        if (isset($data['quotenumber']) && $data['quotenumber'] !== null) {
            $filters[] = ['value' => 'Số báo giá: ' . count($data['quotenumber']) . ' số báo giá', 'name' => 'quotenumber', 'icon' => 'po'];
        }
        if (isset($data['guests']) && $data['guests'] !== null) {
            $filters[] = ['value' => 'Khách hàng: ' . $data['guests'], 'name' => 'guests', 'icon' => 'user'];
        }
        if (isset($data['reference_number']) && $data['reference_number'] !== null) {
            $filters[] = ['value' => 'Số tham chiếu: ' . $data['reference_number'], 'name' => 'reference_number', 'icon' => 'po'];
        }
        if (isset($data['users']) && $data['users'] !== null) {
            $users = $this->users->getNameUser($data['users']);
            $userstring = implode(', ', $users);
            $filters[] = ['value' => 'Người tạo: ' . count($data['users']) . ' người tạo', 'name' => 'users', 'icon' => 'user'];
        }
        if (isset($data['date']) && $data['date'][1] !== null) {
            $date_start = date("d/m/Y", strtotime($data['date'][0]));
            $date_end = date("d/m/Y", strtotime($data['date'][1]));
            $filters[] = ['value' => 'Ngày báo giá: từ ' . $date_start . ' đến ' . $date_end, 'name' => 'date', 'icon' => 'date'];
        }
        $statusText = '';
        if (isset($data['status']) && $data['status'] !== null) {
            $statusValues = [];
            if (in_array(1, $data['status'])) {
                $statusValues[] = '<span style="color: #858585;">Draft</span>';
            }
            if (in_array(2, $data['status'])) {
                $statusValues[] = '<span style="color: #E8B600;">Approve</span>';
            }
            if (in_array(3, $data['status'])) {
                $statusValues[] = '<span style="color: #08AA36BF;">Close</span>';
            }
            $statusText = implode(', ', $statusValues);
            $filters[] = ['value' => 'Trạng thái: ' . $statusText, 'name' => 'status', 'icon' => 'status'];
        }
        $statusTextReceive = '';
        if (isset($data['receive']) && $data['receive'] !== null) {
            $statusValues = [];
            if (in_array(1, $data['receive'])) {
                $statusValues[] = '<span style="color: #858585;">Chưa giao</span>';
            }
            if (in_array(2, $data['receive'])) {
                $statusValues[] = '<span style="color: #08AA36BF;">Đã giao</span>';
            }
            if (in_array(3, $data['receive'])) {
                $statusValues[] = '<span style="color: #E8B600;">Một phần</span>';
            }
            $statusTextReceive = implode(', ', $statusValues);
            $filters[] = ['value' => 'Giao hàng: ' . $statusTextReceive, 'name' => 'receive', 'icon' => 'status'];
        }
        $statusTextReceipt = '';
        if (isset($data['reciept']) && $data['reciept'] !== null) {
            $statusValues = [];
            if (in_array(1, $data['reciept'])) {
                $statusValues[] = '<span style="color: #858585;">Chưa tạo</span>';
            }
            if (in_array(2, $data['reciept'])) {
                $statusValues[] = '<span style="color: #08AA36BF;">Chính thức</span>';
            }
            if (in_array(3, $data['reciept'])) {
                $statusValues[] = '<span style="color: #E8B600;">Một phần</span>';
            }
            $statusTextReceipt = implode(', ', $statusValues);
            $filters[] = ['value' => 'Hoá đơn: ' . $statusTextReceipt, 'name' => 'reciept', 'icon' => 'status'];
        }
        $statusTextPay = '';
        if (isset($data['pay']) && $data['pay'] !== null) {
            $statusValues = [];
            if (in_array(1, $data['pay'])) {
                $statusValues[] = '<span style="color: #858585;">Chưa thanh toán</span>';
            }
            if (in_array(2, $data['pay'])) {
                $statusValues[] = '<span style="color: #08AA36BF;">Thanh toán đủ</span>';
            }
            if (in_array(3, $data['pay'])) {
                $statusValues[] = '<span style="color: #E8B600;">Một phần</span>';
            }
            $statusTextPay = implode(', ', $statusValues);
            $filters[] = ['value' => 'Thanh toán: ' . $statusTextPay, 'name' => 'pay'];
        }
        if (isset($data['total']) && $data['total'][1] !== null) {
            $filters[] = ['value' => 'Tổng tiền: ' . $data['total'][0] . ' ' . $data['total'][1], 'name' => 'total', 'icon' => 'money'];
        }
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
    public function getDataExport(Request $request)
    {
        $data = [];
        $detailExport = DetailExport::where('id', $request->id)->first();
        $idLast = 0;
        if ($detailExport) {
            $quoteExport = QuoteExport::where('detailexport_id', $detailExport->id)
                ->where('workspace_id', Auth::user()->current_workspace)
                ->where('status', 1)
                ->get();
            if ($quoteExport) {
                foreach ($quoteExport as $qt) {
                    if ($request->type == "receive") {
                        if ($qt->qty_delivery != 0) {
                            $data['status'] = false;
                            $data['msg'] = "Đơn giao hàng đã được tạo";
                            break;
                        } else {
                            $delivery = DetailExport::leftJoin('quoteexport', 'quoteexport.detailexport_id', 'detailexport.id')
                                ->where('detailexport.workspace_id', Auth::user()->current_workspace)
                                ->leftJoin('products', 'products.id', 'quoteexport.product_id')
                                ->select('*', 'detailexport.id as maXuat', 'quoteexport.product_id as maSP', 'quoteexport.product_code as maCode', 'quoteexport.product_name as tenSP', 'quoteexport.product_tax as thueSP')
                                ->selectRaw('COALESCE(quoteexport.product_qty, 0) - COALESCE(quoteexport.qty_delivery, 0) as soLuongCanGiao')
                                ->leftJoin('serialnumber', function ($join) {
                                    $join->on('serialnumber.product_id', '=', 'products.id');
                                    $join->where('serialnumber.detailexport_id', 0);
                                })
                                ->where('detailexport.id', $request->id)
                                ->where('quoteexport.status', 1)
                                ->whereRaw('COALESCE(quoteexport.product_qty, 0) - COALESCE(quoteexport.qty_delivery, 0) > 0')
                                ->get();

                            // Group dữ liệu theo ID sản phẩm để có danh sách seri cho mỗi sản phẩm
                            $groupedDelivery = $delivery->groupBy('maSP');

                            // Xử lý dữ liệu để thêm danh sách seri vào mỗi sản phẩm
                            $processedDelivery = $groupedDelivery->map(function ($group) {
                                $product = $group->first();
                                $product['seri_pro'] = $group->pluck('serinumber')->toArray();
                                return $product;
                            });
                            $quoteExport = $processedDelivery;
                            $lastDeliveryId = DB::table('delivery')
                                ->where('delivery.workspace_id', Auth::user()->current_workspace)
                                ->max(DB::raw('CAST(SUBSTRING_INDEX(code_delivery, "-", -1) AS UNSIGNED)'));
                            $idLast =  $lastDeliveryId;
                            $data['status'] = true;
                        }
                    } else if ($request->type == "reciept") {
                        if ($qt->qty_bill_sale != 0) {
                            $data['status'] = false;
                            $data['msg'] = "Hóa đơn bán hàng đã được tạo";
                            break;
                        } else {
                            $billSale = DetailExport::leftJoin('quoteexport', 'quoteexport.detailexport_id', 'detailexport.id')
                                ->where('detailexport.id', $request->id)
                                ->where('quoteexport.status', 1)
                                ->where('detailexport.workspace_id', Auth::user()->current_workspace)
                                ->select('*')
                                ->where(function ($query) {
                                    $query->where('quoteexport.product_delivery', null)
                                        ->orWhere('quoteexport.product_delivery', 0);
                                })
                                ->selectRaw('COALESCE(quoteexport.product_qty, 0) - COALESCE(quoteexport.qty_bill_sale, 0) as soLuongHoaDon')
                                ->whereRaw('COALESCE(quoteexport.product_qty, 0) - COALESCE(quoteexport.qty_bill_sale, 0) > 0')
                                ->get();
                            $quoteExport = $billSale;
                            $lastDeliveryId = DB::table('bill_sale')
                                ->where('bill_sale.workspace_id', Auth::user()->current_workspace)
                                ->max(DB::raw('CAST(SUBSTRING_INDEX(number_bill, "-", -1) AS UNSIGNED)'));
                            $idLast =  $lastDeliveryId;
                            $data['status'] = true;
                        }
                    } else if ($request->type == "payorder") {
                        if ($qt->qty_payment != 0) {
                            $data['thanhToan'] = 1;
                        }
                        $payExport = DetailExport::where('detailexport.id', $request->id)
                            ->where('detailexport.workspace_id', Auth::user()->current_workspace)
                            ->leftJoin('quoteexport', 'quoteexport.detailexport_id', 'detailexport.id')
                            ->leftJoin('pay_export', 'pay_export.detailexport_id', 'detailexport.id')
                            ->select(
                                'detailexport.id',
                                'detailexport.guest_id',
                                'detailexport.guest_name',
                                'detailexport.quotation_number',
                                'detailexport.represent_name',
                                'pay_export.id as payTT',
                                DB::raw('(COALESCE(detailexport.total_price, 0) + COALESCE(detailexport.total_tax, 0)) as tongTienNo'),
                            )
                            ->groupBy(
                                'detailexport.id',
                                'detailexport.guest_id',
                                'detailexport.guest_name',
                                'detailexport.total_price',
                                'detailexport.total_tax',
                                'detailexport.quotation_number',
                                'detailexport.represent_name',
                                'pay_export.id',
                            )
                            ->first();
                        $tongThanhToan = PayExport::where('detailexport_id', $payExport->id)
                            ->where('pay_export.workspace_id', Auth::user()->current_workspace)
                            ->first();
                        $lastPayExportId = DB::table('pay_export')
                            ->where('pay_export.workspace_id', Auth::user()->current_workspace)
                            ->max(DB::raw('CAST(SUBSTRING_INDEX(code_payment, "-", -1) AS UNSIGNED)'));
                        $idLast =  $lastPayExportId;
                        $data['status'] = true;
                        $data['tongTienNo'] = $payExport->tongTienNo;
                        if ($tongThanhToan) {
                            $data['tongThanhToan'] = $tongThanhToan->payment;
                        } else {
                            $data['tongThanhToan'] = 0;
                        }
                        $data['payTT'] = $payExport->payTT;
                    }
                }
                $data['product'] = $quoteExport;
                $data['quotation_number'] = $detailExport->quotation_number;
                $data['guest_name'] = $detailExport->guest_name;
                $data['guest_id'] = $detailExport->guest_id;
                $data['lastDeliveryId'] = $idLast == null ? 0 : $idLast;
            }
        }
        return $data;
    }
    public function getListExport(Request $request)
    {
        $data = [];
        $detailExport = DetailExport::where('id', $request->id)->first();
        if ($detailExport) {
            $checkReciept = BillSale::where('detailexport_id', $detailExport->id)
                ->where('bill_sale.workspace_id', Auth::user()->current_workspace)
                ->first();
            $checkReceive = Delivery::where('detailexport_id', $detailExport->id)
                ->where('delivery.workspace_id', Auth::user()->current_workspace)
                ->first();
            $checkPayment = PayExport::where('detailexport_id', $detailExport->id)
                ->where('pay_export.workspace_id', Auth::user()->current_workspace)
                ->first();
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
                    $data['title_payment'] = "Thanh toán bán hàng";
                }
            }
        }
        return $data;
    }
}
