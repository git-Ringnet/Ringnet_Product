<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class History extends Model
{
    protected $table = 'history';
    protected $fillable = [
        'id',
        'detailimport_id', 'detailexport_id', 'delivered_id', 'provide_id',
        'tax_import', 'price_import', 'total_import', 'history_import', 'workspace_id', 'hdv', 'hdr'
    ];
    use HasFactory;
    public function getAllHistory()
    {
        $history = History::leftJoin('delivered', 'history.delivered_id', 'delivered.id')
            ->leftJoin('delivery', 'delivery.id', 'delivered.delivery_id')
            ->leftJoin('products', 'products.id', 'delivered.product_id')
            ->leftJoin('history_import', 'history_import.id', 'history.history_import')
            ->leftJoin('detailexport', 'history.detailexport_id', 'detailexport.id')
            // ->leftJoin('quoteexport', 'quoteexport.detailexport_id', 'detailexport.id')
            ->leftJoin('bill_sale', 'bill_sale.detailexport_id', 'history.detailexport_id')
            ->leftJoin('detailimport', 'detailimport.id', 'history.detailimport_id')
            ->leftJoin('pay_export', 'pay_export.detailexport_id', 'detailexport.id')
            // ->leftJoin('reciept', 'reciept.detailimport_id', 'history.detailimport_id')
            ->leftJoin('pay_order', 'pay_order.detailimport_id', 'history.detailimport_id')
            ->leftJoin('provides', 'provides.id', 'history.provide_id')
            ->leftJoin('guest', 'guest.id', 'detailexport.guest_id')
            ->where('delivery.status', 2)
            ->where('history.workspace_id', Auth::user()->current_workspace)
            ->select(
                'delivered.*',
                'delivery.*',
                'delivered.price_export as giaban',
                'delivered.created_at as time',
                'products.product_name as tensp',
                'history_import.*',
                'history_import.price_export as gianhap',
                'detailexport.reference_number as POxuat',
                'detailexport.total_price as giaXuat',
                'detailexport.total_tax as VATXuat',
                'detailexport.quotation_number as HDXuat',
                // 'quoteexport.product_tax as thueXuat',
                'products.product_tax as thueXuat',
                'detailexport.*',
                'history.hdr as hdra',
                'history.hdv as hdvao',
                'history.price_import as trcVat',
                'history.total_import as sauVat',
                'bill_sale.created_at as ngayHDxuat',
                'pay_export.payment_day as ngayTTxuat',
                'pay_export.payment_type as HTTTxuat',
                'detailexport.status_pay as status_pay',
                'guest.guest_name_display as tenKhach',
                'provides.provide_name_display as tenNCC',
                'products.product_guarantee as baoHanh',
                'detailimport.reference_number as POnhap',
                'detailimport.created_at as ngayHDnhap',
                'detailimport.status_pay as TTnhap',
                'pay_order.payment_day as ngayTT',
                'pay_order.payment_type as HTTT',
                'history.*',
                'history.id',
                DB::raw('delivered.deliver_qty * delivered.price_export AS tongban'),
            )->distinct()->get();
        // dd($history);
        return $history;
    }
    public function getProductToId($id_delivery, $idproduct)
    {
        $product = Delivery::join('quoteexport', 'delivery.detailexport_id', '=', 'quoteexport.detailexport_id')
            ->leftJoin('delivered', function ($join) {
                $join->on('delivered.delivery_id', '=', 'delivery.id');
                $join->on('delivered.product_id', '=', 'quoteexport.product_id');
            })
            ->join('products', 'products.id', 'delivered.product_id')
            ->where('delivery.id', $id_delivery)
            ->where('delivered.product_id', $idproduct)
            ->select(
                'quoteexport.product_id',
                'quoteexport.product_code',
                'quoteexport.product_name',
                'quoteexport.product_unit',
                'quoteexport.product_note',
                'quoteexport.product_note',
                'quoteexport.price_export',
                'quoteexport.product_ratio',
                'products.product_inventory',
                'quoteexport.product_tax',
                'quoteexport.price_import',
                'quoteexport.product_total',
                'delivered.deliver_qty',
                'delivery.created_at as ngayGiao'
            )
            ->groupBy(
                'quoteexport.product_code',
                'quoteexport.product_name',
                'quoteexport.product_unit',
                'delivered.deliver_qty',
                'products.product_inventory',
                'quoteexport.product_id',
                'quoteexport.product_note',
                'quoteexport.price_export',
                'quoteexport.product_ratio',
                'quoteexport.product_tax',
                'quoteexport.price_import',
                'quoteexport.product_total',
                'delivery.created_at'
            )
            ->get();
        return $product;
    }
    public function addHistory($data)
    {
        return self::create($data);
    }

    public function ajax($data)
    {
        $history = History::leftJoin('delivered', 'history.delivered_id', 'delivered.id')
            ->leftJoin('delivery', 'delivery.id', 'delivered.delivery_id')
            ->leftJoin('products', 'products.id', 'delivered.product_id')
            ->leftJoin('history_import', 'history_import.id', 'history.history_import')
            ->leftJoin('detailexport', 'history.detailexport_id', 'detailexport.id')
            ->leftJoin('bill_sale', 'bill_sale.detailexport_id', 'history.detailexport_id')
            ->leftJoin('reciept', 'reciept.detailimport_id', 'history.detailimport_id')
            ->leftJoin('provides', 'provides.id', 'history.provide_id')
            ->leftJoin('guest', 'guest.id', 'detailexport.guest_id')
            ->where('delivery.status', 2)
            ->where('history.workspace_id', Auth::user()->current_workspace)
            ->select(

                'history.price_import as price_import',
                'history.total_import as total_import',
                'delivered.*',
                'delivery.*',
                'delivered.price_export as giaban',
                'delivered.created_at as time',
                'products.product_name as tensp',
                'history_import.*',
                'history_import.price_export as gianhap',
                'detailexport.*',
                'bill_sale.number_bill as hdra',
                'reciept.number_bill as hdvao',
                'guest.guest_name_display as tenKhach',
                'provides.provide_name_display as tenNCC',
                'history.*',
                DB::raw('delivered.deliver_qty * delivered.price_export AS tongban'),
            );

        if (isset($data['search'])) {
            $seri = new Serialnumber();
            $product = array();
            $product = $seri->getProductIdsHistory($data['search']);
            // dd($product);
            $history = $history->where(function ($query) use ($data, $product) {
                $query->orWhere('products.product_name', 'like', '%' . $data['search'] . '%');
                $query->orWhere('guest.guest_name_display', 'like', '%' . $data['search'] . '%');
                $query->orWhere('provides.provide_name_display', 'like', '%' . $data['search'] . '%');
                $query->orWhereIn('delivered.id', $product);
            });
        }
        if (isset($data['tensp'])) {
            $history = $history->where('products.product_name', 'like', '%' . $data['tensp'] . '%');
        }
        if (isset($data['hdvao'])) {
            $history = $history->having('hdvao', 'like', '%' . $data['hdvao'] . '%');
        }
        if (isset($data['hdra'])) {
            $history = $history->having('hdra', 'like', '%' . $data['hdra'] . '%');
        }
        // Nhập
        if (isset($data['product_qty'][0]) && isset($data['product_qty'][1])) {
            $history = $history->where('history_import.product_qty', $data['product_qty'][0], $data['product_qty'][1]);
        }
        if (isset($data['price_import'][0]) && isset($data['price_import'][1])) {
            $history = $history->where('history_import.price_export', $data['price_import'][0], $data['price_import'][1]);
        }
        if (isset($data['total_import'][0]) && isset($data['total_import'][1])) {
            $history = $history->where('history.total_import', $data['total_import'][0], $data['total_import'][1]);
        }
        // Xuất
        if (isset($data['slxuat'][0]) && isset($data['slxuat'][1])) {
            $history = $history->where('delivered.deliver_qty', $data['slxuat'][0], $data['slxuat'][1]);
        }
        if (isset($data['total_export'][0]) && isset($data['total_export'][1])) {
            $history = $history->whereRaw('delivered.deliver_qty * delivered.price_export ' . $data['total_export'][0] . '?', [$data['total_export'][1]]);
        }
        if (isset($data['price_export'][0]) && isset($data['price_export'][1])) {
            $history = $history->where('delivered.price_export', $data['price_export'][0], $data['price_export'][1]);
        }
        if (isset($data['shipping_fee'][0]) && isset($data['shipping_fee'][1])) {
            $history = $history->where('delivery.shipping_fee', $data['shipping_fee'][0], $data['shipping_fee'][1]);
        }
        if (isset($data['product_unit'])) {
            $history = $history->whereIn('delivered.product_id', $data['product_unit']);
        }
        if (isset($data['idGuests'])) {
            $history = $history->whereIn('guest.id', $data['idGuests']);
        }
        if (isset($data['idProvides'])) {
            $history = $history->whereIn('provides.id', $data['idProvides']);
        }
        // dd($data);
        if (isset($data['sort']) && isset($data['sort'][0])) {
            $history = $history->orderBy($data['sort'][0], $data['sort'][1]);
        }
        $history = $history->get();
        return $history;
    }
}
