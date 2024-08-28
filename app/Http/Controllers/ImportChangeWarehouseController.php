<?php

namespace App\Http\Controllers;

use App\Models\ChangeWarehouse;
use App\Models\ContentImportExport;
use App\Models\ProductChangeWarehouse;
use App\Models\Products;
use App\Models\ProductWarehouse;
use App\Models\Serialnumber;
use App\Models\User;
use App\Models\Warehouse;
use App\Models\Workspace;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ImportChangeWarehouseController extends Controller
{
    private $workspaces;
    private $content;
    private $changeWarehouse;
    private $product;
    private $productChangeWarehouse;
    public function __construct()
    {
        $this->workspaces = new Workspace();
        $this->changeWarehouse = new ChangeWarehouse();
        $this->content = new ContentImportExport();
        $this->product = new Products();
        $this->productChangeWarehouse = new ProductChangeWarehouse();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $changeWarehouse = ChangeWarehouse::where('workspace_id', Auth::user()->current_workspace)
            ->where('type_change_warehouse', 2)
            ->orderBy('id', 'desc')
            ->get();

        $title = "Phiếu nhập chuyển kho";

        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;
        return view('tables.abc.changeWarehouse.indexImport', compact('title', 'workspacename', 'changeWarehouse'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;

        $title = "Tạo mới phiếu nhập chuyển kho";

        $warehouse = Warehouse::where('workspace_id', Auth::user()->current_workspace)->get();
        $product = $this->product->getAllProducts();
        //danh sách nhân viên
        $users = User::where('origin_workspace', Auth::user()->origin_workspace)->get();
        $invoiceAuto = $this->changeWarehouse->getQuoteCount1();
        return view('tables.abc.changeWarehouse.createImport', compact('title', 'workspacename', 'warehouse', 'product', 'users', 'invoiceAuto'));
    }

    /**
     * 
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;
        $status = $this->changeWarehouse->addChangeWarehouse($request->all(), 2);
        $this->productChangeWarehouse->addChangeProduct($request->all(), $status['id']);
        if ($status['status']) {
            return redirect()->route('importChangeWarehouse.index', ['workspace' => $workspacename])->with('msg', 'Tạo mới phiếu chuyển kho thành công!');
        } else {
            return redirect()->route('importChangeWarehouse.index', ['workspace' => $workspacename])->with('warning', 'Tạo mới phiếu chuyển kho thất bại!');
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
    public function edit(string $workspacename, string $id)
    {
        $changeWarehouse = ChangeWarehouse::where('id', $id)->first();
        if ($changeWarehouse) {
            $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
            $workspacename = $workspacename->workspace_name;
            $listDetail = ChangeWarehouse::where('workspace_id', Auth::user()->current_workspace)
                ->where('type_change_warehouse', 2)
                ->orderBy('id', 'desc')
                ->get();
            $title = "Chỉnh sửa phiếu xuất chuyển kho";
            //danh sách nhân viên
            $users = User::where('origin_workspace', Auth::user()->origin_workspace)->get();
            $products = ProductChangeWarehouse::where('workspace_id', Auth::user()->current_workspace)
                ->where('id_change_warehouse', $id)
                ->get();
            return view('tables.abc.changeWarehouse.editImport', compact('title', 'workspacename', 'changeWarehouse', 'listDetail', 'users', 'products'));
        }
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
    public function destroy(string $workspacename, string $id)
    {
        $status = $this->changeWarehouse->deleteChangeWarehouse($id);
        if ($status['status']) {
            return redirect()->route('importChangeWarehouse.index', ['workspace' => $workspacename])->with('msg', 'Xóa phiếu chuyển kho thành công!');
        } else {
            return redirect()->route('importChangeWarehouse.index', ['workspace' => $workspacename])->with('warning', 'Không tìm thấy phiếu chuyển kho!');
        }
    }

    public function getProductByWarehouse(Request $request)
    {
        $data = [];
        if ($request->warehouse_id) {
            $productWarehosue = ProductWarehouse::where('warehouse_id', $request->warehouse_id)
                ->where('workspace_id', Auth::user()->current_workspace)->get();

            if ($productWarehosue) {
                $product_id = [];
                foreach ($productWarehosue as $item) {
                    $product = Products::where('id', $item->product_id)->first();
                    if ($product && $item->qty > 0) {
                        array_push($product_id, $product->id);
                    }
                }
            }
            $quoteImport = Products::whereIn('id', $product_id)->get();
            $data['quoteImport'] = $quoteImport;
        } else {
            // Lấy số lượng sản phẩm tồn trong kho 
            $product = ProductWarehouse::where('product_id', $request->id_product)
                ->where('warehouse_id', $request->id_warehouse)
                ->first();

            $getProduct = Products::where('id', $product->product_id)
                ->where('workspace_id', Auth::user()->current_workspace)->first();
            if ($getProduct->check_seri == 1) {
                $seri = Serialnumber::where('quoteImport_id', $request->id_quote)->where('product_id', $product->id)
                    ->where('warehouse_id', $request->id_warehouse)
                    ->where('status', 1)
                    ->get();
                $data['seri'] = $seri;
            }

            $data['qty'] = $product->qty;
            $data['product'] = $getProduct;
        }

        return $data;
    }
}
