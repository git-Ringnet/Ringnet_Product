<?php

namespace App\Http\Controllers;

use App\Models\HistoryReceive;
use App\Models\ProductImport;
use App\Models\Products;
use Illuminate\Http\Request;

class HistoryReceiveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $historyReceive;
    private $product;
    public function __construct()
    {
        $this->historyReceive = new HistoryReceive();
        $this->product = new Products();
    }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        $historyReceive = HistoryReceive::where('id', $id)->first();
        if ($historyReceive) {
            $title = $historyReceive->id;
            $product = ProductImport::where('receive_id', $historyReceive->id)->get();
            return view('tables.receive.editReceive', compact('historyReceive', 'title', 'product'));
        } else {
            dd(0);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $result = $this->historyReceive->updateHistoryReceive($request->all(), $id);
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
}
