<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\UserFlow;
use App\Models\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WarehouseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $warehouse;
    private $userFlow;
    private $products;

    public function __construct()
    {
        $this->warehouse = new Warehouse();
        $this->userFlow = new UserFlow();
        $this->products = new Products();
    }

    public function index()
    {
        $title = 'Kho hàng';
        $warehouses = $this->warehouse->getAllWareHouse();
        return view('warehouse.index', compact('title', 'warehouses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Thêm mới kho hàng";
        return view('warehouse.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $result = $this->warehouse->addWarehouse($request->all());
        if ($result == true) {
            $msg = redirect()->back()->with('warning', 'Kho hàng đã tồn tại');
        } else {
            $arrCapNhatKH = [
                'name' => 'SP',
                'des' => 'Lưu kho hàng'
            ];
            $this->userFlow->addUserFlow($arrCapNhatKH);
            $msg = redirect()->route('warehouse.index')->with('msg', 'Thêm mới kho hàng thành công');
        }
        return $msg;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $title = "Xem nhóm sản phẩm";
        $warehouse = Warehouse::find($id);
        $products = $this->products->getAllProducts();
        return view('warehouse.show', compact('title', 'warehouse', 'products'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $title = "Sửa nhóm sản phẩm";
        $warehouse = Warehouse::find($id);
        return view('warehouse.edit', compact('title', 'warehouse'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $updatWarehouse = $this->warehouse->updateWarehouse($request->all(), $id);
        if ($updatWarehouse == true) {
            $msg = redirect()->back()->with('warning', 'Kho hàng đã tồn tại!');
        } else {
            $arrCapNhatKH = [
                'name' => 'SP',
                'des' => 'Cập nhật kho hàng'
            ];
            $this->userFlow->addUserFlow($arrCapNhatKH);
            $msg = redirect()->route('warehouse.index')->with('msg', 'Cập nhật kho hàng thành công!');
        }
        return $msg;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $warehouse = Warehouse::find($id);
        if (!$warehouse) {
            return back()->with('warning', 'Không tìm thấy kho hàng để xóa');
        }
        $check = Products::where('warehouse_id', $id)
            ->where('workspace_id', Auth::user()->current_workspace)
            ->get();
        if (!$check->isEmpty()) {
            return back()->with('warning', 'Xóa thất bại do kho hàng còn sản phẩm!');
        }
        $warehouse->delete();
        $arrCapNhatKH = [
            'name' => 'SP',
            'des' => 'Xóa kho hàng'
        ];
        $this->userFlow->addUserFlow($arrCapNhatKH);
        return back()->with('msg', 'Xóa kho hàng thành công');
    }
}
