<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
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
        return $this->hasMany(Serialnumber::class, 'product_id', 'product_id');
    }

    public function getAllQuote()
    {
        return DB::table($this->table)->get();
    }
    public function getProductImport()
    {
        return $this->hasOne(ProductImport::class, 'quoteImport_id', 'id');
    }
    public function getQuoteNumber()
    {
        return $this->hasOne(DetailImport::class, 'id', 'detailimport_id');
    }
    public function getWareHouse()
    {
        return $this->hasOne(Warehouse::class, 'id', 'warehouse_id');
    }

    public function addQuoteImport($data, $id)
    {
        for ($i = 0; $i < count($data['product_name']); $i++) {
            $dataQuote = [
                'detailimport_id' => $id,
                'product_code' => $data['product_code'][$i],
                'product_name' => $data['product_name'][$i],
                'product_unit' => $data['product_unit'][$i],
                'product_qty' => str_replace(',', '', $data['product_qty'][$i]),
                'product_tax' => $data['product_tax'][$i],
                'product_total' => str_replace(',', '', $data['product_qty'][$i]) * str_replace(',', '', $data['price_export'][$i]),
                'price_export' => str_replace(',', '', $data['price_export'][$i]),
                'product_note' => $data['product_note'][$i],
                'receive_id' => 0,
                'warehouse_id' => 1,
                'version' => 1,
                'created_at' => Carbon::now(),
                'workspace_id' => Auth::user()->current_workspace
            ];
            $quote_id = DB::table($this->table)->insertGetId($dataQuote);
            $getProvide = DetailImport::where('id', $id)->first();
            if ($quote_id && $getProvide) {
                $dataHistory = [
                    'detailimport_id' => $id,
                    'quoteImport_id' => $quote_id,
                    'product_code' => $data['product_code'][$i],
                    'product_name' => $data['product_name'][$i],
                    'product_unit' => $data['product_unit'][$i],
                    'product_qty' => str_replace(',', '', $data['product_qty'][$i]),
                    'product_tax' => $data['product_tax'][$i],
                    'product_total' => str_replace(',', '', $data['product_qty'][$i]) * str_replace(',', '', $data['price_export'][$i]),
                    'price_export' => str_replace(',', '', $data['price_export'][$i]),
                    'product_note' => $data['product_note'][$i],
                    'version' => 1,
                    'created_at' => Carbon::now(),
                    'workspace_id' => Auth::user()->current_workspace,
                    'provide_id' => $getProvide->provide_id
                ];
                DB::table('history_import')->insert($dataHistory);
            }
        }
        // return $result;
    }


    public function updateImport($data, $id)
    {
        // Xóa sản phẩm khi chỉnh sửa đơn hàng
        if ($data['action'] == 'action_1') {
            $id_detail = DB::table($this->table)->where('detailimport_id', $id)
                ->where('workspace_id', Auth::user()->current_workspace)
                ->whereNotIn('id', $data['listProduct'])
                ->delete();
        }
        for ($i = 0; $i < count($data['product_name']); $i++) {
            // Lấy sản phẩm cần sửa
            $dataUpdate = QuoteImport::where('id', $data['listProduct'][$i])
                ->where('workspace_id', Auth::user()->current_workspace)
                ->first();
            $price_export = str_replace(',', '', $data['price_export'][$i]);
            $total_price = $data['product_qty'][$i] * $price_export;
            if ($dataUpdate) {
                if (
                    $dataUpdate->product_code != $data['product_code'][$i] || $dataUpdate->product_name != $data['product_name'][$i] || $dataUpdate->product_unit != $data['product_unit'][$i] ||
                    $dataUpdate->product_qty != str_replace(',', '', $data['product_qty'][$i]) || $dataUpdate->product_tax != $data['product_tax'][$i] ||
                    $dataUpdate->product_total != $total_price || $dataUpdate->price_export != $price_export || $dataUpdate->product_note != $data['product_note'][$i]
                ) {
                    $dataQuoteUpdate = [
                        'product_code' => $data['product_code'][$i],
                        'product_name' => $data['product_name'][$i],
                        'product_unit' => $data['product_unit'][$i],
                        'product_qty' => str_replace(',', '', $data['product_qty'][$i]),
                        'product_tax' => $data['product_tax'][$i],
                        'product_total' => $total_price,
                        'price_export' => $price_export,
                        'version' => ($dataUpdate->version + 1),
                        'product_note' => $data['product_note'][$i],
                    ];
                    DB::table($this->table)->where('id', $dataUpdate->id)->update($dataQuoteUpdate);
                }
            } else {
                $dataQuote = [
                    'detailimport_id' => $id,
                    'product_code' => $data['product_code'][$i],
                    'product_name' => $data['product_name'][$i],
                    'product_unit' => $data['product_unit'][$i],
                    'product_qty' =>  str_replace(',', '', $data['product_qty'][$i]),
                    'product_tax' => $data['product_tax'][$i],
                    'product_total' => $total_price,
                    'price_export' => $price_export,
                    'product_note' => $data['product_note'][$i],
                    'receive_id' => 0,
                    'warehouse_id' => 1,
                    'version' => 1,
                    'created_at' => Carbon::now(),
                    'workspace_id' => Auth::user()->current_workspace
                ];
                DB::table($this->table)->insert($dataQuote);
            }
        }
    }
}
