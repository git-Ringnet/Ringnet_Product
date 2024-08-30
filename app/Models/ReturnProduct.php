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
        $detailReturnExport = ReturnProduct::leftJoin('returnimport', 'returnproduct.returnImport_id', 'returnimport.id')
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
                'returnimport.description as description',
            );
        if (!empty($data['date'][0]) && !empty($data['date'][1])) {
            $dateStart = Carbon::parse($data['date'][0]);
            $dateEnd = Carbon::parse($data['date'][1])->endOfDay();
            $detailReturnExport = $detailReturnExport->whereBetween('returnimport.created_at', [$dateStart, $dateEnd]);
        }
        $detailReturnExport = $detailReturnExport->get();
        // dd($detailReturnExport);
        return $detailReturnExport;
    }
}
