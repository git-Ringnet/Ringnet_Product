<?php

namespace App\Http\Controllers;

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
        $title = "abc";
        // $users = $this->receive->getUserInReceive();
        return view('tables.returnImport.index', compact('data', 'title', 'workspacename'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $listDetail = Receive_bill::where('workspace_id', Auth::user()->current_workspace)
            ->where('status', 2)
            ->get();
        $title = "Tạo mới trả hàng NCC";
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;
        return view('tables.returnImport.create', compact('listDetail', 'title', 'workspacename'));
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
                ->where('returnproduct.returnImport_id', $returnImport->id)
                ->select('quoteimport.*', 'returnproduct.*', 'products.check_seri')
                ->get();
        }
        return view('tables.returnImport.edit', compact('returnImport', 'title', 'workspacename', 'product'));
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
        $quoteImport = QuoteImport::leftJoin('products', 'products.id', 'quoteimport.product_id')
            ->where('quoteimport.receive_id', $request->detail_id)
            ->select('quoteimport.*', 'products.check_seri', 'products.product_inventory')
            ->get();
        // Trừ số lượng nếu đã tạo đơn
        if ($quoteImport) {
            foreach ($quoteImport as $item) {
                $productImport = ReturnProduct::
                    // leftJoin('returnimport','returnimport.id','returnproduct.returnImport_id')
                    // ->
                    where('quoteimport_id', $item->id)
                    ->sum('qty');
                array_push($qty, $productImport);

                // if (isset($productImport)) {
                //     array_push($qty, $productImport->product_qty);
                // } else {
                //     array_push($qty, 0);
                // }
            }
        }
        $data['qty'] = $qty;
        $data['product'] = $quoteImport;
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
