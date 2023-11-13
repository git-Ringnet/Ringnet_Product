<?php

namespace App\Http\Controllers;

use App\Models\DetailImport;
use App\Models\Products;
use App\Models\QuoteImport;
use App\Models\Receive_bill;
use App\Models\Reciept;
use Illuminate\Http\Request;

class ReceiveController extends Controller
{
    private $receive;
    private $quoteImport;
    private $product;
    private $reciept;
    public function __construct()
    {
        $this->receive = new Receive_bill();
        $this->quoteImport = new QuoteImport();
        $this->product = new Products();
        $this->reciept = new Reciept();
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
        $title = "Tạo đơn nhận hàng";
        $listDetail = DetailImport::leftJoin('quoteimport', 'detailimport.id', '=', 'quoteimport.detailimport_id')
            ->where('quoteimport.receive_id',0)
            ->distinct()
            ->select('detailimport.quotation_number', 'detailimport.id')
            ->get();
        // $listDetail = DetailImport::all();

        return view('tables.receive.insertReceive', compact('title', 'listDetail'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $id = $request->detailimport_id;
        // Tạo đơn nhận hàng mới
        $this->receive->addReceiveBill($request->all(),$id);
        // Thêm sản phẩm vào tồn kho
        $this->product->addProductTowarehouse($request->all(),$id);
        
        return redirect()->route('receive.index')->with('msg', 'Tạo mới đơn nhận hàng thành công !');
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
        $product = QuoteImport::where('receive_id',$id)
        ->with('getSerialNumber')->get();
        // dd($product->getSerialNumber);
        return view('tables.receive.editReceive',compact('receive', 'title','product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Cập nhật trạng thái
        $this->receive->updateReceive($request->all(),$id);

        // Thêm sản phẩm, seri vào tồn kho
        $this->product->addProductTowarehouse($request->all(),$id);

        // Thêm mới hóa đơn mua hàng
        $this->reciept->addReciept($request->all(),$id);
        return redirect()->route('receive.index')->with('msg', 'Tạo mới hóa đơn mua hàng thành công !');
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
        return QuoteImport::where('detailimport_id', $request->id)->where('receive_id', 0)->get();
        return $request->id;
    }


}
