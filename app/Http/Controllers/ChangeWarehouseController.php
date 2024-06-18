<?php

namespace App\Http\Controllers;

use App\Models\ChangeWarehouse;
use App\Models\ContentImportExport;
use App\Models\Products;
use App\Models\QuoteImport;
use App\Models\Serialnumber;
use App\Models\Warehouse;
use App\Models\Workspace;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChangeWarehouseController extends Controller
{
    private $workspaces;
    private $content;
    private $changeWarehouse;
    public function __construct()
    {
        $this->workspaces = new Workspace();
        $this->changeWarehouse = new ChangeWarehouse();
        $this->content = new ContentImportExport();
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
            ->orderBy('id', 'desc')
            ->get();


        $title = "Phiếu chuyển kho";

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

        $title = "Tạo mới phiếu chuyển kho";

        $warehouse = Warehouse::where('workspace_id', Auth::user()->current_workspace)->get();


        return view('tables.abc.changeWarehouse.create', compact('title', 'workspacename', 'warehouse'));
    }

    /**
     * 
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;
        $status = $this->changeWarehouse->addChangeWarehouse($request->all());
        if ($status['status']) {
            return redirect()->route('changeWarehouse.index', ['workspace' => $workspacename])->with('msg', 'Tạo mới phiếu chuyển kho thành công!');
        } else {
            return redirect()->route('changeWarehouse.index', ['workspace' => $workspacename])->with('warning', 'Tạo mới phiếu chuyển kho thất bại!');
        }
        // dd($request->all());
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
            $title = "Chỉnh sửa phiếu chuyển kho";
            return view('tables.abc.changeWarehouse.edit', compact('title', 'workspacename', 'changeWarehouse'));
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
        if($status['status']){
            return redirect()->route('changeWarehouse.index', ['workspace' => $workspacename])->with('msg', 'Xóa phiếu chuyển kho thành công!');
        }else{
            return redirect()->route('changeWarehouse.index', ['workspace' => $workspacename])->with('warning', 'Không tìm thấy phiếu chuyển kho!');
        }
    }


    public function getProductByWarehouse(Request $request)
    {
        $data = [];
        if ($request->warehouse_id) {
            $quoteImport = QuoteImport::where('warehouse_id', $request->warehouse_id)
                ->where('workspace_id', Auth::user()->current_workspace)
                ->get();

            // Trừ số lượng nếu đã tạo đơn chuyển kho
            $filteredQuoteImport = $quoteImport->filter(function ($item) {
                $changeWarehouseQty = ChangeWarehouse::where('quoteImport_id', $item->id)->sum('qty');

                if ($changeWarehouseQty >= $item->product_qty) {
                    return false; // Loại bỏ phần tử này
                } elseif ($changeWarehouseQty < $item->product_qty) {
                    $item->product_inventory = $item->product_qty - $changeWarehouseQty;
                    return true; // Giữ lại phần tử này
                }
            });

            $data['quoteImport'] = $filteredQuoteImport->values();
        } else {
            $product = Products::where('id', $request->id_product)
                ->where('product_inventory', '>', 0)
                ->first();
            if ($product && $product->check_seri == 1) {
                $seri = Serialnumber::where('quoteImport_id', $request->id_quote)->where('product_id', $product->id)
                    ->where('status', 1)
                    ->get();
                $data['seri'] = $seri;
            }
            $data['product'] = $product;
        }

        return $data;
    }
}
