<?php

namespace App\Http\Controllers;

use App\Models\BillSale;
use App\Models\Delivery;
use App\Models\DetailExport;
use App\Models\Products;
use Illuminate\Http\Request;

class BillSaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $billSale;
    private $product;

    public function __construct()
    {
        $this->billSale = new BillSale();
        $this->product = new Products();
    }
    public function index()
    {
        $title = "Hóa đơn bán hàng";
        $billSale = $this->billSale->getBillSale();
        return view('tables.export.bill_sale.list-bill-sale', compact('title', 'billSale'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Tạo Hóa đơn bán hàng";
        $numberQuote = Delivery::where('status', 1)->get();
        $product = $this->product->getAllProducts();
        return view('tables.export.bill_sale.create-billSale', compact('title', 'numberQuote', 'product'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $billSale = $this->billSale->addBillSale($request->all());
        return redirect()->route('billSale.index')->with('msg', ' Tạo mới hóa đơn bán hàng thành công !');
    }

    /**
     * Display the specified resource.
     */
    public function show(BillSaleController $billSaleController)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BillSaleController $billSaleController)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BillSaleController $billSaleController)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BillSaleController $billSaleController)
    {
        //
    }
    public function getInfoDelivery(Request $request)
    {
        $data = $request->all();
        $delivery = DetailExport::where('detailexport.id', $data['idQuote'])
            ->leftJoin('guest', 'guest.id', 'detailexport.guest_id')
            ->leftJoin('delivery', 'delivery.detailexport_id', 'detailexport.id')
            ->select('*', 'delivery.id as maGiaoHang')
            ->first();
        return $delivery;
    }
    public function getProductDelivery(Request $request)
    {
        $data = $request->all();
        $delivery = DetailExport::leftJoin('quoteexport', 'quoteexport.detailexport_id', 'detailexport.id')
            ->where('detailexport.id', $data['idQuote'])->get();
        return $delivery;
    }
    public function getProductFromQuote(Request $request)
    {
        $data = $request->all();
        $product = Products::where('id', $data['idProduct'])->first();
        return $product;
    }
}
