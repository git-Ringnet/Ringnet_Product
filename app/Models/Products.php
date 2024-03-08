<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
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
        'warehouse_id',
        'check_seri',
        'workspace_id'
    ];
    public function getAllProducts()
    {
        $perpage = 10;
        return DB::table($this->table)
            ->where('workspace_id', Auth::user()->current_workspace)
            ->orderBy('id', 'desc')->paginate($perpage);
        // return DB::table($this->table)->get();
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
    public function getProductImport()
    {
        return $this->hasMany(ProductImport::class, 'product_id', 'id');
    }
    public function addProduct($data)
    {
        $return  = 0;
        isset($data['check_seri']) ? $check = 1 : $check = 0;
        $checkProductName = DB::table($this->table)->where('product_name', $data['product_name'])
            ->where('workspace_id', Auth::user()->current_workspace)
            ->first();
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
                'workspace_id' => Auth::user()->current_workspace
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
        $product = Products::where('id', $id)->first();
        if ($product) {
            isset($data['check_seri']) ? $check = 1 : $check = 0;
            // isset($data['check_seri']) ? $check = 1 : $check = $product->check_seri;


            $dataUpdate = [
                'product_code' => $data['product_code'],
                'product_name' => $data['product_name'],
                'product_unit' => $data['product_unit'],
                'product_type' => $data['product_type'],
                'product_manufacturer' => $data['product_manufacturer'],
                'product_origin' => $data['product_origin'],
                'product_guarantee' => $data['product_guarantee'],
                'product_price_import' => isset($data['product_price_import']) ? str_replace(',', '', $data['product_price_import']) : 0,
                'product_price_export' => isset($data['product_price_export']) ? str_replace(',', '', $data['product_price_export']) : 0,
                'product_ratio' => $data['product_ratio'],
                'product_tax' => $data['product_tax'],
                'check_seri' => $check,
            ];
            $checkProductName = DB::table($this->table)
                ->where('id', '!=', $product->id)
                ->where('product_name', $data['product_name'])
                ->where('workspace_id', Auth::user()->current_workspace)
                ->first();
            if ($checkProductName) {
                $return = 0;
            } else {
                $updateProduct = DB::table($this->table)
                    ->where('id', $id)
                    ->update($dataUpdate);
                // if ($updateProduct) {
                $return = 1;
                // }
            }
        }
        return $return;
    }
    public function addProductTowarehouse($data, $id)
    {
        // dd($data);
        $status = true;
        $receive = Receive_bill::where('id', $id)->first();
        if ($receive) {
            $array_id = [];
            $list_id = [];
            // Lấy hết sản phẩm theo đơn mua hàng
            for ($i = 0; $i < count($data['product_name']); $i++) {
                $products = QuoteImport::where('product_name', $data['product_name'][$i])
                    ->where('detailimport_id', $receive->detailimport_id)
                    ->where('workspace_id', Auth::user()->current_workspace)
                    ->first();
                array_push($array_id, $products->id); //4
            }
            $product = ProductImport::where('receive_id', $receive->id)
                ->whereIn('quoteImport_id', $array_id)
                ->where('workspace_id', Auth::user()->current_workspace)
                ->get();
            $product_id = 0;
            // Thêm sản phẩm vào tồn kho
            foreach ($product as $item) {
                $getProductName = QuoteImport::where('id', $item->quoteImport_id)->first();
                $checkProduct = Products::where('product_name', $getProductName->product_name)
                    ->where('workspace_id', Auth::user()->current_workspace)
                    ->first();
                if ($checkProduct) {
                    $checkProduct->product_inventory += $item->product_qty;
                    $checkProduct->check_seri = $item->cbSN;
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
                        'check_seri' => $item->cbSN,
                        'workspace_id' => Auth::user()->current_workspace
                    ];
                    $product_id = DB::table($this->table)->insertGetId($dataProduct);
                }
                array_push($list_id, $product_id);
                HistoryImport::where('quoteImport_id', $getProductName->id)->update([
                    'product_id' => $product_id
                ]);
                $item->product_id = $product_id;
                $item->save();
            }


            // Cập nhật serial number theo sản phẩm
            for ($i = 0; $i < count($data['product_name']); $i++) {
                $getProduct = QuoteImport::where('product_name', $data['product_name'][$i])
                    ->where('detailimport_id', $receive->detailimport_id)
                    ->where('workspace_id', Auth::user()->current_workspace)
                    ->first();
                if ($getProduct) {
                    if (isset($data['seri' . $i])) {
                        $productSN = $data['seri' . $i];
                        for ($j = 0; $j < count($productSN); $j++) {
                            if (!empty($productSN[$j])) {
                                $getSN = Serialnumber::where('serinumber', $productSN[$j])
                                    ->where('receive_id', $receive->id)
                                    ->where('quoteImport_id', $getProduct->id)
                                    ->where('workspace_id', Auth::user()->current_workspace)
                                    ->get();
                                $dataSN = [
                                    'product_id' => $list_id[$i],
                                    'status' => 1,
                                ];
                                foreach ($getSN as $sn) {
                                    DB::table('serialnumber')->where('id', $sn->id)->update($dataSN);
                                }
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
    public function getProductUnit($data)
    {
        $products = DB::table($this->table);
        if (isset($data)) {
            $products = $products->whereIn('products.id', $data);
        }
        $products = $products->pluck('product_unit')->all();
        return $products;
    }
}
