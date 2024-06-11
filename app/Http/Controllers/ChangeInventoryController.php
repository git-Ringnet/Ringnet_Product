<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\QuoteImport;
use App\Models\Serialnumber;
use App\Models\Warehouse;
use App\Models\Workspace;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChangeInventoryController extends Controller
{
    private $workspaces;
    private $products;
    public function __construct()
    {
        $this->workspaces = new Workspace();
        $this->products = new Products();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = $this->products->getAllProducts();
        $title = "Kho 1";
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;
        return view('tables.abc.changeInventory.index', compact('product', 'title', 'workspacename'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Thêm mới điều chỉnh tồn";
        $product = Products::where('workspace_id', Auth::user()->current_workspace)->get();
        $category = [];
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;
        return view('tables.abc.changeInventory.create', compact('category', 'title', 'workspacename', 'product'));
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
        //
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



    public function checkInventory(Request $request)
    {
        $product = Products::where('id', $request->id)->first();
        if ($product) {
            $status = [];
            if ($product->product_inventory == 0) {
                $status['status'] = "disabled";
                $warehouse = Warehouse::where('workspace_id', Auth::user()->current_workspace)->get();
                $status['warehouse'] = $warehouse;
            } else {
                $status['status'] = "endabled";
                $quoteImport = QuoteImport::where('product_id', $product->id)->get();
                $list = [];
                if ($quoteImport) {
                    foreach ($quoteImport as $item) {
                        array_push($list, $item->warehouse_id);
                    }
                }
                $warehouse = Warehouse::whereIn('id', $list)->get();
                $status['warehouse'] = $warehouse;
                if($product->check_seri == 1){
                    $seri = Serialnumber::where('product_id',$product->id)->where('workspace_id',Auth::user()->current_workspace)->get();
                    $status['seri'] = $seri;
                }
            }
            $product->check_seri == 1 ? $status['check_seri'] = "d-block" : $status['check_seri'] = "d-none";
        }
        return $status;
    }
}
