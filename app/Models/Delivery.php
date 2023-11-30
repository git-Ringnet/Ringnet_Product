<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Delivery extends Model
{
    use HasFactory;
    protected $fillable = [
        'guest_id',
        'quotation_number',
        'shipping_unit',
        'shipping_fee',
        'detailexport_id',
        'status',
    ];
    protected $table = 'delivery';

    public function delivered()
    {
        return $this->hasOne(Delivered::class, 'delivery_id');
    }

    public function quoteexport()
    {
        return $this->hasOne(QuoteExport::class, 'detailexport_id');
    }

    public function checkSL($data)
    {
        $delivery = DetailExport::leftJoin('quoteexport', 'quoteexport.detailexport_id', 'detailexport.id')
            ->select('*', 'detailexport.id as maXuat')
            ->selectRaw('COALESCE(quoteexport.product_qty, 0) - COALESCE(quoteexport.qty_delivery, 0) as soLuongCanGiao')
            ->where('detailexport.id', $data['detailexport_id'])
            ->whereRaw('COALESCE(quoteexport.product_qty, 0) - COALESCE(quoteexport.qty_delivery, 0) > 0')
            ->get();
        $check = !$delivery->isEmpty();

        return $check;
    }

    public function addDelivery($data)
    {
        if (isset($data['shipping_fee'])) {
            $shipping_fee = $data['shipping_fee'];
            if ($shipping_fee !== null) {
                $shipping_fee = str_replace(',', '', $shipping_fee);
            }
        } else {
            $shipping_fee = null;
        }
        if (isset($data['shipping_unit'])) {
            $shipping_unit = $data['shipping_unit'];
        } else {
            $shipping_unit = null;
        }
        if (isset($data['date_deliver'])) {
            $date_deliver = $data['date_deliver'];
        } else {
            $date_deliver = null;
        }
        $dataDelivery = [
            'guest_id' => $data['guest_id'],
            'quotation_number' => $data['quotation_number'],
            'shipping_unit' => $shipping_unit,
            'shipping_fee' => $shipping_fee,
            'detailexport_id' => $data['detailexport_id'],
            'status' => 1,
            'created_at' => $date_deliver,
        ];
        $detaiExport = DetailExport::where('id', $data['detailexport_id'])->first();
        if ($detaiExport) {
            $detaiExport->update([
                'status' => 2,
            ]);
        }
        $delivery = new Delivery($dataDelivery);
        $delivery->save();

        $detailexportId = $delivery->id;
        QuoteExport::where('detailexport_id', $data['detailexport_id'])
            ->update(['deliver_id' => $detailexportId]);
        return $delivery->id;
    }
    public function getDeliveryToId($id)
    {
        $delivery = Delivery::where('delivery.id', $id)
            ->leftJoin('guest', 'delivery.guest_id', 'guest.id')
            ->select('*', 'delivery.id as soGiaoHang', 'delivery.status as tinhTrang')
            ->first();
        return $delivery;
    }
    public function getProductToId($id)
    {
        $product = Delivery::join('quoteexport', 'delivery.detailexport_id', '=', 'quoteexport.detailexport_id')
            ->leftJoin('delivered', function ($join) {
                $join->on('delivered.delivery_id', '=', 'delivery.id');
                $join->on('delivered.product_id', '=', 'quoteexport.product_id');
            })
            ->join('products', 'products.id', 'delivered.product_id')
            ->where('delivery.id', $id)
            ->select(
                'quoteexport.product_id',
                'quoteexport.product_code',
                'quoteexport.product_name',
                'quoteexport.product_unit',
                'quoteexport.product_note',
                'delivered.deliver_qty',
                'products.product_inventory',
            )
            ->groupBy(
                'quoteexport.product_code',
                'quoteexport.product_name',
                'quoteexport.product_unit',
                'delivered.deliver_qty',
                'products.product_inventory',
                'quoteexport.product_id',
                'quoteexport.product_note',
            )
            ->get();
        return $product;
    }
    public function updateDetailExport($data, $detailexport_id)
    {
        $quoteExports = QuoteExport::where('detailexport_id', $detailexport_id)->get();

        // Biến để kiểm tra xem có ít nhất một giá trị nào lớn hơn 0 không
        $hasNonZeroDifference = false;

        foreach ($quoteExports as $quoteExport) {
            $product_id = $quoteExport->product_id;

            // Lấy tất cả các bản ghi delivered có product_id tương ứng và status = 2 từ bảng Delivery
            $deliveriesForProduct = Delivered::join('delivery', 'delivery.id', '=', 'delivered.delivery_id')
                ->where('delivered.product_id', $product_id)
                ->where('delivery.status', 2)
                ->get();

            // Tính tổng deliver_qty
            $totalDeliveredQty = $deliveriesForProduct->sum('deliver_qty');
            $productQty = bcsub($quoteExport->product_qty, '0', 4);

            // So sánh tổng deliver_qty với product_qty
            if (bccomp($totalDeliveredQty, $productQty, 4) !== 0) {
                $hasNonZeroDifference = true;
                break;
            }
        }

        $detailExport = DetailExport::where('id', $detailexport_id)->first();

        if ($detailExport) {
            if ($hasNonZeroDifference) {
                $detailExport->update([
                    'status_receive' => 3,
                ]);
            } else {
                $detailExport->update([
                    'status_receive' => 2,
                ]);
                if ($detailExport->status_receive == 2 && $detailExport->status_reciept == 2 && $detailExport->status_pay == 2) {
                    $detailExport->update([
                        'status' => 3,
                    ]);
                }
            }
        }
        for ($i = 0; $i < count($data['product_name']); $i++) {
            $product = Products::find($data['product_id'][$i]);
            if ($product) {
                $result = $product->product_inventory - $data['product_qty'][$i];
                $product->update([
                    'product_inventory' => $result,
                ]);
            }
        }
        $serinumber = Serialnumber::where('serialnumber.status', 3)
            ->where('detailexport_id', $detailexport_id)
            ->get();
        $serinumber->each(function ($serial) {
            $serial->update(['status' => 2]);
        });
    }
    public function getAttachment($name)
    {
        return $this->hasMany(Attachment::class, 'table_id', 'id')->where('table_name', $name)->get();
    }
}
