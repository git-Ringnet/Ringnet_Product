<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\Provides;
use App\Models\Warehouse;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $products;
    private $provides;
    private $warehouse;
    public function __construct()
    {
        $this->products = new Products();
        $this->provides = new Provides();
        $this->warehouse = new Warehouse();
    }

    public function index()
    {
        $product = $this->products->getAllProducts();
        $title = "Kho 1";
        return view('tables.products.products',compact('product','title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $warehouse = $this->warehouse->getAllWareHouse();
        $title = "Thêm sản phẩm";
        return view('tables.products.insertProduct',compact('warehouse','title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $add = $this->products->addProduct($request->all());
        if($add == 0){
            $msg = redirect()->route('inventory.index')->with('warning', 'Sản phẩm đã tồn tại !');
        }else{
            $msg = redirect()->route('inventory.index')->with('msg', 'Thêm sản phẩm mới thành công !');
        }

        return $msg;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $display = 1;
        $product = Products::findOrFail($id);
        if($product){
            $title = $product->product_name;
        }
        return view('tables.products.editProduct',compact('product','title','display'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $this->products->updateProduct($request->all());
        if($data == 1){
            return redirect()->route('ton-kho.index')->with('msg', 'Chỉnh sửa sản phẩm thành công !');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


    public function editProduct() {
        $title = "Sửa tồn kho";
        $product = $this->products->getAllProducts();
        return view('tables.products.editInventory',compact('product','title'));
    }

    public function showProductInventory($id) {
        $display = 2;
        $product = Products::findOrFail($id);
        if($product){
            $title = $product->product_name;
        }
        return view('tables.products.editProduct',compact('product','title','display'));
    }
}
