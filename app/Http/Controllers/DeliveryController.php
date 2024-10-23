<?php

namespace App\Http\Controllers;

use App\Models\Attachment;
use App\Models\CashReceipt;
use App\Models\Delivered;
use App\Models\Delivery;
use App\Models\DetailExport;
use App\Models\Guest;
use App\Models\History;
use App\Models\productBill;
use App\Models\productPay;
use App\Models\Products;
use App\Models\QuoteExport;
use App\Models\ReturnExport;
use App\Models\Serialnumber;
use App\Models\User;
use App\Models\userFlow;
use App\Models\Workspace;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DeliveryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $delivery;
    private $users;
    private $product;
    private $delivered;
    private $detailExport;
    private $workspaces;
    private $history;
    private $attachment;
    private $userFlow;
    private $guest;

    public function __construct()
    {
        $this->delivery = new Delivery();
        $this->product = new Products();
        $this->delivered = new Delivered();
        $this->detailExport = new DetailExport();
        $this->workspaces = new Workspace();
        $this->history = new History();
        $this->attachment = new Attachment();
        $this->userFlow = new userFlow();
        $this->users = new User();
        $this->guest = new Guest();
    }
    public function index()
    {
        if (Auth::check()) {
            $title = 'Phiếu xuất kho';
            $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
            $workspacename = $workspacename->workspace_name;
            $users = $this->delivery->getUserInDelivery();
            $deliveries = Delivery::leftJoin('detailexport', 'detailexport.id', 'delivery.detailexport_id')
                ->leftJoin('guest', 'guest.id', 'delivery.guest_id')
                ->select(
                    'delivery.id',
                    'delivery.guest_id',
                    'delivery.quotation_number',
                    'delivery.code_delivery',
                    'delivery.shipping_unit',
                    'delivery.shipping_fee',
                    'delivery.id as maGiaoHang',
                    'delivery.created_at as ngayGiao',
                    'delivery.status as trangThai',
                    'users.name',
                    'detailexport.guest_name',
                    'delivery.promotion',
                    'guest.guest_name_display as nameGuest',
                    'delivery.totalVAT as totalVAT',
                    DB::raw('(
                        SELECT 
                            CASE 
                                WHEN JSON_UNQUOTE(JSON_EXTRACT(delivery.promotion, "$.value")) != 0 THEN 
                                    CASE 
                                        WHEN JSON_UNQUOTE(JSON_EXTRACT(delivery.promotion, "$.type")) = 1 THEN 
                                            (COALESCE(SUM(product_total_vat), 0) - CAST(JSON_UNQUOTE(JSON_EXTRACT(delivery.promotion, "$.value")) AS DECIMAL)) * (1 + (COALESCE(MAX(products.product_tax), 0) / 100)) -- Giảm số tiền trực tiếp và áp dụng thuế
                                        WHEN JSON_UNQUOTE(JSON_EXTRACT(delivery.promotion, "$.type")) = 2 THEN 
                                            ((COALESCE(SUM(product_total_vat), 0) * (100 - CAST(JSON_UNQUOTE(JSON_EXTRACT(delivery.promotion, "$.value")) AS DECIMAL)) / 100)) * (1 + (COALESCE(MAX(products.product_tax), 0) / 100)) -- Giảm phần trăm trên tổng giá trị sản phẩm và áp dụng thuế
                                        ELSE 
                                            COALESCE(SUM(product_total_vat), 0) -- Không có khuyến mãi
                                    END
                                ELSE
                                    COALESCE(SUM(product_total_vat), 0) -- Giá trị ban đầu nếu $.value = 0
                            END
                        FROM delivered 
                        LEFT JOIN products ON delivered.product_id = products.id
                        WHERE delivered.delivery_id = delivery.id
                    ) as totalProductVat')
                )
                ->leftJoin('users', 'users.id', 'delivery.user_id')
                ->where('delivery.workspace_id', Auth::user()->current_workspace)
                ->groupBy(
                    'delivery.id',
                    'delivery.guest_id',
                    'delivery.quotation_number',
                    'delivery.code_delivery',
                    'delivery.shipping_unit',
                    'delivery.shipping_fee',
                    'users.name',
                    'delivery.created_at',
                    'delivery.status',
                    'detailexport.guest_name',
                    'delivery.totalVAT',
                    'guest.guest_name_display',
                    'delivery.promotion',
                )
                ->orderBy('delivery.id', 'desc');
            if (Auth::check()) {
                if (Auth::user()->getRoleUser->roleid == 4) {
                    $deliveries->where('delivery.user_id', Auth::user()->id);
                }
            }
            $deliveries = $deliveries->get();
            return view('tables.export.delivery.list-delivery', compact('title', 'deliveries', 'users', 'workspacename'));
        } else {
            return redirect()->back()->with('warning', 'Vui lòng đăng nhập!');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {

        $queryParams = $request->query();
        $convert = $queryParams['convert'] ?? null;
        $title = "Tạo phiếu xuất kho";
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;
        $numberQuote = DetailExport::leftJoin('quoteexport', 'detailexport.id', '=', 'quoteexport.detailexport_id')
            ->where('quoteexport.status', 1)
            ->where('quoteexport.product_qty', '>', DB::raw('COALESCE(quoteexport.qty_delivery,0)'))
            ->where('detailexport.workspace_id', Auth::user()->current_workspace)
            ->select('detailexport.quotation_number', 'detailexport.id')
            ->distinct()
            ->orderby('detailexport.id', 'DESC');
        if (Auth::check()) {
            if (Auth::user()->getRoleUser->roleid == 4) {
                $numberQuote->where('detailexport.user_id', Auth::user()->id);
            }
        }
        $numberQuote = $numberQuote->get();
        $product = $this->product->getAllProducts();
        $guest = $this->guest->getAllGuest();

        // Tạo DGH
        $currentDate = Carbon::now()->format('dmy');
        $lastInvoiceNumber =
            Delivery::where('workspace_id', Auth::user()->current_workspace)
            // ->whereDate('created_at', now())
            ->count() + 1;
        $lastInvoiceNumber = $lastInvoiceNumber !== null ? $lastInvoiceNumber : 1;
        $countFormattedInvoice = str_pad($lastInvoiceNumber, 2, '0', STR_PAD_LEFT);
        $invoicenumber = "PXK{$countFormattedInvoice}-{$currentDate}";
        $invoice = $invoicenumber;

        //
        $listDetail = $this->delivery->listDelivery();
        //danh sách nhân viên
        $users = User::all();
        return view('tables.export.delivery.create-delivery', compact('title', 'users', 'convert', 'guest', 'invoice', 'numberQuote', 'product', 'workspacename', 'listDetail'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(string $workspace, Request $request)
    {
        if ($request->action == 1) {
            $delivery_id = $this->delivery->addDelivery($request->all());
            $this->delivered->addDelivered($request->all(), $delivery_id);
            $arrLuuNhap = [
                'name' => 'GH',
                'des' => 'Lưu nháp'
            ];
            $this->userFlow->addUserFlow($arrLuuNhap);
            if ($request->pdf_export == 1) {
                // Sau khi lưu xong tất cả thông tin, set session export_id
                $request->session()->put('pdf_info1.delivery_id', $delivery_id);
            }
            if ($request->redirect == "delivery") {
                return redirect()->route('detailExport.index', ['workspace' => $workspace])->with('msg', ' Tạo mới đơn giao hàng thành công !');
            } else {
                return redirect()->route('delivery.index', ['workspace' => $workspace])->with('msg', ' Tạo mới đơn giao hàng thành công !');
            }
        }
        if ($request->action == 2) {
            $this->delivery->acceptDelivery($request->all());
            $arrLuuNhap = [
                'name' => 'GH',
                'des' => 'Giao hàng'
            ];
            $this->userFlow->addUserFlow($arrLuuNhap);
            if ($request->redirect == "delivery") {
                return redirect()->route('detailExport.index', ['workspace' => $workspace])->with('msg', 'Xác nhận đơn giao hàng thành công!');
            } else {
                return redirect()->route('delivery.index', ['workspace' => $workspace])->with('msg', 'Xác nhận đơn giao hàng thành công!');
            }
        }
    }

    public function downloadPdf()
    {
        // Kiểm tra xem có session export_id không
        $exportId = session('pdf_info1.delivery_id');

        if ($exportId) {
            // Xóa session delivery_id trước khi tạo và trả về PDF
            session()->forget('pdf_info1.delivery_id');

            // Tạo PDF từ dữ liệu và xuất nó
            $delivery = $this->delivery->getDeliveryToId($exportId);
            $product = $this->delivery->getProductToId($exportId);
            $serinumber = Serialnumber::leftJoin('delivery', 'delivery.detailexport_id', 'serialnumber.detailexport_id')
                ->where('delivery.id', $exportId)
                ->where('serialnumber.delivery_id', $exportId)
                ->select('*', 'serialnumber.id as idSeri')
                ->get();
            $bg = url('dist/img/logo-2050x480-1.png');
            $workspace = Workspace::where('id', Auth::user()->current_workspace)->first();
            $data = [
                'delivery' => $delivery,
                'product' => $product,
                'serinumber' => $serinumber,
                'workspace' => $workspace,
                'date' => $delivery->ngayGiao,
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
            return $pdf->download('delivery.pdf');
        } else {
            // Nếu không có session export_id, chuyển hướng hoặc xử lý theo nhu cầu của bạn
            return redirect()->back()->with('error', 'Không có PDF để tải xuống.');
        }
    }

    public function clearPdfSession()
    {
        // Xóa session pdf_info.export_id
        session()->forget('pdf_info1.delivery_id');

        // Trả về phản hồi JSON để xác nhận rằng session đã được xóa
        return response()->json(['success' => true]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Delivery $delivery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Delivery $delivery)
    {
        //
    }

    public function watchDelivery(string $workspace, string $id)
    {
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;
        $title = 'Chỉnh sửa phiếu xuất kho';
        $delivery = $this->delivery->getDeliveryToId($id);
        if (!$delivery) {
            abort('404');
        }
        $product = $this->delivery->getProductToId($id);
        $serinumber = Serialnumber::leftJoin('delivery', 'delivery.detailexport_id', 'serialnumber.detailexport_id')
            ->where('delivery.id', $id)
            ->where('serialnumber.delivery_id', $id)
            ->select('*', 'serialnumber.id as idSeri')
            ->get();
        $quoteExport = $this->detailExport->getProductToId($delivery->detailexport_id);

        $listDetail = $this->delivery->listDelivery();
        $guest = $this->guest->getAllGuest();
        //danh sách nhân viên
        $users = User::all();
        return view('tables.export.delivery.watch-delivery', compact('title', 'quoteExport', 'delivery', 'product', 'serinumber', 'workspacename', 'listDetail', 'guest', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(string $workspace, Request $request, string $id)
    {
        if ($request->action == "action_1") {
            $delivery = Delivery::find($id);
            if ($delivery) {
                $delivery->update([
                    'status' => 2,
                ]);
                $this->delivery->updateDetailExport($request->all(), $delivery->detailexport_id);
                $arrCapNhatKH = [
                    'name' => 'GH',
                    'des' => 'Xác nhận'
                ];
                $this->userFlow->addUserFlow($arrCapNhatKH);
                return redirect()->route('delivery.index', ['workspace' => $workspace])->with('msg', 'Xác nhận đơn giao hàng thành công!');
            }
        }
        if ($request->action == "action_2") {
            $this->delivery->deleteDelivery($request->all(), $id);
            $table_id = $id;
            $table_name = 'GH';
            $this->attachment->deleteFileAll($table_id, $table_name);
            //
            $arrCapNhatKH = [
                'name' => 'GH',
                'des' => 'Xóa đơn giao hàng'
            ];
            $this->userFlow->addUserFlow($arrCapNhatKH);
            return redirect()->route('delivery.index', ['workspace' => $workspace])->with('msg', 'Xóa đơn giao hàng thành công!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $workspace, string $id)
    {
        $returnEx = ReturnExport::where('delivery_id', $id)->first();
        $cashReciept = CashReceipt::where('delivery_id', $id)->first();
        if (is_null($returnEx) && is_null($cashReciept)) {
            $this->delivery->deleteDeliveryItem($id);
            $table_id = $id;
            $table_name = 'GH';
            $this->attachment->deleteFileAll($table_id, $table_name);
            $arrCapNhatKH = [
                'name' => 'GH',
                'des' => 'Xóa đơn giao hàng'
            ];
            $this->userFlow->addUserFlow($arrCapNhatKH);
            return redirect()->route('delivery.index', ['workspace' => $workspace])->with('msg', 'Xóa đơn giao hàng thành công!');
        } else {
            $warningMessage = 'Không thể xóa đơn giao hàng vì: ';
            if (!is_null($returnEx)) {
                $warningMessage .= 'Đơn giao hàng liên kết với trả hàng. ';
            }
            if (!is_null($cashReciept)) {
                $warningMessage .= 'Đơn giao hàng liên kết với phiếu thu.';
            }
            return redirect()->route('delivery.index', ['workspace' => $workspace])->with('warning', $warningMessage);
        }
    }


    public function getInfoQuote(Request $request)
    {
        $data = $request->all();
        $delivery = DetailExport::where('detailexport.id', $data['idQuote'])
            ->where('detailexport.workspace_id', Auth::user()->current_workspace)
            ->leftJoin('guest', 'guest.id', 'detailexport.guest_id')
            // ->leftJoin('represent_guest', 'represent_guest.id', 'detailexport.represent_id')
            ->first();
        $lastDeliveryId = DB::table('delivery')
            ->where('delivery.workspace_id', Auth::user()->current_workspace)
            ->max(DB::raw('CAST(SUBSTRING_INDEX(code_delivery, "-", -1) AS UNSIGNED)'));
        $delivery['lastDeliveryId'] = $lastDeliveryId == null ? 0 : $lastDeliveryId;

        // Tạo DGH
        $currentDate = Carbon::now()->format('dmy');
        $lastInvoiceNumber =
            Delivery::where('workspace_id', Auth::user()->current_workspace)
            // ->whereDate('created_at', now())
            ->count() + 1;
        $lastInvoiceNumber = $lastInvoiceNumber !== null ? $lastInvoiceNumber : 1;
        $countFormattedInvoice = str_pad($lastInvoiceNumber, 2, '0', STR_PAD_LEFT);
        $invoicenumber = "PXK{$countFormattedInvoice}-{$currentDate}";
        $delivery['code_delivery '] = $invoicenumber;
        return $delivery;
    }

    public function getProductQuote(Request $request)
    {
        $data = $request->all();

        $delivery = DetailExport::leftJoin('quoteexport', 'quoteexport.detailexport_id', 'detailexport.id')
            ->where('detailexport.workspace_id', Auth::user()->current_workspace)
            ->leftJoin('products', 'products.id', 'quoteexport.product_id')
            ->leftJoin('productwarehouse', function ($join) {
                $join->on('productwarehouse.product_id', 'quoteexport.product_id')
                    ->on('productwarehouse.warehouse_id', 'quoteexport.warehouse_id');
            })
            ->leftJoin('warehouse', 'warehouse.id', 'productwarehouse.warehouse_id')
            ->select(
                '*',
                'detailexport.promotion as promotion_total',
                'detailexport.id as maXuat',
                'quoteexport.product_id as maSP',
                'quoteexport.product_code as maCode',
                'quoteexport.product_name as tenSP',
                'quoteexport.product_tax as thueSP',
                'quoteexport.product_unit as product_unit',
                'productwarehouse.qty as tonkho',
                'warehouse.warehouse_name as nameWH',
                'warehouse.id as idWH',
            )
            ->selectRaw('COALESCE(quoteexport.product_qty, 0) - COALESCE(quoteexport.qty_delivery, 0) as soLuongCanGiao')
            ->leftJoin('serialnumber', function ($join) {
                $join->on('serialnumber.product_id', '=', 'products.id');
                $join->where('serialnumber.detailexport_id', 0);
            })
            ->where('detailexport.id', $data['idQuote'])
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

        return $processedDelivery;
    }

    public function getProductFromQuote(Request $request)
    {
        try {
            $data = $request->all();
            $productQuery = Products::select('products.*', 'productwarehouse.qty as product_inventory', 'serialnumber.serinumber')
                ->leftJoin('productwarehouse', function ($join) use ($data) {
                    $join->on('productwarehouse.product_id', '=', 'products.id')
                        ->where('productwarehouse.warehouse_id', '=', $data['warehouse_id']);
                })
                ->leftJoin('serialnumber', function ($join) {
                    $join->on('products.id', '=', 'serialnumber.product_id')
                        ->where('serialnumber.detailexport_id', 0);
                })
                ->where('products.id', $data['idProduct']);

            // Check if there are products
            $products = $productQuery->get();

            // If no products found with the given warehouse_id, fetch without it
            if ($products->isEmpty()) {
                $products = Products::select('products.*', 'serialnumber.serinumber')
                    ->leftJoin('serialnumber', function ($join) {
                        $join->on('products.id', '=', 'serialnumber.product_id')
                            ->where('serialnumber.detailexport_id', 0);
                    })
                    ->where('products.id', $data['idProduct'])
                    ->get();

                // Add product_inventory = 0 for each product
                $products->each(function ($product) {
                    $product->product_inventory = 0;
                });
            }

            // Group dữ liệu theo ID sản phẩm để có danh sách seri cho mỗi sản phẩm
            $groupedDelivery = $products->groupBy('products.id');

            // Xử lý dữ liệu để thêm danh sách seri vào mỗi sản phẩm
            $processedDelivery = $groupedDelivery->map(function ($group) {
                $product = $group->first();
                // Check if there are serial numbers
                $serialNumbers = $group->pluck('serinumber')->toArray();
                $product['seri_pro'] = !empty($serialNumbers) ? $serialNumbers : [];

                return $product;
            })->values();

            return $processedDelivery;
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    public function checkCodeDelivery(Request $request)
    {
        $check = Delivery::where('code_delivery', $request['numberValue'])
            ->where('workspace_id', Auth::user()->current_workspace)
            ->first();

        if ($check) {
            $response = ['success' => false, 'msg' => 'Mã giao hàng đã tồn tại!'];
        } else {
            $response = ['success' => true];
        }

        return response()->json($response);
    }
    public function searchDelivery(Request $request)
    {
        $data = $request->all();
        $filters = [];
        if (isset($data['return_code']) && $data['return_code'] !== null) {
            $filters[] = ['value' => 'Mã phiếu: ' . $data['return_code'], 'name' => 'return_code', 'icon' => 'po'];
        }

        if (isset($data['guests']) && $data['guests'] !== null) {
            $filters[] = ['value' => 'Khách hàng: ' . $data['guests'], 'name' => 'guests', 'icon' => 'user'];
        }

        if (isset($data['status']) && $data['status'] !== null) {
            $statusValues = [];
            if (in_array(1, $data['status'])) {
                $statusValues[] = '<span style="color: #858585;">Nháp</span>';
            }
            if (in_array(2, $data['status'])) {
                $statusValues[] = '<span style="color: #08AA36BF;">Đã trả</span>';
            }
            $filters[] = ['value' => 'Trạng thái: ' . implode(', ', $statusValues), 'name' => 'status', 'icon' => 'status'];
        }

        if (isset($data['date']) && $data['date'][1] !== null) {
            $date_start = date("d/m/Y", strtotime($data['date'][0]));
            $date_end = date("d/m/Y", strtotime($data['date'][1]));
            $filters[] = ['value' => 'Ngày lập: từ ' . $date_start . ' đến ' . $date_end, 'name' => 'date', 'icon' => 'date'];
        }
        if ($request->ajax()) {
            $delivery = $this->delivery->ajax($data);
            return response()->json([
                'data' => $delivery,
                'filters' => $filters,
            ]);
        }
        return false;
    }
}
