<?php

namespace App\Http\Controllers;

use App\Models\Attachment;
use App\Models\DetailImport;
use App\Models\History;
use App\Models\ProductImport;
use App\Models\QuoteImport;
use App\Models\Receive_bill;
use App\Models\Reciept;
use App\Models\User;
use App\Models\Workspace;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RecieptController extends Controller
{
    private $reciept;
    private $productImport;
    private $workspaces;
    private $attachment;
    private $history;
    private $users;
    public function __construct()
    {
        $this->reciept = new Reciept();
        $this->productImport = new ProductImport();
        $this->workspaces = new Workspace();
        $this->attachment = new Attachment();
        $this->history = new History();
        $this->users = new User();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Hóa đơn mua hàng";
        $perPage = 10;
        $reciept = Reciept::orderBy('reciept.id', 'desc');
        if (Auth::check() && Auth::user()->getRoleUser->roleid == 4) {
            $reciept->join('detailimport', 'detailimport.id', 'reciept.detailimport_id')
                ->where('detailimport.user_id', Auth::user()->id);
        }
        $reciept->select('reciept.*');
        $reciept = $reciept->get();
        $users = $this->reciept->getUserInReceipt();
        // ->paginate($perPage);
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;
        return view('tables.reciept.reciept', compact('title', 'reciept', 'users', 'workspacename'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Tạo mới hóa đơn mua hàng";
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;
        $reciept = DetailImport::leftJoin('quoteimport', 'detailimport.id', '=', 'quoteimport.detailimport_id')
            ->where('quoteimport.product_qty', '>', DB::raw('COALESCE(quoteimport.reciept_qty,0)'))
            ->distinct()
            ->orderBy('id', 'desc');
        if (Auth::check() && Auth::user()->getRoleUser->roleid == 4) {
            $reciept->where('detailimport.user_id', Auth::user()->id);
        }
        $reciept->select('detailimport.quotation_number', 'detailimport.id');
        $reciept = $reciept->get();

        return view('tables.reciept.insertReciept', compact('title', 'reciept', 'workspacename'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (isset($request->id_import)) {
            $id = $request->id_import;
        } else {
            $id = $request->detailimport_id;
        }
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;
        // Tạo sản phẩm theo đơn nhận hàng
        $status = $this->productImport->addProductImport($request->all(), $id, 'reciept_id', 'reciept_qty');
        if ($status) {
            $reciept_id = $this->reciept->addReciept($request->all(), $id);
            if ($request->action == "action_1") {
                $dataUserFlow = [
                    'user_id' => Auth::user()->id,
                    'activity_type' => "HDMH",
                    'activity_description' => "Lưu nháp hóa đơn mua hàng",
                    'created_at' => Carbon::now()
                ];

                DB::table('user_flow')->insert($dataUserFlow);
                return redirect()->route('reciept.index', $workspacename)->with('msg', 'Tạo mới hóa đơn mua hàng thành công !');
            } else {
                // Xác nhận hóa đơn
                $this->reciept->updateReciept($request->all(), $reciept_id);
                $dataUserFlow = [
                    'user_id' => Auth::user()->id,
                    'activity_type' => "HDMH",
                    'activity_description' => "Xác nhận hóa đơn mua hàng",
                    'created_at' => Carbon::now()
                ];

                DB::table('user_flow')->insert($dataUserFlow);
                if (isset($request->id_import)) {
                    return redirect()->route('import.index', $workspacename)->with('msg', 'Xác nhận hóa đơn thành công !');
                } else {
                    return redirect()->route('reciept.index', $workspacename)->with('msg', 'Xác nhận hóa đơn thành công !');
                }
            }
        } else {
            return redirect()->route('reciept.index', $workspacename)->with('warning', 'Hóa đơn mua hàng đã đươc tạo hết !');
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
    public function edit(string $id)
    {
        $reciept = Reciept::findOrFail($id);
        $title = $reciept->id;
        $detail = DetailImport::where('id', $reciept->detailimport_id)->first();
        if ($detail) {
            $nameRepresent = $detail->represent_name;
        } else {
            $nameRepresent = "";
        }
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;
        $product = ProductImport::join('quoteimport', 'quoteimport.id', 'products_import.quoteImport_id')
            ->join('products', 'quoteimport.product_name', 'products.product_name')
            ->where('products_import.detailimport_id', $reciept->detailimport_id)
            ->where('products_import.reciept_id', $reciept->id)
            ->select(
                'quoteimport.product_code',
                'quoteimport.product_name',
                'quoteimport.product_unit',
                'products_import.product_qty',
                'quoteimport.price_export',
                'quoteimport.product_tax',
                'quoteimport.product_note',
                'products_import.product_id',
                'products.product_inventory as inventory',
                'quoteimport.promotion_type',
                'quoteimport.promotion',
                DB::raw('products_import.product_qty * quoteimport.price_export as product_total')
            )
            ->get();
        return view('tables.reciept.editReciept', compact('title', 'reciept', 'product', 'workspacename', 'nameRepresent'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $result = $this->reciept->updateReciept($request->all(), $id);
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;
        if ($result) {
            $dataUserFlow = [
                'user_id' => Auth::user()->id,
                'activity_type' => "HDMH",
                'activity_description' => "Xác nhận hóa đơn mua hàng",
                'created_at' => Carbon::now()
            ];

            DB::table('user_flow')->insert($dataUserFlow);
            return redirect()->route('reciept.index', $workspacename)->with('msg', 'Xác nhận hóa đơn thành công !');
        } else {
            return redirect()->route('reciept.index', $workspacename)->with('warning', 'Hóa đơn đã được xác nhận !');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $status = $this->reciept->deleteReciept($id);
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;
        if ($status) {
            $this->attachment->deleteFileAll($id, 'HDMH');

            $dataUserFlow = [
                'user_id' => Auth::user()->id,
                'activity_type' => "HDMH",
                'activity_description' => "Xóa hóa đơn mua hàng",
                'created_at' => Carbon::now()
            ];

            DB::table('user_flow')->insert($dataUserFlow);

            return redirect()->route('reciept.index', $workspacename)->with('msg', 'Xóa hóa đơn mua hàng thành công !');
        } else {
            return redirect()->route('reciept.index', $workspacename)->with('warning', 'Không tìn thấy hóa đơn mua hàng cần xóa !');
        }
    }
    public function show_reciept(Request $request)
    {
        $data = [];
        $detail = DetailImport::where('id', $request->detail_id)->first();
        $name =  $detail->getNameProvide->provide_name_display;
        $data = [
            'quotation_number' => $detail->quotation_number,
            'provide_name' => $name,
            'id' => $detail->id
        ];
        return $data;
    }

    public function getProduct_reciept(Request $request)
    {
        return QuoteImport::join('products', 'products.product_name', 'quoteimport.product_name')
            ->where('quoteimport.detailimport_id', $request->id)
            ->where('quoteimport.product_qty', '>', DB::raw('COALESCE(reciept_qty,0)'))
            ->select('quoteimport.*', 'products.product_inventory as inventory')
            ->get();
    }
    public function searchReciept(Request $request)
    {
        $data = $request->all();
        $filters = [];
        if (isset($data['quotenumber']) && $data['quotenumber'] !== null) {
            $filters[] = ['value' => 'Đơn mua hàng: ' . $data['quotenumber'], 'name' => 'quotenumber', 'icon' => 'po'];
        }
        if (isset($data['provides']) && $data['provides'] !== null) {
            $filters[] = ['value' => 'Nhà cung cấp: ' . $data['provides'], 'name' => 'provides', 'icon' => 'user'];
        }
        if (isset($data['number_bill']) && $data['number_bill'] !== null) {
            $reciept = $this->reciept->number_billById($data['number_bill']);
            $recieptString = implode(', ', $reciept);
            $filters[] = ['value' => 'Số hoá đơn: ' . count($data['number_bill']) . ' số hoá đơn', 'name' => 'number_bill', 'icon' => 'po'];
        }
        if (isset($data['users']) && $data['users'] !== null) {
            $users = $this->users->getNameUser($data['users']);
            $userstring = implode(', ', $users);
            $filters[] = ['value' => 'Người tạo: ' . count($data['users']) . ' người tạo', 'name' => 'users', 'icon' => 'user'];
        }
        if (isset($data['date']) && $data['date'][1] !== null) {
            $date_start = date("d/m/Y", strtotime($data['date'][0]));
            $date_end = date("d/m/Y", strtotime($data['date'][1]));
            $filters[] = ['value' => 'Ngày hoá đơn: từ ' . $date_start . ' đến ' . $date_end, 'name' => 'date', 'icon' => 'date'];
        }
        $statusText = '';
        if (isset($data['status']) && $data['status'] !== null) {
            $statusValues = [];
            if (in_array(1, $data['status'])) {
                $statusValues[] = '<span style="color: #858585;">Bản nháp</span>';
            }
            if (in_array(2, $data['status'])) {
                $statusValues[] = '<span style="color: #08AA36BF;">Chính thức</span>';
            }
            $statusText = implode(', ', $statusValues);
            $filters[] = ['value' => 'Trạng thái: ' . $statusText, 'name' => 'status'];
        }
        if (isset($data['total']) && $data['total'][1] !== null) {
            $filters[] = ['value' => 'Tổng tiền: ' . $data['total'][0] . ' ' . $data['total'][1], 'name' => 'total', 'icon' => 'money'];
        }
        if ($request->ajax()) {
            $reciept = $this->reciept->ajax($data);
            return response()->json([
                'data' => $reciept,
                'filters' => $filters,
            ]);
        }
        return false;
    }
}
