<?php

namespace App\Http\Controllers;

use App\Models\HistoryImport;
use App\Models\ProductImport;
use App\Models\Products;
use App\Models\Provides;
use App\Models\QuoteImport;
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
        return view('tables.products.products', compact('product', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $warehouse = $this->warehouse->getAllWareHouse();
        $title = "Thêm sản phẩm";
        return view('tables.products.insertProduct', compact('warehouse', 'title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $add = $this->products->addProduct($request->all());
        if ($add == 0) {
            $msg = redirect()->route('inventory.index')->with('warning', 'Sản phẩm đã tồn tại !');
        } else {
            $msg = redirect()->route('inventory.index')->with('msg', 'Thêm sản phẩm mới thành công !');
        }

        return $msg;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $display = 1;
        $product = Products::findOrFail($id);
        if ($product) {
            $title = $product->product_name;
        }
        $history = ProductImport::where('product_id',$id)->get();
        return view('tables.products.showProduct', compact('product', 'title', 'display','history'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $display = 1;
        $product = Products::findOrFail($id);
        if ($product) {
            $title = $product->product_name;
        }
        return view('tables.products.editProduct', compact('product', 'title', 'display'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $this->products->updateProduct($request->all());
        if ($data == 1) {
            return redirect()->route('inventory.index')->with('msg', 'Chỉnh sửa sản phẩm thành công !');
        }else{
            return redirect()->route('inventory.index')->with('warning', 'Chỉnh sửa sản phẩm thất bại !');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


    public function editProduct()
    {
        $title = "Sửa tồn kho";
        $product = $this->products->getAllProducts();
        return view('tables.products.editInventory', compact('product', 'title'));
    }

    public function showProductInventory($id)
    {
        $display = 2;
        $product = Products::findOrFail($id);
        if ($product) {
            $title = $product->product_name;
        }
        return view('tables.products.editProduct', compact('product', 'title', 'display'));
    }
    public function search(Request $request)
    {
        $data = $request->all();
        $arrProductsName = [];
        $arrProductsCode = [];
        if ($request->ajax()) {
            $output = '';
            $products = $this->products->ajax($data);
            if (!empty($request->input('idName'))) {
                $arrProductsName = $this->products->getProductsbyName($data);
            }
            if (!empty($request->input('idCode'))) {
                $arrProductsCode = $this->products->getProductsbyCode($data);
            }
            if ($products) {
                foreach ($products as $key => $product) {
                    $url = route('inventory.edit', $product->id);
                    $output .= '<tr>
                    <td><input type="checkbox"></td>
                    <td>' . $product->product_code . '</td>
                    <td>' . $product->product_name . '</td>
                    <td>' . number_format($product->product_inventory) . '</td>
                    <td>' . '<a href="' . $url . '">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                    height="24" viewBox="0 0 24 24" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M21 12C21 10.8954 20.1046 10 19 10C17.8954 10 17 10.8954 17 12C17 13.1046 17.8954 14 19 14C20.1046 14 21 13.1046 21 12Z"
                    fill="#42526E"></path>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M14 12C14 10.8954 13.1046 10 12 10C10.8954 10 10 10.8954 10 12C10 13.1046 10.8954 14 12 14C13.1046 14 14 13.1046 14 12Z"
                    fill="#42526E"></path>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M7 12C7 10.8954 6.10457 10 5 10C3.89543 10 3 10.8954 3 12C3 13.1046 3.89543 14 5 14C6.10457 14 7 13.1046 7 12Z"
                    fill="#42526E">
                    </path>
                    </svg>
                    </a>' . '</td>
                    </tr>';
                }
            }
            return [
                'output' => $output,
                'code' => $arrProductsCode,
                'name' => $arrProductsName,
                'inventory' => [$request->input('inventory'), $request->input('inventory_op')],
            ];
        }
    }
}
