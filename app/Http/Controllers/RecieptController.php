<?php

namespace App\Http\Controllers;

use App\Models\DetailImport;
use App\Models\ProductImport;
use App\Models\QuoteImport;
use App\Models\Receive_bill;
use App\Models\Reciept;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RecieptController extends Controller
{
    private $reciept;
    private $productImport;
    public function __construct()
    {
        $this->reciept = new Reciept();
        $this->productImport = new ProductImport();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Hóa đơn mua hàng";
        $reciept = Reciept::all();
        return view('tables.reciept.reciept', compact('title', 'reciept'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Tạo mới hóa đơn mua hàng";
        $reciept = DetailImport::leftJoin('quoteimport', 'detailimport.id', '=', 'quoteimport.detailimport_id')
            ->where('quoteimport.product_qty', '>', 'quoteimport.receive_qty')
            ->distinct()
            ->select('detailimport.quotation_number', 'detailimport.id')
            ->get();
        return view('tables.reciept.insertReciept', compact('title', 'reciept'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $id = $request->detailimport_id;

        // Tạo sản phẩm theo đơn nhận hàng
        $this->productImport->addProductImport($request->all(), $id, 'reciept_id','reciept_qty');

        $this->reciept->addReciept($request->all(), $id);
        return redirect()->route('reciept.index')->with('msg', 'Tạo mới hóa đơn mua hàng thành công !');
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
        $reciept = Reciept::findOrFail($id);
        $title = $reciept->id;

        // $product = QuoteImport::where('receive_id', $reciept->receive_id)->get();
        $product = ProductImport::join('quoteimport', 'quoteimport.id', 'products_import.quoteImport_id')
            ->where('products_import.detailimport_id', $reciept->detailimport_id)
            ->where('products_import.reciept_id', $reciept->id)
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
            ->get();
        return view('tables.reciept.editReciept', compact('title', 'reciept', 'product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $result = $this->reciept->updateReciept($request->all(), $id);
        if($result){
              return redirect()->route('reciept.index')->with('msg', 'Xác nhận hóa đơn thành công !');
        }else{
            return redirect()->route('reciept.index')->with('warning', 'Hóa đơn đã được xác nhận !');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function show_reciept(Request $request)
    {
        $data = [];
        $detail = Receive_bill::FindOrFail($request->detail_id);
        $name =  $detail->getNameProvide->provide_name_display;
        $data = [
            'quotation_number' => $detail->quotation_number,
            'provide_name' => $name,
            'id' => $detail->id
        ];
        return $data;
    }

    public function getProduct_reciept(Request $request)
    {
        return QuoteImport::where('receive_id', $request->id)->get();
    }
}
