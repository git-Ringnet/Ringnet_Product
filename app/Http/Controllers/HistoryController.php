<?php

namespace App\Http\Controllers;

use App\Models\Delivery;
use App\Models\Guest;
use App\Models\History;
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
    private $workspaces;
    private $history;
    private $delivery;

    public function __construct()
    {
        $this->guests = new Guest();
        $this->workspaces = new Workspace();
        $this->history = new History();
        $this->delivery = new Delivery();
    }
    public function index()
    {
        $title = 'Lịch sử giao dịch dang lam';
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;
        $history = $this->history->getAllHistory();
        // dd($history);
        return view('tables.history.index', compact('title', 'workspacename', 'history'));
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
        // dd($data);
        if ($request->ajax()) {
            $output = '';
            $history = $this->history->ajax($data);
            if ($history) {
                foreach ($history as $index => $item) {
                    $output .= ' <tr>
                                    <td>' . $index . '</td>
                                    <td>' . $item->user_id . '</td>
                                    <td>' . $item->updated_at . '</td>
                                    <td>' . $item->provide_id . '</td>
                                    <td>' . $item->product_name . '</td>
                                    <td>' . number_format($item->slnhap) . '</td>
                                    <td>' . number_format($item->giadonnhap) . '</td>
                                    <td>' . number_format($item->tongnhap) . '</td>
                                    <td>Hoá đơn vào</td>
                                    <td>Công nợ nhập</td>
                                    <td>Tình trạng nhập</td>
                                    <td>' . $item->guest_id . '</td>
                                    <td>' . number_format($item->deliver_qty) . '</td>
                                    <td>' . $item->product_unit . '</td>
                                    <td>' . number_format($item->price_export) . '</td>
                                    <td>' . number_format($item->product_total) . '</td>
                                    <td>' . $item->number_bill . '</td>
                                    <td>Công nợ xuất</td>
                                    <td>Tình trạng xuất</td>
                                    <td>Lợi nhuận</td>
                                    <td>' . number_format($item->transfer_fee) . '</td>
                                    <td data-toggle="modal" data-target="#snModal"
                                        data-delivery-id="' . $item->delivery_id . '"
                                        data-product-id="' . $item->product_id . '" class="sn"><img
                                        src="../../dist/img/icon/list.png"></td>
                            </tr>';
                }
            }
            return $output;
        }
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
