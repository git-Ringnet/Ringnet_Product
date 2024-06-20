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
        'id',
        'detailimport_id',
        'product_id', 'product_name',
        'product_unit', 'product_qty',
        'product_tax', 'product_total', 'reciept_qty', 'payment_qty',
        'price_export', 'version', 'warehouse_id', 'workspace_id', 'product_code', 'created_at', 'promotion', 'promotion_type'
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

    public function getAllProductWareHouse($warehouse_id)
    {
        return DB::table($this->table)
            ->where('quoteimport.workspace_id', Auth::user()->current_workspace)
            ->leftJoin('warehouse', 'quoteimport.warehouse_id', '=', 'warehouse.id')
            ->where('warehouse.id', $warehouse_id)
            ->groupBy('quoteimport.product_id', 'quoteimport.product_code', 'quoteimport.product_name')
            ->select('quoteimport.product_code', 'quoteimport.product_name', DB::raw('SUM(quoteimport.quantity_remaining) as total_quantity_remaining'))
            ->get();
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
    public function getProduct()
    {
        return $this->hasOne(Products::class, 'product_name', 'product_name');
    }
    public function getPayment()
    {
        return $this->hasMany(PayOder::class, 'detailimport_id', 'detailimport_id');
    }
    public function addQuoteImport($data, $id)
    {
        for ($i = 0; $i < count($data['product_name']); $i++) {
            $checkProductName = Products::where('product_name', $data['product_name'][$i])
                ->where('workspace_id', Auth::user()->current_workspace)
                ->first();

            if (!$checkProductName) {
                $productData = [
                    'product_code' => $data['product_code'][$i],
                    'product_name' => $data['product_name'][$i],
                    'product_unit' => $data['product_unit'][$i],
                    'product_price_import' => str_replace(',', '', $data['price_export'][$i]),
                    'product_tax' => $data['product_tax'][$i],
                    'check_seri' => 1,
                    'product_trade' => 0,
                    'product_available' => 0,
                    'type' => 1,
                    'created_at' => Carbon::now(),
                    'user_id' => Auth::user()->id,
                    'workspace_id' => Auth::user()->current_workspace,
                ];
                $productId = DB::table('products')->insertGetId($productData);
            } else {
                $productId = $checkProductName->id;
            }

            $dataQuote = [
                'detailimport_id' => $id,
                'product_id' => $productId,
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
                'user_id' => Auth::user()->id,
                'promotion' => isset($data['promotion'][$i]) ? str_replace(',', '', $data['promotion'][$i]) : null,
                'promotion_type' => $data['promotion_type'][$i],
                'receive_qty' => 0,
                'reciept_qty' => 0,
                'payment_qty' => 0,
                'workspace_id' => Auth::user()->current_workspace,
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
                    'provide_id' => $getProvide->provide_id,
                    'user_id' => Auth::user()->id,
                    'workspace_id' => Auth::user()->current_workspace,
                ];
                DB::table('history_import')->insert($dataHistory);
            }
        }
    }


    public function updateImport($data, $id)
    {
        if ($data['action'] == 'action_1') {
            $id_detail = DB::table($this->table)->where('detailimport_id', $id)
                ->where('workspace_id', Auth::user()->current_workspace)
                ->whereNotIn('id', $data['listProduct'])
                ->delete();
        }

        for ($i = 0; $i < count($data['product_name']); $i++) {
            // Kiểm tra và thêm sản phẩm mới vào kho hàng
            $checkProduct = Products::where('product_name', $data['product_name'][$i])
                ->where('products.workspace_id', Auth::user()->current_workspace)
                ->first();

            $productId = null;
            if (!$checkProduct) {
                $dataProduct = [
                    'type' => 1,
                    'product_code' => $data['product_code'][$i],
                    'product_name' => $data['product_name'][$i],
                    'product_unit' => $data['product_unit'][$i],
                    'product_tax' => $data['product_tax'][$i],
                    'check_seri' => 1,
                    'created_at' => now(),
                    'workspace_id' => Auth::user()->current_workspace,
                ];
                $productId = DB::table('products')->insertGetId($dataProduct);
            } else {
                $productId = $checkProduct->id;
            }

            // Lấy sản phẩm cần sửa
            $dataUpdate = QuoteImport::where('id', $data['listProduct'][$i])
                ->where('workspace_id', Auth::user()->current_workspace)
                ->first();
            $price_export = floatval(str_replace(',', '', $data['price_export'][$i]));
            $total_price = floatval(str_replace(',', '', $data['product_qty'][$i])) * $price_export;

            if ($dataUpdate) {
                if (
                    $dataUpdate->product_code != $data['product_code'][$i] || $dataUpdate->product_name != $data['product_name'][$i] || $dataUpdate->product_unit != $data['product_unit'][$i] ||
                    $dataUpdate->product_qty != str_replace(',', '', $data['product_qty'][$i]) || $dataUpdate->product_tax != $data['product_tax'][$i] ||
                    $dataUpdate->product_total != $total_price || $dataUpdate->price_export != $price_export || $dataUpdate->product_note != $data['product_note'][$i] || $dataUpdate->promotion != $data['promotion'][$i] || $dataUpdate->promotion_type != $data['promotion_type'][$i]
                ) {
                    $dataQuoteUpdate = [
                        'product_code' => $data['product_code'][$i],
                        'product_name' => $data['product_name'][$i],
                        'product_unit' => $data['product_unit'][$i],
                        'product_qty' => str_replace(',', '', $data['product_qty'][$i]),
                        'promotion' => isset($data['promotion'][$i]) ? str_replace(',', '', $data['promotion'][$i]) : null,
                        'promotion_type' => $data['promotion_type'][$i],
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
                    'product_id' => $productId,
                    'product_code' => $data['product_code'][$i],
                    'product_name' => $data['product_name'][$i],
                    'product_unit' => $data['product_unit'][$i],
                    'product_qty' => str_replace(',', '', $data['product_qty'][$i]),
                    'product_tax' => $data['product_tax'][$i],
                    'product_total' => $total_price,
                    'price_export' => $price_export,
                    'product_note' => $data['product_note'][$i],
                    'receive_id' => 0,
                    'warehouse_id' => 1,
                    'version' => 1,
                    'created_at' => Carbon::now(),
                    'receive_qty' => 0,
                    'reciept_qty' => 0,
                    'payment_qty' => 0,
                    'promotion' => isset($data['promotion'][$i]) ? str_replace(',', '', $data['promotion'][$i]) : null,
                    'promotion_type' => $data['promotion_type'][$i],
                    'workspace_id' => Auth::user()->current_workspace,
                ];
                DB::table($this->table)->insert($dataQuote);
            }
        }
    }
}
