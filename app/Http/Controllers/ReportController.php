<?php

namespace App\Http\Controllers;

use App\Models\CashReceipt;
use App\Models\ChangeWarehouse;
use App\Models\Commission;
use App\Models\ContentGroups;
use App\Models\ContentImportExport;
use App\Models\Delivered;
use App\Models\Delivery;
use App\Models\DetailExport;
use App\Models\DetailImport;
use App\Models\Fund;
use App\Models\Groups;
use App\Models\Guest;
use App\Models\History;
use App\Models\HistoryImport;
use App\Models\PayExport;
use App\Models\PayOder;
use App\Models\Products;
use App\Models\ProductImport;
use App\Models\ProductReturnExport;
use App\Models\Provides;
use App\Models\QuoteExport;
use App\Models\QuoteImport;
use App\Models\ReturnExport;
use App\Models\ReturnImport;
use App\Models\ReturnProduct;
use App\Models\User;
use App\Models\Workspace;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $payExport;
    private $payOrder;
    private $guest;
    private $provide;
    private $detailExport;
    private $detailImport;
    private $workspaces;
    private $delivery;
    private $product_returnE;
    private $product_returnI;
    private $returnExport;
    private $returnImport;
    private $delivered;
    private $history;
    private $quoteE;
    private $quoteI;
    private $cash_rc;
    private $content;
    private $product;
    private $fund;
    public function __construct()
    {
        $this->payExport = new PayExport();
        $this->payOrder = new PayOder();
        $this->guest = new Guest();
        $this->provide = new Provides();
        $this->detailExport = new DetailExport();
        $this->detailImport = new DetailImport();
        $this->workspaces = new Workspace();
        $this->delivery = new Delivery();
        $this->delivered = new Delivered();
        $this->product_returnE = new ProductReturnExport();
        $this->product_returnI = new ReturnProduct();
        $this->returnExport = new ReturnExport();
        $this->returnImport = new ReturnImport();
        $this->history = new History();
        $this->quoteE = new QuoteExport();
        $this->quoteI = new QuoteImport();
        $this->cash_rc = new CashReceipt();
        $this->content = new ContentImportExport();
        $this->fund = new Fund();
        $this->product = new Products();
    }
    public function index()
    {
        $title = 'Báo cáo';
        $guests = $this->payExport->guestStatistics();
        $provides = $this->payOrder->provideStatistics();

        //Top 5 doanh số
        $labels = [];
        $data = [];
        $payExportTop5 = $this->payExport->guestdoanhThuTop5();
        foreach ($payExportTop5 as $guest) {
            $labels[] = $guest->guest_name;
            $data[] = $guest->sumSell;
        }
        // Chuyển mảng labels và data thành chuỗi JSON để truyền vào biểu đồ JavaScript
        $labels = json_encode($labels);
        $data = json_encode($data);
        //Công ty còn dư nợ
        $labels1 = [];
        $data1 = [];
        $payExportDebt = $this->payExport->getCompaniesWithDebt();
        foreach ($payExportDebt as $guest) {
            $labels1[] = $guest->guest_name;
            $data1[] = $guest->sumAmountOwed;
        }
        $labels1 = json_encode($labels1);
        $data1 = json_encode($data1);

        //Tổng số đơn hàng
        $detailExport = DetailExport::whereIn('detailexport.status', [3, 2])
            ->where('detailexport.workspace_id', Auth::user()->current_workspace)
            ->count();
        $detailImport = DetailImport::whereIn('detailimport.status', [3, 2])
            ->where('detailimport.workspace_id', Auth::user()->current_workspace)
            ->count();
        $detailExport = json_encode($detailExport);
        $detailImport = json_encode($detailImport);
        //Dư nợ mua hàng
        $labels3 = [];
        $data3 = [];
        $payOrderDebt = $this->payOrder->getProvidersWithDebt();
        foreach ($payOrderDebt as $guest) {
            $labels3[] = $guest->provide_name;
            $data3[] = $guest->totalDebt;
        }
        $labels3 = json_encode($labels3);
        $data3 = json_encode($data3);

        //Tổng doanh thu theo quý
        $revenueByQuarter = DB::table('bill_sale')
            ->select(
                DB::raw('YEAR(created_at) AS year'),
                DB::raw('QUARTER(created_at) AS quarter'),
                DB::raw('SUM(price_total) AS total_revenue')
            )
            ->where('status', 2)
            ->whereYear('created_at', date('Y')) // Lọc theo năm hiện tại
            ->groupBy('year', 'quarter')
            ->orderBy('year')
            ->orderBy('quarter')
            ->get();
        // Công nợ nhà cung cấp
        $provide = Provides::where('workspace_id', Auth::user()->current_workspace)->get();

        //Thống kê xuất nhập tồn kho
        // Lấy tổng số lượng quoteimport và quoteexport theo product_id
        $quoteExportQty = DB::table('quoteexport')
            // ->leftJoin('detailexport', 'quoteexport.detailexport_id', '=', 'detailexport.id')
            ->select('quoteexport.product_id', DB::raw('SUM(quoteexport.product_qty) as totalExportQty'))
            // ->whereNotIn('detailexport.status_receive', [0, 1])
            ->groupBy('quoteexport.product_id')
            ->get()
            ->keyBy('product_id');

        $totalQuantities = DB::table('quoteimport')
            ->leftJoin('detailimport', 'quoteimport.detailimport_id', '=', 'detailimport.id')
            ->leftJoin('products', 'products.id', '=', 'quoteimport.product_id')
            ->whereNotIn('detailimport.status_receive', [0, 1])
            ->select(
                'quoteimport.product_id',
                'quoteimport.product_code',
                'quoteimport.product_name',
                'quoteimport.product_unit',
                'products.product_inventory',
                DB::raw('SUM(quoteimport.product_qty) as totalImportQty')
            )
            ->groupBy('quoteimport.product_id', 'quoteimport.product_code', 'quoteimport.product_name', 'quoteimport.product_unit', 'products.product_inventory')
            ->get();

        $htrImport = [];

        foreach ($totalQuantities as $quantity) {
            $productId = $quantity->product_id;
            $totalImportQty = $quantity->totalImportQty;
            $totalExportQty = isset($quoteExportQty[$productId]) ? $quoteExportQty[$productId]->totalExportQty : 0;

            $quoteImports = DB::table('quoteimport')
                ->where('product_id', $productId)
                ->orderBy('id', 'asc') // Sắp xếp theo thứ tự nhập
                ->get();

            $remainingExportQty = $totalExportQty;
            $totalCost = 0;
            $remainingQty = 0;

            foreach ($quoteImports as $import) {
                if ($remainingExportQty <= 0) {
                    $remainingQty += $import->product_qty;
                    $totalCost += $import->product_qty * $import->price_export;
                    continue;
                }

                if ($import->product_qty <= $remainingExportQty) {
                    $remainingExportQty -= $import->product_qty;
                } else {
                    $remainingQty += ($import->product_qty - $remainingExportQty);
                    $totalCost += ($import->product_qty - $remainingExportQty) * $import->price_export;
                    $remainingExportQty = 0;
                }
            }

            $giaTon = $remainingQty > 0 ? $totalCost : null;

            $htrImport[] = [
                'product_code' => $quantity->product_code,
                'product_name' => $quantity->product_name,
                'product_unit' => $quantity->product_unit,
                'product_inventory' => $quantity->product_inventory,
                'slNhap' => $totalImportQty,
                'slXuat' => $totalExportQty,
                'giaTon' => $giaTon
            ];
        }

        // $htrImport = DB::table('history_import')
        // ->leftJoin('quoteexport', 'quoteexport.product_id', '=', 'history_import.product_id')
        // ->leftJoin('delivery', 'delivery.ids', '=', 'quoteexport.deliver_id')
        // ->leftJoin('delivered', function($join) {
        //     $join->on('delivered.delivery_id', '=', 'delivery.id')
        //          ->on('delivered.product_id', '=', 'quoteexport.product_id');
        // })
        // ->where('quoteexport.workspace_id', Auth::user()->current_workspace)
        // ->select('history_import.*', 'delivered.deliver_qty as qty_export', 'delivered.price_export as giaban')
        // ->get();
        // $htrImport = HistoryImport::where('workspace_id', Auth::user()->current_workspace)->get();

        // $htrImport = History::where('workspace_id', Auth::user()->current_workspace)->get();

        // $htrImport = DB::table('history_import')
        //     ->where('history_import.workspace_id', Auth::user()->current_workspace)
        //     ->leftJoin('delivered', 'delivered.product_id', '=', 'history_import.product_id')
        //     ->leftJoin('products', 'products.id', '=', 'delivered.product_id')
        //     ->select(
        //         'products.product_name as product_name',
        //         'products.product_code as product_code',
        //         'products.product_unit as product_unit',
        //         'products.product_inventory as product_inventory',
        //         'history_import.product_id',
        //         DB::raw('SUM(delivered.deliver_qty) as total_quantity'),
        //         'history_import.product_total as giavon',
        //         'history_import.price_export as gianhap'
        //     )
        //     ->groupBy(
        //         'history_import.product_id',
        //         'history_import.product_total',
        //         'history_import.price_export',
        //         'products.product_name',
        //         'products.product_code',
        //         'products.product_unit',
        //         'products.product_inventory'
        //     )
        //     ->get();
        // dd($htrImport);
        // ->unique('id')
        // $detailE = DB::table('detailexport')->where('workspace_id', Auth::user()->current_workspace)
        // ->get();
        // dd($htrImport);
        $detailE = DetailExport::where('workspace_id', Auth::user()->current_workspace)->get();
        $quoteexport = Delivered::leftJoin('history_import', 'delivered.product_id', 'history_import.product_id')
            ->leftJoin('products', 'products.id', 'delivered.product_id')
            ->leftJoin('delivery', 'delivery.id', 'delivered.delivery_id')
            ->leftJoin('detailexport', 'detailexport.id', 'delivery.detailexport_id')
            ->select(
                'history_import.*',
                'products.*',
                'detailexport.quotation_number as donhang',
                'delivered.deliver_qty as slban',
                'delivered.price_export as dongiaban',
                'delivered.product_total_vat as tongban',
                'history_import.price_export as dongia',
                // 'quoteexport.*'
            )
            ->where('delivered.workspace_id', Auth::user()->current_workspace)
            ->get();
        // dd($quoteexport);
        // $detailE = DetailExport::where('workspace_id',Auth::user()->current_workspace)->get();
        $guest = Guest::where('workspace_id', Auth::user()->current_workspace)->get();
        // $quoteexport = QuoteExport::where('workspace_id', Auth::user()->current_workspace)->get();
        $countImport = QuoteImport::where('workspace_id', Auth::user()->current_workspace)->get();
        $dataImport = DetailImport::where('workspace_id', Auth::user()->current_workspace)->get();
        // Đơn đặt hàng
        $dondathang = HistoryImport::where('workspace_id', Auth::user()->current_workspace)->orderBy('id', 'desc')->get();
        // TK bán hàng
        $tkbanhang = Delivered::leftJoin('delivery', 'delivered.delivery_id', 'delivery.id')
            ->leftJoin('guest', 'guest.id', 'delivery.guest_id')
            ->leftJoin('detailexport', 'detailexport.id', 'delivery.detailexport_id')
            ->leftJoin('products', 'products.id', 'delivered.product_id')
            ->select('products.*', 'detailexport.*', 'delivery.*', 'guest.*', 'delivered.*')
            ->orderBy('delivered.id', 'desc')
            ->where('delivered.workspace_id', Auth::user()->current_workspace)->get();
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;
        $quoteExport = $this->detailExport->getAllDetailExport();
        // TK giao hàng
        $deliveries = Delivery::leftJoin('detailexport', 'detailexport.id', 'delivery.detailexport_id')
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
                DB::raw('(SELECT COALESCE(SUM(product_total_vat), 0) FROM delivered WHERE delivery_id = delivery.id) as totalProductVat')
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
                'detailexport.guest_name'
            )
            ->orderBy('delivery.id', 'desc')
            ->get();
        // TK DOANH số
        // giá vốn bán hàng
        $tonggiavon = PayExport::where('pay_export.workspace_id', Auth::user()->current_workspace)
            ->leftJoin('product_pay', 'product_pay.pay_id', 'pay_export.id')
            ->leftJoin('history_import', 'product_pay.product_id', 'history_import.product_id')
            ->select(DB::raw('SUM(history_import.price_export * product_pay.pay_qty) as tonggiavon'))
            ->value('tonggiavon');

        $totalSales = PayExport::sum('debt');
        $doanhso = PayExport::sum('total');

        // Khách hàng còn nợ






        // Chuyển tiền nội bộ
        $content = ContentImportExport::where('workspace_id', Auth::user()->current_workspace)->get();


        // Lấy tất cả nội dung chi
        $contetnType = ContentGroups::where('contenttype_id', 2)
            ->where('workspace_id', Auth::user()->current_workspace)->get();
        $listIDContent = [];
        foreach ($contetnType as $va) {
            array_push($listIDContent, $va->id);
        }

        // Tổng hợp nội dung thu chi
        $contentImport = PayOder::whereIn('content_pay', $listIDContent)
            ->where('workspace_id', Auth::user()->current_workspace)
            ->select('id', 'payment_code', 'workspace_id', 'total', 'payment_date', 'content_pay', 'guest_id', 'fund_id', 'note')
            ->orderBy('content_pay', 'asc')
            ->get();

        $contetnType1 = ContentGroups::where('contenttype_id', 1)
            ->where('workspace_id', Auth::user()->current_workspace)->get();
        $listIDContent1 = [];
        foreach ($contetnType1 as $va) {
            array_push($listIDContent1, $va->id);
        }


        $contentExport = CashReceipt::whereIn('content_id', $listIDContent1)
            ->where('workspace_id', Auth::user()->current_workspace)
            ->select('id', 'receipt_code', 'workspace_id', 'amount', 'date_created', 'content_id', 'guest_id', 'fund_id', 'note')
            ->orderBy('content_id', 'asc')
            ->get();

        // Trả hàng NCC
        $returnImport = ReturnImport::where('workspace_id', Auth::user()->current_workspace)->get();

        // thu chi tồn quỹ
        $inventoryDebt = Fund::where('workspace_id', Auth::user()->current_workspace)->get();


        // Phiếu chuyển kho
        $changeWarehouse = ChangeWarehouse::where('workspace_id', Auth::user()->current_workspace)->get();

        // dd($doanhso);
        return view('report.index', compact(
            'title',
            'guests',
            'provides',
            'labels',
            'data',
            'labels1',
            'data1',
            'labels3',
            'data3',
            'detailExport',
            'detailImport',
            'revenueByQuarter',
            'provide',
            'htrImport',
            'quoteexport',
            'guest',
            'countImport',
            'workspacename',
            'dataImport',
            'doanhso',
            'tkbanhang',
            'deliveries',
            'quoteExport',
            'tonggiavon',
            'totalSales',
            'dondathang',
            'content',
            'contentImport',
            'returnImport',
            'contentExport',
            'inventoryDebt',
            'changeWarehouse'
        ));
    }
    public function view()
    {
        $title = 'Báo cáo';
        $guests = $this->payExport->guestStatistics();
        $provides = $this->payOrder->provideStatistics();
        // dd($guests, $provides);
        return view('report.index1', compact('title', 'guests', 'provides'));
    }

    // Tổng kết giao hàng báo cáo
    public function viewReportDelivery()
    {
        $title = 'Báo cáo tổng kết giao hàng';
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;
        $sumDelivery = $this->delivery->getSumDelivery();
        return view('report.sumDelivery', compact('title', 'sumDelivery', 'workspacename'));
    }
    // Ajax tổng kết giao hàng
    public function searchRPDelivery(Request $request)
    {
        $data = $request->all();
        $filters = [];
        if (isset($data['date']) && $data['date'][1] !== null) {
            $date_start = date("d/m/Y", strtotime($data['date'][0]));
            $date_end = date("d/m/Y", strtotime($data['date'][1]));
            $filters[] = ['value' => 'Ngày báo giá: từ ' . $date_start . ' đến ' . $date_end, 'name' => 'date', 'icon' => 'date'];
        }
        if (isset($data['maphieu']) && !empty($data['maphieu'])) {
            $filters[] = ['value' => 'Mã phiếu: ' . $data['maphieu'], 'name' => 'maphieu', 'icon' => 'document'];
        }
        if (isset($data['customers']) && !empty($data['customers'])) {
            $filters[] = ['value' => 'Tên khách hàng: ' . $data['customers'], 'name' => 'customers', 'icon' => 'user'];
        }
        if (isset($data['delivery_date']) && $data['delivery_date'][1] !== null) {
            $delivery_start = date("d/m/Y", strtotime($data['delivery_date'][0]));
            $delivery_end = date("d/m/Y", strtotime($data['delivery_date'][1]));
            $filters[] = ['value' => 'Ngày giao hàng: từ ' . $delivery_start . ' đến ' . $delivery_end, 'name' => 'delivery_date', 'icon' => 'calendar'];
        }
        if (isset($data['status']) && !empty($data['status'])) {
            $statusValues = [];
            if (in_array(1, $data['status'])) {
                $statusValues[] = '<span style="color: #858585;">Nháp</span>';
            }
            if (in_array(2, $data['status'])) {
                $statusValues[] = '<span style="color: #08AA36BF;">Đã giao</span>';
            }
            $statusText = implode(', ', $statusValues);
            $filters[] = ['value' => 'Trạng thái giao: ' . $statusText, 'name' => 'status', 'icon' => 'status'];
        }
        if ($request->ajax()) {
            $sumDelivery = $this->delivery->AjaxGetSumDelivery($data);
            return response()->json([
                'data' => $sumDelivery,
                'filters' => $filters,
            ]);
        }
        return false;
    }
    // Tổng kết khách trả hàng
    public function viewReportSumReturnExport()
    {
        $title = 'Báo cáo tổng kết khách trả hàng';
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;
        $sumReturnExport = $this->product_returnE->sumReturnExport();
        $allReturn = $this->returnExport->getSumReport();
        return view('report.sumReturnExport', compact('title', 'allReturn', 'sumReturnExport', 'workspacename'));
    }
    // Ajax tổng kết giao hàng
    public function searchRPReturnE(Request $request)
    {
        $data = $request->all();
        $filters = [];
        if (isset($data['date']) && $data['date'][1] !== null) {
            $date_start = date("d/m/Y", strtotime($data['date'][0]));
            $date_end = date("d/m/Y", strtotime($data['date'][1]));
            $filters[] = ['value' => 'Ngày: từ ' . $date_start . ' đến ' . $date_end, 'name' => 'date', 'icon' => 'date'];
        }
        if (isset($data['maphieu']) && $data['maphieu'] !== null) {
            $filters[] = ['value' => 'Mã phiếu: ' . $data['maphieu'], 'name' => 'maphieu', 'icon' => 'document'];
        }
        if (isset($data['customers']) && $data['customers'] !== null) {
            $filters[] = ['value' => 'Tên khách hàng: ' . $data['customers'], 'name' => 'customers', 'icon' => 'user'];
        }
        if (isset($data['name']) && $data['name'] !== null) {
            $filters[] = ['value' => 'Tên hàng hoá: ' . $data['name'], 'name' => 'name', 'icon' => 'product'];
        }
        if (isset($data['dvt']) && $data['dvt'] !== null) {
            $filters[] = ['value' => 'ĐVT: ' . $data['dvt'], 'name' => 'dvt', 'icon' => 'unit'];
        }

        if (isset($data['quantity'][0]) && isset($data['quantity'][1])) {
            $filters[] = ['value' => 'Số lượng:' . $data['quantity'][0] . ' ' . $data['quantity'][1], 'name' => 'quantity', 'icon' => 'quantity'];
        }
        if (isset($data['unit_price'][0]) && isset($data['unit_price'][1])) {
            $filters[] = ['value' => 'Đơn giá:' . $data['unit_price'][0] . ' ' . $data['unit_price'][1], 'name' => 'unit_price', 'icon' => 'price'];
        }
        if (isset($data['price'][0]) && isset($data['price'][1])) {
            $filters[] = ['value' => 'Thành tiền:' . $data['price'][0] . ' ' . $data['price'][1], 'name' => 'price', 'icon' => 'money'];
        }
        if (isset($data['total'][0]) && isset($data['total'][1])) {
            $filters[] = ['value' => 'Tổng cộng:' . $data['total'][0] . ' ' . $data['total'][1], 'name' => 'total', 'icon' => 'money'];
        }
        if (isset($data['payment'][0]) && isset($data['payment'][1])) {
            $filters[] = ['value' => 'Thanh toán:' . $data['payment'][0] . ' ' . $data['payment'][1], 'name' => 'payment', 'icon' => 'payment'];
        }
        if (isset($data['remaining'][0]) && isset($data['remaining'][1])) {
            $filters[] = ['value' => 'Còn lại:' . $data['remaining'][0] . ' ' . $data['remaining'][1], 'name' => 'remaining', 'icon' => 'remaining'];
        }
        if (isset($data['note']) && $data['note'] !== null) {
            $filters[] = ['value' => 'Ghi chú: ' . $data['note'], 'name' => 'note', 'icon' => 'note'];
        }
        if (isset($data['status']) && $data['status'] !== null) {
            $statusValues = [];
            if (in_array(1, $data['status'])) {
                $statusValues[] = '<span style="color: #858585;">Nháp</span>';
            }
            if (in_array(2, $data['status'])) {
                $statusValues[] = '<span style="color: #08AA36BF;">Đã giao</span>';
            }
            $statusText = implode(', ', $statusValues);
            $filters[] = ['value' => 'Trạng thái: ' . $statusText, 'name' => 'status', 'icon' => 'status'];
        }

        if ($request->ajax()) {
            $sumReturnExport = $this->product_returnE->AjaxSumReturnExport($data);
            return response()->json([
                'data' => $sumReturnExport,
                'filters' => $filters,
            ]);
        }
        return false;
    }
    // Tổng kết trả hàng NCC
    public function viewReportReturnImport()
    {
        $title = 'Báo cáo tổng kết trả hàng NCC';
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;

        $sumReturnImport = $this->product_returnI->sumReturnImport();
        $allReturn = $this->returnImport->getSumReport();

        $returnImport = ReturnImport::where('workspace_id', Auth::user()->current_workspace)->get();
        return view('report.reportReturnImport', compact('title', 'returnImport', 'allReturn', 'sumReturnImport', 'workspacename'));
    }

    // Ajax tổng kết giao hàng
    public function searchRPReturnI(Request $request)
    {
        $data = $request->all();
        $filters = [];
        if (isset($data['date']) && $data['date'][1] !== null) {
            $date_start = date("d/m/Y", strtotime($data['date'][0]));
            $date_end = date("d/m/Y", strtotime($data['date'][1]));
            $filters[] = ['value' => 'Ngày: từ ' . $date_start . ' đến ' . $date_end, 'name' => 'date', 'icon' => 'date'];
        }
        if (isset($data['maphieu']) && $data['maphieu'] !== null) {
            $filters[] = ['value' => 'Số phiếu: ' . $data['maphieu'], 'name' => 'maphieu', 'icon' => 'document'];
        }
        if (isset($data['provides']) && $data['provides'] !== null) {
            $filters[] = ['value' => 'Tên nhà cung cấp: ' . $data['provides'], 'name' => 'provides', 'icon' => 'provides'];
        }
        if (isset($data['name']) && $data['name'] !== null) {
            $filters[] = ['value' => 'Tên hàng hóa: ' . $data['name'], 'name' => 'name', 'icon' => 'product'];
        }
        if (isset($data['dvt']) && $data['dvt'] !== null) {
            $filters[] = ['value' => 'ĐVT: ' . $data['dvt'], 'name' => 'dvt', 'icon' => 'unit'];
        }
        if (isset($data['quantity'][0]) && isset($data['quantity'][1])) {
            $filters[] = ['value' => 'Số lượng: ' . $data['quantity'][0] . ' ' . $data['quantity'][1], 'name' => 'quantity', 'icon' => 'quantity'];
        }
        if (isset($data['unit_price'][0]) && isset($data['unit_price'][1])) {
            $filters[] = ['value' => 'Đơn giá: ' . $data['unit_price'][0] . ' ' . $data['unit_price'][1], 'name' => 'unit_price', 'icon' => 'price'];
        }
        if (isset($data['price'][0]) && isset($data['price'][1])) {
            $filters[] = ['value' => 'Thành tiền: ' . $data['price'][0] . ' ' . $data['price'][1], 'name' => 'price', 'icon' => 'money'];
        }
        if (isset($data['total'][0]) && isset($data['total'][1])) {
            $filters[] = ['value' => 'Tổng cộng: ' . $data['total'][0] . ' ' . $data['total'][1], 'name' => 'total', 'icon' => 'money'];
        }
        if (isset($data['payment'][0]) && isset($data['payment'][1])) {
            $filters[] = ['value' => 'Thanh toán: ' . $data['payment'][0] . ' ' . $data['payment'][1], 'name' => 'payment', 'icon' => 'payment'];
        }
        if (isset($data['remaining'][0]) && isset($data['remaining'][1])) {
            $filters[] = ['value' => 'Còn lại: ' . $data['remaining'][0] . ' ' . $data['remaining'][1], 'name' => 'remaining', 'icon' => 'remaining'];
        }
        if (isset($data['note']) && $data['note'] !== null) {
            $filters[] = ['value' => 'Ghi chú: ' . $data['note'], 'name' => 'note', 'icon' => 'note'];
        }
        if (isset($data['status']) && $data['status'] !== null) {
            $statusValues = [];
            if (in_array(1, $data['status'])) {
                $statusValues[] = '<span style="color: #858585;">Nháp</span>';
            }
            if (in_array(2, $data['status'])) {
                $statusValues[] = '<span style="color: #08AA36BF;">Đã giao</span>';
            }
            $statusText = implode(', ', $statusValues);
            $filters[] = ['value' => 'Trạng thái: ' . $statusText, 'name' => 'status', 'icon' => 'status'];
        }

        if ($request->ajax()) {
            $sumReturnImport = $this->product_returnI->AjaxSumReturnImport($data);
            return response()->json([
                'data' => $sumReturnImport,
                'filters' => $filters,
            ]);
        }
        return false;
    }
    // Tổng kết bán hàng
    public function viewReportSell()
    {
        $title = 'Báo cáo tổng kết bán hàng';
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;
        // Lấy sản phẩm trong đơn đó
        $productDelivered = $this->quoteE->sumProductsQuote();
        // Get All đơn
        $allDelivery = $this->detailExport->getSumDetailE();
        // dd($sumDelivery);
        return view('report.sumSell', compact('title', 'productDelivered', 'allDelivery'));
    }
    // Doanh số bán hàng
    public function viewReportSales()
    {
        $title = 'Doanh số bán hàng';
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;
        // Lấy sản phẩm trong đơn đó
        $productDelivered = $this->quoteE->sumProductsQuote();
        // // Get All đơn
        $allDelivery = $this->detailExport->getSumDetailE();
        $userIds = $allDelivery->pluck('user_id')->toArray();
        // Truy vấn thông tin người dùng dựa trên user_id
        $users = User::whereIn('id', $userIds)->get();
        $groupGuests = Groups::where('grouptype_id', 2)->where('workspace_id', Auth::user()->current_workspace)->get();
        $guest = Guest::where('workspace_id', Auth::user()->current_workspace)->get();

        return view('report.reportSumSales', compact('title', 'groupGuests', 'users', 'guest', 'productDelivered', 'allDelivery', 'workspacename'));
    }
    // Ajax debt guests
    public function searchSale(Request $request)
    {
        $data = $request->all();
        $filters = [];
        if (isset($data['date']) && $data['date'][1] !== null) {
            $date_start = date("d/m/Y", strtotime($data['date'][0]));
            $date_end = date("d/m/Y", strtotime($data['date'][1]));
            $filters[] = ['value' => 'Ngày lập: từ ' . $date_start . ' đến ' . $date_end, 'name' => 'date', 'icon' => 'date'];
        }
        if (isset($data['maphieu']) && !empty($data['maphieu'])) {
            $filters[] = ['value' => 'Số chứng từ: ' . $data['maphieu'], 'name' => 'maphieu', 'icon' => 'document'];
        }
        if (isset($data['sales']) && $data['sales'] !== null) {
            $user = new User();
            $sales = $user->getNameUser($data['sales']);
            $salestring = implode(', ', $sales);
            $filters[] = ['value' => 'CTV bán hàng: ' . $salestring, 'name' => 'sales', 'icon' => 'user'];
        }
        if (isset($data['code']) && !empty($data['code'])) {
            $filters[] = ['value' => 'Mã hàng: ' . $data['code'], 'name' => 'code', 'icon' => 'barcode'];
        }
        if (isset($data['name']) && !empty($data['name'])) {
            $filters[] = ['value' => 'Tên hàng: ' . $data['name'], 'name' => 'name', 'icon' => 'tag'];
        }
        if (isset($data['dvt']) && !empty($data['dvt'])) {
            $filters[] = ['value' => 'ĐVT: ' . $data['dvt'], 'name' => 'dvt', 'icon' => 'unit'];
        }
        if (isset($data['slban'][0]) && isset($data['slban'][1])) {
            $filters[] = ['value' => 'SL bán: ' . $data['slban'][0] . ' ' . $data['slban'][1], 'name' => 'slban', 'icon' => 'box'];
        }

        if ($request->ajax()) {
            $productDelivered = $this->quoteE->AjaxSumProductsQuote($data);
            return response()->json([
                'data' => $productDelivered,
                'filters' => $filters,
            ]);
        }
        return false;
    }
    // Doanh số mua hàng
    public function viewReportBuy()
    {
        $title = 'Doanh số mua hàng';
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;
        // Lấy sản phẩm trong đơn đó
        $productsQuoteI = $this->quoteI->sumProductsQuote();
        // // Get All đơn
        $allImport = DetailImport::leftJoin('provides', 'provides.id', 'detailimport.provide_id')
            ->leftJoin('groups', 'groups.id', 'provides.group_id')
            ->leftJoin('users', 'users.id', 'detailimport.user_id')
            ->select(
                'detailimport.*',
                'users.name as nameUser',
                'detailimport.created_at as ngayTao',
                'detailimport.quotation_number as maPhieu',
                'groups.name as nhomKH',
                'provides.provide_name_display as nameProvide',
                'detailimport.total_price as totalProductVat',
            )
            ->where('detailimport.workspace_id', Auth::user()->current_workspace)
            ->get();
        $groupProvides = Groups::where('grouptype_id', 3)->where('workspace_id', Auth::user()->current_workspace)->get();
        $provides = Provides::where('workspace_id', Auth::user()->current_workspace)->get();
        $userIds = $allImport->pluck('user_id')->toArray();
        // Truy vấn thông tin người dùng dựa trên user_id
        $users = User::whereIn('id', $userIds)->get();

        return view('report.reportSumBuy', compact('title', 'users', 'groupProvides', 'provides', 'productsQuoteI', 'allImport', 'workspacename'));
    }
    // Ajax debt guests
    public function searchBuy(Request $request)
    {
        $data = $request->all();
        $filters = [];
        if (isset($data['date']) && $data['date'][1] !== null) {
            $date_start = date("d/m/Y", strtotime($data['date'][0]));
            $date_end = date("d/m/Y", strtotime($data['date'][1]));
            $filters[] = ['value' => 'Ngày báo giá: từ ' . $date_start . ' đến ' . $date_end, 'name' => 'date', 'icon' => 'date'];
        }
        if (isset($data['maphieu']) && !empty($data['maphieu'])) {
            $filters[] = ['value' => 'Số chứng từ: ' . $data['maphieu'], 'name' => 'maphieu', 'icon' => 'document'];
        }
        if (isset($data['sales']) && $data['sales'] !== null) {
            $user = new User();
            $sales = $user->getNameUser($data['sales']);
            $salestring = implode(', ', $sales);
            $filters[] = ['value' => 'Người đặt hàng: ' . $salestring, 'name' => 'sales', 'icon' => 'user'];
        }
        if (isset($data['code']) && !empty($data['code'])) {
            $filters[] = ['value' => 'Mã hàng: ' . $data['code'], 'name' => 'code', 'icon' => 'barcode'];
        }
        if (isset($data['name']) && !empty($data['name'])) {
            $filters[] = ['value' => 'Tên hàng: ' . $data['name'], 'name' => 'name', 'icon' => 'tag'];
        }
        if (isset($data['dvt']) && !empty($data['dvt'])) {
            $filters[] = ['value' => 'ĐVT: ' . $data['dvt'], 'name' => 'dvt', 'icon' => 'unit'];
        }
        if (isset($data['slban'][0]) && isset($data['slban'][1])) {
            $filters[] = ['value' => 'SL bán: ' . $data['slban'][0] . ' ' . $data['slban'][1], 'name' => 'slban', 'icon' => 'box'];
        }
        if ($request->ajax()) {
            $productsQuoteI = $this->quoteI->AjaxSumProductsQuote($data);
            return response()->json([
                'data' => $productsQuoteI,
                'filters' => $filters,
            ]);
        }
        return false;
    }
    // Tổng kết nhập hàng
    public function viewReportImport()
    {
        $title = 'Tổng kết mua hàng';
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;
        // $dataImport = DetailImport::where('workspace_id', Auth::user()->current_workspace)->get();
        $productsQuoteI = $this->quoteI->sumProductsQuote();
        // $allImport = $this->detailImport->getSumDetailI();
        $allImport = DetailImport::leftJoin('provides', 'provides.id', 'detailimport.provide_id')
            ->leftJoin('groups', 'groups.id', 'provides.group_id')
            ->select(
                'detailimport.*',
                'detailimport.created_at as ngayTao',
                'detailimport.quotation_number as maPhieu',
                'groups.name as nhomKH',
                'provides.provide_name_display as nameProvide',
                'detailimport.total_price as totalProductVat',
            )
            ->where('detailimport.workspace_id', Auth::user()->current_workspace)
            ->get();
        return view('report.reportImport', compact('title', 'allImport', 'productsQuoteI'));
    }
    // Báo cáo lợi nhuận bán hàng
    public function viewReportSumSellProfit()
    {
        $title = 'Báo cáo lợi nhuận bán hàng';
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;
        // Lấy sản phẩm đã bán
        // $allDeliveries = $this->delivered->getAllHistory();
        $allDeliveries = $this->detailExport->allProductsSell();
        $groups = Groups::where('grouptype_id', 4)->where('workspace_id', Auth::user()->current_workspace)->get();
        $groupGuests = Groups::where('grouptype_id', 2)->where('workspace_id', Auth::user()->current_workspace)->get();

        return view('report.sumSalesProfit', compact('title', 'groups', 'groupGuests', 'allDeliveries', 'workspacename'));
    }
    // Ajax báo cáo lợi nhuận bán hàng
    public function searchReportSumSellProfit(Request $request)
    {
        $data = $request->all();
        $filters = [];
        // Xử lý lọc theo ngày
        if (isset($data['date']) && $data['date'][1] !== null) {
            $date_start = date("d/m/Y", strtotime($data['date'][0]));
            $date_end = date("d/m/Y", strtotime($data['date'][1]));
            $filters[] = ['value' => 'Ngày: từ ' . $date_start . ' đến ' . $date_end, 'name' => 'date', 'icon' => 'date'];
        }
        // Điều kiện lọc theo số chứng từ (maphieu)
        if (isset($data['maphieu']) && !empty($data['maphieu'])) {
            $filters[] = ['value' => 'Số chứng từ: ' . $data['maphieu'], 'name' => 'maphieu', 'icon' => 'document'];
        }
        // Điều kiện lọc theo tên khách hàng
        if (isset($data['customers']) && !empty($data['customers'])) {
            $filters[] = ['value' => 'Tên khách hàng: ' . $data['customers'], 'name' => 'customers', 'icon' => 'user'];
        }
        // Điều kiện lọc theo nhân viên Sale
        if (isset($data['sales']) && !empty($data['sales'])) {
            $filters[] = ['value' => 'Nhân viên Sale: ' . $data['sales'], 'name' => 'sales', 'icon' => 'sales'];
        }
        // Điều kiện lọc theo mã hàng (code)
        if (isset($data['code']) && !empty($data['code'])) {
            $filters[] = ['value' => 'Mã hàng: ' . $data['code'], 'name' => 'code', 'icon' => 'product'];
        }
        // Điều kiện lọc theo tên hàng hóa (name)
        if (isset($data['name']) && !empty($data['name'])) {
            $filters[] = ['value' => 'Tên hàng: ' . $data['name'], 'name' => 'name', 'icon' => 'product'];
        }
        // Điều kiện lọc theo đơn vị tính (ĐVT)
        if (isset($data['dvt']) && !empty($data['dvt'])) {
            $filters[] = ['value' => 'ĐVT: ' . $data['dvt'], 'name' => 'dvt', 'icon' => 'unit'];
        }
        // Điều kiện lọc theo số lượng bán (slban)
        if (isset($data['slban'][0]) && isset($data['slban'][1])) {
            $filters[] = ['value' => 'Số lượng bán:' . $data['slban'][0] . ' ' . $data['slban'][1], 'name' => 'slban', 'icon' => 'quantity'];
        }
        // Điều kiện lọc theo đơn giá vốn (unit_price_cost)
        if (isset($data['unit_price_cost'][0]) && isset($data['unit_price_cost'][1])) {
            $filters[] = ['value' => 'Đơn giá vốn:' . $data['unit_price_cost'][0] . ' ' . $data['unit_price_cost'][1], 'name' => 'unit_price_cost', 'icon' => 'price'];
        }
        // Điều kiện lọc theo giá trị vốn (value_cost)
        if (isset($data['value_cost'][0]) && isset($data['value_cost'][1])) {
            $filters[] = ['value' => 'Giá trị vốn:' . $data['value_cost'][0] . ' ' . $data['value_cost'][1], 'name' => 'value_cost', 'icon' => 'value'];
        }
        // Điều kiện lọc theo giá xuất (unit_price_sell)
        if (isset($data['unit_price_sell'][0]) && isset($data['unit_price_sell'][1])) {
            $filters[] = ['value' => 'Giá xuất:' . $data['unit_price_sell'][0] . ' ' . $data['unit_price_sell'][1], 'name' => 'unit_price_sell', 'icon' => 'sell_price'];
        }
        // Điều kiện lọc theo doanh số (sales_value)
        if (isset($data['sales_value'][0]) && isset($data['sales_value'][1])) {
            $filters[] = ['value' => 'Doanh số:' . $data['sales_value'][0] . ' ' . $data['sales_value'][1], 'name' => 'sales_value', 'icon' => 'sales'];
        }
        // Điều kiện lọc theo chênh lệch (difference)
        if (isset($data['difference'][0]) && isset($data['difference'][1])) {
            $filters[] = ['value' => 'Chênh lệch:' . $data['difference'][0] . ' ' . $data['difference'][1], 'name' => 'difference', 'icon' => 'difference'];
        }
        if ($request->ajax()) {
            $allDeliveries = $this->detailExport->AjaxAllProductsSell($data);
            return response()->json([
                'data' => $allDeliveries,
                'filters' => $filters,
            ]);
        }
        return false;
    }
    public function viewReportDebtGuests()
    {
        $title = 'Thống kê công nợ khách hàng';
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;

        $groups = Groups::where('grouptype_id', 2)->where('workspace_id', Auth::user()->current_workspace)->get();
        $debtGuests = $this->guest->debtGuest();
        return view('report.debtGuests', compact('title', 'groups', 'debtGuests', 'workspacename'));
    }
    // Ajax debt guests
    public function searchDebtGuests(Request $request)
    {
        $data = $request->all();
        $filters = [];
        if (isset($data['date']) && $data['date'][1] !== null) {
            $date_start = date("d/m/Y", strtotime($data['date'][0]));
            $date_end = date("d/m/Y", strtotime($data['date'][1]));
            $filters[] = ['value' => 'Ngày báo giá: từ ' . $date_start . ' đến ' . $date_end, 'name' => 'date', 'icon' => 'date'];
        }
        if (isset($data['customers']) && $data['customers'] !== null) {
            $filters[] = ['value' => 'Tên khách hàng: ' . $data['customers'], 'name' => 'customers', 'icon' => 'user'];
        }
        if (isset($data['sales']) && $data['sales'][1] !== null) {
            $filters[] = ['value' => 'Bán hàng: ' . $data['sales'][0] . ' ' . $data['sales'][1], 'name' => 'sales', 'icon' => 'money'];
        }
        if (isset($data['customer_return']) && $data['customer_return'][1] !== null) {
            $filters[] = ['value' => 'Khách trả hàng: ' . $data['customer_return'][0] . ' ' . $data['customer_return'][1], 'name' => 'customer_return', 'icon' => 'return'];
        }
        if (isset($data['receive']) && $data['receive'][1] !== null) {
            $filters[] = ['value' => 'Thu: ' . $data['receive'][0] . ' ' . $data['receive'][1], 'name' => 'receive', 'icon' => 'receive'];
        }
        if (isset($data['pay']) && $data['pay'][1] !== null) {
            $filters[] = ['value' => 'Chi: ' . $data['pay'][0] . ' ' . $data['pay'][1], 'name' => 'pay', 'icon' => 'pay'];
        }
        if (isset($data['ending_debt']) && $data['ending_debt'][1] !== null) {
            $filters[] = ['value' => 'Nợ cuối kỳ: ' . $data['ending_debt'][0] . ' ' . $data['ending_debt'][1], 'name' => 'ending_debt', 'icon' => 'debt'];
        }
        if ($request->ajax()) {
            $changeWarehouse = $this->guest->ajaxReportDebtGuest($data);
            return response()->json([
                'data' => $changeWarehouse,
                'filters' => $filters,
            ]);
        }
        return false;
    }

    // Tổng hợp kết quả kinh doanh
    public function viewReportSumBusiness()
    {
        $title = 'Tổng hợp kết quả kinh doanh';
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;

        $arrData = [];

        // Trả hàng khách hàng
        $trahangkh = $this->returnExport->getSumReport()->sum('total_return');

        // Doanh số bán hàng
        $doanhsobanhang = $this->detailExport->allProductsSell()->sum('product_total_vat');

        // Tổng giá vốn bán hàng
        $giavon = $this->detailExport->allProductsSell()->sum(function ($product) {
            return $product->slxuat * $product->giaNhap;
        });

        // Tổng lợi nhuận bán hàng
        $loinhuan = $doanhsobanhang - $trahangkh - $giavon;

        // Tỷ suất lợi nhuận bán hàng
        $tysuatloinhuan = $doanhsobanhang != 0 ? (($loinhuan / $doanhsobanhang) * 100) : 0;

        //Khách hàng còn nợ
        // $totalDebt = $this->guest->debtGuest()->sum(function ($item) {
        //     return $item->totalProductVat -
        //         $item->totalCashReciept -
        //         ($item->totalReturn - $item->chiKH);
        // });
        $totalDebt = $this->guest->getDebtGuest();

        $tongnhap = $this->detailImport->reportAll()->sum('total_tax');

        $provides = Provides::where('workspace_id', Auth::user()->current_workspace)->get();
        // $totalProvideDebt = $provides->sum(function ($item) {
        //     return $item->calculateProvideDebt();
        // });
        $totalProvideDebt = $this->provide->getDebtProvide();

        $hoahongSale = Commission::get()->sum('total_amount');

        //Thực thu tiền bán hàng + khách đặt cọc
        $thucThuBanHang = $this->cash_rc->getTotalAmount();

        //Tỷ lệ thu tiền so với doanh số
        if ($doanhsobanhang > 0) {
            $tyLeThuTien = ($thucThuBanHang / $doanhsobanhang) * 100;
        } else {
            $tyLeThuTien = 0;
        }

        //Trả tiền hàng khách trả lại
        $traTienKhachTraHang = $this->payOrder->getTotalPaymentGuest();

        //Trả tiền mua hàng nhà cung cấp
        $traTienMuaHang = $this->payOrder->getTotalPaymentProvide();

        //Hàng trả lại nhà cung cấp
        $hangTraLai = $this->returnImport->getTotal();

        //Thu lại tiền xuất trả hàng nhà cung cấp
        $thuTienTraHangNCC = CashReceipt::where('provide_id', '!=', 0)->sum('amount');

        // Gán giá trị vào mảng
        $arrData = [
            'trahangkh' => $trahangkh,
            'allDeliveries' => $doanhsobanhang,
            'giavon' => $giavon,
            'loinhuan' => $loinhuan,
            'tysuatloinhuan' => $tysuatloinhuan,
            'totalDebt' => $totalDebt,
            'tongnhap' => $tongnhap,
            'totalProvideDebt' => $totalProvideDebt,
            'hoahongSale' => $hoahongSale,
            'thucThuBanHang' => $thucThuBanHang,
            'tyLeThuTien' => $tyLeThuTien,
            'hangTraLai' => $hangTraLai,
            'traTienMuaHang' => $traTienMuaHang,
            'traTienKhachTraHang' => $traTienKhachTraHang,
            'thuTienTraHangNCC' => $thuTienTraHangNCC,
        ];
        $funds = Fund::where('workspace_id', Auth::user()->current_workspace)
            ->orderby('id', 'desc')
            ->get();

        return view('report.sumBusiness', compact('title', 'arrData', 'workspacename', 'funds'));
    }

    public function viewReportProvides()
    {
        $title = 'Thống kê công nợ nhà cung cấp';
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;
        $provide = Provides::where('workspace_id', Auth::user()->current_workspace)->get();
        return view('report.debtProvides', compact('title', 'provide', 'workspacename'));
    }
    // Ajax debt guests
    public function searchDebtProvides(Request $request)
    {
        $data = $request->all();
        $filters = [];
        if (isset($data['date']) && $data['date'][1] !== null) {
            $date_start = date("d/m/Y", strtotime($data['date'][0]));
            $date_end = date("d/m/Y", strtotime($data['date'][1]));
            $filters[] = ['value' => 'Ngày báo giá: từ ' . $date_start . ' đến ' . $date_end, 'name' => 'date', 'icon' => 'date'];
        }
        if ($request->ajax()) {
            $provides = $this->provide->ajaxReportDebtProvides($data);
            return response()->json([
                'data' => $provides,
                'filters' => $filters,
            ]);
        }
        return false;
    }

    public function viewReportIE()
    {
        $title = 'Tổng hợp nội dung thu chi';
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;
        $contetnType = ContentGroups::where('contenttype_id', 2)
            ->where('workspace_id', Auth::user()->current_workspace)->get();
        $listIDContent = [];
        foreach ($contetnType as $va) {
            array_push($listIDContent, $va->id);
        }
        // $contentImport = PayOder::whereIn('content_pay', $listIDContent)
        //     ->where('workspace_id', Auth::user()->current_workspace)->with('getProvide')
        //     ->select('id', 'payment_code', 'workspace_id', 'total', 'payment_date', 'content_pay', 'guest_id', 'fund_id', 'note')
        //     ->orderBy('content_pay', 'asc')
        //     ->get();
        $payment = PayOder::where('pay_order.workspace_id', Auth::user()->current_workspace)->orderBy('pay_order.id', 'desc');
        if (Auth::check() && Auth::user()->getRoleUser->roleid == 4) {
            $payment->join('detailimport', 'detailimport.id', 'pay_order.detailimport_id')
                ->where('detailimport.user_id', Auth::user()->id);
        }
        $payment->select('pay_order.*');

        $contentImport = $payment->get();

        $contetnType1 = ContentGroups::where('contenttype_id', 1)
            ->where('workspace_id', Auth::user()->current_workspace)->get();
        $listIDContent1 = [];
        foreach ($contetnType1 as $va) {
            array_push($listIDContent1, $va->id);
        }
        $contentExport = CashReceipt::whereIn('content_id', $listIDContent1)
            ->where('workspace_id', Auth::user()->current_workspace)
            ->select('id', 'receipt_code', 'workspace_id', 'amount', 'date_created', 'content_id', 'guest_id', 'fund_id', 'note')
            ->orderBy('content_id', 'asc')
            ->get();
        $content = ContentGroups::where('contenttype_id', 1)->get();
        $content_chi = ContentGroups::where('contenttype_id', 2)->get();

        return view('report.reportIE', compact('title', 'contentImport', 'content_chi', 'content', 'contentExport', 'workspacename'));
    }
    // Ajax nội dung thu chi
    // Thu
    public function searchRPContentE(Request $request)
    {
        $data = $request->all();
        $filters = [];
        if (isset($data['date_thu']) && $data['date_thu'][1] !== null) {
            $date_start = date("d/m/Y", strtotime($data['date_thu'][0]));
            $date_end = date("d/m/Y", strtotime($data['date_thu'][1]));
            $filters[] = ['value' => 'Ngày: từ ' . $date_start . ' đến ' . $date_end, 'name' => 'date_thu', 'icon' => 'date'];
        }
        if (isset($data['return_code']) && $data['return_code'] !== null) {
            $filters[] = ['value' => 'Chứng từ: ' . $data['return_code'], 'name' => 'return_code', 'icon' => 'barcode'];
        }
        if (isset($data['customers']) && $data['customers'] !== null) {
            $filters[] = ['value' => 'Tên: ' . $data['customers'], 'name' => 'customers', 'icon' => 'person'];
        }
        if (isset($data['content']) && $data['content'] !== null) {
            $contents = new ContentGroups();
            $content = $contents->getNameContent($data['content']);
            $contenttring = implode(', ', $content);
            $filters[] = ['value' => 'Nội dung: ' . count($data['content']) . ' đã chọn', 'name' => 'content', 'icon' => 'user'];
        }
        if (isset($data['amount']) && $data['amount'][1] !== null) {
            $filters[] = ['value' => 'Số tiền: ' . $data['amount'][0] . ' ' . $data['amount'][1], 'name' => 'amount', 'icon' => 'cart'];
        }
        if (isset($data['fund']) && $data['fund'] !== null) {
            $filters[] = ['value' => 'Quỹ: ' . $data['fund'], 'name' => 'fund', 'icon' => 'bank'];
        }
        if (isset($data['note']) && $data['note'] !== null) {
            $filters[] = ['value' => 'Ghi chú: ' . $data['note'], 'name' => 'note', 'icon' => 'note'];
        }

        if ($request->ajax()) {
            $contentExport = $this->cash_rc->ajax($data);
            return response()->json([
                'data' => $contentExport,
                'filters' => $filters,
            ]);
        }
        return false;
    }
    // Chi
    public function searchRPContentI(Request $request)
    {
        $data = $request->all();
        $filters = [];
        if (isset($data['date_chi']) && $data['date_chi'][1] !== null) {
            $date_start = date("d/m/Y", strtotime($data['date_chi'][0]));
            $date_end = date("d/m/Y", strtotime($data['date_chi'][1]));
            $filters[] = ['value' => 'Ngày: từ ' . $date_start . ' đến ' . $date_end, 'name' => 'date_chi', 'icon' => 'date'];
        }
        if (isset($data['chungtu_chi']) && $data['chungtu_chi'] !== null) {
            $filters[] = ['value' => 'Chứng từ: ' . $data['chungtu_chi'], 'name' => 'chungtu_chi', 'icon' => 'barcode'];
        }
        if (isset($data['name_chi']) && $data['name_chi'] !== null) {
            $filters[] = ['value' => 'Tên: ' . $data['name_chi'], 'name' => 'name_chi', 'icon' => 'person'];
        }
        if (isset($data['content_chi']) && $data['content_chi'] !== null) {
            $contents = new ContentGroups();
            $content = $contents->getNameContent($data['content_chi']);
            $contenttring = implode(', ', $content);
            $filters[] = ['value' => 'Nội dung: ' . count($data['content_chi']) . ' đã chọn', 'name' => 'content_chi', 'icon' => 'user'];
        }
        if (isset($data['fund_chi']) && $data['fund_chi'] !== null) {
            $filters[] = ['value' => 'Quỹ: ' . $data['fund_chi'], 'name' => 'fund_chi', 'icon' => 'bank'];
        }
        if (isset($data['note_chi']) && $data['note_chi'] !== null) {
            $filters[] = ['value' => 'Ghi chú: ' . $data['note_chi'], 'name' => 'note_chi', 'icon' => 'note'];
        }
        if (isset($data['total_chi']) && $data['total_chi'][1] !== null) {
            $filters[] = ['value' => 'Số tiền: ' . $data['total_chi'][0] . ' ' . $data['total_chi'][1], 'name' => 'total_chi', 'icon' => 'cart'];
        }
        if ($request->ajax()) {
            $contentImport = $this->payOrder->ajaxContentI($data);
            return response()->json([
                'data' => $contentImport,
                'filters' => $filters,
            ]);
        }
        return false;
    }

    public function viewReportChangeFunds()
    {
        $title = 'Chuyển tiền nội bộ';
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;
        $content = ContentImportExport::where('workspace_id', Auth::user()->current_workspace)->get();
        $userIds = $content->pluck('user_id')->toArray();
        // Truy vấn thông tin người dùng dựa trên user_id
        $users = User::whereIn('id', $userIds)->get();
        return view('report.reportChangeFunds', compact('title', 'users', 'content', 'workspacename'));
    }
    // ajax chuyển tiền nội bộ
    public function searchRPChangeFunds(Request $request)
    {
        $data = $request->all();
        $filters = [];
        if (isset($data['date']) && $data['date'][1] !== null) {
            $date_start = date("d/m/Y", strtotime($data['date'][0]));
            $date_end = date("d/m/Y", strtotime($data['date'][1]));
            $filters[] = ['value' => 'Ngày báo giá: từ ' . $date_start . ' đến ' . $date_end, 'name' => 'date', 'icon' => 'date'];
        }
        if ($request->ajax()) {
            $content = $this->content->ajax($data);
            return response()->json([
                'data' => $content,
                'filters' => $filters,
            ]);
        }
        return false;
    }
    public function viewReportIEFunds()
    {
        $title = 'Thống kê thu chi tồn quỹ';
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;
        $inventoryDebt = Fund::where('workspace_id', Auth::user()->current_workspace)->get();
        $content = ContentGroups::get();
        return view('report.reportIEFunds', compact('title', 'inventoryDebt', 'content', 'workspacename'));
    }
    // ajax thống kê thu chi tồn quỹ
    public function searchRPIEFunds(Request $request)
    {
        $data = $request->all();
        $filters = [];
        if (isset($data['date']) && $data['date'][1] !== null) {
            $date_start = date("d/m/Y", strtotime($data['date'][0]));
            $date_end = date("d/m/Y", strtotime($data['date'][1]));
            $filters[] = ['value' => 'Ngày: từ ' . $date_start . ' đến ' . $date_end, 'name' => 'date', 'icon' => 'date'];
        }
        if (isset($data['document_code']) && $data['document_code'] !== null) {
            $filters[] = ['value' => 'Chứng từ: ' . $data['document_code'], 'name' => 'document_code', 'icon' => 'document'];
        }
        if (isset($data['customers']) && $data['customers'] !== null) {
            $filters[] = ['value' => 'Tên: ' . $data['customers'], 'name' => 'customers', 'icon' => 'person'];
        }
        if (isset($data['content']) && $data['content'] !== null) {
            $contents = new ContentGroups();
            $content = $contents->getNameContent($data['content']);
            $contenttring = implode(', ', $content);
            $filters[] = ['value' => 'Nội dung: ' . count($data['content']) . ' đã chọn', 'name' => 'content', 'icon' => 'user'];
        }
        if (isset($data['receive']) && $data['receive'][1] !== null) {
            $filters[] = ['value' => 'Thu: ' . $data['receive'][0] . ' ' . $data['receive'][1], 'name' => 'receive', 'icon' => 'receive'];
        }
        if (isset($data['pay']) && $data['pay'][1] !== null) {
            $filters[] = ['value' => 'Chi: ' . $data['pay'][0] . ' ' . $data['pay'][1], 'name' => 'pay', 'icon' => 'pay'];
        }
        $dataThu = [
            'search' => isset($data['search']) ? $data['search'] : null,
            'date' => isset($data['date']) ? $data['date'] : null,
            'return_code' => isset($data['document_code']) ? $data['document_code'] : null,
            'customers' => isset($data['customers']) ? $data['customers'] : null,
            'content' => isset($data['content']) ? $data['content'] : null,
            'amount' => isset($data['receive']) ? $data['receive'] : null,
        ];
        $dataChi = [
            'search' => isset($data['search']) ? $data['search'] : null,
            'date' => isset($data['date']) ? $data['date'] : null,
            'chungtu_chi' => isset($data['document_code']) ? $data['document_code'] : null,
            'name_chi' => isset($data['customers']) ? $data['customers'] : null,
            'content_chi' => isset($data['content']) ? $data['content'] : null,
            'total_chi' => isset($data['pay']) ? $data['pay'] : null,
        ];

        if ($request->ajax()) {
            $contentExport = $this->cash_rc->ajax($dataThu);
            $contentImport = $this->payOrder->ajaxContentI($dataChi);
            return response()->json([
                'contentExport' => $contentExport,
                'contentImport' => $contentImport,
                'filters' => $filters,
            ]);
        }
        return false;
    }

    public function viewReportIEEnventory()
    {
        $title = 'Xuất - nhập - tồn kho';
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;

        $delivery = Delivered::leftJoin('products', 'products.id', '=', 'delivered.product_id')
            ->select(DB::raw('SUM(delivered.deliver_qty) as totalExportQty'), 'products.product_code', 'products.product_name', 'products.product_unit', 'delivered.product_id as product_id')
            ->groupBy('delivered.product_id', 'products.product_code', 'products.product_name', 'products.product_unit')
            ->get();
        $receive = ProductImport::leftJoin('products', 'products.id', '=', 'products_import.product_id')
            ->select(DB::raw('SUM(products_import.product_qty) as totalImportQty'), 'products.product_code', 'products.product_name', 'products.product_unit', 'products_import.product_id as product_id')
            ->groupBy('products_import.product_id', 'products.product_code', 'products.product_name', 'products.product_unit')
            ->get();

        // Combine the data
        $productsData = ProductImport::leftJoin('products', 'products.id', '=', 'products_import.product_id')
            ->leftJoin('delivered', 'delivered.product_id', '=', 'products.id')
            ->select(
                DB::raw('SUM(products_import.product_qty) as totalImportQty'), // Không cần DISTINCT
                DB::raw('SUM(delivered.deliver_qty) as totalExportQty'), // Không cần DISTINCT
                'products.product_code',
                'products.product_name',
                'products.product_unit',
                'products_import.product_id as id'
            )
            ->groupBy('products_import.product_id', 'products.product_code', 'products.product_name', 'products.product_unit')
            ->get();

        $results = [];

        foreach ($productsData as $item) {
            $results[] = [
                'product_id' => $item->id,
                'product_code' => $item->product_code,
                'product_name' => $item->product_name,
                'product_unit' => $item->product_unit,
                'totalImportQty' => $item->totalImportQty,
                'totalExportQty' => $item->totalExportQty ?? 0,
                'finalQty' => $item->totalImportQty - ($item->totalExportQty ?? 0)
            ];
        }
        $products = $results;

        return view('report.reportIEEnventory', compact('title', 'workspacename', 'products'));
    }
    // ajax Xuất nhập tồn kho
    public function searchRPEnventory(Request $request)
    {
        $data = $request->all();
        $filters = [];
        if (isset($data['date']) && $data['date'][1] !== null) {
            $date_start = date("d/m/Y", strtotime($data['date'][0]));
            $date_end = date("d/m/Y", strtotime($data['date'][1]));
            $filters[] = ['value' => 'Ngày: từ ' . $date_start . ' đến ' . $date_end, 'name' => 'date', 'icon' => 'date'];
        }
        if (isset($data['code']) && $data['code'] !== null) {
            $filters[] = ['value' => 'Mã hàng: ' . $data['code'], 'name' => 'code', 'icon' => 'code'];
        }
        if (isset($data['name']) && $data['name'] !== null) {
            $filters[] = ['value' => 'Tên hàng: ' . $data['name'], 'name' => 'name', 'icon' => 'name'];
        }
        if (isset($data['dvt']) && $data['dvt'] !== null) {
            $filters[] = ['value' => 'ĐVT: ' . $data['dvt'], 'name' => 'dvt', 'icon' => 'dvt'];
        }
        if (isset($data['import']) && $data['import'][1] !== null) {
            $filters[] = ['value' => 'Nhập: ' . $data['import'][0] . ' ' . $data['import'][1], 'name' => 'import', 'icon' => 'import'];
        }
        if (isset($data['export']) && $data['export'][1] !== null) {
            $filters[] = ['value' => 'Xuất: ' . $data['export'][0] . ' ' . $data['export'][1], 'name' => 'export', 'icon' => 'export'];
        }
        if (isset($data['debt']) && $data['debt'][1] !== null) {
            $filters[] = ['value' => 'Tồn cuối: ' . $data['debt'][0] . ' ' . $data['debt'][1], 'name' => 'debt', 'icon' => 'debt'];
        }

        if ($request->ajax()) {
            $products = $this->product->ajaxEnventory($data);
            return response()->json([
                'data' => $products,
                'filters' => $filters,
            ]);
        }
        return false;
    }

    public function viewReportInfoGuests(Request $request)
    {
        $title = 'Thống kê công nợ khách hàng';
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;
        // Lấy sản phẩm trong đơn đó
        $productDelivered = $this->quoteE->sumProductsQuoteByGuest($request->id);
        // Get All đơn
        $allDelivery = $this->detailExport->getSumDetailEByGuest($request->id);
        $guest = Guest::FindOrFail($request->id);

        return view('report.infoGuests', compact('title', 'guest', 'productDelivered', 'allDelivery'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function searchReportGuests(Request $request)
    {
        $data = $request->all();
        $filters = [];
        if (isset($data['code']) && $data['code'] !== null) {
            $filters[] = ['value' => 'Mã khách hàng: ' . $data['code'], 'name' => 'code', 'icon' => 'po'];
        }
        if (isset($data['name']) && $data['name'] !== null) {
            $guests = $this->guest->guestName($data['name']);
            $guestsString = implode(', ', $guests);
            $filters[] = ['value' => 'Công ty: ' . count($data['name']) . ' công ty', 'name' => 'name', 'icon' => 'user'];
        }
        if (isset($data['total']) && $data['total'][1] !== null) {
            $filters[] = ['value' => 'Tổng doanh số: ' . $data['total'][0] . ' ' . $data['total'][1], 'name' => 'total', 'icon' => 'money'];
        }
        if (isset($data['debt']) && $data['debt'][1] !== null) {
            $filters[] = ['value' => 'Công nợ: ' . $data['debt'][0] . ' ' . $data['debt'][1], 'name' => 'debt', 'icon' => 'money'];
        }
        if ($request->ajax()) {
            $guests = $this->payExport->ajax($data);
            return response()->json([
                'guests' => $guests,
                'filters' => $filters,
            ]);
        }
        return false;
    }
    public function searchReportProvides(Request $request)
    {
        $data = $request->all();
        $filters = [];
        if (isset($data['code']) && $data['code'] !== null) {
            $filters[] = ['value' => 'Mã nhà cung cấp: ' . $data['code'], 'name' => 'code', 'icon' => 'po'];
        }
        if (isset($data['name']) && $data['name'] !== null) {
            $provides = $this->provide->provideName($data['name']);
            $providesString = implode(', ', $provides);
            $filters[] = ['value' => 'Công ty: ' . count($data['name']) . ' công ty', 'name' => 'name', 'icon' => 'user'];
        }
        if (isset($data['total']) && $data['total'][1] !== null) {
            $filters[] = ['value' => 'Tổng thanh toán: ' . $data['total'][0] . ' ' . $data['total'][1], 'name' => 'total', 'icon' => 'money'];
        }
        if (isset($data['debt']) && $data['debt'][1] !== null) {
            $filters[] = ['value' => 'Công nợ: ' . $data['debt'][0] . ' ' . $data['debt'][1], 'name' => 'debt', 'icon' => 'money'];
        }
        if ($request->ajax()) {
            $provides = $this->payOrder->ajax($data);
            return response()->json([
                'provides' => $provides,
                'filtersProvides' => $filters,
            ]);
        }
        return false;
    }
}
