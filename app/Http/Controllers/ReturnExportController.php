<?php

namespace App\Http\Controllers;

use App\Models\Delivery;
use App\Models\DetailExport;
use App\Models\Guest;
use App\Models\Products;
use App\Models\ReturnExport;
use App\Models\Serialnumber;
use App\Models\Workspace;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReturnExportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $workspaces;
    private $returnExport;
    private $product;
    private $delivered;
    private $detailExport;
    private $guest;


    public function __construct()
    {
        $this->workspaces = new Workspace();
        $this->returnExport = new ReturnExport();
        $this->guest = new Guest();
        $this->product = new Products();
    }
    public function index()
    {
        $data = ReturnExport::where('workspace_id', Auth::user()->current_workspace)->get();
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;
        $title = "Đơn trả hàng KH";
        // $users = $this->receive->getUserInReceive();
        return view('tables.returnexport.index', compact('data', 'title', 'workspacename'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Tạo đơn trả hàng KH";
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;
        $numberQuote = Delivery::where('status', 2)
            ->leftJoin('delivered', 'delivered.delivery_id', '=', 'delivery.id')
            ->where('delivered.deliver_qty', '>', DB::raw('COALESCE(delivered.return_qty,0)'))
            ->where('delivery.workspace_id', Auth::user()->current_workspace)
            // ->where('delivery.detailexport_id', '!=', 0)
            ->select('delivery.code_delivery', 'delivery.id')
            ->distinct();
        if (Auth::check()) {
            if (Auth::user()->getRoleUser->roleid == 4) {
                $numberQuote->where('user_id', Auth::user()->id);
            }
        }
        // dd($numberQuote);
        $numberQuote = $numberQuote->get();
        // dd($numberQuote);
        $product = $this->product->getAllProducts();
        $guest = $this->guest->getAllGuest();
        $invoice = $this->returnExport->getQuoteCount();
        return view('tables.returnexport.create', compact('title', 'guest', 'invoice', 'numberQuote', 'product', 'workspacename'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, string $workspace)
    {
        // dd($request->all());
        if ($request->action == 1) {
            $returnExport_id = $this->returnExport->addReturnExport($request->all());
            $this->returnExport->addProductReturn($request->all(), $returnExport_id);
            if ($request->redirect == "returnExport") {
                return redirect()->route('returnExport.index', ['workspace' => $workspace])->with('msg', ' Tạo mới đơn trả hàng thành công !');
            } else {
                return redirect()->route('returnExport.index', ['workspace' => $workspace])->with('msg', ' Tạo mới đơn trả hàng thành công !');
            }
        }
        if ($request->action == 2) {
            // dd($request->all());
            $returnExport_id = $this->returnExport->acceptReturnExport($request->all());
            $this->returnExport->addProductReturn($request->all(), $returnExport_id);
            if ($request->redirect == "returnExport") {
                return redirect()->route('returnExport.index', ['workspace' => $workspace])->with('msg', 'Xác nhận đơn trả hàng thành công!');
            } else {
                return redirect()->route('returnExport.index', ['workspace' => $workspace])->with('msg', 'Xác nhận đơn trả hàng thành công!');
            }
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $workspace, string $id)
    {
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;
        $title = 'Chi tiết đơn trả hàng';
        $returnExport = $this->returnExport->getReturnExportToId($id);
        if (!$returnExport) {
            abort('404');
        }
        $product = $this->returnExport->getProductToId($id);
        $numberQuote = Delivery::where('status', 2)->where('workspace_id', Auth::user()->current_workspace);
        if (Auth::check()) {
            if (Auth::user()->getRoleUser->roleid == 4) {
                $numberQuote->where('user_id', Auth::user()->id);
            }
        }
        $numberQuote = $numberQuote->get();
        $guest = $this->guest->getAllGuest();
        $serinumber = Serialnumber::leftJoin('delivery', 'delivery.detailexport_id', '=', 'serialnumber.detailexport_id')
            ->leftJoin('seri_return', 'serialnumber.id', 'seri_return.seri_id')
            ->where('return_id', $id)
            ->select('serialnumber.*', 'serialnumber.id as idSeri')
            ->distinct()
            ->get();

        // dd($serinumber);
        $invoice = $this->returnExport->getQuoteCount();
        $listDetail = ReturnExport::where('workspace_id', Auth::user()->current_workspace)->get();
        return view('tables.returnexport.show', compact('title', 'serinumber', 'invoice', 'returnExport', 'guest', 'numberQuote', 'product', 'workspacename', 'listDetail'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $workspace)
    {
        if ($request->action == 2) {
            $returnExport_id = $this->returnExport->acceptReturnExport($request->all());
            if ($request->redirect == "returnExport") {
                return redirect()->route('returnExport.index', ['workspace' => $workspace])->with('msg', 'Xác nhận đơn trả hàng thành công!');
            } else {
                return redirect()->route('returnExport.index', ['workspace' => $workspace])->with('msg', 'Xác nhận đơn trả hàng thành công!');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $workspace, string $id)
    {
        $this->returnExport->deleteReturnExportItem($id);
        return redirect()->route('returnExport.index', ['workspace' => $workspace])->with('msg', 'Xóa đơn trả hàng thành công!');
    }
    public function getInfoDeliveryReturnExport(Request $request)
    {
        $data = $request->all();
        $delivery = Delivery::where('delivery.id', $data['idQuote'])
            ->leftJoin('guest', 'guest.id', 'delivery.guest_id')
            ->leftJoin('represent_guest', 'represent_guest.guest_id', 'guest.id')
            ->where('delivery.workspace_id', Auth::user()->current_workspace)
            ->select(
                'delivery.*',
                'guest.id as guest_id',
                'guest.guest_name_display as guest_name',
                'represent_guest.represent_name as represent_name',
                'represent_guest.id as represent_guest_id'
            )
            ->first();
        return $delivery;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $workspace, string $id)
    {
    }
    public function getProductDeliveryRtExport(Request $request)
    {
        $data = $request->all();

        $delivery = Delivery::leftJoin('delivered', 'delivered.delivery_id', 'delivery.id')
            ->where('delivery.workspace_id', Auth::user()->current_workspace)
            ->leftJoin('products', 'products.id', 'delivered.product_id')
            ->select(
                '*',
                // 'delivery.promotion as promotion_total',
                'delivery.id as maXuat',
                'delivered.product_id as maSP',
                'products.product_code as maCode',
                'products.product_name as tenSP',
                'products.product_tax as thueSP',
                'products.product_unit as product_unit',
                // 'delivered.deliver_qty as soLuongCanGiao',
                'delivery.promotion as promotion_total',

            )
            ->selectRaw('COALESCE(delivered.deliver_qty, 0) - COALESCE(delivered.return_qty, 0) as soLuongCanGiao')
            ->leftJoin('serialnumber', function ($join) {
                $join->on('serialnumber.product_id', '=', 'products.id');
                $join->where('serialnumber.delivery_id', 0);
            })
            ->where('delivery.id', $data['idQuote'])
            ->whereRaw('COALESCE(delivered.deliver_qty, 0) - COALESCE(delivered.return_qty, 0) > 0')
            ->get();

        // Group dữ liệu theo ID sản phẩm để có danh sách seri cho mỗi sản phẩm
        $groupedDelivery = $delivery->groupBy('maSP');

        // Xử lý dữ liệu để thêm danh sách seri vào mỗi sản phẩm
        $processedDelivery = $groupedDelivery->map(function ($group) {
            $product = $group->first();
            $product['seri_pro'] = $group->pluck('serinumber')->toArray();
            return $product;
        });

        return $processedDelivery;
    }
}
