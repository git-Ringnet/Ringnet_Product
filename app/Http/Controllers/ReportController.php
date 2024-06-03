<?php

namespace App\Http\Controllers;

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

    public function __construct()
    {
        $this->payExport = new PayExport();
        $this->payOrder = new PayOder();
        $this->guest = new Guest();
        $this->provide = new Provides();
        $this->detailExport = new DetailExport();
    }
    public function index()
    {
        $title = 'Báo cáo';
        //Tổng tiền toàn bộ sản phẩm tồn kho
        $productInventory = QuoteImport::select(
            'quoteimport.product_id',
            'quoteimport.product_name',
            'products.product_inventory',
            DB::raw('SUM(quantity_remaining * price_export) as total_inventory_value')
        )
            ->where('quantity_remaining', '>', 0)
            ->where('products.workspace_id', Auth::user()->current_workspace)
            ->leftJoin('products', 'products.id', 'quoteimport.product_id')
            ->groupBy('quoteimport.product_id', 'quoteimport.product_name', 'products.product_inventory')
            ->get();
        //
        $detailExport = DetailExport::leftJoin('quoteexport', 'quoteexport.detailexport_id', 'detailexport.id')
            ->leftJoin('products', 'products.id', 'quoteexport.product_id')
            ->where('products.workspace_id', Auth::user()->current_workspace)
            ->where('quoteexport.workspace_id', Auth::user()->current_workspace)
            ->get();
        //Dư nợ khách hàng
        $guest = $this->payExport->guestStatistics();
        return view('report.index', compact(
            'title',
            'productInventory',
            'detailExport',
            'guest'
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
