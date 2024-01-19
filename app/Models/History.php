<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class History extends Model
{
    protected $table = 'history';
    protected $fillable = [
        'detailimport_id', 'detailexport_id', 'delivered_id',
    ];
    use HasFactory;
    public function getAllHistory()
    {
        $history = History::leftJoin('delivered', 'history.delivered_id', 'delivered.id')
            ->leftJoin('delivery', 'delivery.id', 'delivered.id')
            ->leftJoin('products', 'products.id', 'delivered.product_id')
            ->leftJoin('products_import', 'products.id', 'products_import.product_id')
            ->leftJoin('detailimport', 'detailimport.id', 'products_import.detailimport_id')
            ->leftJoin('quoteimport', 'quoteimport.product_name', 'products.product_name')
            ->leftJoin('history_import', 'history_import.product_name', 'products.product_name')
            ->leftJoin('detailexport', 'history.detailexport_id', 'detailexport.id')
            ->leftJoin('bill_sale', 'bill_sale.detailexport_id', 'history.detailexport_id')
            ->select(
                'history.*',
                'delivered.*',
                'delivery.*',
                'products.*',
                'products_import.*',
                'detailimport.*',
                'history_import.*',
                'detailexport.*',
                'bill_sale.*',
                'quoteimport.price_export as giadonnhap',
                'quoteimport.product_total as tongnhap',
                'quoteimport.product_qty as slnhap'
            )->get();
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
            ->leftJoin('delivery', 'delivery.id', 'delivered.id')
            ->leftJoin('products', 'products.id', 'delivered.product_id')
            ->leftJoin('products_import', 'products.id', 'products_import.product_id')
            ->leftJoin('detailimport', 'detailimport.id', 'products_import.detailimport_id')
            ->leftJoin('quoteimport', 'quoteimport.product_name', 'products.product_name')
            ->leftJoin('history_import', 'history_import.product_name', 'products.product_name')
            ->leftJoin('detailexport', 'history.detailexport_id', 'detailexport.id')
            ->leftJoin('bill_sale', 'bill_sale.detailexport_id', 'history.detailexport_id')
            ->select(
                'history.*',
                'delivered.*',
                'delivery.*',
                'products.*',
                'products_import.*',
                'detailimport.*',
                'history_import.*',
                'detailexport.*',
                'bill_sale.*',
                'quoteimport.price_export as giadonnhap',
                'quoteimport.product_total as tongnhap',
                'quoteimport.product_qty as slnhap'
            );

        if (isset($data['search'])) {
            $seri = new Serialnumber();
            $product = array();
            $product = $seri->getProductIdsHistory($data['search']);
            // dd($product);
            $history = $history->where(function ($query) use ($data, $product) {
                $query->orWhere('products.product_name', 'like', '%' . $data['search'] . '%');
                $query->orWhereIn('delivered.id', $product);
            });
        }
        // dd($data);
        if (isset($data['sort'])) {
            $history = $history->orderBy($data['sort'][0], $data['sort'][1]);
        }
        $history = $history->get();
        return $history;
    }
}
