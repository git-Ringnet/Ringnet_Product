<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ProductReturnExport extends Model
{
    use HasFactory;
    protected $table = 'product_return_export';

    protected $fillable = [
        'return_export_id',
        'product_id',
        'return_qty',
        'price_export',
        'product_total_vat',
        'description',
        'workspace_id',
        'created_at',
        'updated_at',
        'user_id',
        'promotion',
    ];
    public function sumReturnExport()
    {
        $detailReturnExport = ProductReturnExport::leftJoin('return_export', 'product_return_export.return_export_id', 'return_export.id')
            ->leftJoin('delivery', 'delivery.id', 'return_export.delivery_id')
            ->leftJoin('products', 'product_return_export.product_id', 'products.id')
            ->leftJoin('guest', 'guest.id', 'delivery.guest_id')
            ->select(
                'return_export.id as idReturn',
                'return_export.created_at as ngayTao',
                'return_export.code_return as maPhieu',
                'guest.guest_name_display as nameGuest',
                'products.product_name as nameProduct',
                'products.product_unit as unitProduct',
                'product_return_export.return_qty as qtyReturn',
                'product_return_export.price_export as priceProduct',
                'product_return_export.product_total_vat as totalProduct',
                'return_export.payment as payment',
                'return_export.status as trangThai',
                'product_return_export.description as description',
                DB::raw('
            CASE
                WHEN JSON_EXTRACT(product_return_export.promotion, "$.type") = "1" THEN 
                    (product_return_export.return_qty * product_return_export.price_export) - CAST(JSON_EXTRACT(product_return_export.promotion, "$.value") AS UNSIGNED)
                WHEN JSON_EXTRACT(product_return_export.promotion, "$.type") = "2" THEN 
                    (product_return_export.return_qty * product_return_export.price_export) * (1 - CAST(JSON_EXTRACT(product_return_export.promotion, "$.value") AS DECIMAL) / 100)
                ELSE 
                    product_return_export.return_qty * product_return_export.price_export
            END as product_total
        '),
                DB::raw('(
                        SELECT 
                            CASE 
                                WHEN JSON_UNQUOTE(JSON_EXTRACT(delivery.promotion, "$.value")) != 0 THEN 
                                    CASE 
                                        WHEN JSON_UNQUOTE(JSON_EXTRACT(delivery.promotion, "$.type")) = 1 THEN 
                                            (COALESCE(SUM(product_total_vat), 0) - CAST(JSON_UNQUOTE(JSON_EXTRACT(delivery.promotion, "$.value")) AS DECIMAL)) * (1 + (COALESCE(MAX(products.product_tax), 0) / 100)) -- Giảm số tiền trực tiếp và áp dụng thuế
                                        WHEN JSON_UNQUOTE(JSON_EXTRACT(delivery.promotion, "$.type")) = 2 THEN 
                                            ((COALESCE(SUM(product_total_vat), 0) * (100 - CAST(JSON_UNQUOTE(JSON_EXTRACT(delivery.promotion, "$.value")) AS DECIMAL)) / 100)) * (1 + (COALESCE(MAX(products.product_tax), 0) / 100)) -- Giảm phần trăm trên tổng giá trị sản phẩm và áp dụng thuế
                                        ELSE 
                                            COALESCE(SUM(product_total_vat), 0) -- Không có khuyến mãi
                                    END
                                ELSE
                                    COALESCE(SUM(product_total_vat), 0) -- Giá trị ban đầu nếu $.value = 0
                            END
                        FROM delivered 
                        LEFT JOIN products ON delivered.product_id = products.id
                        WHERE delivered.delivery_id = delivery.id
                    ) as totalProductVat'),

            )
            ->get();
        // dd($detailReturnExport);
        return $detailReturnExport;
    }

    public function AjaxSumReturnExport($data)
    {
        $detailReturnExport = ProductReturnExport::leftJoin('return_export', 'product_return_export.return_export_id', 'return_export.id')
            ->leftJoin('delivery', 'delivery.id', 'return_export.delivery_id')
            ->leftJoin('products', 'product_return_export.product_id', 'products.id')
            ->leftJoin('guest', 'guest.id', 'delivery.guest_id')
            ->select(
                'return_export.id as id',
                'return_export.created_at as ngayTao',
                'return_export.code_return as maPhieu',
                'guest.guest_name_display as nameGuest',
                'products.product_name as nameProduct',
                'products.product_unit as unitProduct',
                'product_return_export.return_qty as qtyReturn',
                'product_return_export.price_export as priceProduct',
                'product_return_export.product_total_vat as totalProduct',
                'return_export.payment as payment',
                'return_export.status as trangThai',
                'product_return_export.description as description',
                DB::raw('
            CASE
                WHEN JSON_EXTRACT(product_return_export.promotion, "$.type") = "1" THEN 
                    (product_return_export.return_qty * product_return_export.price_export) - CAST(JSON_EXTRACT(product_return_export.promotion, "$.value") AS UNSIGNED)
                WHEN JSON_EXTRACT(product_return_export.promotion, "$.type") = "2" THEN 
                    (product_return_export.return_qty * product_return_export.price_export) * (1 - CAST(JSON_EXTRACT(product_return_export.promotion, "$.value") AS DECIMAL) / 100)
                ELSE 
                    product_return_export.return_qty * product_return_export.price_export
            END as product_total
        '),
                DB::raw('(
                        SELECT 
                            CASE 
                                WHEN JSON_UNQUOTE(JSON_EXTRACT(delivery.promotion, "$.value")) != 0 THEN 
                                    CASE 
                                        WHEN JSON_UNQUOTE(JSON_EXTRACT(delivery.promotion, "$.type")) = 1 THEN 
                                            (COALESCE(SUM(product_total_vat), 0) - CAST(JSON_UNQUOTE(JSON_EXTRACT(delivery.promotion, "$.value")) AS DECIMAL)) * (1 + (COALESCE(MAX(products.product_tax), 0) / 100)) -- Giảm số tiền trực tiếp và áp dụng thuế
                                        WHEN JSON_UNQUOTE(JSON_EXTRACT(delivery.promotion, "$.type")) = 2 THEN 
                                            ((COALESCE(SUM(product_total_vat), 0) * (100 - CAST(JSON_UNQUOTE(JSON_EXTRACT(delivery.promotion, "$.value")) AS DECIMAL)) / 100)) * (1 + (COALESCE(MAX(products.product_tax), 0) / 100)) -- Giảm phần trăm trên tổng giá trị sản phẩm và áp dụng thuế
                                        ELSE 
                                            COALESCE(SUM(product_total_vat), 0) -- Không có khuyến mãi
                                    END
                                ELSE
                                    COALESCE(SUM(product_total_vat), 0) -- Giá trị ban đầu nếu $.value = 0
                            END
                        FROM delivered 
                        LEFT JOIN products ON delivered.product_id = products.id
                        WHERE delivered.delivery_id = delivery.id
                    ) as totalProductVat'),

            );
        if (!empty($data['date'][0]) && !empty($data['date'][1])) {
            $dateStart = Carbon::parse($data['date'][0]);
            $dateEnd = Carbon::parse($data['date'][1])->endOfDay();
            $detailReturnExport = $detailReturnExport->whereBetween('return_export.created_at', [$dateStart, $dateEnd]);
        }
        $detailReturnExport = $detailReturnExport->get();

        return $detailReturnExport;
    }
}
