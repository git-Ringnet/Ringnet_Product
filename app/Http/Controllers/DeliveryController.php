<?php

namespace App\Http\Controllers;

use App\Models\Delivered;
use App\Models\Delivery;
use App\Models\DetailExport;
use App\Models\productBill;
use App\Models\productPay;
use App\Models\Products;
use App\Models\QuoteExport;
use App\Models\Serialnumber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DeliveryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $delivery;
    private $product;
    private $delivered;
    private $detailExport;
    public function __construct()
    {
        $this->delivery = new Delivery();
        $this->product = new Products();
        $this->delivered = new Delivered();
        $this->detailExport = new DetailExport();
    }
    public function index()
    {
        $title = 'Giao hàng';
        $delivery = Delivery::leftJoin('guest', 'guest.id', 'delivery.guest_id')
            ->select('*', 'delivery.id as maGiaoHang', 'delivery.created_at as ngayGiao')
            ->get();
        return view('tables.export.delivery.list-delivery', compact('title', 'delivery'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Tạo đơn giao hàng";
        $numberQuote = DetailExport::leftJoin('quoteexport', 'detailexport.id', '=', 'quoteexport.detailexport_id')
            ->where('quoteexport.product_qty', '>', DB::raw('COALESCE(quoteexport.qty_delivery,0)'))
            ->select('detailexport.quotation_number', 'detailexport.id')
            ->distinct()
            ->get();
        $product = $this->product->getAllProducts();
        return view('tables.export.delivery.create-delivery', compact('title', 'numberQuote', 'product'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $delivery_id = $this->delivery->addDelivery($request->all());
        $this->delivered->addDelivered($request->all(), $delivery_id);
        $seriArray = $request->input('seri');
        if (is_array($seriArray) && !empty($seriArray)) {
            foreach ($seriArray as $maSP => $serialNumbers) {
                foreach ($serialNumbers as $serialNumber) {
                    if ($serialNumber != null) {
                        $serial = new SerialNumber();
                        $serial->serinumber = $serialNumber;
                        $serial->receive_id = 0;
                        $serial->detailimport_id = 0;
                        $serial->detailexport_id = $request->detailexport_id;
                        $serial->product_id = $maSP;
                        $serial->status = 3;
                        $serial->delivery_id = $delivery_id;
                        $serial->save();
                    }
                }
            }
        }
        return redirect()->route('delivery.index')->with('msg', ' Tạo mới đơn giao hàng thành công !');
    }

    /**
     * Display the specified resource.
     */
    public function show(Delivery $delivery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Delivery $delivery)
    {
        //
    }

    public function watchDelivery(string $id)
    {
        $title = 'Chỉnh sửa đơn giao hàng';
        $delivery = $this->delivery->getDeliveryToId($id);
        $product = $this->delivery->getProductToId($id);
        $serinumber = Serialnumber::leftJoin('delivery', 'delivery.detailexport_id', 'serialnumber.detailexport_id')
            ->where('delivery.id', $id)
            ->where('serialnumber.delivery_id', $id)
            ->select('*', 'serialnumber.id as idSeri')
            ->get();
        return view('tables.export.delivery.watch-delivery', compact('title', 'delivery', 'product', 'serinumber'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if ($request->action == "action_1") {
            $delivery = Delivery::find($id);
            if ($delivery) {
                $delivery->update([
                    'status' => 2,
                ]);
                $this->delivery->updateDetailExport($request->all(), $delivery->detailexport_id);
                return redirect()->route('delivery.index')->with('msg', 'Xác nhận đơn giao hàng thành công!');
            }
        }
        if ($request->action == "action_2") {
            $delivery = Delivery::find($id);
            Serialnumber::where('detailexport_id', $delivery->detailexport_id)
                ->update([
                    'status' => 1,
                    'detailexport_id' => 0,
                    'delivery_id' => 0,
                ]);
            QuoteExport::where('detailexport_id', $delivery->detailexport_id)
                ->update([
                    'qty_delivery' => 0,
                ]);
            if ($delivery->status == 1) {
                Delivered::where('delivery_id', $id)->delete();
            } elseif ($delivery->status == 2) {
                $deliveredItems = Delivered::where('delivery_id', $id)->get();
                foreach ($deliveredItems as $deliveredItem) {
                    $product = Products::find($deliveredItem->product_id);
                    if ($product) {
                        $product->product_inventory += $deliveredItem->deliver_qty;
                        $product->save();
                    }
                }
                Delivered::where('delivery_id', $id)->delete();
            }
            $deliveredCount = Delivered::where('delivery.detailexport_id', $delivery->detailexport_id)
                ->leftJoin('delivery', 'delivered.delivery_id', 'delivery.id')
                ->count();
            if ($deliveredCount > 0) {
                DetailExport::where('id', $delivery->detailexport_id)
                    ->update([
                        'status_receive' => 3,
                    ]);
            } else {
                DetailExport::where('id', $delivery->detailexport_id)
                    ->update([
                        'status_receive' => 1,
                    ]);
            }
            $BillCount = productBill::where('bill_sale.detailexport_id', $delivery->detailexport_id)
                ->leftJoin('bill_sale', 'product_bill.billSale_id', 'bill_sale.id')
                ->count();
            $PayCount = productPay::where('pay_export.detailexport_id', $delivery->detailexport_id)
                ->leftJoin('pay_export', 'product_pay.pay_id', 'pay_export.id')
                ->count();
            if ($deliveredCount == 0 && $BillCount == 0 && $PayCount == 0) {
                DetailExport::where('id', $delivery->detailexport_id)
                    ->update([
                        'status' => 1,
                    ]);
            } else {
                DetailExport::where('id', $delivery->detailexport_id)
                    ->update([
                        'status' => 2,
                    ]);
            }
            Delivery::find($id)->delete();
            return redirect()->route('delivery.index')->with('msg', 'Xóa đơn giao hàng thành công!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Delivery $delivery)
    {
        //
    }

    public function getInfoQuote(Request $request)
    {
        $data = $request->all();
        $delivery = DetailExport::where('detailexport.id', $data['idQuote'])
            ->leftJoin('guest', 'guest.id', 'detailexport.guest_id')->first();
        return $delivery;
    }

    public function getProductQuote(Request $request)
    {
        $data = $request->all();

        $delivery = DetailExport::leftJoin('quoteexport', 'quoteexport.detailexport_id', 'detailexport.id')
            ->leftJoin('products', 'products.id', 'quoteexport.product_id')
            ->select('*', 'detailexport.id as maXuat', 'quoteexport.product_id as maSP')
            ->selectRaw('COALESCE(quoteexport.product_qty, 0) - COALESCE(quoteexport.qty_delivery, 0) as soLuongCanGiao')
            ->leftJoin('serialnumber', function ($join) {
                $join->on('serialnumber.product_id', '=', 'products.id');
                $join->where('serialnumber.detailexport_id', 0);
            })
            ->where('detailexport.id', $data['idQuote'])
            ->whereRaw('COALESCE(quoteexport.product_qty, 0) - COALESCE(quoteexport.qty_delivery, 0) > 0')
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

    public function getProductFromQuote(Request $request)
    {
        $data = $request->all();
        $product = Products::where('id', $data['idProduct'])->first();
        return $product;
    }
}
