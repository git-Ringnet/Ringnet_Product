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
            ->whereIn('detailexport.status', [2, 3])
            ->where('quoteexport.workspace_id', Auth::user()->current_workspace)
            ->where('detailexport.workspace_id', Auth::user()->current_workspace)
            ->orderBy('quoteexport.product_qty', 'desc')
            ->groupBy('quoteexport.product_id', 'quoteexport.product_name', 'quoteexport.product_qty')
            ->select('quoteexport.product_id', 'quoteexport.product_name', 'quoteexport.product_qty')
            ->limit(5)
            ->get();
        $totalProduct = QuoteExport::leftJoin('detailexport', 'detailexport.id', 'quoteexport.detailexport_id')
            ->whereIn('detailexport.status', [2, 3])
            ->where('quoteexport.workspace_id', Auth::user()->current_workspace)
            ->where('detailexport.workspace_id', Auth::user()->current_workspace)
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
            ->whereIn('detailexport.status', [2, 3])
            ->where('detailexport.workspace_id', Auth::user()->current_workspace)
            ->min(DB::raw('DATE(quoteexport.created_at)'));
        $lastDay = QuoteExport::leftJoin('detailexport', 'detailexport.id', 'quoteexport.detailexport_id')
            ->whereIn('detailexport.status', [2, 3])
            ->where('detailexport.workspace_id', Auth::user()->current_workspace)
            ->max(DB::raw('DATE(quoteexport.created_at)'));
        $firstDay = date('d-m-Y', strtotime($firstDay));
        $lastDay = date('d-m-Y', strtotime($lastDay));
        //Hoạt động bán hàng
        $statusCounts = DB::table('detailexport')
            ->select('status', DB::raw('COUNT(*) as count'))
            ->whereIn('status', [1, 2, 3])
            ->where('detailexport.workspace_id', Auth::user()->current_workspace)
            ->groupBy('status')
            ->get();
        $firstDayStatus = DB::table('detailexport')
            ->whereIn('status', [1, 2, 3])
            ->where('detailexport.workspace_id', Auth::user()->current_workspace)
            ->min(DB::raw('DATE(created_at)'));

        $lastDayStatus = DB::table('detailexport')
            ->whereIn('status', [1, 2, 3])
            ->where('detailexport.workspace_id', Auth::user()->current_workspace)
            ->max(DB::raw('DATE(created_at)'));
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
        $firstDayStatus = date('d-m-Y', strtotime($firstDayStatus));
        $lastDayStatus = date('d-m-Y', strtotime($lastDayStatus));
        //Đơn báo giá đã xác nhận
        $countDetailExport = DetailExport::whereIn('status', [2, 3])
            ->where('detailexport.workspace_id', Auth::user()->current_workspace)
            ->count();
        $countDelivery = Delivery::whereIn('status', [2, 3])
            ->where('delivery.workspace_id', Auth::user()->current_workspace)
            ->count();
        $countBillsale = BillSale::whereIn('status', [2, 3])
            ->where('bill_sale.workspace_id', Auth::user()->current_workspace)
            ->count();
        $countPayExport = PayExport::where('payment', '>', 0)
            ->where('pay_export.workspace_id', Auth::user()->current_workspace)
            ->count();
        $minDate = min([
            DetailExport::whereIn('status', [2, 3])
                ->where('detailexport.workspace_id', Auth::user()->current_workspace)
                ->min('created_at'),
            Delivery::whereIn('status', [2, 3])
                ->where('delivery.workspace_id', Auth::user()->current_workspace)
                ->min('created_at'),
            BillSale::whereIn('status', [2, 3])
                ->where('bill_sale.workspace_id', Auth::user()->current_workspace)
                ->min('created_at'),
            PayExport::where('payment', '>', 0)
                ->where('pay_export.workspace_id', Auth::user()->current_workspace)
                ->min('created_at')
        ]);
        $maxDate = max([
            DetailExport::whereIn('status', [2, 3])
                ->where('detailexport.workspace_id', Auth::user()->current_workspace)
                ->max('created_at'),
            Delivery::whereIn('status', [2, 3])
                ->where('delivery.workspace_id', Auth::user()->current_workspace)
                ->max('created_at'),
            BillSale::whereIn('status', [2, 3])
                ->where('bill_sale.workspace_id', Auth::user()->current_workspace)
                ->max('created_at'),
            PayExport::where('payment', '>', 0)
                ->where('pay_export.workspace_id', Auth::user()->current_workspace)
                ->max('created_at')
        ]);
        $minDate = date('d-m-Y', strtotime($minDate));
        $maxDate = date('d-m-Y', strtotime($maxDate));
        //Top nhân viên xuất sắc nhất
        $sumSales = BillSale::where('bill_sale.status', 2)
            ->leftJoin('users', 'users.id', 'bill_sale.user_id')
            ->select('users.name', DB::raw('SUM(bill_sale.price_total) AS price_total_sum'))
            ->groupBy('bill_sale.user_id', 'users.name')
            ->orderByDesc('price_total_sum')
            ->where('bill_sale.workspace_id', Auth::user()->current_workspace)
            ->get();
        $minDateBillSale = BillSale::where('bill_sale.status', 2)
            ->where('bill_sale.workspace_id', Auth::user()->current_workspace)
            ->min('created_at');

        $maxDateBillSale = BillSale::where('bill_sale.status', 2)
            ->where('bill_sale.workspace_id', Auth::user()->current_workspace)
            ->max('created_at');
        $minDateBillSale = date('d-m-Y', strtotime($minDateBillSale));
        $maxDateBillSale = date('d-m-Y', strtotime($maxDateBillSale));
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
            ->where('bill_sale.workspace_id', Auth::user()->current_workspace)
            ->get();
        //Công nợ
        $debtExport = DetailExport::where('status', 2)
            ->where('detailexport.workspace_id', Auth::user()->current_workspace)
            ->sum('amount_owed');
        $debtOrder = Provides::sum('provide_debt');
        $minDateDetailExport = DetailExport::where('status', 2)
            ->where('detailexport.workspace_id', Auth::user()->current_workspace)
            ->min('created_at');
        $maxDateDetailExport = DetailExport::where('status', 2)
            ->where('detailexport.workspace_id', Auth::user()->current_workspace)
            ->max('created_at');

        $minDateProvides = Provides::where('provides.workspace_id', Auth::user()->current_workspace)->min('updated_at');
        $maxDateProvides = Provides::where('provides.workspace_id', Auth::user()->current_workspace)->max('updated_at');

        $minDateDebt = min([$minDateDetailExport == null ? Carbon::now() : $minDateDetailExport, $minDateProvides]);
        $maxDateDebt = max([$maxDateDetailExport, $maxDateProvides]);
        $minDateDebt = date('d-m-Y', strtotime($minDateDebt));
        $maxDateDebt = date('d-m-Y', strtotime($maxDateDebt));
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
            'lastDay',
            'firstDayStatus',
            'lastDayStatus',
            'minDate',
            'maxDate',
            'minDateBillSale',
            'maxDateBillSale',
            'minDateDebt',
            'maxDateDebt',
        ));
    }

    //Sản phẩm bán chạy
    public function productSell(Request $request)
    {
        if ($request['selectedValue'] == 1) {
            $productSell = QuoteExport::leftJoin('detailexport', 'detailexport.id', 'quoteexport.detailexport_id')
                ->whereIn('detailexport.status', [2, 3])
                ->orderBy('quoteexport.product_qty', 'desc')
                ->groupBy('quoteexport.product_id', 'quoteexport.product_name', 'quoteexport.product_qty')
                ->select('quoteexport.product_id', 'quoteexport.product_name', 'quoteexport.product_qty')
                ->where('detailexport.workspace_id', Auth::user()->current_workspace)
                ->where('quoteexport.workspace_id', Auth::user()->current_workspace)
                ->limit(5)
                ->get();

            $totalProduct = QuoteExport::leftJoin('detailexport', 'detailexport.id', 'quoteexport.detailexport_id')
                ->whereIn('detailexport.status', [2, 3])
                ->where('quoteexport.workspace_id', Auth::user()->current_workspace)
                ->where('detailexport.workspace_id', Auth::user()->current_workspace)
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
                ->whereIn('detailexport.status', [2, 3])
                ->where('detailexport.workspace_id', Auth::user()->current_workspace)
                ->where('quoteexport.workspace_id', Auth::user()->current_workspace)
                ->min(DB::raw('DATE(quoteexport.created_at)'));
            $lastDay = QuoteExport::leftJoin('detailexport', 'detailexport.id', 'quoteexport.detailexport_id')
                ->whereIn('detailexport.status', [2, 3])
                ->where('quoteexport.workspace_id', Auth::user()->current_workspace)
                ->where('detailexport.workspace_id', Auth::user()->current_workspace)
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
        }
        if ($request['selectedValue'] == 2) {
            // Lấy ngày đầu tiên và cuối cùng của tháng hiện tại
            $firstDayOfMonth = date('Y-m-01');
            $lastDayOfMonth = date('Y-m-t');

            // Lấy dữ liệu sản phẩm bán chạy nhất trong tháng hiện tại
            $productSell = QuoteExport::leftJoin('detailexport', 'detailexport.id', 'quoteexport.detailexport_id')
                ->whereIn('detailexport.status', [2, 3])
                ->whereDate('quoteexport.created_at', '>=', $firstDayOfMonth)
                ->whereDate('quoteexport.created_at', '<=', $lastDayOfMonth)
                ->orderBy('quoteexport.product_qty', 'desc')
                ->groupBy('quoteexport.product_id', 'quoteexport.product_name', 'quoteexport.product_qty')
                ->select('quoteexport.product_id', 'quoteexport.product_name', 'quoteexport.product_qty')
                ->where('detailexport.workspace_id', Auth::user()->current_workspace)
                ->where('quoteexport.workspace_id', Auth::user()->current_workspace)
                ->limit(5)
                ->get();

            $totalProduct = QuoteExport::leftJoin('detailexport', 'detailexport.id', 'quoteexport.detailexport_id')
                ->whereIn('detailexport.status', [2, 3])
                ->whereDate('quoteexport.created_at', '>=', $firstDayOfMonth)
                ->whereDate('quoteexport.created_at', '<=', $lastDayOfMonth)
                ->where('quoteexport.workspace_id', Auth::user()->current_workspace)
                ->where('detailexport.workspace_id', Auth::user()->current_workspace)
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
        } else if ($request['selectedValue'] == 3) {
            // Lấy ngày đầu tiên của tháng trước
            $firstDayOfLastMonth = Carbon::now()->subMonth()->startOfMonth();

            // Lấy ngày cuối cùng của tháng trước
            $lastDayOfLastMonth = Carbon::now()->subMonth()->endOfMonth();

            // Lấy dữ liệu sản phẩm bán chạy nhất trong tháng trước
            $productSell = QuoteExport::leftJoin('detailexport', 'detailexport.id', 'quoteexport.detailexport_id')
                ->whereIn('detailexport.status', [2, 3])
                ->whereBetween('quoteexport.created_at', [$firstDayOfLastMonth, $lastDayOfLastMonth])
                ->orderBy('quoteexport.product_qty', 'desc')
                ->groupBy('quoteexport.product_id', 'quoteexport.product_name', 'quoteexport.product_qty')
                ->select('quoteexport.product_id', 'quoteexport.product_name', 'quoteexport.product_qty')
                ->where('detailexport.workspace_id', Auth::user()->current_workspace)
                ->where('quoteexport.workspace_id', Auth::user()->current_workspace)
                ->limit(5)
                ->get();

            $totalProduct = QuoteExport::leftJoin('detailexport', 'detailexport.id', 'quoteexport.detailexport_id')
                ->whereIn('detailexport.status', [2, 3])
                ->whereBetween('quoteexport.created_at', [$firstDayOfLastMonth, $lastDayOfLastMonth])
                ->where('quoteexport.workspace_id', Auth::user()->current_workspace)
                ->where('detailexport.workspace_id', Auth::user()->current_workspace)
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
        } else if ($request['selectedValue'] == 4) {
            $firstDayOfThreeMonthsAgo = Carbon::now()->subMonths(3)->startOfMonth();

            // Lấy ngày cuối cùng của tháng trước khi tháng hiện tại (tháng 4)
            $lastDayOfThreeMonthsAgo = Carbon::now()->subMonths(1)->endOfMonth();

            // Lấy dữ liệu sản phẩm bán chạy nhất trong 3 tháng trước
            $productSell = QuoteExport::leftJoin('detailexport', 'detailexport.id', 'quoteexport.detailexport_id')
                ->whereIn('detailexport.status', [2, 3])
                ->whereBetween('quoteexport.created_at', [$firstDayOfThreeMonthsAgo, $lastDayOfThreeMonthsAgo])
                ->orderBy('quoteexport.product_qty', 'desc')
                ->groupBy('quoteexport.product_id', 'quoteexport.product_name', 'quoteexport.product_qty')
                ->select('quoteexport.product_id', 'quoteexport.product_name', 'quoteexport.product_qty')
                ->where('detailexport.workspace_id', Auth::user()->current_workspace)
                ->where('quoteexport.workspace_id', Auth::user()->current_workspace)
                ->limit(5)
                ->get();

            $totalProduct = QuoteExport::leftJoin('detailexport', 'detailexport.id', 'quoteexport.detailexport_id')
                ->whereIn('detailexport.status', [2, 3])
                ->where('detailexport.workspace_id', Auth::user()->current_workspace)
                ->where('quoteexport.workspace_id', Auth::user()->current_workspace)
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
        if (isset($request['startDate']) && isset($request['endDate'])) {
            // Format start date and end date
            $startDate = Carbon::createFromFormat('Y-m-d', $request['startDate'])->startOfDay()->format('Y-m-d');
            $endDate = Carbon::createFromFormat('Y-m-d', $request['endDate'])->endOfDay()->addDay()->format('Y-m-d');

            // Query for product sell within the selected time range
            $productSell = QuoteExport::leftJoin('detailexport', 'detailexport.id', 'quoteexport.detailexport_id')
                ->whereIn('detailexport.status', [2, 3])
                ->whereBetween('quoteexport.created_at', [$startDate, $endDate])
                ->orderBy('quoteexport.product_qty', 'desc')
                ->groupBy('quoteexport.product_id', 'quoteexport.product_name', 'quoteexport.product_qty')
                ->select('quoteexport.product_id', 'quoteexport.product_name', 'quoteexport.product_qty')
                ->where('detailexport.workspace_id', Auth::user()->current_workspace)
                ->where('quoteexport.workspace_id', Auth::user()->current_workspace)
                ->limit(5)
                ->get();

            // Query for total products within the selected time range
            $totalProduct = QuoteExport::leftJoin('detailexport', 'detailexport.id', 'quoteexport.detailexport_id')
                ->whereIn('detailexport.status', [2, 3])
                ->where('detailexport.workspace_id', Auth::user()->current_workspace)
                ->where('quoteexport.workspace_id', Auth::user()->current_workspace)
                ->whereBetween('quoteexport.created_at', [$startDate, $endDate])
                ->get();

            // Calculate sums and prepare data for response
            $sumOfTop5Products = $productSell->sum('product_qty');
            $totalProductQty = $totalProduct->sum('product_qty');
            $sumWithoutTop5 = $totalProductQty - $sumOfTop5Products;

            $productName = $productSell->pluck('product_name')->toArray();
            $qtyProduct = $productSell->pluck('product_qty')->map(function ($qty) {
                return number_format($qty, 0, '.', '');
            })->toArray();

            $productName[] = 'Những sản phẩm khác...';
            $qtyProduct[] = json_encode($sumWithoutTop5);

            $firstDay = date('d-m-Y', strtotime($startDate));
            $lastDay = date('d-m-Y', strtotime($endDate . ' -1 day'));

            // Prepare response
            $response = [
                'firstDay' => $firstDay,
                'lastDay' => $lastDay,
                'productName' => $productName,
                'qtyProduct' => $qtyProduct,
                'salesText' => 'Khoảng thời gian',
            ];

            return response()->json($response);
        }
    }

    //Hoạt động bán hàng
    public function statusSales(Request $request)
    {
        if ($request['selectedValue'] == 1) {
            $statusCounts = DB::table('detailexport')
                ->select('status', DB::raw('COUNT(*) as count'))
                ->whereIn('status', [1, 2, 3])
                ->where('detailexport.workspace_id', Auth::user()->current_workspace)
                ->groupBy('status')
                ->get();
            $firstDayStatus = DB::table('detailexport')
                ->whereIn('status', [1, 2, 3])
                ->where('detailexport.workspace_id', Auth::user()->current_workspace)
                ->min(DB::raw('DATE(created_at)'));

            $lastDayStatus = DB::table('detailexport')
                ->whereIn('status', [1, 2, 3])
                ->where('detailexport.workspace_id', Auth::user()->current_workspace)
                ->max(DB::raw('DATE(created_at)'));
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
            $firstDayStatus = date('d-m-Y', strtotime($firstDayStatus));
            $lastDayStatus = date('d-m-Y', strtotime($lastDayStatus));
            $response = [
                'firstDayStatus' => $firstDayStatus,
                'lastDayStatus' => $lastDayStatus,
                'tinhTrang' => $tinhTrang,
                'soDon' => $soDon,
                'statusText' => 'Tất cả',
            ];
            return response()->json($response);
        } else if ($request['selectedValue'] == 2) {
            // Lấy ngày đầu tiên của tháng hiện tại
            $firstDayOfMonth = Carbon::now()->startOfMonth();

            // Lấy ngày cuối cùng của tháng hiện tại
            $lastDayOfMonth = Carbon::now()->endOfMonth();

            // Lấy số liệu dựa trên trạng thái trong tháng hiện tại
            $statusCounts = DB::table('detailexport')
                ->select('status', DB::raw('COUNT(*) as count'))
                ->whereIn('status', [1, 2, 3])
                ->where('detailexport.workspace_id', Auth::user()->current_workspace)
                ->whereBetween('created_at', [$firstDayOfMonth, $lastDayOfMonth])
                ->groupBy('status')
                ->get();

            // Lấy ngày đầu tiên và cuối cùng của tháng hiện tại
            $firstDayStatus = $firstDayOfMonth->format('d-m-Y');
            $lastDayStatus = $lastDayOfMonth->format('d-m-Y');

            // Tiến hành xử lý dữ liệu và chuẩn bị phản hồi
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

            // Chuẩn bị phản hồi JSON
            $response = [
                'firstDayStatus' => $firstDayStatus,
                'lastDayStatus' => $lastDayStatus,
                'tinhTrang' => $tinhTrang,
                'soDon' => $soDon,
                'statusText' => 'Tháng này',
            ];

            return response()->json($response);
        } else if ($request['selectedValue'] == 3) {
            // Lấy ngày đầu tiên của tháng trước
            $firstDayOfLastMonth = Carbon::now()->subMonth()->startOfMonth();

            // Lấy ngày cuối cùng của tháng trước
            $lastDayOfLastMonth = Carbon::now()->subMonth()->endOfMonth();

            // Lấy số liệu dựa trên trạng thái trong tháng trước
            $statusCounts = DB::table('detailexport')
                ->select('status', DB::raw('COUNT(*) as count'))
                ->whereIn('status', [1, 2, 3])
                ->where('detailexport.workspace_id', Auth::user()->current_workspace)
                ->whereBetween('created_at', [$firstDayOfLastMonth, $lastDayOfLastMonth])
                ->groupBy('status')
                ->get();

            // Lấy ngày cũ nhất và mới nhất trong tháng trước
            $firstDayStatus = DB::table('detailexport')
                ->whereIn('status', [1, 2, 3])
                ->where('detailexport.workspace_id', Auth::user()->current_workspace)
                ->whereBetween('created_at', [$firstDayOfLastMonth, $lastDayOfLastMonth])
                ->min(DB::raw('DATE(created_at)'));

            $lastDayStatus = DB::table('detailexport')
                ->whereIn('status', [1, 2, 3])
                ->where('detailexport.workspace_id', Auth::user()->current_workspace)
                ->whereBetween('created_at', [$firstDayOfLastMonth, $lastDayOfLastMonth])
                ->max(DB::raw('DATE(created_at)'));

            // Tiến hành xử lý dữ liệu và chuẩn bị phản hồi
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

            $firstDayStatus = date('d-m-Y', strtotime($firstDayOfLastMonth));
            $lastDayStatus = date('d-m-Y', strtotime($lastDayOfLastMonth));

            // Chuẩn bị phản hồi JSON
            $response = [
                'firstDayStatus' => $firstDayStatus,
                'lastDayStatus' => $lastDayStatus,
                'tinhTrang' => $tinhTrang,
                'soDon' => $soDon,
                'statusText' => 'Tháng trước',
            ];

            return response()->json($response);
        } else if ($request['selectedValue'] == 4) {
            // Lấy ngày đầu tiên của 3 tháng trước
            $firstDayOfThreeMonthsAgo = Carbon::now()->subMonths(3)->startOfMonth();

            // Lấy ngày cuối cùng của tháng trước (tháng hiện tại - 1)
            $lastDayOfThreeMonthsAgo = Carbon::now()->subMonths(1)->endOfMonth();

            // Lấy số liệu dựa trên trạng thái trong 3 tháng trước
            $statusCounts = DB::table('detailexport')
                ->select('status', DB::raw('COUNT(*) as count'))
                ->whereIn('status', [1, 2, 3])
                ->where('detailexport.workspace_id', Auth::user()->current_workspace)
                ->whereBetween('created_at', [$firstDayOfThreeMonthsAgo, $lastDayOfThreeMonthsAgo])
                ->groupBy('status')
                ->get();

            // Lấy ngày cũ nhất và mới nhất trong 3 tháng trước
            $firstDayStatus = DB::table('detailexport')
                ->whereIn('status', [1, 2, 3])
                ->where('detailexport.workspace_id', Auth::user()->current_workspace)
                ->whereBetween('created_at', [$firstDayOfThreeMonthsAgo, $lastDayOfThreeMonthsAgo])
                ->min(DB::raw('DATE(created_at)'));

            $lastDayStatus = DB::table('detailexport')
                ->whereIn('status', [1, 2, 3])
                ->where('detailexport.workspace_id', Auth::user()->current_workspace)
                ->whereBetween('created_at', [$firstDayOfThreeMonthsAgo, $lastDayOfThreeMonthsAgo])
                ->max(DB::raw('DATE(created_at)'));

            // Tiến hành xử lý dữ liệu và chuẩn bị phản hồi
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

            $firstDayStatus = date('d-m-Y', strtotime($firstDayOfThreeMonthsAgo));
            $lastDayStatus = date('d-m-Y', strtotime($lastDayOfThreeMonthsAgo));

            // Chuẩn bị phản hồi JSON
            $response = [
                'firstDayStatus' => $firstDayStatus,
                'lastDayStatus' => $lastDayStatus,
                'tinhTrang' => $tinhTrang,
                'soDon' => $soDon,
                'statusText' => '3 tháng trước',
            ];

            return response()->json($response);
        }
        if (isset($request['startDate']) && isset($request['endDate'])) {
            //format date start date and end date to d-m-Y
            $startDate = Carbon::createFromFormat('Y-m-d', $request['startDate'])->startOfDay()->format('Y-m-d');
            $endDate = Carbon::createFromFormat('Y-m-d', $request['endDate'])->endOfDay()->addDay()->format('Y-m-d');
            // Lấy dữ liệu sản phẩm bán chạy nhất trong khoảng thời gian người dùng chọn
            $statusCounts = DB::table('detailexport')
                ->select('status', DB::raw('COUNT(*) as count'))
                ->whereIn('status', [1, 2, 3])
                ->whereBetween('created_at', [$startDate, $endDate])
                ->where('detailexport.workspace_id', Auth::user()->current_workspace)
                ->groupBy('status')
                ->get();

            $firstDayStatus = date('d-m-Y', strtotime($startDate));
            $lastDayStatus = date('d-m-Y', strtotime($endDate . ' -1 day'));
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
            $response = [
                'firstDayStatus' => $firstDayStatus,
                'lastDayStatus' => $lastDayStatus,
                'tinhTrang' => $tinhTrang,
                'soDon' => $soDon,
                'statusText' => 'Khoảng thời gian',
            ];
            return response()->json($response);
        }
    }

    //Đơn báo giá đã xác nhận
    public function exportAccept(Request $request)
    {
        if ($request['selectedValue'] == 1) {
            $countDetailExport = DetailExport::whereIn('status', [2, 3])->count();
            $countDelivery = Delivery::whereIn('status', [2, 3])->count();
            $countBillsale = BillSale::whereIn('status', [2, 3])->count();
            $countPayExport = PayExport::where('payment', '>', 0)->count();
            $minDate = min([
                DetailExport::whereIn('status', [2, 3])
                    ->where('detailexport.workspace_id', Auth::user()->current_workspace)
                    ->min('created_at'),
                Delivery::whereIn('status', [2, 3])
                    ->where('delivery.workspace_id', Auth::user()->current_workspace)
                    ->min('created_at'),
                BillSale::whereIn('status', [2, 3])
                    ->where('bill_sale.workspace_id', Auth::user()->current_workspace)
                    ->min('created_at'),
                PayExport::where('payment', '>', 0)
                    ->where('pay_export.workspace_id', Auth::user()->current_workspace)
                    ->min('created_at')
            ]);
            $maxDate = max([
                DetailExport::whereIn('status', [2, 3])
                    ->where('detailexport.workspace_id', Auth::user()->current_workspace)
                    ->max('created_at'),
                Delivery::whereIn('status', [2, 3])
                    ->where('delivery.workspace_id', Auth::user()->current_workspace)
                    ->max('created_at'),
                BillSale::whereIn('status', [2, 3])
                    ->where('bill_sale.workspace_id', Auth::user()->current_workspace)
                    ->max('created_at'),
                PayExport::where('payment', '>', 0)
                    ->where('pay_export.workspace_id', Auth::user()->current_workspace)
                    ->max('created_at')
            ]);
            $minDate = date('d-m-Y', strtotime($minDate));
            $maxDate = date('d-m-Y', strtotime($maxDate));
            $response = [
                'firstDayAccept' => $minDate,
                'lastDayAccept' => $maxDate,
                'tongSoDon' => $countDetailExport,
                'soDonGiao' => $countDelivery,
                'soDonDaXuat' => $countBillsale,
                'soDonDaTT' => $countPayExport,
                'acceptText' => 'Tất cả',
            ];
            return response()->json($response);
        } else if ($request['selectedValue'] == 2) {
            // Lấy ngày đầu tiên và cuối cùng của tháng hiện tại
            $firstDayOfMonth = date('Y-m-01');
            $lastDayOfMonth = date('Y-m-t');

            // Lấy dữ liệu sản phẩm bán chạy nhất trong tháng hiện tại
            $countDetailExport = DetailExport::whereIn('status', [2, 3])
                ->whereDate('created_at', '>=', $firstDayOfMonth)
                ->whereDate('created_at', '<=', $lastDayOfMonth)
                ->where('detailexport.workspace_id', Auth::user()->current_workspace)
                ->count();

            $countDelivery = Delivery::whereIn('status', [2, 3])
                ->whereDate('created_at', '>=', $firstDayOfMonth)
                ->whereDate('created_at', '<=', $lastDayOfMonth)
                ->where('delivery.workspace_id', Auth::user()->current_workspace)
                ->count();

            $countBillsale = BillSale::whereIn('status', [2, 3])
                ->whereDate('created_at', '>=', $firstDayOfMonth)
                ->whereDate('created_at', '<=', $lastDayOfMonth)
                ->where('bill_sale.workspace_id', Auth::user()->current_workspace)
                ->count();

            $countPayExport = PayExport::where('payment', '>', 0)
                ->whereDate('created_at', '>=', $firstDayOfMonth)
                ->whereDate('created_at', '<=', $lastDayOfMonth)
                ->where('pay_export.workspace_id', Auth::user()->current_workspace)
                ->count();

            $firstDayAccept = date('d-m-Y', strtotime($firstDayOfMonth));
            $lastDayAccept = date('d-m-Y', strtotime($lastDayOfMonth));

            $response = [
                'firstDayAccept' => $firstDayAccept,
                'lastDayAccept' => $lastDayAccept,
                'tongSoDon' => $countDetailExport,
                'soDonGiao' => $countDelivery,
                'soDonDaXuat' => $countBillsale,
                'soDonDaTT' => $countPayExport,
                'acceptText' => 'Tháng này',
            ];

            return response()->json($response);
        } else if ($request['selectedValue'] == 3) {
            // Lấy ngày đầu tiên của tháng trước
            $firstDayOfLastMonth = Carbon::now()->subMonth()->startOfMonth();

            // Lấy ngày cuối cùng của tháng trước
            $lastDayOfLastMonth = Carbon::now()->subMonth()->endOfMonth();

            // Lấy dữ liệu sản phẩm bán chạy nhất trong tháng trước
            $countDetailExport = DetailExport::whereIn('status', [2, 3])
                ->whereDate('created_at', '>=', $firstDayOfLastMonth)
                ->whereDate('created_at', '<=', $lastDayOfLastMonth)
                ->where('detailexport.workspace_id', Auth::user()->current_workspace)
                ->count();

            $countDelivery = Delivery::whereIn('status', [2, 3])
                ->whereDate('created_at', '>=', $firstDayOfLastMonth)
                ->whereDate('created_at', '<=', $lastDayOfLastMonth)
                ->where('delivery.workspace_id', Auth::user()->current_workspace)
                ->count();

            $countBillsale = BillSale::whereIn('status', [2, 3])
                ->whereDate('created_at', '>=', $firstDayOfLastMonth)
                ->whereDate('created_at', '<=', $lastDayOfLastMonth)
                ->where('bill_sale.workspace_id', Auth::user()->current_workspace)
                ->count();

            $countPayExport = PayExport::where('payment', '>', 0)
                ->whereDate('created_at', '>=', $firstDayOfLastMonth)
                ->whereDate('created_at', '<=', $lastDayOfLastMonth)
                ->where('pay_export.workspace_id', Auth::user()->current_workspace)
                ->count();

            $firstDayAccept = $firstDayOfLastMonth->format('d-m-Y');
            $lastDayAccept = $lastDayOfLastMonth->format('d-m-Y');

            $response = [
                'firstDayAccept' => $firstDayAccept,
                'lastDayAccept' => $lastDayAccept,
                'tongSoDon' => $countDetailExport,
                'soDonGiao' => $countDelivery,
                'soDonDaXuat' => $countBillsale,
                'soDonDaTT' => $countPayExport,
                'acceptText' => 'Tháng trước',
            ];

            return response()->json($response);
        } else if ($request['selectedValue'] == 4) {
            $firstDayOfThreeMonthsAgo = Carbon::now()->subMonths(3)->startOfMonth();

            // Lấy ngày cuối cùng của tháng trước khi tháng hiện tại (tháng 4)
            $lastDayOfThreeMonthsAgo = Carbon::now()->subMonths(1)->endOfMonth();

            // Lấy dữ liệu sản phẩm bán chạy nhất trong 3 tháng trước
            $countDetailExport = DetailExport::whereIn('status', [2, 3])
                ->whereDate('created_at', '>=', $firstDayOfThreeMonthsAgo)
                ->whereDate('created_at', '<=', $lastDayOfThreeMonthsAgo)
                ->where('detailexport.workspace_id', Auth::user()->current_workspace)
                ->count();

            $countDelivery = Delivery::whereIn('status', [2, 3])
                ->whereDate('created_at', '>=', $firstDayOfThreeMonthsAgo)
                ->whereDate('created_at', '<=', $lastDayOfThreeMonthsAgo)
                ->where('delivery.workspace_id', Auth::user()->current_workspace)
                ->count();

            $countBillsale = BillSale::whereIn('status', [2, 3])
                ->whereDate('created_at', '>=', $firstDayOfThreeMonthsAgo)
                ->whereDate('created_at', '<=', $lastDayOfThreeMonthsAgo)
                ->where('bill_sale.workspace_id', Auth::user()->current_workspace)
                ->count();

            $countPayExport = PayExport::where('payment', '>', 0)
                ->whereDate('created_at', '>=', $firstDayOfThreeMonthsAgo)
                ->whereDate('created_at', '<=', $lastDayOfThreeMonthsAgo)
                ->where('pay_export.workspace_id', Auth::user()->current_workspace)
                ->count();

            $firstDayAccept = $firstDayOfThreeMonthsAgo->format('d-m-Y');
            $lastDayAccept = $lastDayOfThreeMonthsAgo->format('d-m-Y');

            $response = [
                'firstDayAccept' => $firstDayAccept,
                'lastDayAccept' => $lastDayAccept,
                'tongSoDon' => $countDetailExport,
                'soDonGiao' => $countDelivery,
                'soDonDaXuat' => $countBillsale,
                'soDonDaTT' => $countPayExport,
                'acceptText' => '3 tháng trước',
            ];

            return response()->json($response);
        }
        if (isset($request['startDate']) && isset($request['endDate'])) {
            // Format start date and end date
            $startDate = Carbon::createFromFormat('Y-m-d', $request['startDate'])->startOfDay()->format('Y-m-d');
            $endDate = Carbon::createFromFormat('Y-m-d', $request['endDate'])->endOfDay()->addDay()->format('Y-m-d');

            // Query for product sell within the selected time range
            $countDetailExport = DetailExport::whereIn('status', [2, 3])
                ->whereBetween('created_at', [$startDate, $endDate])
                ->where('detailexport.workspace_id', Auth::user()->current_workspace)
                ->count();

            $countDelivery = Delivery::whereIn('status', [2, 3])
                ->whereBetween('created_at', [$startDate, $endDate])
                ->where('delivery.workspace_id', Auth::user()->current_workspace)
                ->count();

            $countBillsale = BillSale::whereIn('status', [2, 3])
                ->whereBetween('created_at', [$startDate, $endDate])
                ->where('bill_sale.workspace_id', Auth::user()->current_workspace)
                ->count();

            $countPayExport = PayExport::where('payment', '>', 0)
                ->whereBetween('created_at', [$startDate, $endDate])
                ->where('pay_export.workspace_id', Auth::user()->current_workspace)
                ->count();

            $firstDayAccept = date('d-m-Y', strtotime($startDate));
            $lastDayAccept = date('d-m-Y', strtotime($endDate . ' -1 day'));

            // Prepare response
            $response = [
                'firstDayAccept' => $firstDayAccept,
                'lastDayAccept' => $lastDayAccept,
                'tongSoDon' => $countDetailExport,
                'soDonGiao' => $countDelivery,
                'soDonDaXuat' => $countBillsale,
                'soDonDaTT' => $countPayExport,
                'acceptText' => 'Khoảng thời gian',
            ];

            return response()->json($response);
        }
    }

    //Top nhân viên xuất sắc
    public function topEmployee(Request $request)
    {
        if ($request['selectedValue'] == 1) {
            $sumSales = BillSale::where('bill_sale.status', 2)
                ->leftJoin('users', 'users.id', 'bill_sale.user_id')
                ->select('users.name', DB::raw('SUM(bill_sale.price_total) AS price_total_sum'))
                ->groupBy('bill_sale.user_id', 'users.name')
                ->orderByDesc('price_total_sum')
                ->where('bill_sale.workspace_id', Auth::user()->current_workspace)
                ->get();
            $minDateBillSale = BillSale::where('bill_sale.status', 2)
                ->where('bill_sale.workspace_id', Auth::user()->current_workspace)
                ->min('created_at');

            $maxDateBillSale = BillSale::where('bill_sale.status', 2)
                ->where('bill_sale.workspace_id', Auth::user()->current_workspace)
                ->max('created_at');
            $minDateBillSale = date('d-m-Y', strtotime($minDateBillSale));
            $maxDateBillSale = date('d-m-Y', strtotime($maxDateBillSale));
            $response = [
                'firstDayTop' => $minDateBillSale,
                'lastDayTop' => $maxDateBillSale,
                'sumSales' => $sumSales,
                'topText' => 'Tất cả',
            ];
            return response()->json($response);
        } else if ($request['selectedValue'] == 2) {
            // Lấy ngày đầu tiên và cuối cùng của tháng hiện tại
            $firstDayOfMonth = Carbon::now()->startOfMonth();
            $lastDayOfMonth = Carbon::now()->endOfMonth();

            // Lấy dữ liệu sản phẩm bán chạy nhất trong tháng hiện tại
            $sumSales = BillSale::where('bill_sale.status', 2)
                ->whereDate('bill_sale.created_at', '>=', $firstDayOfMonth)
                ->whereDate('bill_sale.created_at', '<=', $lastDayOfMonth)
                ->leftJoin('users', 'users.id', 'bill_sale.user_id')
                ->select('users.name', DB::raw('SUM(bill_sale.price_total) AS price_total_sum'))
                ->where('bill_sale.workspace_id', Auth::user()->current_workspace)
                ->groupBy('bill_sale.user_id', 'users.name')
                ->orderByDesc('price_total_sum')
                ->get();

            $firstDayTop = $firstDayOfMonth->format('d-m-Y');
            $lastDayTop = $lastDayOfMonth->format('d-m-Y');

            $response = [
                'firstDayTop' => $firstDayTop,
                'lastDayTop' => $lastDayTop,
                'sumSales' => $sumSales,
                'topText' => 'Tháng này',
            ];

            return response()->json($response);
        } else if ($request['selectedValue'] == 3) {
            // Lấy ngày đầu tiên của tháng trước
            $firstDayOfLastMonth = Carbon::now()->subMonth()->startOfMonth();

            // Lấy ngày cuối cùng của tháng trước
            $lastDayOfLastMonth = Carbon::now()->subMonth()->endOfMonth();

            // Lấy dữ liệu sản phẩm bán chạy nhất trong tháng trước
            $sumSales = BillSale::where('bill_sale.status', 2)
                ->whereDate('bill_sale.created_at', '>=', $firstDayOfLastMonth)
                ->whereDate('bill_sale.created_at', '<=', $lastDayOfLastMonth)
                ->leftJoin('users', 'users.id', 'bill_sale.user_id')
                ->select('users.name', DB::raw('SUM(bill_sale.price_total) AS price_total_sum'))
                ->where('bill_sale.workspace_id', Auth::user()->current_workspace)
                ->groupBy('bill_sale.user_id', 'users.name')
                ->orderByDesc('price_total_sum')
                ->get();

            $firstDayTop = $firstDayOfLastMonth->format('d-m-Y');
            $lastDayTop = $lastDayOfLastMonth->format('d-m-Y');

            $response = [
                'firstDayTop' => $firstDayTop,
                'lastDayTop' => $lastDayTop,
                'sumSales' => $sumSales,
                'topText' => 'Tháng trước',
            ];

            return response()->json($response);
        } else if ($request['selectedValue'] == 4) {
            $firstDayOfThreeMonthsAgo = Carbon::now()->subMonths(3)->startOfMonth();

            // Lấy ngày cuối cùng của tháng trước khi tháng hiện tại (tháng 4)
            $lastDayOfThreeMonthsAgo = Carbon::now()->subMonths(1)->endOfMonth();

            // Lấy dữ liệu sản phẩm bán chạy nhất trong 3 tháng trước
            $sumSales = BillSale::where('bill_sale.status', 2)
                ->whereDate('bill_sale.created_at', '>=', $firstDayOfThreeMonthsAgo)
                ->whereDate('bill_sale.created_at', '<=', $lastDayOfThreeMonthsAgo)
                ->where('bill_sale.workspace_id', Auth::user()->current_workspace)
                ->leftJoin('users', 'users.id', 'bill_sale.user_id')
                ->select('users.name', DB::raw('SUM(bill_sale.price_total) AS price_total_sum'))
                ->groupBy('bill_sale.user_id', 'users.name')
                ->orderByDesc('price_total_sum')
                ->get();

            $firstDayTop = $firstDayOfThreeMonthsAgo->format('d-m-Y');
            $lastDayTop = $lastDayOfThreeMonthsAgo->format('d-m-Y');

            $response = [
                'firstDayTop' => $firstDayTop,
                'lastDayTop' => $lastDayTop,
                'sumSales' => $sumSales,
                'topText' => '3 tháng trước',
            ];

            return response()->json($response);
        }
        if (isset($request['startDate']) && isset($request['endDate'])) {
            // Format start date and end date
            $startDate = Carbon::createFromFormat('Y-m-d', $request['startDate'])->startOfDay()->format('Y-m-d');
            $endDate = Carbon::createFromFormat('Y-m-d', $request['endDate'])->endOfDay()->addDay()->format('Y-m-d');

            // Query for product sell within the selected time range
            $sumSales = BillSale::where('bill_sale.status', 2)
                ->whereBetween('bill_sale.created_at', [$startDate, $endDate])
                ->leftJoin('users', 'users.id', 'bill_sale.user_id')
                ->select('users.name', DB::raw('SUM(bill_sale.price_total) AS price_total_sum'))
                ->where('bill_sale.workspace_id', Auth::user()->current_workspace)
                ->groupBy('bill_sale.user_id', 'users.name')
                ->orderByDesc('price_total_sum')
                ->get();

            $firstDayTop = date('d-m-Y', strtotime($startDate));
            $lastDayTop = date('d-m-Y', strtotime($endDate . ' -1 day'));

            // Prepare response
            $response = [
                'firstDayTop' => $firstDayTop,
                'lastDayTop' => $lastDayTop,
                'sumSales' => $sumSales,
                'topText' => 'Khoảng thời gian',
            ];

            return response()->json($response);
        }
    }

    //Thống kê doanh số
    public function revenueByQuarter(Request $request)
    {
        $revenueByQuarter = DB::table('bill_sale')
            ->select(
                DB::raw('YEAR(created_at) AS year'),
                DB::raw('QUARTER(created_at) AS quarter'),
                DB::raw('SUM(price_total) AS total_revenue')
            )
            ->where('status', 2)
            ->whereYear('created_at', $request['selectedYear'])
            ->where('bill_sale.workspace_id', Auth::user()->current_workspace)
            ->groupBy('year', 'quarter')
            ->orderBy('year')
            ->orderBy('quarter')
            ->get();
        $response = [
            'revenueByQuarter' => $revenueByQuarter,
        ];

        return response()->json($response);
    }

    //Công nợ
    public function debtChart(Request $request)
    {
        if ($request['selectedValue'] == 1) {
            $debtExport = DetailExport::where('status', 2)->sum('amount_owed');
            $debtOrder = Provides::sum('provide_debt');
            $minDateDetailExport = DetailExport::where('status', 2)
                ->where('detailexport.workspace_id', Auth::user()->current_workspace)
                ->min('created_at');
            $maxDateDetailExport = DetailExport::where('status', 2)
                ->where('detailexport.workspace_id', Auth::user()->current_workspace)
                ->max('created_at');

            $minDateProvides = Provides::where('provides.workspace_id', Auth::user()->current_workspace)
                ->min('updated_at');
            $maxDateProvides = Provides::where('provides.workspace_id', Auth::user()->current_workspace)
                ->max('updated_at');

            $minDateDebt = min([$minDateDetailExport == null ? Carbon::now() : $minDateDetailExport, $minDateProvides]);
            $maxDateDebt = max([$maxDateDetailExport, $maxDateProvides]);
            $minDateDebt = date('d-m-Y', strtotime($minDateDebt));
            $maxDateDebt = date('d-m-Y', strtotime($maxDateDebt));
            $response = [
                'firstDayDebt' => $minDateDebt,
                'lastDayDebt' => $maxDateDebt,
                'debtExport' => $debtExport,
                'debtOrder' => $debtOrder,
                'debtText' => 'Tất cả',
            ];
            return response()->json($response);
        } else if ($request['selectedValue'] == 2) {
            // Lấy ngày đầu tiên và cuối cùng của tháng hiện tại
            $firstDayOfMonth = Carbon::now()->startOfMonth();
            $lastDayOfMonth = Carbon::now()->endOfMonth();

            // Lấy dữ liệu sản phẩm bán chạy nhất trong tháng hiện tại
            $debtExport = DetailExport::where('status', 2)
                ->whereDate('created_at', '>=', $firstDayOfMonth)
                ->whereDate('created_at', '<=', $lastDayOfMonth)
                ->where('detailexport.workspace_id', Auth::user()->current_workspace)
                ->sum('amount_owed');

            $debtOrder = Provides::whereDate('updated_at', '>=', $firstDayOfMonth)
                ->whereDate('updated_at', '<=', $lastDayOfMonth)
                ->where('provides.workspace_id', Auth::user()->current_workspace)
                ->sum('provide_debt');

            $firstDayDebt = $firstDayOfMonth->format('d-m-Y');
            $lastDayDebt = $lastDayOfMonth->format('d-m-Y');

            $response = [
                'firstDayDebt' => $firstDayDebt,
                'lastDayDebt' => $lastDayDebt,
                'debtExport' => $debtExport,
                'debtOrder' => $debtOrder,
                'debtText' => 'Tháng này',
            ];

            return response()->json($response);
        } else if ($request['selectedValue'] == 3) {
            // Lấy ngày đầu tiên của tháng trước
            $firstDayOfLastMonth = Carbon::now()->subMonth()->startOfMonth();

            // Lấy ngày cuối cùng của tháng trước
            $lastDayOfLastMonth = Carbon::now()->subMonth()->endOfMonth();

            // Lấy dữ liệu sản phẩm bán chạy nhất trong tháng trước
            $debtExport = DetailExport::where('status', 2)
                ->whereDate('created_at', '>=', $firstDayOfLastMonth)
                ->whereDate('created_at', '<=', $lastDayOfLastMonth)
                ->where('detailexport.workspace_id', Auth::user()->current_workspace)
                ->sum('amount_owed');

            $debtOrder = Provides::whereDate('updated_at', '>=', $firstDayOfLastMonth)
                ->whereDate('updated_at', '<=', $lastDayOfLastMonth)
                ->where('provides.workspace_id', Auth::user()->current_workspace)
                ->sum('provide_debt');

            $firstDayDebt = $firstDayOfLastMonth->format('d-m-Y');
            $lastDayDebt = $lastDayOfLastMonth->format('d-m-Y');

            $response = [
                'firstDayDebt' => $firstDayDebt,
                'lastDayDebt' => $lastDayDebt,
                'debtExport' => $debtExport,
                'debtOrder' => $debtOrder,
                'debtText' => 'Tháng trước',
            ];

            return response()->json($response);
        } else if ($request['selectedValue'] == 4) {
            $firstDayOfThreeMonthsAgo = Carbon::now()->subMonths(3)->startOfMonth();

            // Lấy ngày cuối cùng của tháng trước khi tháng hiện tại (tháng 4)
            $lastDayOfThreeMonthsAgo = Carbon::now()->subMonths(1)->endOfMonth();

            // Lấy dữ liệu sản phẩm bán chạy nhất trong 3 tháng trước
            $debtExport = DetailExport::where('status', 2)
                ->whereDate('created_at', '>=', $firstDayOfThreeMonthsAgo)
                ->whereDate('created_at', '<=', $lastDayOfThreeMonthsAgo)
                ->where('detailexport.workspace_id', Auth::user()->current_workspace)
                ->sum('amount_owed');

            $debtOrder = Provides::whereDate('updated_at', '>=', $firstDayOfThreeMonthsAgo)
                ->whereDate('updated_at', '<=', $lastDayOfThreeMonthsAgo)
                ->where('provides.workspace_id', Auth::user()->current_workspace)
                ->sum('provide_debt');

            $firstDayDebt = $firstDayOfThreeMonthsAgo->format('d-m-Y');
            $lastDayDebt = $lastDayOfThreeMonthsAgo->format('d-m-Y');

            $response = [
                'firstDayDebt' => $firstDayDebt,
                'lastDayDebt' => $lastDayDebt,
                'debtExport' => $debtExport,
                'debtOrder' => $debtOrder,
                'debtText' => '3 tháng trước',
            ];

            return response()->json($response);
        }
        if (isset($request['startDate']) && isset($request['endDate'])) {
            // Format start date and end date
            $startDate = Carbon::createFromFormat('Y-m-d', $request['startDate'])->startOfDay()->format('Y-m-d');
            $endDate = Carbon::createFromFormat('Y-m-d', $request['endDate'])->endOfDay()->addDay()->format('Y-m-d');

            // Query for product sell within the selected time range
            $debtExport = DetailExport::where('status', 2)
                ->whereBetween('created_at', [$startDate, $endDate])
                ->where('detailexport.workspace_id', Auth::user()->current_workspace)
                ->sum('amount_owed');

            $debtOrder = Provides::whereBetween('updated_at', [$startDate, $endDate])
                ->where('provides.workspace_id', Auth::user()->current_workspace)
                ->sum('provide_debt');

            $firstDayDebt = date('d-m-Y', strtotime($startDate));
            $lastDayDebt = date('d-m-Y', strtotime($endDate . ' -1 day'));

            // Prepare response
            $response = [
                'firstDayDebt' => $firstDayDebt,
                'lastDayDebt' => $lastDayDebt,
                'debtExport' => $debtExport,
                'debtOrder' => $debtOrder,
                'debtText' => 'Khoảng thời gian',
            ];

            return response()->json($response);
        }
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
