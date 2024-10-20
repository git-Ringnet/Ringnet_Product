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
            END as product_total'),
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

        if (isset($data['search'])) {
            $detailReturnExport = $detailReturnExport->where(function ($query) use ($data) {
                $query->orWhere('return_export.code_return', 'like', '%' . $data['search'] . '%')
                    ->orWhere('products.product_name', 'like', '%' . $data['search'] . '%')
                    ->orWhere('products.product_unit', 'like', '%' . $data['search'] . '%')
                    ->orWhere('guest.guest_name_display', 'like', '%' . $data['search'] . '%');
            });
        }

        // Điều kiện lọc theo ngày
        if (!empty($data['date'][0]) && !empty($data['date'][1])) {
            $dateStart = Carbon::parse($data['date'][0]);
            $dateEnd = Carbon::parse($data['date'][1])->endOfDay();
            $detailReturnExport = $detailReturnExport->whereBetween('return_export.created_at', [$dateStart, $dateEnd]);
        }

        // Điều kiện lọc theo mã phiếu
        if (isset($data['maphieu']) && !empty($data['maphieu'])) {
            $detailReturnExport = $detailReturnExport->where('return_export.code_return', 'like', '%' . $data['maphieu'] . '%');
        }

        // Điều kiện lọc theo tên khách hàng
        if (isset($data['customers']) && !empty($data['customers'])) {
            $detailReturnExport = $detailReturnExport->where('guest.guest_name_display', 'like', '%' . $data['customers'] . '%');
        }

        // Điều kiện lọc theo tên hàng hóa
        if (isset($data['name']) && !empty($data['name'])) {
            $detailReturnExport = $detailReturnExport->where('products.product_name', 'like', '%' . $data['name'] . '%');
        }

        // Điều kiện lọc theo ĐVT
        if (isset($data['dvt']) && !empty($data['dvt'])) {
            $detailReturnExport = $detailReturnExport->where('products.product_unit', 'like', '%' . $data['dvt'] . '%');
        }

        // Điều kiện lọc theo số lượng
        if (isset($data['quantity'][0]) && isset($data['quantity'][1])) {
            $detailReturnExport = $detailReturnExport->where('product_return_export.return_qty', $data['quantity'][0], $data['quantity'][1]);
        }

        // Điều kiện lọc theo đơn giá
        if (isset($data['unit_price'][0]) && isset($data['unit_price'][1])) {
            $detailReturnExport = $detailReturnExport->where('product_return_export.price_export', $data['unit_price'][0], $data['unit_price'][1]);
        }

        // Điều kiện lọc theo thành tiền
        if (isset($data['price'][0]) && isset($data['price'][1])) {
            $detailReturnExport = $detailReturnExport->where('product_return_export.product_total_vat', $data['price'][0], $data['price'][1]);
        }

        // Điều kiện lọc theo tổng cộng
        if (isset($data['total'][0]) && isset($data['total'][1])) {
            $detailReturnExport = $detailReturnExport->where('return_export.total_return', $data['total'][0], $data['total'][1]);
        }

        // Điều kiện lọc theo thanh toán
        if (isset($data['payment'][0]) && isset($data['payment'][1])) {
            $detailReturnExport = $detailReturnExport->where('return_export.payment', $data['payment'][0], $data['payment'][1]);
        }

        // Điều kiện lọc theo ghi chú
        if (isset($data['note']) && !empty($data['note'])) {
            $detailReturnExport = $detailReturnExport->where('product_return_export.description', 'like', '%' . $data['note'] . '%');
        }

        // Điều kiện lọc theo trạng thái
        if (isset($data['status']) && !empty($data['status'])) {
            $detailReturnExport = $detailReturnExport->where('return_export.status', $data['status']);
        }
        $detailReturnExport = $detailReturnExport->get();
        return $detailReturnExport;
    }
}
