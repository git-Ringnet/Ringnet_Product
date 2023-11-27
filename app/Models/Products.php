<?php

namespace App\Models;

use Carbon\Carbon;
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
    public function getSerialNumber()
    {
        return $this->hasMany(Serialnumber::class, 'product_id', 'id');
    }
    public function getWarehouse()
    {
        return $this->hasMany(Warehouse::class, 'warehouse_id', 'id');
    }
    public function getDetail()
    {
        return $this->hasMany(QuoteImport::class, 'product_id', 'id');
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
    public function updateProduct($data, $id)
    {
        // dd($data['action']);
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
        // $checkProductName = DB::table($this->table)->where('product_name', $data['product_name'])->first();
        // if ($checkProductName) {
        //     $return = 0;
        // } else {
        $updateProduct = DB::table($this->table)
            ->where('id', $id)
            ->update($dataUpdate);

        if ($updateProduct) {
            $return = 1;
            // }
        }
        return $return;
    }
    public function addProductTowarehouse($data, $id)
    {
        $status = true;
        $receive = Receive_bill::findOrFail($id);
        if ($receive) {
            $array_id = [];
            $list_id = [];
            // Lấy hết sản phẩm theo đơn mua hàng
            for ($i = 0; $i < count($data['product_name']); $i++) {
                $products = QuoteImport::where('product_name', $data['product_name'][$i])->first();
                array_push($array_id, $products->id);
            }
            $product = ProductImport::where('receive_id', $receive->id)
                ->whereIn('id', $array_id)
                ->get();
            $product_id = 0;
            // Thêm sản phẩm vào tồn kho
            foreach ($product as $item) {
                $getProductName = QuoteImport::where('id', $item->quoteImport_id)->first();
                $checkProduct = Products::where('product_name', $getProductName->product_name)->first();
                if ($checkProduct) {
                    $checkProduct->product_inventory += $item->product_qty;
                    $checkProduct->save();
                    $product_id = $checkProduct->id;
                } else {
                    $dataProduct = [
                        'product_code' => $getProductName->product_code,
                        'product_name' => $getProductName->product_name,
                        'product_unit' => $getProductName->product_unit,
                        'product_price_import' => $getProductName->price_import,
                        'product_price_export' => $getProductName->price_export,
                        'product_ratio' => $getProductName->product_ratio,
                        'product_tax' => $getProductName->product_tax,
                        'product_inventory' => $item->product_qty,
                        // 'check_seri' => 1
                        'check_seri' => $item->cbSN
                    ];
                    $product_id = DB::table($this->table)->insertGetId($dataProduct);
                }
                array_push($list_id, $product_id);
                $item->product_id = $product_id;
                $item->save();
                // QuoteImport::where('id',$item->quoteImport_id)->update([
                //     'product_id' => $product_id
                // ]);
            }

            // Thêm seri number theo sản phẩm
            for ($i = 0; $i < count($data['product_name']); $i++) {
                $getProduct = Products::where('product_name', $data['product_name'][$i])->first();
                if ($getProduct) {
                    if (isset($data['seri' . $i]) && $getProduct->check_seri == 1) {
                        $productSN = $data['seri' . $i];
                        for ($j = 0; $j < count($productSN); $j++) {
                            if (!empty($productSN[$j])) {
                                $dataSN = [
                                    'serinumber' => $productSN[$j],
                                    'receive_id' => $receive->id,
                                    'detailimport_id' => $receive->detailimport_id,
                                    'detailexport_id' => 0,
                                    'product_id' => $getProduct->id,
                                    'status' => 1,
                                    'created_at' => Carbon::now(),
                                ];
                                DB::table('serialnumber')->insert($dataSN);
                            }
                        }
                    }
                }
            }
        } else {
            $status = false;
        }
        return $status;
    }
    public function ajax($data)
    {
        $products =  DB::table($this->table);
        if (isset($data['search'])) {
            $products = $products->where(function ($query) use ($data) {
                $query->orWhere('product_code', 'like', '%' . $data['search'] . '%');
                $query->orWhere('product_name', 'like', '%' . $data['search'] . '%');
            });
        }
        if (isset($data['idName'])) {
            $products = $products->whereIn('products.id', $data['idName']);
        }
        if (isset($data['idCode'])) {
            $products = $products->whereIn('products.id', $data['idCode']);
        }
        if (isset($data['inventory'][0]) && isset($data['inventory'][1])) {
            $products = $products->where('product_inventory', $data['inventory'][0], $data['inventory'][1]);
        }
        if (isset($data['sort_by']) && $data['sort_type']) {
            $products = $products->orderBy($data['sort_by'], $data['sort_type']);
        }
        $products = $products->get();
        return $products;
    }
    public function getProductsbyCode($data)
    {
        $products = DB::table($this->table);
        if (isset($data['idCode'])) {
            $products = $products->whereIn('products.id', $data['idCode']);
        }
        $products = $products->pluck('product_code')->all();
        return $products;
    }
    public function getProductsbyName($data)
    {
        $products = DB::table($this->table);
        if (isset($data['idName'])) {
            $products = $products->whereIn('products.id', $data['idName']);
        }
        $products = $products->pluck('product_name')->all();
        return $products;
    }
}
