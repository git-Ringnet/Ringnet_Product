<?php

namespace App\Http\Controllers;

use App\Models\Attachment;
use App\Models\DetailImport;
use App\Models\PayOder;
use App\Models\ProductImport;
use App\Models\Products;
use App\Models\Provides;
use App\Models\QuoteImport;
use App\Models\Receive_bill;
use App\Models\Reciept;
use App\Models\Serialnumber;
use App\Models\User;
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
    private $users;
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
        $this->users = new User();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Phiếu nhập kho";
        $perPage = 10;
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;
        $receive = Receive_bill::where('receive_bill.workspace_id', Auth::user()->current_workspace)
            ->leftJoin('provides', 'receive_bill.provide_id', 'provides.id')
            ->orderBy('receive_bill.id', 'desc');
        if (Auth::check() && Auth::user()->getRoleUser->roleid == 4) {
            $receive->join('detailimport', 'detailimport.id', 'receive_bill.detailimport_id')
                ->where('detailimport.user_id', Auth::user()->id);
        }
        $receive->select('receive_bill.*', 'provides.provide_name_display');
        $receive = $receive->get();
        $users = $this->receive->getUserInReceive();

        // ->paginate($perPage);
        return view('tables.receive.receive', compact('receive', 'users', 'title', 'workspacename'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $id = 1;
        $title = "Tạo phiếu nhập kho";
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;
        $listDetailImport = DetailImport::leftJoin('quoteimport', 'detailimport.id', '=', 'quoteimport.detailimport_id')
            ->where('quoteimport.product_qty', '>', DB::raw('COALESCE(quoteimport.receive_qty,0)'))
            ->where('quoteimport.workspace_id', Auth::user()->current_workspace)
            ->select('detailimport.quotation_number', 'detailimport.id')
            ->orderBy('id', 'desc')
            ->distinct();
        if (Auth::check() && Auth::user()->getRoleUser->roleid == 4) {
            $listDetailImport->where('detailimport.user_id', Auth::user()->id);
        }
        $listDetailImport = $listDetailImport->get();
        $provide = Provides::where('workspace_id', Auth::user()->current_workspace)->get();


        // Phiếu nhập kho
        $currentDate = Carbon::now()->format('dmY');
        $lastInvoiceNumber =
            Receive_bill::where('workspace_id', Auth::user()->current_workspace)
            // ->whereDate('created_at', now())
            ->count() + 1;
        $lastInvoiceNumber = $lastInvoiceNumber !== null ? $lastInvoiceNumber : 1;
        if ($lastInvoiceNumber !== null) {
            $last =
                Receive_bill::where('workspace_id', Auth::user()->current_workspace)
                ->orderBy('id', 'desc')
                ->first();

            $pattern = '/PNK(\d+)-/';
            if ($last) {
                preg_match($pattern, $last->delivery_code, $matches);
                $getNumber = isset($matches[1]) ? $matches[1] : 0;
                $lastInvoiceNumber = $getNumber + 1;
            }
        } else {
            $lastInvoiceNumber = 1;
        }


        $countFormattedInvoice = str_pad($lastInvoiceNumber, 2, '0', STR_PAD_LEFT);

        $invoicenumber = "PNK{$countFormattedInvoice}-{$currentDate}";
        $code = $invoicenumber;

        //
        $listDetail = Receive_bill::where('receive_bill.workspace_id', Auth::user()->current_workspace)
            ->leftJoin('provides', 'receive_bill.provide_id', 'provides.id')
            ->orderBy('receive_bill.id', 'desc');
        if (Auth::check() && Auth::user()->getRoleUser->roleid == 4) {
            $listDetail->join('detailimport', 'detailimport.id', 'receive_bill.detailimport_id')
                ->where('detailimport.user_id', Auth::user()->id);
        }
        $listDetail->select('receive_bill.*', 'provides.provide_name_display');
        $listDetail = $listDetail->get();
        return view('tables.receive.insertReceive', compact('title', 'listDetailImport', 'workspacename', 'provide', 'code', 'listDetail'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
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
            if ($status['status']) {
                // Tạo đơn nhận hàng mới
                $receive_id = $this->receive->addReceiveBill($request->all(), $id, $status['id']);

                // Thêm SN
                $this->sn->addSN($request->all(), $receive_id, $id, $status['id']);

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
            // dd($request->all());
            // Tạo sản phẩm theo đơn nhận hàng
            $status = $this->productImport->addProductImport($request->all(), $id, 'receive_id', 'receive_qty');
            if ($status) {
                // Tạo đơn nhận hàng mới
                $receive_id = $this->receive->addReceiveBill($request->all(), $id, $status['id']);

                // Thêm SN
                $this->sn->addSN($request->all(), $receive_id, $id, $status['id']);

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
        $product = QuoteImport::where('detailimport_id', $receive->detailimport_id)
            ->where('quoteimport.workspace_id', Auth::user()->current_workspace)
            ->get();
        return view('tables.receive.showReceive', compact('receive', 'title', 'product', 'history'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $workspace, string $id)
    {
        $receive = Receive_bill::findOrFail($id);
        $listDetail = Receive_bill::where('receive_bill.workspace_id', Auth::user()->current_workspace)->orderBy('receive_bill.id', 'desc');
        if (Auth::check() && Auth::user()->getRoleUser->roleid == 4) {
            $listDetail->join('detailimport', 'detailimport.id', 'receive_bill.detailimport_id')
                ->where('detailimport.user_id', Auth::user()->id);
        }
        $listDetail->select('receive_bill.*');
        $listDetail = $listDetail->get();
        $detail = DetailImport::where('id', $receive->detailimport_id)->first();
        if ($detail) {
            $nameRepresent = $detail->represent_name;
        } else {
            $nameRepresent = "";
        }
        $title = "Xem chi tiết phiếu nhập kho";
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;
        $product = ProductImport::join('quoteimport', 'quoteimport.id', 'products_import.quoteImport_id')
            ->join('products', 'quoteimport.product_name', 'products.product_name')
            ->join('warehouse', 'warehouse.id', 'quoteimport.warehouse_id')
            // ->where('products_import.detailimport_id', $receive->detailimport_id)
            ->where('products_import.receive_id', $receive->id)
            ->where('products.workspace_id', Auth::user()->current_workspace)
            ->where('products_import.product_qty', '>', 0)
            ->select(
                'quoteimport.product_code',
                'quoteimport.product_name',
                'quoteimport.product_unit',
                'products_import.product_qty',
                'quoteimport.price_export',
                'quoteimport.product_tax',
                'quoteimport.product_note',
                'warehouse.warehouse_name as nameHouse',
                'products_import.product_id',
                'products_import.cbSN',
                'products_import.receive_id',
                'products_import.quoteImport_id',
                'products_import.product_guarantee',
                'products.product_inventory as inventory',
                'quoteimport.promotion',
                DB::raw('products_import.product_qty * quoteimport.price_export as product_total'),
            )
            ->with('getSerialNumber')
            ->get();
        return view('tables.receive.editReceive', compact('receive', 'title', 'product', 'workspacename', 'nameRepresent', 'detail', 'listDetail'));
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
            return redirect()->route('receive.index', $workspacename)->with('warning', 'Sản phẩm đã được tạo trong phiếu xuất kho!');
        }
    }
    public function show_receive(Request $request)
    {
        $data = [];
        $detail = DetailImport::where('detailimport.id', $request->detail_id)
            ->leftJoin('provides', 'provides.id', 'detailimport.provide_id')
            ->first();
        if ($detail) {
            $nameProvide = $detail->provide_name_display;
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
            $resultNumber = "PNK-" . $count;
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
            $resultNumber = "PC-" . $count;
        }


        $data = [
            'quotation_number' => isset($detail) ? $detail->quotation_number : "",
            'represent' => isset($nameRepresent) ? $nameRepresent : "",
            'provide_name' => isset($nameProvide) ? $nameProvide : "",
            'id' => isset($detail) ? $detail->id : "",
            'promotion' => isset($detail) ? $detail->promotion : "",
            'resultNumber' => $resultNumber,
            'detail' => $detail
        ];
        return $data;
    }
    public function getProduct_receive(Request $request)
    {
        $data = [];
        $list = [];
        $checked = [];
        $value = [];
        $inventory = [];
        $listWarehouse = [];
        $quote = QuoteImport::where('detailimport_id', $request->id)
            ->where('product_qty', '>', DB::raw('COALESCE(receive_qty,0)'))
            ->where('workspace_id', Auth::user()->current_workspace)
            ->get();

        foreach ($quote as $qt) {
            if ($qt->getWareHouse) {
                array_push($listWarehouse, $qt->getWareHouse->warehouse_name);
            }
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
                array_push($inventory, $getProductGuarantee->product_inventory);
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
            'value' => $value,
            'inventory' => $inventory,
            'listWarehouse' => $listWarehouse
        ];
        return $data;
    }
    public function searchReceive(Request $request)
    {
        $data = $request->all();
        $filters = [];
        if (isset($data['quotenumber']) && $data['quotenumber'] !== null) {
            $filters[] = ['value' => 'Đơn mua hàng: ' . $data['quotenumber'], 'name' => 'quotenumber', 'icon' => 'po'];
        }
        if (isset($data['provides']) && $data['provides'] !== null) {
            $filters[] = ['value' => 'Nhà cung cấp: ' . $data['provides'], 'name' => 'provides', 'icon' => 'user'];
        }
        if (isset($data['shipping_unit']) && $data['shipping_unit'] !== null) {
            $filters[] = ['value' => 'Đơn vị vận chuyển: ' . $data['shipping_unit'], 'name' => 'shipping_unit', 'icon' => 'po'];
        }
        if (isset($data['delivery_code']) && $data['delivery_code'] !== null) {
            $receive_bill = $this->receive->receive_bill_codeById($data['delivery_code']);
            $receive_billString = implode(', ', $receive_bill);
            $filters[] = ['value' => 'Mã nhận hàng: ' . count($data['delivery_code']) . ' mã nhận hàng', 'name' => 'delivery_code', 'icon' => 'po'];
        }
        if (isset($data['users']) && $data['users'] !== null) {
            $users = $this->users->getNameUser($data['users']);
            $userstring = implode(', ', $users);
            $filters[] = ['value' => 'Người tạo: ' . count($data['users']) . ' người tạo', 'name' => 'users', 'icon' => 'user'];
        }
        $statusText = '';
        if (isset($data['status']) && $data['status'] !== null) {
            $statusValues = [];
            if (in_array(1, $data['status'])) {
                $statusValues[] = '<span style="color: #858585;">Chưa nhận</span>';
            }
            if (in_array(2, $data['status'])) {
                $statusValues[] = '<span style="color: #08AA36BF;">Đã nhận</span>';
            }
            $statusText = implode(', ', $statusValues);
            $filters[] = ['value' => 'Trạng thái: ' . $statusText, 'name' => 'status', 'icon' => 'status'];
        }
        if (isset($data['shipping_fee']) && $data['shipping_fee'][1] !== null) {
            $filters[] = ['value' => 'Phí vận chuyển: ' . $data['shipping_fee'][0] . ' ' . $data['shipping_fee'][1], 'name' => 'shipping_fee', 'icon' => 'money'];
        }
        if (isset($data['total']) && $data['total'][1] !== null) {
            $filters[] = ['value' => 'Tổng tiền: ' . $data['total'][0] . ' ' . $data['total'][1], 'name' => 'total', 'icon' => 'money'];
        }
        if (isset($data['date']) && $data['date'][1] !== null) {
            $date_start = date("d/m/Y", strtotime($data['date'][0]));
            $date_end = date("d/m/Y", strtotime($data['date'][1]));
            $filters[] = ['value' => 'Ngày nhận hàng: từ ' . $date_start . ' đến ' . $date_end, 'name' => 'date', 'icon' => 'date'];
        }
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
