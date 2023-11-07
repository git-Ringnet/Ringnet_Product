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
        $checkProductName = DB::table($this->table)->where('product_name', $data['product_name'])->first();
        if ($checkProductName) {
            $return = 0;
        } else {
            $product  = [
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
                'product_inventory' => 0,
                'product_trade' => 0,
                'product_available' => 0,
                // 'warehouse_id' => 1
            ];
            $product_id =  DB::table($this->table)->insert($product);
            $return = 1;
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
    public function addProductTowarehouse($data,$id)
    {
        $array_id =[];
        for($i =0;$i< count($data['listProduct']);$i++){
           array_push($array_id,$data['listProduct'][$i]);
        }
        $product = QuoteImport::where('detailimport_id', $id)
        ->whereIn('id',$array_id)
        ->get();
        $product_id = 0;
        foreach ($product as $item) {
            $checkProduct = Products::where('product_name', $item->product_name)->first();
            if ($checkProduct) {
                $checkProduct->product_inventory += $item->product_qty;
                $checkProduct->save();
                $product_id = $checkProduct->id;
            } else {
                $dataProduct = [
                    'product_code' => $item->product_code,
                    'product_name' => $item->product_name,
                    'product_unit' => $item->product_unit,
                    'product_price_import' => $item->price_import,
                    'product_price_export' => $item->price_export,
                    'product_ratio' => $item->product_ratio,
                    'product_tax' => $item->product_tax,
                    'product_inventory' => $item->product_qty,
                    'check_seri' => 1
                ];
                $product_id = DB::table($this->table)->insertGetId($dataProduct);
            }
            $item->product_id = $product_id;
            $item->save();
        }
        // dd($product);
    }
}
