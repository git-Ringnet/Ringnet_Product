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

class ChangeWarehouseController extends Controller
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
        // $content = ContentImportExport::where('workspace_id', Auth::user()->current_workspace)
        //     ->orderBy('id', 'desc')
        //     ->get();

        $changeWarehouse = ChangeWarehouse::where('workspace_id', Auth::user()->current_workspace)
            ->where('type_change_warehouse', 1)
            ->orderBy('id', 'desc')
            ->get();

        $title = "Phiếu xuất chuyển kho";

        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;
        return view('tables.abc.changeWarehouse.index', compact('title', 'workspacename', 'changeWarehouse'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;

        $title = "Tạo mới phiếu xuất chuyển kho";

        $warehouse = Warehouse::where('workspace_id', Auth::user()->current_workspace)->get();
        $product = $this->product->getAllProducts();
        //danh sách nhân viên
        $users = User::where('origin_workspace', Auth::user()->origin_workspace)->get();
        //
        $invoiceAuto = $this->changeWarehouse->getQuoteCount();

        return view('tables.abc.changeWarehouse.create', compact('title', 'workspacename', 'warehouse', 'product', 'users', 'invoiceAuto'));
    }

    /**
     * 
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;
        $status = $this->changeWarehouse->addChangeWarehouse($request->all(), 1);
        $this->productChangeWarehouse->addChangeProduct($request->all(), $status['id']);
        if ($status['status']) {
            return redirect()->route('changeWarehouse.index', ['workspace' => $workspacename])->with('msg', 'Tạo mới phiếu chuyển kho thành công!');
        } else {
            return redirect()->route('changeWarehouse.index', ['workspace' => $workspacename])->with('warning', 'Tạo mới phiếu chuyển kho thất bại!');
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
                ->where('type_change_warehouse', 1)
                ->orderBy('id', 'desc')
                ->get();
            $title = "Chỉnh sửa phiếu xuất chuyển kho";
            //danh sách nhân viên
            $users = User::where('origin_workspace', Auth::user()->origin_workspace)->get();
            $products = ProductChangeWarehouse::where('workspace_id', Auth::user()->current_workspace)
                ->where('id_change_warehouse', $id)
                ->get();
            return view('tables.abc.changeWarehouse.edit', compact('title', 'workspacename', 'changeWarehouse', 'listDetail', 'users', 'products'));
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
            return redirect()->route('changeWarehouse.index', ['workspace' => $workspacename])->with('msg', 'Xóa phiếu chuyển kho thành công!');
        } else {
            return redirect()->route('changeWarehouse.index', ['workspace' => $workspacename])->with('warning', 'Không tìm thấy phiếu chuyển kho!');
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

            // $quoteImport = QuoteImport::where('warehouse_id', $request->warehouse_id)
            //     ->where('workspace_id', Auth::user()->current_workspace)
            //     ->get();

            // // Trừ số lượng nếu đã tạo đơn chuyển kho
            // $filteredQuoteImport = $quoteImport->filter(function ($item) {
            //     $changeWarehouseQty = ChangeWarehouse::where('quoteImport_id', $item->id)->sum('qty');

            //     if ($changeWarehouseQty >= $item->product_qty) {
            //         return false; // Loại bỏ phần tử này
            //     } elseif ($changeWarehouseQty < $item->product_qty) {
            //         $item->product_inventory = $item->product_qty - $changeWarehouseQty;
            //         return true; // Giữ lại phần tử này

            //     }
            // });

            // $data['quoteImport'] = $filteredQuoteImport->values();
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

            // $product = Products::where('id', $request->id_product)
            //     ->where('product_inventory', '>', 0)
            //     ->first();
            // if ($product && $product->check_seri == 1) {

            // }
            $data['qty'] = $product->qty;

            $data['product'] = $getProduct;
        }

        return $data;
    }
    public function search(Request $request)
    {
        $data = $request->all();
        $filters = [];
        if (isset($data['date']) && $data['date'][1] !== null) {
            $date_start = date("d/m/Y", strtotime($data['date'][0]));
            $date_end = date("d/m/Y", strtotime($data['date'][1]));
            $filters[] = ['value' => 'Ngày báo giá: từ ' . $date_start . ' đến ' . $date_end, 'name' => 'date', 'icon' => 'date'];
        }
        if ($request->ajax()) {
            $changeWarehouse = $this->changeWarehouse->ajax($data);
            return response()->json([
                'data' => $changeWarehouse,
                'filters' => $filters,
            ]);
        }
        return false;
    }
}
