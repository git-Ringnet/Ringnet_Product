<?php

namespace App\Http\Controllers;

use App\Models\Delivered;
use App\Models\Delivery;
use App\Models\DetailExport;
use App\Models\productBill;
use App\Models\productPay;
use App\Models\Products;
use App\Models\QuoteExport;
use App\Models\Serialnumber;
use Illuminate\Http\Request;
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
    public function __construct()
    {
        $this->delivery = new Delivery();
        $this->product = new Products();
        $this->delivered = new Delivered();
        $this->detailExport = new DetailExport();
    }
    public function index()
    {
        $title = 'Giao hàng';
        $delivery = Delivery::leftJoin('guest', 'guest.id', 'delivery.guest_id')
            ->select('*', 'delivery.id as maGiaoHang', 'delivery.created_at as ngayGiao')
            ->get();
        return view('tables.export.delivery.list-delivery', compact('title', 'delivery'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Tạo đơn giao hàng";
        $numberQuote = DetailExport::leftJoin('quoteexport', 'detailexport.id', '=', 'quoteexport.detailexport_id')
            ->where('quoteexport.product_qty', '>', DB::raw('COALESCE(quoteexport.qty_delivery,0)'))
            ->select('detailexport.quotation_number', 'detailexport.id')
            ->distinct()
            ->get();
        $product = $this->product->getAllProducts();
        return view('tables.export.delivery.create-delivery', compact('title', 'numberQuote', 'product'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->action == 1) {
            $delivery_id = $this->delivery->addDelivery($request->all());
            $this->delivered->addDelivered($request->all(), $delivery_id);
            return redirect()->route('delivery.index')->with('msg', ' Tạo mới đơn giao hàng thành công !');
        }
        if ($request->action == 2) {
            $this->delivery->acceptDelivery($request->all());
            return redirect()->route('delivery.index')->with('msg', 'Xác nhận đơn giao hàng thành công!');
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

    public function watchDelivery(string $id)
    {
        $title = 'Chỉnh sửa đơn giao hàng';
        $delivery = $this->delivery->getDeliveryToId($id);
        $product = $this->delivery->getProductToId($id);
        $serinumber = Serialnumber::leftJoin('delivery', 'delivery.detailexport_id', 'serialnumber.detailexport_id')
            ->where('delivery.id', $id)
            ->where('serialnumber.delivery_id', $id)
            ->select('*', 'serialnumber.id as idSeri')
            ->get();
        return view('tables.export.delivery.watch-delivery', compact('title', 'delivery', 'product', 'serinumber'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if ($request->action == "action_1") {
            $delivery = Delivery::find($id);
            if ($delivery) {
                $delivery->update([
                    'status' => 2,
                ]);
                $this->delivery->updateDetailExport($request->all(), $delivery->detailexport_id);
                return redirect()->route('delivery.index')->with('msg', 'Xác nhận đơn giao hàng thành công!');
            }
        }
        if ($request->action == "action_2") {
            $this->delivery->deleteDelivery($request->all(), $id);
            return redirect()->route('delivery.index')->with('msg', 'Xóa đơn giao hàng thành công!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Delivery $delivery)
    {
        //
    }

    public function getInfoQuote(Request $request)
    {
        $data = $request->all();
        $delivery = DetailExport::where('detailexport.id', $data['idQuote'])
            ->leftJoin('guest', 'guest.id', 'detailexport.guest_id')->first();
        return $delivery;
    }

    public function getProductQuote(Request $request)
    {
        $data = $request->all();

        $delivery = DetailExport::leftJoin('quoteexport', 'quoteexport.detailexport_id', 'detailexport.id')
            ->leftJoin('products', 'products.id', 'quoteexport.product_id')
            ->select('*', 'detailexport.id as maXuat', 'quoteexport.product_id as maSP')
            ->selectRaw('COALESCE(quoteexport.product_qty, 0) - COALESCE(quoteexport.qty_delivery, 0) as soLuongCanGiao')
            ->leftJoin('serialnumber', function ($join) {
                $join->on('serialnumber.product_id', '=', 'products.id');
                $join->where('serialnumber.detailexport_id', 0);
            })
            ->where('detailexport.id', $data['idQuote'])
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
}
