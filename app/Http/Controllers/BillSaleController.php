<?php

namespace App\Http\Controllers;

use App\Models\BillSale;
use App\Models\Delivery;
use App\Models\DetailExport;
use App\Models\productBill;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $numberQuote = DetailExport::leftJoin('quoteexport', 'detailexport.id', '=', 'quoteexport.detailexport_id')
            ->where('quoteexport.product_qty', '>', DB::raw('COALESCE(quoteexport.qty_bill_sale,0)'))
            ->select('detailexport.quotation_number', 'detailexport.id')
            ->distinct()
            ->get();
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

        $product = BillSale::join('quoteexport', 'bill_sale.detailexport_id', '=', 'quoteexport.detailexport_id')
            ->leftJoin('product_bill', function ($join) {
                $join->on('product_bill.billSale_id', '=', 'bill_sale.id');
                $join->on('product_bill.product_id', '=', 'quoteexport.product_id');
            })
            ->where('bill_sale.id', $id)
            ->join('products', 'products.id', 'product_bill.product_id')
            ->select(
                'quoteexport.product_id',
                'quoteexport.product_code',
                'quoteexport.product_name',
                'quoteexport.product_unit',
                'quoteexport.price_export',
                'quoteexport.product_tax',
                'quoteexport.product_note',
                'quoteexport.product_total',
                'quoteexport.product_ratio',
                'quoteexport.price_import',
                'product_bill.billSale_qty'
            )
            ->groupBy(
                'quoteexport.product_id',
                'quoteexport.product_code',
                'quoteexport.product_name',
                'quoteexport.product_unit',
                'quoteexport.price_export',
                'quoteexport.product_tax',
                'quoteexport.product_note',
                'quoteexport.product_total',
                'quoteexport.product_ratio',
                'quoteexport.price_import',
                'product_bill.billSale_qty'
            )
            ->get();
        return view('tables.export.bill_sale.edit', compact('billSale', 'title', 'product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if ($request->action == "action_1") {
            $billSale = BillSale::find($id);
            if ($billSale) {
                $billSale->update([
                    'status' => 2,
                ]);
                $this->billSale->updateDetailExport($billSale->detailexport_id);
                return redirect()->route('billSale.index')->with('msg', 'Xác nhận hóa đơn bán hàng thành công!');
            }
        }
        if ($request->action == "action_2") {
            $billSale = BillSale::find($id);
            // if($billSale->status == 2)
            // {
                
            // }
            BillSale::find($id)->delete();
            productBill::where('billSale_id', $id)->delete();
            return redirect()->route('delivery.index')->with('msg', 'Xóa hóa đơn bán hàng thành công!');
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
