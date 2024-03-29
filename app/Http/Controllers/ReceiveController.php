<?php

namespace App\Http\Controllers;

use App\Models\DetailImport;
use App\Models\ProductImport;
use App\Models\Products;
use App\Models\QuoteImport;
use App\Models\Receive_bill;
use App\Models\Reciept;
use App\Models\Serialnumber;
use App\Models\Workspace;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReceiveController extends Controller
{
    private $receive;
    private $quoteImport;
    private $product;
    private $reciept;
    private $import;
    private $productImport;
    private $sn;
    private $workspaces;
    public function __construct()
    {
        $this->receive = new Receive_bill();
        $this->quoteImport = new QuoteImport();
        $this->product = new Products();
        $this->reciept = new Reciept();
        $this->import = new DetailImport();
        $this->productImport = new ProductImport();
        $this->sn = new Serialnumber();
        $this->workspaces = new Workspace();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Đơn nhận hàng";
        $perPage = 10;
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;
        $receive = Receive_bill::where('workspace_id', Auth::user()->current_workspace)->orderBy('id', 'desc')->paginate($perPage);
        return view('tables.receive.receive', compact('receive', 'title', 'workspacename'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $id = 1;
        $title = "Tạo đơn nhận hàng";
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;
        $listDetail = DetailImport::leftJoin('quoteimport', 'detailimport.id', '=', 'quoteimport.detailimport_id')
            // ->where('quoteimport.product_qty', '>', 'quoteimport.receive_qty')
            ->where('quoteimport.product_qty', '>', DB::raw('COALESCE(quoteimport.receive_qty,0)'))
            ->where('quoteimport.workspace_id', Auth::user()->current_workspace)
            ->select('detailimport.quotation_number', 'detailimport.id')
            ->distinct()
            ->get();
        return view('tables.receive.insertReceive', compact('title', 'listDetail', 'workspacename'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $id = $request->detailimport_id;
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;
        if ($request->action == 'action_1') {
            // Tạo sản phẩm theo đơn nhận hàng
            $status = $this->productImport->addProductImport($request->all(), $id, 'receive_id', 'receive_qty');
            if ($status) {
                // Tạo đơn nhận hàng mới
                $receive_id = $this->receive->addReceiveBill($request->all(), $id);

                // Thêm SN
                $this->sn->addSN($request->all(), $receive_id, $id);
                return redirect()->route('receive.index', $workspacename)->with('msg', 'Tạo mới đơn nhận hàng thành công !');
            } else {
                return redirect()->route('receive.index', $workspacename)->with('warning', 'Đơn nhận hàng đã tạo hết sản phẩm !');
            }
        } else {
            // Tạo sản phẩm theo đơn nhận hàng
            $status = $this->productImport->addProductImport($request->all(), $id, 'receive_id', 'receive_qty');
            if ($status) {
                // Tạo đơn nhận hàng mới
                $receive_id = $this->receive->addReceiveBill($request->all(), $id);

                // Thêm SN
                $this->sn->addSN($request->all(), $receive_id, $id);

                // Cập nhật đơn hàng
                $this->receive->updateReceive($request->all(), $receive_id);

                // Thêm sản phẩm, seri vào tồn kho
                $this->product->addProductTowarehouse($request->all(), $receive_id);

                return redirect()->route('receive.index', $workspacename)->with('msg', 'Nhận hàng thành công !');
            } else {
                return redirect()->route('receive.index', $workspacename)->with('warning', 'Đơn nhận hàng đã tạo hết sản phẩm !');
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $receive = Receive_bill::findOrFail($id);
        $title = $receive->quotation_number;
        $product = QuoteImport::where('detailimport_id', $receive->detailimport_id)->get();
        return view('tables.receive.showReceive', compact('receive', 'title', 'product', 'history'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $workspace, string $id)
    {
        $receive = Receive_bill::findOrFail($id);
        $detail = DetailImport::where('id', $receive->detailimport_id)->first();
        if ($detail && $detail->getNameRepresent) {
            $nameRepresent = $detail->getNameRepresent->represent_name;
        }else{
            $nameRepresent = "";
        }
        $title = $receive->quotation_number;
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;
        $product = ProductImport::join('quoteimport', 'quoteimport.id', 'products_import.quoteImport_id')
            ->where('products_import.detailimport_id', $receive->detailimport_id)
            ->where('products_import.receive_id', $receive->id)
            ->select(
                'quoteimport.product_code',
                'quoteimport.product_name',
                'quoteimport.product_unit',
                'products_import.product_qty',
                'quoteimport.price_export',
                'quoteimport.product_tax',
                'quoteimport.product_note',
                'products_import.product_id',
                'products_import.cbSN',
                'products_import.receive_id',
                'products_import.quoteImport_id',
                DB::raw('products_import.product_qty * quoteimport.price_export as product_total')
            )
            ->with('getSerialNumber')->get();
        return view('tables.receive.editReceive', compact('receive', 'title', 'product', 'workspacename', 'nameRepresent'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(string $workspace, Request $request, string $id)
    {
        // Cập nhật trạng thái
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;
        $result = $this->receive->updateReceive($request->all(), $id);
        if ($result) {
            // Thêm sản phẩm, seri vào tồn kho
            $this->product->addProductTowarehouse($request->all(), $id);

            return redirect()->route('receive.index', $workspacename)->with('msg', 'Nhận hàng thành công !');
        } else {
            return redirect()->route('receive.index', $workspacename)->with('warning', 'Đơn hàng đã được nhận trước đó !');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $workspace, string $id)
    {
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;
        $result = $this->receive->deleteReceive($id);
        if ($result) {
            return redirect()->route('receive.index', $workspacename)->with('msg', 'Xóa đơn nhận hàng thành công !');
        } else {
            return redirect()->route('receive.index', $workspacename)->with('warning', 'Sản phẩm đã được tạo trong đơn mua hàng !');
        }
    }
    public function show_receive(Request $request)
    {
        $data = [];
        // $detail = DetailImport::FindOrFail($request->detail_id);
        $detail = DetailImport::where('id', $request->detail_id)
            ->where('workspace_id', Auth::user()->current_workspace)->first();
        if ($detail) {
            if ($detail->getProvideName) {
                $nameProvide =  $detail->getProvideName->provide_name_display;
            }
            if ($detail->getNameRepresent) {
                $nameRepresent = $detail->getNameRepresent->represent_name;
            }
        }


        $data = [
            'quotation_number' => isset($detail) ? $detail->quotation_number : "",
            'represent' => isset($nameRepresent) ? $nameRepresent : "",
            'provide_name' => isset($nameProvide) ? $nameProvide : "",
            'id' => isset($detail) ? $detail->id : ""
        ];
        return $data;
    }
    public function getProduct_receive(Request $request)
    {
        $data = [];
        $list = [];
        $id_quote = [];
        $checked = [];
        $value = [];
        $quote = QuoteImport::where('detailimport_id', $request->id)
            ->where('product_qty', '>', DB::raw('COALESCE(receive_qty,0)'))
            ->where('workspace_id', Auth::user()->current_workspace)
            ->get();
        foreach ($quote as $qt) {
            $product = Products::where('product_name', $qt->product_name)
                ->where(DB::raw('COALESCE(product_inventory,0)'), '>', 0)
                ->where('workspace_id', Auth::user()->current_workspace)
                ->first();
            // $productImport = QuoteImport::where('product_name', $qt->product_name)
            //     ->where('workspace_id', Auth::user()->current_workspace)
            //     ->get();

            $productImport = QuoteImport::where('product_name', $qt->product_name)
                ->where('workspace_id', Auth::user()->current_workspace)
                ->first();

            if ($productImport) {
                $CBSN = ProductImport::where('quoteImport_id', $productImport->id)
                    ->where('workspace_id', Auth::user()->current_workspace)
                    ->where('receive_id', '!=', 'null')
                    ->first();
            }
            // foreach ($productImport as $ip) {
            // array_push($id_quote, $ip->id);

            if ($product) {
                array_push($list, $product->check_seri);
                array_push($checked, 'disabled');
            } else if ($CBSN) {
                // return $CBSN;
                // array_push($list, $CBSN->cbSN == 0 ? 1 : $CBSN->cbSN);
                array_push($list, $CBSN->cbSN);
                array_push($checked, 'disabled');
            } else {
                array_push($list, 0);
                array_push($checked, 'endable');
            }
            // }
            // $CBSN = ProductImport::whereIn('quoteImport_id', $id_quote)
            //     ->where('workspace_id', Auth::user()->current_workspace)
            //     ->where('receive_id', '!=', 'null')
            //     ->first();
        }
        // return $list;
        $data = [
            'checked' => $checked,
            'cb' => $list,
            'quoteImport' => $quote,
        ];
        return $data;
    }
}
