<?php

namespace App\Http\Controllers;

use App\Models\BillSale;
use App\Models\Delivered;
use App\Models\Delivery;
use App\Models\DetailExport;
use App\Models\productBill;
use App\Models\productPay;
use App\Models\Products;
use App\Models\QuoteExport;
use App\Models\Workspace;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BillSaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $billSale;
    private $productBill;
    private $product;
    private $workspaces;
    private $detailExport;

    public function __construct()
    {
        $this->billSale = new BillSale();
        $this->product = new Products();
        $this->productBill = new productBill();
        $this->workspaces = new Workspace();
        $this->detailExport = new DetailExport();
    }
    public function index()
    {
        if (Auth::check()) {
            $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
            $workspacename = $workspacename->workspace_name;
            $title = "Hóa đơn bán hàng";
            $billSale = $this->billSale->getBillSale();
            return view('tables.export.bill_sale.list-bill-sale', compact('title', 'billSale', 'workspacename'));
        } else {
            return redirect()->back()->with('warning', 'Vui lòng đăng nhập!');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Tạo Hóa đơn bán hàng";
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;
        $numberQuote = DetailExport::leftJoin('quoteexport', 'detailexport.id', '=', 'quoteexport.detailexport_id')
            ->where('quoteexport.product_qty', '>', DB::raw('COALESCE(quoteexport.qty_bill_sale,0)'))
            ->where('detailexport.workspace_id', Auth::user()->current_workspace)
            ->select('detailexport.quotation_number', 'detailexport.id')
            ->distinct()
            ->get();
        $product = $this->product->getAllProducts();
        return view('tables.export.bill_sale.create-billSale', compact('title', 'numberQuote', 'product', 'workspacename'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(string $workspace, Request $request)
    {
        if ($request->action == 1) {
            $billSale_id = $this->billSale->addBillSale($request->all());
            $this->productBill->addProductBill($request->all(), $billSale_id);
            return redirect()->route('billSale.index', ['workspace' => $workspace])->with('msg', ' Tạo mới hóa đơn bán hàng thành công !');
        }
        if ($request->action == 2) {
            $this->billSale->acceptBillSale($request->all());
            return redirect()->route('billSale.index', ['workspace' => $workspace])->with('msg', 'Xác nhận hóa đơn bán hàng thành công!');
        }
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
    public function edit(string $workspace, string $id)
    {
        $title = "Hóa đơn bán hàng";
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;
        $billSale = BillSale::where('bill_sale.id', $id)
            ->where('bill_sale.workspace_id', Auth::user()->current_workspace)
            ->leftJoin('detailexport', 'bill_sale.detailexport_id', 'detailexport.id')
            ->leftJoin('guest', 'bill_sale.guest_id', 'guest.id')
            ->leftJoin('represent_guest', 'detailexport.represent_id', 'represent_guest.id')
            ->select('*', 'bill_sale.id as idHD', 'bill_sale.created_at as ngayHD', 'bill_sale.status as tinhTrang')
            ->first();
        if (!$billSale) {
            abort('404');
        }
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
        $quoteExport = $this->detailExport->getProductToId($billSale->detailexport_id);
        return view('tables.export.bill_sale.edit', compact('quoteExport', 'billSale', 'title', 'product', 'workspacename'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(string $workspace, Request $request, string $id)
    {
        if ($request->action == "action_1") {
            $billSale = BillSale::find($id);
            if ($billSale) {
                $billSale->update([
                    'status' => 2,
                ]);
                $this->billSale->updateDetailExport($billSale->detailexport_id);
                return redirect()->route('billSale.index', ['workspace' => $workspace])->with('msg', 'Xác nhận hóa đơn bán hàng thành công!');
            }
        }
        if ($request->action == "action_2") {
            $this->billSale->deleteBillSale($request->all(), $id);
            return redirect()->route('billSale.index', ['workspace' => $workspace])->with('msg', 'Xóa hóa đơn bán hàng thành công!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $workspace, string $id)
    {
        $this->billSale->deleteBillSaleItem($id);
        return redirect()->route('billSale.index', ['workspace' => $workspace])->with('msg', 'Xóa hóa đơn bán hàng thành công!');
    }
    public function getInfoDelivery(Request $request)
    {
        $data = $request->all();
        $delivery = DetailExport::where('detailexport.id', $data['idQuote'])
            ->where('detailexport.workspace_id', Auth::user()->current_workspace)
            ->leftJoin('guest', 'guest.id', 'detailexport.guest_id')
            ->leftJoin('represent_guest', 'represent_guest.id', 'detailexport.represent_id')
            ->leftJoin('delivery', 'delivery.detailexport_id', 'detailexport.id')
            ->select('*', 'delivery.id as maGiaoHang', 'detailexport.quotation_number as soBG', 'represent_guest.id as represent_id')
            ->first();
        return $delivery;
    }
    public function getProductDelivery(Request $request)
    {
        $data = $request->all();
        $delivery = DetailExport::leftJoin('quoteexport', 'quoteexport.detailexport_id', 'detailexport.id')
            ->where('detailexport.id', $data['idQuote'])
            ->where('detailexport.workspace_id', Auth::user()->current_workspace)
            ->select('*')
            ->where(function ($query) {
                $query->where('quoteexport.product_delivery', null)
                    ->orWhere('quoteexport.product_delivery', 0);
            })
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
    //Kiểm tra số hóa đơn
    public function checkNumberBill(Request $request)
    {
        $check = BillSale::where('number_bill', $request['numberValue'])
            ->where('workspace_id', Auth::user()->current_workspace)
            ->first();

        if ($check) {
            $response = ['success' => false, 'msg' => 'Số hóa đơn đã tồn tại!'];
        }
        else{
            $response = ['success' => true];
        }

        return response()->json($response);
    }
}
