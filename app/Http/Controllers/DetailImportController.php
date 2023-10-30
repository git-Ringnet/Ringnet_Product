<?php

namespace App\Http\Controllers;

use App\Models\DetailImport;
use App\Models\ProductCode;
use App\Models\Products;
use App\Models\Provides;
use App\Models\QuoteImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DetailImportController extends Controller
{
    private $import;
    private $provide;
    private $quoteImport;
    public function __construct()
    {
        $this->import = new DetailImport();
        $this->provide = new Provides();
        $this->quoteImport = new QuoteImport();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Đơn mua hàng';
        $import = $this->import->getAllImport();
        return view('tables.import.import', compact('title', 'import'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Tạo đơn mua hàng";
        $provides = Provides::all();
        // $products = Products::all();
        return view('tables.import.insertImport', compact('title', 'provides'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $import_id = $this->import->addImport($request->all());
        $this->quoteImport->addQuoteImport($request->all(),$import_id);
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
        $import = DetailImport::findOrFail($id);
        $provides = Provides::all();
        $title = $import->quotation_number;
        $product = QuoteImport::where('detailimport_id',$import->id)->get();
        return view('tables.import.editImport',compact('import','title','provides','product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function show_provide(Request $request)
    {
        $data = $request->all();
        $provide = Provides::findOrFail($data['provides_id']);
        return $provide;
    }
    public function addNewProvide(Request $request)
    {
        $check = Provides::where('provide_code', $request->provide_code)->first();
        if ($check == null) {
            $data = [
                'provide_name_display' => $request->provide_name_display,
                'provide_name' => $request->provide_name,
                'provide_address' => $request->provide_address,
                'provide_code' => $request->provide_code,
                'provide_represent' => $request->provide_represent,
                'provide_email' => $request->provide_email,
                'provide_phone' => $request->provide_phone,
                'provide_debt' => 0,
                'provide_address_delivery' => $request->provide_address_delivery
            ];
            $new_provide = DB::table('provides')->insertGetId($data);
            $msg = response()->json(['success' => true, 'msg' => 'Thêm mới nhà cung cấp thành công','id' => $new_provide,'name' => $request->provide_name]);
        } else {
            $msg = response()->json(['success' => false, 'msg' => 'Mã số thuế đã tồn tại']);
        }
        return $msg;
    }

    public function getAllProducts(){
        $data = ProductCode::all();
        return $data;
    }
    public function showProductName(Request $request){
        $dataId = $request->dataId;
        return Products::where('product_code',$dataId)->get();
        // $data = $request->all();
        // return $dataId;
    }
}
