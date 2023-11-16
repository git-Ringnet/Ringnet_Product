<?php

namespace App\Http\Controllers;

use App\Models\DetailImport;
use App\Models\ProductImport;
use App\Models\Products;
use App\Models\QuoteImport;
use App\Models\Receive_bill;
use App\Models\Reciept;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReceiveController extends Controller
{
    private $receive;
    private $quoteImport;
    private $product;
    private $reciept;
    private $import;
    private $productImport;
    public function __construct()
    {
        $this->receive = new Receive_bill();
        $this->quoteImport = new QuoteImport();
        $this->product = new Products();
        $this->reciept = new Reciept();
        $this->import = new DetailImport();
        $this->productImport = new ProductImport();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Đơn nhận hàng";
        $receive = Receive_bill::all();
        return view('tables.receive.receive', compact('receive', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $id = 1;
        $title = "Tạo đơn nhận hàng";
        $listDetail = DetailImport::leftJoin('quoteimport', 'detailimport.id', '=', 'quoteimport.detailimport_id')
            ->where('quoteimport.product_qty', '>', 'quoteimport.receive_qty')
            ->select('detailimport.quotation_number', 'detailimport.id')
            ->distinct()
            ->get();
        // $listDetail = DetailImport::all();
        // dd($listDetail);
        return view('tables.receive.insertReceive', compact('title', 'listDetail'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $id = $request->detailimport_id;

        // Tạo sản phẩm theo đơn nhận hàng
        $status = $this->productImport->addProductImport($request->all(), $id, 'receive_id', 'receive_qty');
        if ($status) {
            // Tạo đơn nhận hàng mới
            $this->receive->addReceiveBill($request->all(), $id);

            return redirect()->route('receive.index')->with('msg', 'Tạo mới đơn nhận hàng thành công !');
        } else {
            return redirect()->route('receive.index')->with('warning', 'Đơn nhận hàng đã tạo hết sản phẩm !');
        }
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
        $receive = Receive_bill::findOrFail($id);
        $title = $receive->quotation_number;
        $product = ProductImport::join('quoteimport', 'quoteimport.id', 'products_import.quoteImport_id')
            ->where('products_import.detailimport_id', $receive->detailimport_id)
            ->where('products_import.receive_id', $receive->id)
            ->select(
                'quoteimport.product_code',
                'quoteimport.product_name',
                'quoteimport.product_unit',
                'products_import.product_qty',
                'quoteimport.price_export',
                'quoteimport.product_tax',
                // 'quoteimport.product_total',
                'quoteimport.product_ratio',
                'quoteimport.price_import',
                'quoteimport.product_note',
                'products_import.product_id',
                DB::raw('products_import.product_qty * quoteimport.price_export as product_total')
            )
            ->with('getSerialNumber')->get();
        return view('tables.receive.editReceive', compact('receive', 'title', 'product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Cập nhật trạng thái
        $result = $this->receive->updateReceive($request->all(), $id);
        if ($result) {
            // Thêm sản phẩm, seri vào tồn kho
            $this->product->addProductTowarehouse($request->all(), $id);

            return redirect()->route('receive.index')->with('msg', 'Nhận hàng thành công !');
        } else {
            return redirect()->route('receive.index')->with('warning', 'Đơn hàng đã được nhận trước đó !');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function show_receive(Request $request)
    {
        $data = [];
        $detail = DetailImport::FindOrFail($request->detail_id);
        $name =  $detail->getProvideName->provide_name_display;
        $data = [
            'quotation_number' => $detail->quotation_number,
            'provide_name' => $name,
            'id' => $detail->id
        ];
        return $data;
    }
    public function getProduct_receive(Request $request)
    {
        return QuoteImport::where('detailimport_id', $request->id)->get();
    }
}
