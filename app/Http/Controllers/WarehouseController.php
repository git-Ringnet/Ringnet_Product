<?php

namespace App\Http\Controllers;

use App\Models\Warehouse;
use App\Models\Workspace;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WarehouseController extends Controller
{
    private $workspaces;
    private $wareHouse;
    public function __construct()
    {
        $this->workspaces = new Workspace();
        $this->wareHouse = new Warehouse();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $wareHouse = Warehouse::where('workspace_id', Auth::user()->current_workspace)
            ->orderBy('id', 'desc')
            ->get();
        $title = "Kho";
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;
        return view('tables.abc.warehouse.warehouse', compact('title', 'workspacename', 'wareHouse'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Thêm mới kho hàng";
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;
        return view('tables.abc.warehouse.createWarehouse', compact('title', 'workspacename'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $status = $this->wareHouse->addNewWarehouse($request->all());
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;
        if ($status['status']) {
            return redirect()->route('warehouse.index', $workspacename)->with('msg', 'Thêm mới kho thành công !');
        } else {
            return redirect()->route('warehouse.index', $workspacename)->with('warning', 'Kho đã tồn tại !');
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
    public function edit(string $workspace, string $id)
    {
        $title = "Chỉnh sửa thông tin kho hàng";
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;
        $wareHouse = Warehouse::findOrFail($id);
        return view('tables.abc.warehouse.editWarehouse', compact('title', 'workspacename', 'wareHouse'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $status = $this->wareHouse->updateWarehouse($id, $request->all());
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;
        if ($status['status']) {
            return redirect()->route('warehouse.index', $workspacename)->with('msg', 'Chỉnh sửa kho hàng thành công !');
        } else {
            return redirect()->route('warehouse.index', $workspacename)->with('warning', 'Kho đã tồn tại !');
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
