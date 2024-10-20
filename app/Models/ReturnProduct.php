<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ReturnProduct extends Model
{
    use HasFactory;
    protected $table = "returnproduct";

    protected $fillable = [
        'id',
        'quoteimport_id',
        'qty',
        'created_at',
        'updated_at',
        'sn',
        'returnImport_id',
        'price_return',
    ];

    public function getQuoteImport()
    {
        return $this->hasOne(QuoteImport::class, 'id', 'quoteimport_id');
    }


    public function addReturnProduct($data, $id)
    {
        for ($i = 0; $i < count($data['product_name']); $i++) {
            $SN = [];
            if (isset($data['seri' . $i])) {
                $productSN = $data['seri' . $i];
                for ($j = 0; $j < count($productSN); $j++) {
                    if (!empty($productSN[$j])) {
                        array_push($SN, $productSN[$j]);
                    }
                }
            }
            $getQuoteImport = QuoteImport::where('product_name', $data['product_name'][$i])->where('receive_id', $data['detailimport_id'])->first();
            if ($getQuoteImport) {
                $dataReturnProduct = [
                    'quoteimport_id' => $getQuoteImport->id,
                    'qty' => $data['product_qty'][$i],
                    'created_at' => Carbon::now(),
                    'sn' => json_encode($SN),
                    'returnImport_id' => $id,
                    'price_return' => str_replace(',', '', $data['price_export'][$i]) ?? 0,
                ];
                DB::table($this->table)->insert($dataReturnProduct);
            }
        }
    }
    public function sumReturnImport()
    {
        $detailReturnExport = ReturnProduct::leftJoin('returnimport', 'returnproduct.returnImport_id', 'returnimport.id')
            ->leftJoin('receive_bill', 'receive_bill.id', 'returnimport.receive_id')
            ->leftJoin('quoteimport', 'quoteimport.id', 'returnproduct.quoteimport_id')
            ->leftJoin('provides', 'provides.id', 'receive_bill.provide_id')
            ->select(
                'returnimport.id as idReturn',
                'returnimport.created_at as ngayTao',
                'returnimport.return_code as maPhieu',
                'provides.provide_name_display as nameProvide',
                'quoteimport.product_name as nameProduct',
                'quoteimport.product_unit as unitProduct',
                'returnproduct.qty as qtyReturn',
                'quoteimport.price_export as priceProduct',
                'returnimport.payment as payment',
                'returnimport.status as trangThai',
                'returnimport.description as description',
            )
            ->get();
        // dd($detailReturnExport);
        return $detailReturnExport;
    }

    public function AjaxSumReturnImport($data)
    {
        $detailReturnImport = ReturnProduct::leftJoin('returnimport', 'returnproduct.returnImport_id', 'returnimport.id')
            ->leftJoin('receive_bill', 'receive_bill.id', 'returnimport.receive_id')
            ->leftJoin('quoteimport', 'quoteimport.id', 'returnproduct.quoteimport_id')
            ->leftJoin('provides', 'provides.id', 'receive_bill.provide_id')
            ->select(
                'returnimport.id as id',
                'returnimport.created_at as ngayTao',
                'returnimport.return_code as maPhieu',
                'provides.provide_name_display as nameProvide',
                'quoteimport.product_name as nameProduct',
                'quoteimport.product_unit as unitProduct',
                'returnproduct.qty as qtyReturn',
                'quoteimport.price_export as priceProduct',
                'returnimport.payment as payment',
                'returnimport.status as trangThai',
                'returnimport.description as description'
            );

        // Điều kiện lọc theo tìm kiếm chung
        if (isset($data['search']) && !empty($data['search'])) {
            $detailReturnImport = $detailReturnImport->where(function ($query) use ($data) {
                $query->orWhere('returnimport.return_code', 'like', '%' . $data['search'] . '%')
                    ->orWhere('quoteimport.product_name', 'like', '%' . $data['search'] . '%')
                    ->orWhere('quoteimport.product_unit', 'like', '%' . $data['search'] . '%')
                    ->orWhere('provides.provide_name_display', 'like', '%' . $data['search'] . '%')
                    ->orWhere('returnimport.description', 'like', '%' . $data['search'] . '%');
            });
        }

        // Điều kiện lọc theo ngày
        if (!empty($data['date'][0]) && !empty($data['date'][1])) {
            $dateStart = Carbon::parse($data['date'][0]);
            $dateEnd = Carbon::parse($data['date'][1])->endOfDay();
            $detailReturnImport = $detailReturnImport->whereBetween('returnimport.created_at', [$dateStart, $dateEnd]);
        }

        // Điều kiện lọc theo mã phiếu
        if (isset($data['maphieu']) && !empty($data['maphieu'])) {
            $detailReturnImport = $detailReturnImport->where('returnimport.return_code', 'like', '%' . $data['maphieu'] . '%');
        }

        // Điều kiện lọc theo tên nhà cung cấp
        if (isset($data['provides']) && !empty($data['provides'])) {
            $detailReturnImport = $detailReturnImport->where('provides.provide_name_display', 'like', '%' . $data['provides'] . '%');
        }

        // Điều kiện lọc theo tên hàng hóa
        if (isset($data['name']) && !empty($data['name'])) {
            $detailReturnImport = $detailReturnImport->where('quoteimport.product_name', 'like', '%' . $data['name'] . '%');
        }

        // Điều kiện lọc theo ĐVT
        if (isset($data['dvt']) && !empty($data['dvt'])) {
            $detailReturnImport = $detailReturnImport->where('quoteimport.product_unit', 'like', '%' . $data['dvt'] . '%');
        }

        // Điều kiện lọc theo số lượng
        if (isset($data['quantity'][0]) && isset($data['quantity'][1])) {
            $detailReturnImport = $detailReturnImport->where('returnproduct.qty', $data['quantity'][0], $data['quantity'][1]);
        }

        // Điều kiện lọc theo đơn giá
        if (isset($data['unit_price'][0]) && isset($data['unit_price'][1])) {
            $detailReturnImport = $detailReturnImport->where('quoteimport.price_export', $data['unit_price'][0], $data['unit_price'][1]);
        }
        // Điều kiện lọc theo thành tiền
        if (isset($data['price'][0]) && isset($data['price'][1])) {
            $detailReturnImport = $detailReturnImport->where(DB::raw('returnproduct.qty * returnproduct.price_return'), $data['price'][0], $data['price'][1]);
        }


        // Điều kiện lọc theo tổng cộng
        if (isset($data['total'][0]) && isset($data['total'][1])) {
            $detailReturnImport = $detailReturnImport->where('return_export.total_return', $data['total'][0], $data['total'][1]);
        }

        // Điều kiện lọc theo thanh toán
        if (isset($data['payment'][0]) && isset($data['payment'][1])) {
            $detailReturnImport = $detailReturnImport->where('returnimport.payment', $data['payment'][0], $data['payment'][1]);
        }

        // Điều kiện lọc theo ghi chú
        if (isset($data['note']) && !empty($data['note'])) {
            $detailReturnImport = $detailReturnImport->where('returnimport.description', 'like', '%' . $data['note'] . '%');
        }

        // Điều kiện lọc theo trạng thái
        if (isset($data['status']) && !empty($data['status'])) {
            $detailReturnImport = $detailReturnImport->where('returnimport.status', $data['status']);
        }

        $detailReturnImport = $detailReturnImport->get();

        return $detailReturnImport;
    }
}
