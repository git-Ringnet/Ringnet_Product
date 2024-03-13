<?php

namespace App\Http\Controllers;

use App\Models\Delivered;
use App\Models\Delivery;
use App\Models\DetailExport;
use App\Models\History;
use App\Models\productBill;
use App\Models\productPay;
use App\Models\Products;
use App\Models\QuoteExport;
use App\Models\Serialnumber;
use App\Models\Workspace;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DeliveryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $delivery;
    private $product;
    private $delivered;
    private $detailExport;
    private $workspaces;
    private $history;

    public function __construct()
    {
        $this->delivery = new Delivery();
        $this->product = new Products();
        $this->delivered = new Delivered();
        $this->detailExport = new DetailExport();
        $this->workspaces = new Workspace();
        $this->history = new History();
    }
    public function index()
    {
        if (Auth::check()) {
            $title = 'Giao hàng';
            $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
            $workspacename = $workspacename->workspace_name;
            $deliveries = Delivery::leftJoin('guest', 'guest.id', 'delivery.guest_id')
                ->select('*', 'delivery.id as maGiaoHang', 'delivery.created_at as ngayGiao')
                ->where('delivery.workspace_id', Auth::user()->current_workspace)
                ->orderBy('delivery.id', 'desc')
                ->get();

            foreach ($deliveries as $delivery) {
                $totalProductVat = Delivered::where('delivery_id', $delivery->maGiaoHang)
                    ->where('delivered.workspace_id', Auth::user()->current_workspace)
                    ->sum('product_total_vat');

                $delivery->totalProductVat = $totalProductVat;
            }
            return view('tables.export.delivery.list-delivery', compact('title', 'deliveries', 'workspacename'));
        } else {
            return redirect()->back()->with('warning', 'Vui lòng đăng nhập!');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Tạo đơn giao hàng";
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;
        $numberQuote = DetailExport::leftJoin('quoteexport', 'detailexport.id', '=', 'quoteexport.detailexport_id')
            ->where('quoteexport.status', 1)
            ->where('quoteexport.product_qty', '>', DB::raw('COALESCE(quoteexport.qty_delivery,0)'))
            ->where('detailexport.workspace_id', Auth::user()->current_workspace)
            ->select('detailexport.quotation_number', 'detailexport.id')
            ->distinct()
            ->get();
        $product = $this->product->getAllProducts();
        return view('tables.export.delivery.create-delivery', compact('title', 'numberQuote', 'product', 'workspacename'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(string $workspace, Request $request)
    {

        if ($request->action == 1) {
            $delivery_id = $this->delivery->addDelivery($request->all());
            $this->delivered->addDelivered($request->all(), $delivery_id);
            return redirect()->route('delivery.index', ['workspace' => $workspace])->with('msg', ' Tạo mới đơn giao hàng thành công !');
        }
        if ($request->action == 2) {
            $this->delivery->acceptDelivery($request->all());
            return redirect()->route('delivery.index', ['workspace' => $workspace])->with('msg', 'Xác nhận đơn giao hàng thành công!');
        }
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
        $title = 'Chỉnh sửa đơn giao hàng';
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
        return view('tables.export.delivery.watch-delivery', compact('title', 'quoteExport', 'delivery', 'product', 'serinumber', 'workspacename'));
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
                // dd($request->all());
                // Add lịch sử giao dịch
                // $delivered = DB::table('delivered')->where('delivery_id', $id)->get();
                // foreach ($delivered as $item) {
                //     $history = new History();
                //     $dataHistory = [
                //         'detailexport_id' => $delivery->detailexport_id,
                //         'delivered_id' => $item->id,
                //     ];
                //     $history->addHistory($dataHistory);
                // }
                return redirect()->route('delivery.index', ['workspace' => $workspace])->with('msg', 'Xác nhận đơn giao hàng thành công!');
            }
        }
        if ($request->action == "action_2") {
            $this->delivery->deleteDelivery($request->all(), $id);
            return redirect()->route('delivery.index', ['workspace' => $workspace])->with('msg', 'Xóa đơn giao hàng thành công!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $workspace, string $id)
    {
        $this->delivery->deleteDeliveryItem($id);
        return redirect()->route('delivery.index', ['workspace' => $workspace])->with('msg', 'Xóa đơn giao hàng thành công!');
    }

    public function getInfoQuote(Request $request)
    {
        $data = $request->all();
        $delivery = DetailExport::where('detailexport.id', $data['idQuote'])
            ->where('detailexport.workspace_id', Auth::user()->current_workspace)
            ->leftJoin('guest', 'guest.id', 'detailexport.guest_id')
            ->leftJoin('represent_guest', 'represent_guest.id', 'detailexport.represent_id')
            ->first();
        $lastDeliveryId = DB::table('delivery')
            ->where('delivery.workspace_id', Auth::user()->current_workspace)
            ->max(DB::raw('CAST(SUBSTRING_INDEX(code_delivery, "-", -1) AS UNSIGNED)'));
        $delivery['lastDeliveryId'] = $lastDeliveryId == null ? 0 : $lastDeliveryId;
        return $delivery;
    }

    public function getProductQuote(Request $request)
    {
        $data = $request->all();

        $delivery = DetailExport::leftJoin('quoteexport', 'quoteexport.detailexport_id', 'detailexport.id')
            ->leftJoin('products', 'products.id', 'quoteexport.product_id')
            ->select('*', 'detailexport.id as maXuat', 'quoteexport.product_id as maSP', 'quoteexport.product_code as maCode')
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
            $products = Products::select('products.*', 'serialnumber.serinumber')
                ->leftJoin('serialnumber', function ($join) {
                    $join->on('products.id', '=', 'serialnumber.product_id')
                        ->where('serialnumber.detailexport_id', 0);
                })
                ->where('products.id', $data['idProduct'])
                ->get();

            // Check if there are products
            if ($products->isEmpty()) {
                throw new \Exception('Product not found');
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
