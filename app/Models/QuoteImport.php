<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class QuoteImport extends Model
{
    use HasFactory;
    protected $table = 'quoteimport';
    protected $fillable = [
        'detailimport_id',
        'product_id',
    ];
    public function getProductCode()
    {
        return $this->hasOne(ProductCode::class, 'id', 'product_code');
    }
    public function getSerialNumber()
    {
        return $this->hasMany(Serialnumber::class, 'detailimport_id', 'detailimport_id');
    }
    public function getAllQuote()
    {
        return DB::table($this->table)->get();
    }

    public function addQuoteImport($data, $id)
    {
        for ($i = 0; $i < count($data['product_name']); $i++) {
            $product_ratio = 0;
            $price_import = 0;
            isset($data['product_ratio']) ? $product_ratio = $data['product_ratio'][$i] : $product_ratio = 0;
            isset($data['price_import']) ? $price_import = str_replace(',', '', $data['price_import'][$i]) : $price_import = 0;
            if ($product_ratio > 0 && $price_import > 0) {
                $price_export = (($product_ratio + 100) * $price_import) / 100;
                $total_price = $price_export * $data['product_qty'][$i];
            } else {
                $price_export = str_replace(',', '', $data['price_export'][$i]);
                $total_price = $data['product_qty'][$i] * $price_export;
            }
            $dataQuote = [
                'detailimport_id' => $id,
                'product_code' => $data['product_code'][$i],
                'product_name' => $data['product_name'][$i],
                'product_unit' => $data['product_unit'][$i],
                'product_qty' => $data['product_qty'][$i],
                'product_tax' => $data['product_tax'][$i],
                'product_total' => $total_price,
                'price_export' => $price_export,
                'product_ratio' => $product_ratio,
                'price_import' => $price_import,
                'product_note' => $data['product_note'][$i],
                'receive_id' => 0
            ];
            DB::table($this->table)->insert($dataQuote);
        }
        // return $result;
    }


    public function updateImport($data, $id, $id_receive)
    {
        // Xóa sản phẩm khi chỉnh sửa đơn hàng
        if ($data['action'] == 'action_1') {
            $id_detail = DB::table($this->table)->where('detailimport_id', $id)
                ->whereNotIn('id', $data['listProduct'])
                ->delete();
        }
        for ($i = 0; $i < count($data['product_name']); $i++) {
            // Lấy sản phẩm cần sửa
            $dataUpdate = QuoteImport::where('id', $data['listProduct'][$i])->first();
            $product_ratio = 0;
            $price_import = 0;
            isset($data['product_ratio']) ? $product_ratio = $data['product_ratio'][$i] : $product_ratio = 0;
            isset($data['price_import']) ? $price_import = str_replace(',', '', $data['price_import'][$i]) : $price_import = 0;
            if ($product_ratio > 0 && $price_import > 0) {
                $price_export = (($product_ratio + 100) * $price_import) / 100;
                $total_price = $price_export * $data['product_qty'][$i];
            } else {
                $price_export = str_replace(',', '', $data['price_export'][$i]);
                $total_price = $data['product_qty'][$i] * $price_export;
            }
            if ($dataUpdate) {
                $dataQuoteUpdate = [
                    'product_code' => $data['product_code'][$i],
                    'product_name' => $data['product_name'][$i],
                    'product_unit' => $data['product_unit'][$i],
                    'product_qty' => $data['product_qty'][$i],
                    'product_tax' => $data['product_tax'][$i],
                    'product_total' => $total_price,
                    'price_export' => $price_export,
                    'product_ratio' => $product_ratio,
                    'price_import' => $price_import,
                    'product_note' => $data['product_note'][$i],
                    'receive_id' => $id_receive == "" ? 0 : $id_receive
                ];
                DB::table($this->table)->where('id', $dataUpdate->id)->update($dataQuoteUpdate);
            } else {
                $dataQuote = [
                    'detailimport_id' => $id,
                    'product_code' => $data['product_code'][$i],
                    'product_name' => $data['product_name'][$i],
                    'product_unit' => $data['product_unit'][$i],
                    'product_qty' => $data['product_qty'][$i],
                    'product_tax' => $data['product_tax'][$i],
                    'product_total' => $total_price,
                    'price_export' => $price_export,
                    'product_ratio' => $product_ratio,
                    'price_import' => $price_import,
                    'product_note' => $data['product_note'][$i],
                    'receive_id' => $id_receive == "" ? 0 : $id_receive
                ];
                DB::table($this->table)->insert($dataQuote);
            }
        }
    }
}
