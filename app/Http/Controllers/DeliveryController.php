<?php

namespace App\Http\Controllers;

use App\Models\Delivered;
use App\Models\Delivery;
use App\Models\DetailExport;
use App\Models\Products;
use App\Models\Serialnumber;
use Illuminate\Http\Request;

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
            ->select('*', 'delivery.id as maGiaoHang')
            ->get();
        return view('tables.export.delivery.list-delivery', compact('title', 'delivery'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Tạo đơn giao hàng";
        $numberQuote = DetailExport::all();
        $product = $this->product->getAllProducts();
        return view('tables.export.delivery.create-delivery', compact('title', 'numberQuote', 'product'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $delivery_id = $this->delivery->addDelivery($request->all());
        $this->delivered->addDelivered($request->all(), $delivery_id);
        return redirect()->route('delivery.index')->with('msg', ' Tạo mới đơn giao hàng thành công !');
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
        return view('tables.export.delivery.watch-delivery', compact('title', 'delivery', 'product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $delivery = Delivery::find($id);
        if ($delivery) {
            $delivery->update([
                'status' => 2,
            ]);
            $this->delivery->updateDetailExport($request->all(), $delivery->detailexport_id);
            return redirect()->route('delivery.index')->with('msg', 'Xác nhận đơn giao hàng thành công!');
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
            ->select('*', 'detailexport.id as maXuat')
            ->selectRaw('COALESCE(quoteexport.product_qty, 0) - COALESCE(quoteexport.qty_delivery, 0) as soLuongCanGiao')
            ->where('detailexport.id', $data['idQuote'])
            ->whereRaw('COALESCE(quoteexport.product_qty, 0) - COALESCE(quoteexport.qty_delivery, 0) > 0')
            ->get();
        return $delivery;
    }
    public function getProductFromQuote(Request $request)
    {
        $data = $request->all();
        $product = Products::where('id', $data['idProduct'])->first();
        return $product;
    }
}
