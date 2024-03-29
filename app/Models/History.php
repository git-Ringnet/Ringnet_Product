<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class History extends Model
{
    protected $table = 'history';
    protected $fillable = [
        'detailimport_id', 'detailexport_id', 'delivered_id', 'provide_id',
        'tax_import', 'price_import', 'total_import', 'history_import'
    ];
    use HasFactory;
    public function getAllHistory()
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
            ->select(
                'history.*',
                'delivered.*',
                'delivery.*',
                'delivered.price_export as giaban',
                'delivered.created_at as time',
                'products.product_name as tensp',
                'history_import.*',
                'detailexport.*',
                'bill_sale.number_bill as hdra',
                'reciept.number_bill as hdvao',
                'guest.guest_name_display as tenKhach',
                'provides.provide_name_display as tenNCC',
            )->get();
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
            ->select(
                'history.*',
                'delivered.*',
                'delivery.*',
                'delivered.price_export as giaban',
                'delivered.created_at as time',
                'products.product_name as tensp',
                'history_import.*',
                'detailexport.*',
                'bill_sale.number_bill as hdra',
                'reciept.number_bill as hdvao',
                'guest.guest_name_display as tenKhach',
                'provides.provide_name_display as tenNCC',
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
        if (isset($data['filters']['tensp'])) {
            $history = $history->where('products.product_name', 'like', '%' . $data['filters']['tensp'] . '%');
        }

        if (isset($data['filters']['product_qty'][0]) && isset($data['filters']['product_qty'][1])) {
            $history = $history->where('history_import.product_qty', $data['filters']['product_qty'][0], $data['filters']['product_qty'][1]);
        }
        if (isset($data['filters']['price_import'][0]) && isset($data['filters']['price_import'][1])) {
            $history = $history->where('history_import.price_export', $data['filters']['price_import'][0], $data['filters']['price_import'][1]);
        }
        if (isset($data['filters']['idGuests'])) {
            $history = $history->whereIn('guest.id', $data['filters']['idGuests']);
        }
        if (isset($data['filters']['idProvides'])) {
            $history = $history->whereIn('provides.id', $data['filters']['idProvides']);
        }
        // dd($data);
        if (isset($data['sort'])) {
            $history = $history->orderBy($data['sort'][0], $data['sort'][1]);
        }
        $history = $history->get();
        return $history;
    }
}
