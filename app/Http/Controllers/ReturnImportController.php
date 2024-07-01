<?php

namespace App\Http\Controllers;

use App\Models\DetailImport;
use App\Models\ProductImport;
use App\Models\QuoteImport;
use App\Models\Receive_bill;
use App\Models\ReturnImport;
use App\Models\ReturnProduct;
use App\Models\Serialnumber;
use App\Models\Workspace;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReturnImportController extends Controller
{
    private $workspaces;
    private $returnImport;
    private $returnProduct;
    public function __construct()
    {
        $this->workspaces = new Workspace();
        $this->returnImport = new ReturnImport();
        $this->returnProduct = new ReturnProduct();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = ReturnImport::where('workspace_id', Auth::user()->current_workspace)->get();
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;
        $title = "Trả hàng NCC";
        // $users = $this->receive->getUserInReceive();
        return view('tables.returnImport.index', compact('data', 'title', 'workspacename'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $listDetail = Receive_bill::where('receive_bill.workspace_id', Auth::user()->current_workspace)
            ->where('receive_bill.detailimport_id', '!=', 0)
            ->where('receive_bill.status', 2)->get();

        // ->leftJoin('returnimport','returnimport.receive_id','receive_bill.id')
        // ->leftJoin('returnproduct','returnproduct.returnImport_id','returnimport.id')
        // ->leftJoin('quoteimport','quoteimport.receive_id','receive_bill.id')
        // ->where('receive_bill.workspace_id', Auth::user()->current_workspace)
        //     ->where('receive_bill.status', 2)
        //     ->select('receive_bill.*','returnproduct.qty as total')
        //     ->where(DB::raw('COALESCE(total,0)'), '<', DB::raw('COALESCE(quoteimport.product_qty,0)'))
        //     ->distinct()
        //     ->get();
        $title = "Tạo mới trả hàng NCC";
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;
        // dd($listDetail);
        $returnCode = $this->returnImport->getQuoteCount();
        return view('tables.returnImport.create', compact('listDetail', 'title', 'workspacename', 'returnCode'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $status = $this->returnImport->addReturnImport($request->all());
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;
        if ($status['status']) {
            $this->returnProduct->addReturnProduct($request->all(), $status['id']);

            if ($request->action == "action_2") {
                $status = $this->returnImport->updateReturnImport($request->all(), $status['id']);
                return redirect()->route('returnImport.index', $workspacename)->with('msg', 'Trả hàng thành công !');
            } else {
                return redirect()->route('returnImport.index', $workspacename)->with('msg', 'Tạo mới đơn trả hàng thành công !');
            }
        } else {
            return redirect()->route('returnImport.index', $workspacename)->with('warning', 'Tạo mới đơn trả hàng thất bại !');
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
        $returnImport = ReturnImport::where('id', $id)->first();
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;
        $title = "Chỉnh sửa đơn trả hàng";
        if ($returnImport) {
            $product = ReturnProduct::leftJoin('quoteimport', 'quoteimport.id', 'returnproduct.quoteimport_id')
                ->leftJoin('products', 'products.id', 'quoteimport.product_id')
                ->leftJoin('warehouse', 'warehouse.id', 'quoteimport.warehouse_id')
                ->where('returnproduct.returnImport_id', $returnImport->id)
                ->select('quoteimport.*', 'returnproduct.*', 'products.check_seri', 'warehouse.warehouse_name as nameWarehouse')
                ->get();

            $detail = $returnImport->getReceive;
            $detail = $detail->getQuotation;
        }
        $listDetail = ReturnImport::where('workspace_id', Auth::user()->current_workspace)->get();
        return view('tables.returnImport.edit', compact('returnImport', 'title', 'workspacename', 'product', 'detail', 'listDetail'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(string $workspace, Request $request, string $id)
    {
        $status = $this->returnImport->updateReturnImport($request->all(), $id);
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;
        if ($status['status']) {
            return redirect()->route('returnImport.index', $workspacename)->with('msg', 'Cập nhật thành công !');
        } else {
            return redirect()->route('returnImport.index', $workspacename)->with('warning', 'Cập nhật thất bại !');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $workspace, string $id)
    {
        $status = $this->returnImport->deleteReturn($id);
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;
        if ($status['status']) {
            return redirect()->route('returnImport.index', $workspacename)->with('msg', 'Xóa đơn trả hàng thành công !');
        } else {
            return redirect()->route('returnImport.index', $workspacename)->with('warning', 'Xóa đơn trả hàng thất bại !');
        }
    }


    public function show_receiveBill(Request $request)
    {
        $data = [];
        $qty = [];
        $warehouse = [];
        $quoteImport = QuoteImport::leftJoin('products', 'products.id', 'quoteimport.product_id')
            ->where('quoteimport.receive_id', $request->detail_id)
            ->select('quoteimport.*', 'products.check_seri', 'products.product_inventory')
            ->get();
        // Trừ số lượng nếu đã tạo đơn
        if ($quoteImport) {
            foreach ($quoteImport as $item) {
                if ($item->getWareHouse) {
                    array_push($warehouse, $item->getWareHouse->warehouse_name);
                }
                $productImport = ReturnProduct::where('quoteimport_id', $item->id)
                    ->sum('qty');
                array_push($qty, $productImport);
            }
            $detail = DetailImport::where('id', $quoteImport[0]->detailimport_id)->first();
        }

        $data['warehouse'] = $warehouse;
        $data['qty'] = $qty;
        $data['product'] = $quoteImport;
        $data['detail'] = $detail;
        return $data;
    }

    public function getSNByBill(Request $request)
    {
        $qtuote = QuoteImport::where('id', $request->id)->first();
        $list = [];
        if ($qtuote) {
            // Check SN
            $returnImport = ReturnProduct::where('quoteimport_id', $qtuote->id)->get();
            if ($returnImport) {
                foreach ($returnImport as $item) {
                    $sn = json_decode($item->sn, true);
                    foreach ($sn as $SN) {
                        array_push($list, $SN);
                    }
                }
            }
            // lấy SN không tồn tại trong mảng đã xuất ra 
            $SN = Serialnumber::where('quoteImport_id', $request->id)
                ->whereNotIn('serinumber', $list)
                ->where('status', 1)
                ->get();
        }

        return $SN;
    }
}
