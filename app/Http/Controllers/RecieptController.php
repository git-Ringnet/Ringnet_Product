<?php

namespace App\Http\Controllers;


use App\Models\QuoteImport;
use App\Models\Receive_bill;
use App\Models\Reciept;
use Illuminate\Http\Request;

class RecieptController extends Controller
{
    private $reciept;
    public function __construct()
    {
        $this->reciept = new Reciept();
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
        $reciept = Receive_bill::where('status', '=', 2)->get();
        return view('tables.reciept.insertReciept', compact('title', 'reciept'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $id = "";
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
        $product = QuoteImport::where('receive_id', $reciept->receive_id)->get();
        return view('tables.reciept.editReciept', compact('title', 'reciept', 'product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->reciept->updateReciept($request->all(),$id);
        // return redirect()->route('receive.index')->with('msg', 'Tạo mới đơn mua hàng thành công !');
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
