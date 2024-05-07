<?php

namespace App\Http\Controllers;

use App\Models\Delivery;
use App\Models\Guest;
use App\Models\History;
use App\Models\Products;
use App\Models\Provides;
use App\Models\Serialnumber;
use App\Models\Workspace;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $guests;
    private $provides;
    private $workspaces;
    private $history;
    private $delivery;
    private $products;

    public function __construct()
    {
        $this->guests = new Guest();
        $this->provides = new Provides();
        $this->workspaces = new Workspace();
        $this->history = new History();
        $this->delivery = new Delivery();
        $this->products = new Products();
    }
    public function index()
    {
        $title = 'Lịch sử giao dịch';
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;
        $history = $this->history->getAllHistory();
        // dd($history);
        $guests = $this->guests->getAllGuest();
        $provides = $this->provides->getAllProvide();
        $products = $this->products->getAllProducts();
        // dd($history);
        return view('tables.history.index', compact('title', 'workspacename', 'history', 'guests', 'provides', 'products'));
    }

    public function getSN(Request $request)
    {
        $data = $request->all();
        $dataSN = [];
        $product = $this->history->getProductToId($data['delivery_id'], $data['product_id']);
        $serinumber = Serialnumber::leftJoin('delivery', 'delivery.detailexport_id', 'serialnumber.detailexport_id')
            ->where('delivery.id', $data['delivery_id'])
            ->where('serialnumber.delivery_id', $data['delivery_id'])
            ->where('serialnumber.product_id', $data['product_id'])
            ->select('*', 'serialnumber.id as idSeri')
            ->get();
        $dataSN = [
            'product' => $product,
            'serinumber' => $serinumber,
        ];
        return $dataSN;
    }

    // Filer search sort
    public function searchHistory(Request $request)
    {
        $data = $request->all();
        $filters = [];
        if (isset($data['tensp']) && $data['tensp'] !== null) {
            $filters[] = ['value' => 'Mặt hàng: ' . $data['tensp'], 'name' => 'tensp', 'icon' => 'product'];
        }
        if (isset($data['hdvao']) && $data['hdvao'] !== null) {
            $filters[] = ['value' => 'Hoá đơn vào: ' . $data['hdvao'], 'name' => 'hdvao', 'icon' => 'po'];
        }
        if (isset($data['hdra']) && $data['hdra'] !== null) {
            $filters[] = ['value' => 'Hoá đơn ra: ' . $data['hdra'], 'name' => 'hdra', 'icon' => 'po'];
        }
        if (isset($data['provides']) && $data['provides'] !== null) {
            $filters[] = ['value' => 'Nhà cung cấp: ' . $data['provides'], 'name' => 'provides', 'icon' => 'user'];
        }
        if (isset($data['guests']) && $data['guests'] !== null) {
            $filters[] = ['value' => 'Khách hàng: ' . $data['guests'], 'name' => 'guests', 'icon' => 'user'];
        }
        if (isset($data['POnhap']) && $data['POnhap'] !== null) {
            $filters[] = ['value' => 'PO nhập: ' . $data['POnhap'], 'name' => 'POnhap', 'icon' => 'po'];
        }
        if (isset($data['POxuat']) && $data['POxuat'] !== null) {
            $filters[] = ['value' => 'PO xuất: ' . $data['POxuat'], 'name' => 'POxuat', 'icon' => 'po'];
        }
        if (isset($data['BH']) && $data['BH'] !== null) {
            $filters[] = ['value' => 'Bảo hành: ' . $data['BH'], 'name' => 'BH', 'icon' => 'bh'];
        }
        if (isset($data['HTTTN']) && $data['HTTTN'] !== null) {
            $filters[] = ['value' => 'Hình thức thanh toán nhập: ' . $data['HTTTN'], 'name' => 'HTTTN', 'icon' => 'po'];
        }
        if (isset($data['HTTTX']) && $data['HTTTX'] !== null) {
            $filters[] = ['value' => 'Hình thức thanh toán xuất: ' . $data['HTTTX'], 'name' => 'HTTTX', 'icon' => 'po'];
        }
        if (isset($data['slxuat']) && $data['slxuat'][1] !== null) {
            $filters[] = ['value' => 'Số lượng xuất: ' . $data['slxuat'][0] . $data['slxuat'][1], 'name' => 'slxuat', 'icon' => 'sl'];
        }
        if (isset($data['slnhap']) && $data['slnhap'][1] !== null) {
            $filters[] = ['value' => 'Số lượng nhập: ' . $data['slnhap'][0] . $data['slnhap'][1], 'name' => 'slnhap', 'icon' => 'sl'];
        }
        if (isset($data['trcVATN']) && $data['trcVATN'][1] !== null) {
            $filters[] = ['value' => 'Trước VAT nhập: ' . $data['trcVATN'][0] . ' ' . $data['trcVATN'][1], 'name' => 'trcVATN', 'icon' => 'money'];
        }
        if (isset($data['VATN']) && $data['VATN'][1] !== null) {
            $filters[] = ['value' => 'VAT nhập: ' . $data['VATN'][0] . ' ' . $data['VATN'][1], 'name' => 'VATN', 'icon' => 'money'];
        }
        if (isset($data['sauVATN']) && $data['sauVATN'][1] !== null) {
            $filters[] = ['value' => 'Sau VAT nhập: ' . $data['sauVATN'][0] . ' ' . $data['sauVATN'][1], 'name' => 'sauVATN', 'icon' => 'money'];
        }

        if (isset($data['trcVATX']) && $data['trcVATX'][1] !== null) {
            $filters[] = ['value' => 'Trước VAT xuất: ' . $data['trcVATX'][0] . ' ' . $data['trcVATX'][1], 'name' => 'trcVATX', 'icon' => 'money'];
        }
        if (isset($data['VATX']) && $data['VATX'][1] !== null) {
            $filters[] = ['value' => 'VAT xuất: ' . $data['VATX'][0] . ' ' . $data['VATX'][1], 'name' => 'VATX', 'icon' => 'money'];
        }
        if (isset($data['sauVATX']) && $data['sauVATX'][1] !== null) {
            $filters[] = ['value' => 'Sau VAT xuất: ' . $data['sauVATX'][0] . ' ' . $data['sauVATX'][1], 'name' => 'sauVATX', 'icon' => 'money'];
        }
        if (isset($data['dateHDN']) && $data['dateHDN'][1] !== null) {
            $date_start = date("d/m/Y", strtotime($data['dateHDN'][0]));
            $date_end = date("d/m/Y", strtotime($data['dateHDN'][1]));
            $filters[] = ['value' => 'Ngày hoá đơn nhập: từ ' . $date_start . ' đến ' . $date_end, 'name' => 'dateHDN', 'icon' => 'date'];
        }
        if (isset($data['dateHDX']) && $data['dateHDX'][1] !== null) {
            $date_start = date("d/m/Y", strtotime($data['dateHDX'][0]));
            $date_end = date("d/m/Y", strtotime($data['dateHDX'][1]));
            $filters[] = ['value' => 'Ngày hoá đơn xuất: từ ' . $date_start . ' đến ' . $date_end, 'name' => 'dateHDX', 'icon' => 'date'];
        }
        if (isset($data['dateTTN']) && $data['dateTTN'][1] !== null) {
            $date_start = date("d/m/Y", strtotime($data['dateTTN'][0]));
            $date_end = date("d/m/Y", strtotime($data['dateTTN'][1]));
            $filters[] = ['value' => 'Ngày thanh toán nhập: từ ' . $date_start . ' đến ' . $date_end, 'name' => 'dateTTN', 'icon' => 'date'];
        }
        if (isset($data['dateTTX']) && $data['dateTTX'][1] !== null) {
            $date_start = date("d/m/Y", strtotime($data['dateTTX'][0]));
            $date_end = date("d/m/Y", strtotime($data['dateTTX'][1]));
            $filters[] = ['value' => 'Ngày thanh toán xuất: từ ' . $date_start . ' đến ' . $date_end, 'name' => 'dateTTX', 'icon' => 'date'];
        }

        $statusTextTTN = '';
        if (isset($data['TTN']) && $data['TTN'] !== null) {
            $statusValues = [];
            if (in_array(0, $data['TTN'])) {
                $statusValues[] = '<span style="color: #858585;">Chưa thanh toán</span>';
            }
            if (in_array(2, $data['TTN'])) {
                $statusValues[] = '<span style="color: #08AA36BF;">Thanh toán đủ</span>';
            }
            if (in_array(1, $data['TTN'])) {
                $statusValues[] = '<span style="color: #E8B600;">Một phần</span>';
            }
            $statusTextTTN = implode(', ', $statusValues);
            $filters[] = ['value' => 'Thanh toán nhập: ' . $statusTextTTN, 'name' => 'TTN', 'icon' => 'status'];
        }
        $statusTextTTX = '';
        if (isset($data['TTX']) && $data['TTX'] !== null) {
            $statusValues = [];
            if (in_array(1, $data['TTX'])) {
                $statusValues[] = '<span style="color: #858585;">Chưa thanh toán</span>';
            }
            if (in_array(2, $data['TTX'])) {
                $statusValues[] = '<span style="color: #08AA36BF;">Thanh toán đủ</span>';
            }
            if (in_array(3, $data['TTX'])) {
                $statusValues[] = '<span style="color: #E8B600;">Một phần</span>';
            }
            $statusTextTTX = implode(', ', $statusValues);
            $filters[] = ['value' => 'Đã trả: ' . $statusTextTTX, 'name' => 'TTX', 'icon' => 'status'];
        }
        if ($request->ajax()) {
            $history = $this->history->ajax($data);
            return response()->json([
                'history' => $history,
                'filterHistory' => $filters,
            ]);
        }
        return false;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(History $history)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(History $history)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, History $history)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(History $history)
    {
        //
    }
}
