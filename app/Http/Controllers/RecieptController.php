<?php

namespace App\Http\Controllers;

use App\Models\Attachment;
use App\Models\DetailImport;
use App\Models\History;
use App\Models\ProductImport;
use App\Models\QuoteImport;
use App\Models\Receive_bill;
use App\Models\Reciept;
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
    public function __construct()
    {
        $this->reciept = new Reciept();
        $this->productImport = new ProductImport();
        $this->workspaces = new Workspace();
        $this->attachment = new Attachment();
        $this->history = new History();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Hóa đơn mua hàng";
        $perPage = 10;
        $reciept = Reciept::where('reciept.workspace_id', Auth::user()->current_workspace)
            ->orderBy('reciept.id', 'desc');
        if (Auth::check() && Auth::user()->getRoleUser->roleid == 4) {
            $reciept->join('detailimport', 'detailimport.id', 'reciept.detailimport_id')
                ->where('detailimport.user_id', Auth::user()->id);
        }
        $reciept->select('reciept.*');
        $reciept = $reciept->get();
        // ->paginate($perPage);
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;
        return view('tables.reciept.reciept', compact('title', 'reciept', 'workspacename'));
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
            // ->where('quoteimport.product_qty', '>', 'quoteimport.receive_qty')
            ->where('quoteimport.product_qty', '>', DB::raw('COALESCE(quoteimport.reciept_qty,0)'))
            ->where('quoteimport.workspace_id', Auth::user()->current_workspace)
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
        // dd($request->all());
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
    public function edit(string $workspace, string $id)
    {
        $reciept = Reciept::findOrFail($id);
        $title = $reciept->id;
        $detail = DetailImport::where('id', $reciept->detailimport_id)->first();
        // if ($detail && $detail->getNameRepresent) {
        //     $nameRepresent = $detail->getNameRepresent->represent_name;
        // } else {
        //     $nameRepresent = "";
        // }
        if ($detail) {
            $nameRepresent = $detail->represent_name;
        } else {
            $nameRepresent = "";
        }
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;
        // $product = QuoteImport::where('receive_id', $reciept->receive_id)->get();
        $product = ProductImport::join('quoteimport', 'quoteimport.id', 'products_import.quoteImport_id')
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
                DB::raw('products_import.product_qty * quoteimport.price_export as product_total')
            )
            ->get();
        return view('tables.reciept.editReciept', compact('title', 'reciept', 'product', 'workspacename', 'nameRepresent'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(string $workspace, Request $request, string $id)
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
    public function destroy(string $workspace, string $id)
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
        // $detail = Receive_bill::FindOrFail($request->detail_id);
        $detail = DetailImport::where('id', $request->detail_id)
            ->where('workspace_id', Auth::user()->current_workspace)->first();
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
        return QuoteImport::where('detailimport_id', $request->id)
            ->where('product_qty', '>', DB::raw('COALESCE(reciept_qty,0)'))
            ->where('workspace_id', Auth::user()->current_workspace)
            ->get();
    }
    public function searchReciept(Request $request)
    {
        $data = $request->all();
        $filters = [];
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
