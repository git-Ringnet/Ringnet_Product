<?php

namespace App\Http\Controllers;

use App\Models\BillSale;
use App\Models\Delivery;
use App\Models\DetailExport;
use App\Models\PayExport;
use App\Models\PayOder;
use App\Models\Provides;
use App\Models\QuoteExport;
use App\Models\Workspace;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $workspaces;
    public function __construct()
    {
        $this->workspaces = new Workspace();
    }
    public function index()
    {
        $title = 'Dashboard';
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;
        //Sản phẩm bán chạy nhất
        $productSell = QuoteExport::leftJoin('detailexport', 'detailexport.id', 'quoteexport.detailexport_id')
            ->where('detailexport.status', 2)
            ->orderBy('quoteexport.product_qty', 'desc')
            ->groupBy('quoteexport.product_id', 'quoteexport.product_name', 'quoteexport.product_qty')
            ->select('quoteexport.product_id', 'quoteexport.product_name', 'quoteexport.product_qty')
            ->limit(5)
            ->get();
        $totalProduct = QuoteExport::leftJoin('detailexport', 'detailexport.id', 'quoteexport.detailexport_id')
            ->where('detailexport.status', 2)
            ->get();
        $sumOfTop5Products = $productSell->sum('product_qty');
        $totalProductQty = $totalProduct->sum('product_qty');
        $sumWithoutTop5 = $totalProductQty - $sumOfTop5Products;
        $productName = $productSell->pluck('product_name')->toArray();
        $qtyProduct = $productSell->pluck('product_qty')->map(function ($qty) {
            return number_format($qty, 0, '.', '');
        })->toArray();
        $productName[] = 'Những sản phẩm khác...';
        $qtyProduct[] = json_encode($sumWithoutTop5);
        $firstDay = QuoteExport::leftJoin('detailexport', 'detailexport.id', 'quoteexport.detailexport_id')
            ->where('detailexport.status', 2)
            ->min(DB::raw('DATE(quoteexport.created_at)'));
        $lastDay = QuoteExport::leftJoin('detailexport', 'detailexport.id', 'quoteexport.detailexport_id')
            ->where('detailexport.status', 2)
            ->max(DB::raw('DATE(quoteexport.created_at)'));
        $firstDay = date('d-m-Y', strtotime($firstDay));
        $lastDay = date('d-m-Y', strtotime($lastDay));
        //Hoạt động bán hàng
        $statusCounts = DB::table('detailexport')
            ->select('status', DB::raw('COUNT(*) as count'))
            ->whereIn('status', [1, 2, 3])
            ->groupBy('status')
            ->get();
        $tinhTrang = [];
        $soDon = [];
        foreach ($statusCounts as $statusCount) {
            if ($statusCount->status == 1) {
                $tinhTrang[] = "Draft";
            } else if ($statusCount->status == 3) {
                $tinhTrang[] = "Close";
            } else if ($statusCount->status == 2) {
                $tinhTrang[] = "Approved";
            }
            $soDon[] = $statusCount->count;
        }
        //Đơn báo giá đã xác nhận
        $countDetailExport = DetailExport::whereIn('status', [2, 3])->count();
        $countDelivery = Delivery::whereIn('status', [2, 3])->count();
        $countBillsale = BillSale::whereIn('status', [2, 3])->count();
        $countPayExport = PayExport::where('payment', '>', 0)->count();
        //Top nhân viên xuất sắc nhất
        $sumSales = BillSale::where('bill_sale.status', 2)
            ->leftJoin('users', 'users.id', 'bill_sale.user_id')
            ->select('users.name', DB::raw('SUM(bill_sale.price_total) AS price_total_sum'))
            ->groupBy('bill_sale.user_id', 'users.name')
            ->orderByDesc('price_total_sum')
            ->get();
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
        //Công nợ
        $debtExport = DetailExport::where('status', 2)->sum('amount_owed');
        $debtOrder = Provides::sum('provide_debt');
        return view('dashboardProduct', compact(
            'title',
            'workspacename',
            'productName',
            'qtyProduct',
            'tinhTrang',
            'soDon',
            'countDetailExport',
            'countDelivery',
            'countBillsale',
            'countPayExport',
            'revenueByQuarter',
            'debtExport',
            'debtOrder',
            'sumSales',
            'totalProduct',
            'firstDay',
            'lastDay'
        ));
    }

    public function productSell(Request $request)
    {
        if ($request['selectedValue'] == 0) {
            $productSell = QuoteExport::leftJoin('detailexport', 'detailexport.id', 'quoteexport.detailexport_id')
                ->where('detailexport.status', 2)
                ->orderBy('quoteexport.product_qty', 'desc')
                ->groupBy('quoteexport.product_id', 'quoteexport.product_name', 'quoteexport.product_qty')
                ->select('quoteexport.product_id', 'quoteexport.product_name', 'quoteexport.product_qty')
                ->limit(5)
                ->get();

            $totalProduct = QuoteExport::leftJoin('detailexport', 'detailexport.id', 'quoteexport.detailexport_id')
                ->where('detailexport.status', 2)
                ->get();

            $sumOfTop5Products = $productSell->sum('product_qty');
            $totalProductQty = $totalProduct->sum('product_qty');
            $sumWithoutTop5 = $totalProductQty - $sumOfTop5Products;

            $productName = $productSell->pluck('product_name')->toArray();
            $qtyProduct = $productSell->pluck('product_qty')->map(function ($qty) {
                return number_format($qty, 0, '.', '');
            })->toArray();

            $productName[] = 'Những sản phẩm khác...';
            $qtyProduct[] = json_encode($sumWithoutTop5);

            $firstDay = QuoteExport::leftJoin('detailexport', 'detailexport.id', 'quoteexport.detailexport_id')
                ->where('detailexport.status', 2)
                ->min(DB::raw('DATE(quoteexport.created_at)'));
            $lastDay = QuoteExport::leftJoin('detailexport', 'detailexport.id', 'quoteexport.detailexport_id')
                ->where('detailexport.status', 2)
                ->max(DB::raw('DATE(quoteexport.created_at)'));

            $firstDay = date('d-m-Y', strtotime($firstDay));
            $lastDay = date('d-m-Y', strtotime($lastDay));

            $response = [
                'firstDay' => $firstDay,
                'lastDay' => $lastDay,
                'productName' => $productName,
                'qtyProduct' => $qtyProduct,
                'salesText' => 'Tất cả',
            ];

            return response()->json($response);
        } else if ($request['selectedValue'] == 1) {
            // Lấy ngày đầu tiên và cuối cùng của tháng hiện tại
            $firstDayOfMonth = date('Y-m-01');
            $lastDayOfMonth = date('Y-m-t');

            // Lấy dữ liệu sản phẩm bán chạy nhất trong tháng hiện tại
            $productSell = QuoteExport::leftJoin('detailexport', 'detailexport.id', 'quoteexport.detailexport_id')
                ->where('detailexport.status', 2)
                ->whereDate('quoteexport.created_at', '>=', $firstDayOfMonth)
                ->whereDate('quoteexport.created_at', '<=', $lastDayOfMonth)
                ->orderBy('quoteexport.product_qty', 'desc')
                ->groupBy('quoteexport.product_id', 'quoteexport.product_name', 'quoteexport.product_qty')
                ->select('quoteexport.product_id', 'quoteexport.product_name', 'quoteexport.product_qty')
                ->limit(5)
                ->get();

            $totalProduct = QuoteExport::leftJoin('detailexport', 'detailexport.id', 'quoteexport.detailexport_id')
                ->where('detailexport.status', 2)
                ->whereDate('quoteexport.created_at', '>=', $firstDayOfMonth)
                ->whereDate('quoteexport.created_at', '<=', $lastDayOfMonth)
                ->get();

            $sumOfTop5Products = $productSell->sum('product_qty');
            $totalProductQty = $totalProduct->sum('product_qty');
            $sumWithoutTop5 = $totalProductQty - $sumOfTop5Products;

            $productName = $productSell->pluck('product_name')->toArray();
            $qtyProduct = $productSell->pluck('product_qty')->map(function ($qty) {
                return number_format($qty, 0, '.', '');
            })->toArray();

            $productName[] = 'Những sản phẩm khác...';
            $qtyProduct[] = json_encode($sumWithoutTop5);

            $firstDay = date('d-m-Y', strtotime($firstDayOfMonth));
            $lastDay = date('d-m-Y', strtotime($lastDayOfMonth));

            $response = [
                'firstDay' => $firstDay,
                'lastDay' => $lastDay,
                'productName' => $productName,
                'qtyProduct' => $qtyProduct,
                'salesText' => 'Tháng này',
            ];

            return response()->json($response);
        } else if ($request['selectedValue'] == 2) {
            // Lấy ngày đầu tiên của tháng trước
            $firstDayOfLastMonth = Carbon::now()->subMonth()->startOfMonth();

            // Lấy ngày cuối cùng của tháng trước
            $lastDayOfLastMonth = Carbon::now()->subMonth()->endOfMonth();

            // Lấy dữ liệu sản phẩm bán chạy nhất trong tháng trước
            $productSell = QuoteExport::leftJoin('detailexport', 'detailexport.id', 'quoteexport.detailexport_id')
                ->where('detailexport.status', 2)
                ->whereBetween('quoteexport.created_at', [$firstDayOfLastMonth, $lastDayOfLastMonth])
                ->orderBy('quoteexport.product_qty', 'desc')
                ->groupBy('quoteexport.product_id', 'quoteexport.product_name', 'quoteexport.product_qty')
                ->select('quoteexport.product_id', 'quoteexport.product_name', 'quoteexport.product_qty')
                ->limit(5)
                ->get();

            $totalProduct = QuoteExport::leftJoin('detailexport', 'detailexport.id', 'quoteexport.detailexport_id')
                ->where('detailexport.status', 2)
                ->whereBetween('quoteexport.created_at', [$firstDayOfLastMonth, $lastDayOfLastMonth])
                ->get();

            $sumOfTop5Products = $productSell->sum('product_qty');
            $totalProductQty = $totalProduct->sum('product_qty');
            $sumWithoutTop5 = $totalProductQty - $sumOfTop5Products;

            $productName = $productSell->pluck('product_name')->toArray();
            $qtyProduct = $productSell->pluck('product_qty')->map(function ($qty) {
                return number_format($qty, 0, '.', '');
            })->toArray();

            $productName[] = 'Những sản phẩm khác...';
            $qtyProduct[] = json_encode($sumWithoutTop5);

            $firstDay = $firstDayOfLastMonth->format('d-m-Y');
            $lastDay = $lastDayOfLastMonth->format('d-m-Y');

            $response = [
                'firstDay' => $firstDay,
                'lastDay' => $lastDay,
                'productName' => $productName,
                'qtyProduct' => $qtyProduct,
                'salesText' => 'Tháng trước',
            ];

            return response()->json($response);
        } else if ($request['selectedValue'] == 3) {
            $firstDayOfThreeMonthsAgo = Carbon::now()->subMonths(3)->startOfMonth();

            // Lấy ngày cuối cùng của tháng trước khi tháng hiện tại (tháng 4)
            $lastDayOfThreeMonthsAgo = Carbon::now()->subMonths(1)->endOfMonth();

            // Lấy dữ liệu sản phẩm bán chạy nhất trong 3 tháng trước
            $productSell = QuoteExport::leftJoin('detailexport', 'detailexport.id', 'quoteexport.detailexport_id')
                ->where('detailexport.status', 2)
                ->whereBetween('quoteexport.created_at', [$firstDayOfThreeMonthsAgo, $lastDayOfThreeMonthsAgo])
                ->orderBy('quoteexport.product_qty', 'desc')
                ->groupBy('quoteexport.product_id', 'quoteexport.product_name', 'quoteexport.product_qty')
                ->select('quoteexport.product_id', 'quoteexport.product_name', 'quoteexport.product_qty')
                ->limit(5)
                ->get();

            $totalProduct = QuoteExport::leftJoin('detailexport', 'detailexport.id', 'quoteexport.detailexport_id')
                ->where('detailexport.status', 2)
                ->whereBetween('quoteexport.created_at', [$firstDayOfThreeMonthsAgo, $lastDayOfThreeMonthsAgo])
                ->get();

            $sumOfTop5Products = $productSell->sum('product_qty');
            $totalProductQty = $totalProduct->sum('product_qty');
            $sumWithoutTop5 = $totalProductQty - $sumOfTop5Products;

            $productName = $productSell->pluck('product_name')->toArray();
            $qtyProduct = $productSell->pluck('product_qty')->map(function ($qty) {
                return number_format($qty, 0, '.', '');
            })->toArray();

            $productName[] = 'Những sản phẩm khác...';
            $qtyProduct[] = json_encode($sumWithoutTop5);

            $firstDay = $firstDayOfThreeMonthsAgo->format('d-m-Y');
            $lastDay = $lastDayOfThreeMonthsAgo->format('d-m-Y');

            $response = [
                'firstDay' => $firstDay,
                'lastDay' => $lastDay,
                'productName' => $productName,
                'qtyProduct' => $qtyProduct,
                'salesText' => '3 tháng trước',
            ];

            return response()->json($response);
        } 
        // else if (isset($request['startDate']) && isset($request['endDate'])) {
        //     $startDate = Carbon::createFromFormat('d-m-Y', $request['startDate'])->startOfDay();
        //     $endDate = Carbon::createFromFormat('d-m-Y', $request['endDate'])->endOfDay();

        //     // // Lấy dữ liệu sản phẩm bán chạy nhất trong khoảng thời gian người dùng chọn
        //     // $productSell = QuoteExport::leftJoin('detailexport', 'detailexport.id', 'quoteexport.detailexport_id')
        //     //     ->where('detailexport.status', 2)
        //     //     ->whereBetween('quoteexport.created_at', [$startDate, $endDate])
        //     //     ->orderBy('quoteexport.product_qty', 'desc')
        //     //     ->groupBy('quoteexport.product_id', 'quoteexport.product_name', 'quoteexport.product_qty')
        //     //     ->select('quoteexport.product_id', 'quoteexport.product_name', 'quoteexport.product_qty')
        //     //     ->limit(5)
        //     //     ->get();

        //     // $totalProduct = QuoteExport::leftJoin('detailexport', 'detailexport.id', 'quoteexport.detailexport_id')
        //     //     ->where('detailexport.status', 2)
        //     //     ->whereBetween('quoteexport.created_at', [$startDate, $endDate])
        //     //     ->get();

        //     // $sumOfTop5Products = $productSell->sum('product_qty');
        //     // $totalProductQty = $totalProduct->sum('product_qty');
        //     // $sumWithoutTop5 = $totalProductQty - $sumOfTop5Products;

        //     // $productName = $productSell->pluck('product_name')->toArray();
        //     // $qtyProduct = $productSell->pluck('product_qty')->map(function ($qty) {
        //     //     return number_format($qty, 0, '.', '');
        //     // })->toArray();

        //     // $productName[] = 'Những sản phẩm khác...';
        //     // $qtyProduct[] = json_encode($sumWithoutTop5);

        //     // $firstDay = $startDate->format('d-m-Y');
        //     // $lastDay = $endDate->format('d-m-Y');

        //     $response = [
        //         'firstDay' => $startDate,
        //         'lastDay' => $endDate,
        //         // 'productName' => $productName,
        //         // 'qtyProduct' => $qtyProduct,
        //         'salesText' => 'Khoảng thời gian',
        //     ];
        // }
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
}
