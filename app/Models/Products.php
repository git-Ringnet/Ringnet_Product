<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Products extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'product_code',
        'product_name',
        'product_unit',
        'product_type',
        'product_manufacturer',
        'product_origin',
        'product_guarantee',
        'product_price_import',
        'product_price_export',
        'product_ratio',
        'product_tax',
        'product_inventory',
        'product_trade',
        'product_available',
        'warehouse_id'
    ];
    public function getAllProducts()
    {
        return DB::table($this->table)->get();
    }
    public function addProduct($data)
    {
        $return  = 0;
        isset($data['check_seri']) ? $check = 1 : $check = 0;
        $checkProductCode = ProductCode::where('product_code', $data['product_code'])->first();

        if ($checkProductCode) {
            $checkProductName = Products::where('product_code', $checkProductCode->id)->where('product_name', $data['product_name'])->first();
            if ($checkProductName) {
                return false;
            } else {
                $id = $checkProductCode;
            }
        } else {
            $id = ProductCode::create([
                'product_code' => $data['product_code'],
            ]);
        }
        if (!$checkProductName) {
            $product  = [
                'product_code' => $id->id,
                'product_name' => $data['product_name'],
                'product_unit' => $data['product_unit'],
                'product_type' => $data['product_type'],
                'product_manufacturer' => $data['product_manufacturer'],
                'product_origin' => $data['product_origin'],
                'product_guarantee' => $data['product_guarantee'],
                'product_price_import' => $data['product_price_import'],
                'product_price_export' => $data['product_price_export'],
                'product_ratio' => $data['product_ratio'],
                'product_tax' => $data['product_tax'],
                'check_seri' => $check,
                'product_inventory' => 0,
                'product_trade' => 0,
                'product_available' => 0,
                // 'warehouse_id' => 1
            ];
            $product_id =  DB::table($this->table)->insert($product);
            if ($product_id) {
                $return = 1;
            }
        }
        return $return;
    }
    public function updateProduct($data)
    {
        dd($data['action']);
        $return = 0;
        isset($data['check_seri']) ? $check = 1 : $check = 0;
        $dataUpdate = [
            'product_code' => $data['product_code'],
            'product_name' => $data['product_name'],
            'product_unit' => $data['product_unit'],
            'product_type' => $data['product_type'],
            'product_manufacturer' => $data['product_manufacturer'],
            'product_origin' => $data['product_origin'],
            'product_guarantee' => $data['product_guarantee'],
            'product_price_import' => $data['product_price_import'],
            'product_price_export' => $data['product_price_export'],
            'product_ratio' => $data['product_ratio'],
            'product_tax' => $data['product_tax'],
            'check_seri' => $check,
        ];
        $updateProduct = DB::table($this->table)->update($dataUpdate);
        if ($updateProduct) {
            $return = 1;
        }
        return $return;
    }
}
