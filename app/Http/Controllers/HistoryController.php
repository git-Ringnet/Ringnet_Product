<?php

namespace App\Http\Controllers;

use App\Models\Delivery;
use App\Models\Guest;
use App\Models\History;
use App\Models\Products;
use App\Models\Provides;
use App\Models\Serialnumber;
use App\Models\Workspace;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $guests;
    private $provides;
    private $workspaces;
    private $history;
    private $delivery;
    private $products;

    public function __construct()
    {
        $this->guests = new Guest();
        $this->provides = new Provides();
        $this->workspaces = new Workspace();
        $this->history = new History();
        $this->delivery = new Delivery();
        $this->products = new Products();
    }
    public function index()
    {
        $title = 'Lịch sử giao dịch';
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;
        $history = $this->history->getAllHistory();
        $guests = $this->guests->getAllGuest();
        $provides = $this->provides->getAllProvide();
        $products = $this->products->getAllProducts();
        // dd($history);
        return view('tables.history.index', compact('title', 'workspacename', 'history', 'guests', 'provides', 'products'));
    }

    public function getSN(Request $request)
    {
        $data = $request->all();
        $dataSN = [];
        $product = $this->history->getProductToId($data['delivery_id'], $data['product_id']);
        $serinumber = Serialnumber::leftJoin('delivery', 'delivery.detailexport_id', 'serialnumber.detailexport_id')
            ->where('delivery.id', $data['delivery_id'])
            ->where('serialnumber.delivery_id', $data['delivery_id'])
            ->where('serialnumber.product_id', $data['product_id'])
            ->select('*', 'serialnumber.id as idSeri')
            ->get();
        $dataSN = [
            'product' => $product,
            'serinumber' => $serinumber,
        ];
        return $dataSN;
    }

    // Filer search sort
    public function searchHistory(Request $request)
    {
        $data = $request->all();
        $filters = [];
        if (isset($data['tensp']) && $data['tensp'] !== null) {
            $filters[] = ['value' => 'Mặt hàng: ' . $data['tensp'], 'name' => 'tensp'];
        }
        if (isset($data['hdvao']) && $data['hdvao'] !== null) {
            $filters[] = ['value' => 'Hoá đơn vào: ' . $data['hdvao'], 'name' => 'hdvao'];
        }
        if (isset($data['hdra']) && $data['hdra'] !== null) {
            $filters[] = ['value' => 'Hoá đơn ra: ' . $data['hdra'], 'name' => 'hdra'];
        }
        if (isset($data['idProvides']) && $data['idProvides'] !== null) {
            $provides = $this->provides->provideName($data['idProvides']);
            $providesString = implode(', ', $provides);
            $filters[] = ['value' => 'Nhà cung cấp: ' . $providesString, 'name' => 'provides'];
        }
        if (isset($data['idGuests']) && $data['idGuests'] !== null) {
            $guests = $this->guests->guestName($data['idGuests']);
            $guestsString = implode(', ', $guests);
            $filters[] = ['value' => 'Khách hàng: ' . $guestsString, 'name' => 'guests'];
        }
        if (isset($data['product_unit']) && $data['product_unit'] !== null) {
            $product_unit = $this->products->getProductUnit($data['product_unit']);
            $product_unitString = implode(', ', $product_unit);
            $filters[] = ['value' => 'Đơn vị tính: ' . $product_unitString, 'name' => 'product_unit'];
        }
        if (isset($data['product_qty']) && $data['product_qty'][1] !== null) {
            $filters[] = ['value' => 'Số lượng nhập: ' . $data['product_qty'][0] . $data['product_qty'][1], 'name' => 'product_qty'];
        }
        if (isset($data['price_import']) && $data['price_import'][1] !== null) {
            $filters[] = ['value' => 'Giá nhập: ' . $data['price_import'][0] . $data['price_import'][1], 'name' => 'price_import'];
        }
        if (isset($data['total_import']) && $data['total_import'][1] !== null) {
            $filters[] = ['value' => 'Tổng nhập: ' . $data['total_import'][0] . $data['total_import'][1], 'name' => 'total_import'];
        }
        if (isset($data['slxuat']) && $data['slxuat'][1] !== null) {
            $filters[] = ['value' => 'Số lượng xuất: ' . $data['slxuat'][0] . $data['slxuat'][1], 'name' => 'slxuat'];
        }
        if (isset($data['total_export']) && $data['total_export'][1] !== null) {
            $filters[] = ['value' => 'Tổng giá bán: ' . $data['total_export'][0] . $data['total_export'][1], 'name' => 'total_export'];
        }
        if (isset($data['price_export']) && $data['price_export'][1] !== null) {
            $filters[] = ['value' => 'Giá bán: ' . $data['price_export'][0] . $data['price_export'][1], 'name' => 'price_export'];
        }
        if (isset($data['shipping_fee']) && $data['shipping_fee'][1] !== null) {
            $filters[] = ['value' => 'Chi phí vận chuyển: ' . $data['shipping_fee'][0] . $data['shipping_fee'][1], 'name' => 'shipping_fee'];
        }
        if ($request->ajax()) {
            $history = $this->history->ajax($data);
            return response()->json([
                'history' => $history,
                'filterHistory' => $filters,
            ]);
        }
        return false;
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
    public function show(History $history)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(History $history)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, History $history)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(History $history)
    {
        //
    }
}
