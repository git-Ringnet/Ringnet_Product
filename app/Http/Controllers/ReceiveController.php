<?php

namespace App\Http\Controllers;

use App\Models\Attachment;
use App\Models\DetailImport;
use App\Models\PayOder;
use App\Models\ProductImport;
use App\Models\Products;
use App\Models\QuoteImport;
use App\Models\Receive_bill;
use App\Models\Reciept;
use App\Models\Serialnumber;
use App\Models\Workspace;
use Carbon\Carbon;
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
    private $attachment;
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
        $this->attachment = new Attachment();
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
        $receive = Receive_bill::where('receive_bill.workspace_id', Auth::user()->current_workspace)->orderBy('receive_bill.id', 'desc');
        if (Auth::check() && Auth::user()->getRoleUser->roleid == 4) {
            $receive->join('detailimport', 'detailimport.id', 'receive_bill.detailimport_id')
                ->where('detailimport.user_id', Auth::user()->id);
        }
        $receive->select('receive_bill.*');
        $receive = $receive->get();

        // dd($receive);
        // ->paginate($perPage);
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
            ->orderBy('id', 'desc')
            ->distinct();
        if (Auth::check() && Auth::user()->getRoleUser->roleid == 4) {
            $listDetail->where('detailimport.user_id', Auth::user()->id);
        }
        $listDetail = $listDetail->get();
        return view('tables.receive.insertReceive', compact('title', 'listDetail', 'workspacename'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;
        // Quick Action
        if (isset($request->id_import)) {
            $id = $request->id_import;
        } else {
            $id = $request->detailimport_id;
        }
        if ($request->action == 'action_1') {
            // Tạo sản phẩm theo đơn nhận hàng
            $status = $this->productImport->addProductImport($request->all(), $id, 'receive_id', 'receive_qty');
            if ($status) {
                // Tạo đơn nhận hàng mới
                $receive_id = $this->receive->addReceiveBill($request->all(), $id);

                // Thêm SN
                $this->sn->addSN($request->all(), $receive_id, $id);

                // Thêm user flow
                $dataUserFlow = [
                    'user_id' => Auth::user()->id,
                    'activity_type' => "DNH",
                    'activity_description' => "Lưu nháp đơn nhận hàng",
                    'created_at' => Carbon::now()
                ];
                DB::table('user_flow')->insert($dataUserFlow);
                if (isset($request->id_import)) {
                    return redirect()->route('import.index', $workspacename)->with('msg', 'Tạo mới đơn nhận hàng thành công !');
                } else {
                    return redirect()->route('receive.index', $workspacename)->with('msg', 'Tạo mới đơn nhận hàng thành công !');
                }
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

                // Thêm user flow
                $dataUserFlow = [
                    'user_id' => Auth::user()->id,
                    'activity_type' => "DNH",
                    'activity_description' => "Nhận hàng đơn nhận hàng",
                    'created_at' => Carbon::now()
                ];
                DB::table('user_flow')->insert($dataUserFlow);
                if (isset($request->id_import)) {
                    return redirect()->route('import.index', $workspacename)->with('msg', 'Nhận hàng thành công !');
                } else {
                    return redirect()->route('receive.index', $workspacename)->with('msg', 'Nhận hàng thành công !');
                }
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
        if ($detail) {
            $nameRepresent = $detail->represent_name;
        } else {
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
                'products_import.product_guarantee',
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

            // Thêm user flow
            $dataUserFlow = [
                'user_id' => Auth::user()->id,
                'activity_type' => "DNH",
                'activity_description' => "Nhận hàng đơn nhận hàng",
                'created_at' => Carbon::now()
            ];
            DB::table('user_flow')->insert($dataUserFlow);

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
            $this->attachment->deleteFileAll($id, 'DNH');

            $dataUserFlow = [
                'user_id' => Auth::user()->id,
                'activity_type' => "DNH",
                'activity_description' => "Xóa đơn nhận hàng",
                'created_at' => Carbon::now()
            ];

            DB::table('user_flow')->insert($dataUserFlow);
            return redirect()->route('receive.index', $workspacename)->with('msg', 'Xóa đơn nhận hàng thành công !');
        } else {
            return redirect()->route('receive.index', $workspacename)->with('warning', 'Sản phẩm đã được tạo trong đơn bán hàng !');
        }
    }
    public function show_receive(Request $request)
    {
        $data = [];
        $detail = DetailImport::FindOrFail($request->detail_id);
        if ($detail) {
            $nameProvide = $detail->provide_name;
            $nameRepresent = $detail->represent_name;
        }
        if ($request->table == "receive") {
            $count = Receive_bill::where('workspace_id', Auth::user()->current_workspace)->count();

            $lastReceive = Receive_bill::where('workspace_id', Auth::user()->current_workspace)
                ->orderBy('id', 'desc')
                ->first();

            if ($lastReceive) {
                $parts = explode('-', $lastReceive->delivery_code);
                $getNumber = end($parts);
                $count = (int)$getNumber + 1;
            } else {
                $count = $count == 0 ? $count += 1 : $count;
            }
            if ($count < 10) {
                $count = "0" . $count;
            }
            $resultNumber = "MNH-" . $count;
        } elseif ($request->table == "reciept") {
            $count = Reciept::where('workspace_id', Auth::user()->current_workspace)->count();

            $lastReceive = Reciept::where('workspace_id', Auth::user()->current_workspace)
                ->orderBy('id', 'desc')
                ->first();

            if ($lastReceive) {
                $parts = explode('-', $lastReceive->number_bill);
                $getNumber = end($parts);
                $count = (int)$getNumber + 1;
            } else {
                $count = $count == 0 ? $count += 1 : $count;
            }
            if ($count < 10) {
                $count = "0" . $count;
            }
            $resultNumber = "SHD-" . $count;
        } else {
            $count = PayOder::where('workspace_id', Auth::user()->current_workspace)->count();

            $lastReceive = PayOder::where('workspace_id', Auth::user()->current_workspace)
                ->orderBy('id', 'desc')
                ->first();

            if ($lastReceive) {
                $parts = explode('-', $lastReceive->payment_code);
                $getNumber = end($parts);
                $count = (int)$getNumber + 1;
            } else {
                $count = $count == 0 ? $count += 1 : $count;
            }
            if ($count < 10) {
                $count = "0" . $count;
            }
            $resultNumber = "MTT-" . $count;
        }


        $data = [
            'quotation_number' => isset($detail) ? $detail->quotation_number : "",
            'represent' => isset($nameRepresent) ? $nameRepresent : "",
            'provide_name' => isset($nameProvide) ? $nameProvide : "",
            'id' => isset($detail) ? $detail->id : "",
            'resultNumber' => $resultNumber
        ];
        return $data;
    }
    public function getProduct_receive(Request $request)
    {
        $data = [];
        $list = [];
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

            $productImport = QuoteImport::where('product_name', $qt->product_name)
                ->where('workspace_id', Auth::user()->current_workspace)
                ->first();

            if ($productImport) {
                $CBSN = ProductImport::where('quoteImport_id', $productImport->id)
                    ->where('workspace_id', Auth::user()->current_workspace)
                    ->where('receive_id', '!=', 'null')
                    ->first();
            }
            $getProductGuarantee = Products::where('product_name', $qt->product_name)
                ->where('workspace_id', Auth::user()->current_workspace)
                ->first();
            if ($getProductGuarantee) {
                array_push($value, $getProductGuarantee->product_guarantee);
            }
            if ($product) {
                array_push($list, $product->check_seri);
                array_push($checked, 'disabled');
            } else if ($CBSN) {
                array_push($list, $CBSN->cbSN);
                array_push($checked, 'disabled');
            } else {
                array_push($list, 0);
                array_push($checked, 'endable');
            }
        }

        $data = [
            'checked' => $checked,
            'cb' => $list,
            'quoteImport' => $quote,
            'value' => $value
        ];
        return $data;
    }
    public function searchReceive(Request $request)
    {
        $data = $request->all();
        $filters = [];
        if ($request->ajax()) {
            $receive = $this->receive->ajax($data);
            return response()->json([
                'data' => $receive,
                'filters' => $filters,
            ]);
        }
        return false;
    }
}
