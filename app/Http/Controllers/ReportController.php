<?php

namespace App\Http\Controllers;

use App\Models\ContentGroups;
use App\Models\ContentImportExport;
use App\Models\Delivered;
use App\Models\Delivery;
use App\Models\DetailExport;
use App\Models\DetailImport;
use App\Models\Guest;
use App\Models\History;
use App\Models\HistoryImport;
use App\Models\PayExport;
use App\Models\PayOder;
use App\Models\Products;
use App\Models\ProductImport;
use App\Models\Provides;
use App\Models\QuoteExport;
use App\Models\QuoteImport;
use App\Models\ReturnImport;
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
    private $workspaces;

    public function __construct()
    {
        $this->payExport = new PayExport();
        $this->payOrder = new PayOder();
        $this->guest = new Guest();
        $this->provide = new Provides();
        $this->detailExport = new DetailExport();
        $this->workspaces = new Workspace();
    }
    public function index()
    {
        $title = 'Báo cáo';
        $guests = $this->payExport->guestStatistics();
        $provides = $this->payOrder->provideStatistics();
        // dd($guests, $provides);

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
        $htrImport = DB::table('history_import')
            ->where('history_import.workspace_id', Auth::user()->current_workspace)
            ->leftJoin('delivered', 'delivered.product_id', '=', 'history_import.product_id')
            ->leftJoin('products', 'products.id', '=', 'delivered.product_id')
            ->select(
                'products.product_name as product_name',
                'products.product_code as product_code',
                'products.product_unit as product_unit',
                'products.product_inventory as product_inventory',
                'history_import.product_id',
                DB::raw('SUM(delivered.deliver_qty) as total_quantity'),
                'history_import.product_total as giavon',
                'history_import.price_export as gianhap'
            )
            ->groupBy(
                'history_import.product_id',
                'history_import.product_total',
                'history_import.price_export',
                'products.product_name',
                'products.product_code',
                'products.product_unit',
                'products.product_inventory'
            )
            ->get();
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
            ->select('id','payment_code','workspace_id','total','payment_date','content_pay','guest_id','fund_id','note')
            ->orderBy('content_pay','asc')
            ->get();

        // Trả hàng NCC
        $returnImport = ReturnImport::where('workspace_id',Auth::user()->current_workspace)->get();



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
            'returnImport'
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

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
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
