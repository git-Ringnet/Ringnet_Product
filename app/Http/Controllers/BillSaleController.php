<?php

namespace App\Http\Controllers;

use App\Models\BillSale;
use App\Models\Delivery;
use App\Models\DetailExport;
use App\Models\productBill;
use App\Models\Products;
use Illuminate\Http\Request;

class BillSaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $billSale;
    private $productBill;
    private $product;

    public function __construct()
    {
        $this->billSale = new BillSale();
        $this->product = new Products();
        $this->productBill = new productBill();
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
        $numberQuote = DetailExport::all();
        $product = $this->product->getAllProducts();
        return view('tables.export.bill_sale.create-billSale', compact('title', 'numberQuote', 'product'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $billSale_id = $this->billSale->addBillSale($request->all());
        $this->productBill->addProductBill($request->all(), $billSale_id);
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
    public function edit(string $id)
    {
        $title = "Hóa đơn bán hàng";
        $billSale = BillSale::where('bill_sale.id', $id)
            ->leftJoin('detailexport', 'bill_sale.detailexport_id', 'detailexport.id')
            ->leftJoin('guest', 'bill_sale.guest_id', 'guest.id')
            ->select('*', 'bill_sale.id as idHD', 'bill_sale.created_at as ngayHD')
            ->first();

        $product = BillSale::join('product_bill', 'bill_sale.id', '=', 'product_bill.billSale_id')
            ->join('quoteexport', 'product_bill.product_id', '=', 'quoteexport.product_id')
            ->where('bill_sale.id', $id)
            ->select(
                'bill_sale.*',  
                'product_bill.*',
                'quoteexport.*',
            )
            ->get();
        return view('tables.export.bill_sale.edit', compact('billSale', 'title', 'product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $billSale = BillSale::find($id);
        if ($billSale) {
            $billSale->update([
                'status' => 2,
            ]);
            $this->billSale->updateDetailExport($billSale->detailexport_id);
            return redirect()->route('billSale.index')->with('success', 'Xác nhận hóa đơn bán hàng thành công!');
        }
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
            ->select('*', 'delivery.id as maGiaoHang', 'detailexport.quotation_number as soBG')
            ->first();
        return $delivery;
    }
    public function getProductDelivery(Request $request)
    {
        $data = $request->all();
        $delivery = DetailExport::leftJoin('quoteexport', 'quoteexport.detailexport_id', 'detailexport.id')
            ->where('detailexport.id', $data['idQuote'])
            ->select('*')
            ->selectRaw('COALESCE(quoteexport.product_qty, 0) - COALESCE(quoteexport.qty_bill_sale, 0) as soLuongHoaDon')
            ->whereRaw('COALESCE(quoteexport.product_qty, 0) - COALESCE(quoteexport.qty_bill_sale, 0) > 0')
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
