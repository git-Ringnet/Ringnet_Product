<?php

namespace App\Http\Controllers;

use App\Models\Delivery;
use App\Models\Guest;
use App\Models\History;
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

    public function __construct()
    {
        $this->guests = new Guest();
        $this->provides = new Provides();
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
        $guests = $this->guests->getAllGuest();
        $provides = $this->provides->getAllProvide();
        // dd($history);
        return view('tables.history.index', compact('title', 'workspacename', 'history', 'guests', 'provides'));
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
        // dd($data['filters']);
        $nameGuests = [];
        $nameProvides = [];
        $productQtyArray = [];
        $priceImportArray = [];
        if ($request->ajax()) {
            $output = '';
            if (!empty($data['filters']['idGuests'])) {
                $nameGuests = $this->guests->getGuestbyName($data);
            }
            if (!empty($data['filters']['idProvides'])) {
                $nameProvides = $this->provides->getprovidebyName($data);
            }
            $filters = $request->input('filters');

            if (isset($filters['product_qty'])) {
                $productQtyArray[] = $filters['product_qty'];
            } else {
                $productQtyArray[] = null;
                $productQtyArray[] = null;
            }
            if (isset($filters['price_import'])) {
                $priceImportArray[] = $filters['price_import'];
            } else {
                $priceImportArray[] = null;
                $priceImportArray[] = null;
            }
            $history = $this->history->ajax($data);
            if ($history) {
                foreach ($history as $index => $item) {
                    $output .= ' <tr>
                                    <td>' . $index + 1 . '</td>
                                    <td>' . date('d-m-Y', strtotime($item->time)) . '</td>
                                    <td>' . $item->tenNCC . '</td>
                                    <td>' . $item->tensp . '</td>
                                    <td>' . number_format($item->product_qty) . '</td>
                                    <td>' . number_format($item->price_import) . '</td>
                                    <td>' . number_format($item->total_import) . '</td>
                                    <td>' . $item->hdvao . '</td>
                                    <td>' . $item->tenKhach . '</td>
                                    <td>' . number_format($item->deliver_qty) . '</td>
                                    <td>' . $item->product_unit . '</td>
                                    <td>' . number_format($item->giaban) . '</td>
                                    <td>' . number_format($item->product_total_vat) . '</td>
                                    <td>' . $item->hdra . '</td>
                                    <td>' . number_format($item->transfer_fee) . '</td>
                                    <td data-toggle="modal" data-target="#snModal"
                                        data-delivery-id="' . $item->delivery_id . '"
                                        data-product-id="' . $item->product_id . '" class="sn"><img
                                        src="../../dist/img/icon/list.png"></td>
                            </tr>';
                }
            }
            return [
                'output' => $output,
                'guests' => $nameGuests,
                'tensp' => $data['filters']['tensp'],
                'product_qty' => $productQtyArray,
                'price_import' => $priceImportArray,
                // 'product_qty' => [$request->input('filters')['product_qty'], $request->input('filters')['product_qty'][0]],
                'provides' => $nameProvides,
            ];
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
