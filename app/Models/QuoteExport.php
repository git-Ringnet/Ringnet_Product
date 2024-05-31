<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class QuoteExport extends Model
{
    use HasFactory;
    protected $table = 'quoteexport';
    protected $fillable = [
        'id',
        'user_id',
        'detailexport_id',
        'product_code',
        'product_name',
        'product_unit',
        'product_qty',
        'product_tax',
        'product_total',
        'price_export',
        'product_ratio',
        'price_import',
        'product_note',
        'workspace_id',
        'created_at',
        'updated_at',
        'deliver_id',
        'status',
        'product_id',
        'qty_delivery',
        'qty_bill_sale',
        'qty_bill_sale',
        'product_delivery',
        'promotion',
        'promotion_type'
    ];
    public function getAllQuoteExport()
    {
        $quoteExport = QuoteExport::all();
        return $quoteExport;
    }
    public function getProduct()
    {
        return $this->hasOne(Products::class, 'id', 'product_id');
    }
    public function getDetailExport()
    {
        return $this->hasOne(DetailExport::class, 'id', 'detailexport_id');
    }
    public function getDelivery()
    {
        return $this->hasOne(Delivery::class, 'id', 'deliver_id');
    }

    public function getAllGuest()
    {
        $guest = Guest::all();
        return $guest;
    }
    public function addQuoteExport($data, $id)
    {
        for ($i = 0; $i < count($data['product_name']); $i++) {
            $price = str_replace(',', '', $data['product_price'][$i]);
            if (!empty($data['price_import'][$i])) {
                $priceImport = str_replace(',', '', $data['price_import'][$i]);
            } else {
                $priceImport = null;
            }
            $subtotal = $data['product_qty'][$i] * (float) $price;
            if ($data['product_id'][$i] == null) {
                $dataProduct = [
                    'product_code' => $data['product_code'][$i],
                    'product_name' => $data['product_name'][$i],
                    'product_unit' => $data['product_unit'][$i],
                    'product_tax' => $data['product_tax'][$i],
                    'product_guarantee' => 1,
                    'product_price_export' => $price,
                    'product_price_import' => isset($priceImport) ? $priceImport : 0,
                    'product_ratio' => isset($data['product_ratio'][$i]) ? $data['product_ratio'][$i] : 0,
                    'check_seri' => 1,
                    'type' => 1,
                    'user_id' => Auth::user()->id,
                    'workspace_id' => Auth::user()->current_workspace,
                ];
                $checkProduct = Products::where('product_name', $data['product_name'][$i])
                    ->first();
                if (!$checkProduct) {
                    $product = new Products($dataProduct);
                    $product->save();
                }
                $dataQuote = [
                    'detailexport_id' => $id,
                    'product_code' => $data['product_code'][$i],
                    'product_id' => $checkProduct == null ? $product->id : $checkProduct->id,
                    'product_name' => $data['product_name'][$i],
                    'product_unit' => $data['product_unit'][$i],
                    'product_qty' => $data['product_qty'][$i],
                    'product_tax' => $data['product_tax'][$i],
                    'product_total' => $subtotal,
                    'price_export' => $price,
                    'product_ratio' => isset($data['product_ratio'][$i]) ? $data['product_ratio'][$i] : 0,
                    'price_import' => $priceImport,
                    'product_note' => isset($data['product_note'][$i]) ? $data['product_note'][$i] : null,
                    'promotion' => isset($data['promotion'][$i]) ? str_replace(',', '', $data['promotion'][$i]) : null,
                    'promotion_type' => $data['promotion_type'][$i],
                    'user_id' => Auth::user()->id,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                    'status' => 1,
                    'workspace_id' => Auth::user()->current_workspace,
                ];
                DB::table($this->table)->insert($dataQuote);
            } else {
                $dataQuote = [
                    'detailexport_id' => $id,
                    'product_code' => $data['product_code'][$i],
                    'product_id' => $data['product_id'][$i],
                    'product_name' => $data['product_name'][$i],
                    'product_unit' => $data['product_unit'][$i],
                    'product_qty' => $data['product_qty'][$i],
                    'product_tax' => $data['product_tax'][$i],
                    'product_total' => $subtotal,
                    'price_export' => $price,
                    'product_ratio' => isset($data['product_ratio'][$i]) ? $data['product_ratio'][$i] : 0,
                    'price_import' => $priceImport,
                    'product_note' => isset($data['product_note'][$i]) ? $data['product_note'][$i] : null,
                    'promotion' => isset($data['promotion'][$i]) ? str_replace(',', '', $data['promotion'][$i]) : null,
                    'promotion_type' => $data['promotion_type'][$i],
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                    'user_id' => Auth::user()->id,
                    'status' => 1,
                    'workspace_id' => Auth::user()->current_workspace,
                ];
                DB::table($this->table)->insert($dataQuote);
                //Cập nhật tồn kho sản phẩm
                $product = Products::where('id', $data['product_id'][$i])
                    ->where('workspace_id', Auth::user()->current_workspace)
                    ->first();
                $product->product_inventory = $product->product_inventory - $data['product_qty'][$i];
                $product->save();
                //Cập nhật số lượng còn lại của đơn nhập sản phẩm
                $productId = $data['product_id'][$i];
                $quantitySold = $data['product_qty'][$i];
                $remainingQuantityToDeduct = $quantitySold;

                $quoteImports = DB::table('quoteimport')
                    ->where('product_id', $productId)
                    ->where('quantity_remaining', '>', 0)
                    ->orderBy('created_at', 'asc')
                    ->where('workspace_id', Auth::user()->current_workspace)
                    ->get();

                foreach ($quoteImports as $quoteImport) {
                    if ($remainingQuantityToDeduct <= 0) {
                        break;
                    }

                    if ($quoteImport->quantity_remaining >= $remainingQuantityToDeduct) {
                        DB::table('quoteimport')
                            ->where('id', $quoteImport->id)
                            ->where('workspace_id', Auth::user()->current_workspace)
                            ->update(['quantity_remaining' => $quoteImport->quantity_remaining - $remainingQuantityToDeduct]);
                        $remainingQuantityToDeduct = 0;
                    } else {
                        $remainingQuantityToDeduct -= $quoteImport->quantity_remaining;
                        DB::table('quoteimport')
                            ->where('id', $quoteImport->id)
                            ->where('workspace_id', Auth::user()->current_workspace)
                            ->update(['quantity_remaining' => 0]);
                    }
                }
            }
        }
    }
    public function updateQuoteExport($data, $id)
    {
        $quoteExports = QuoteExport::where('detailexport_id', $id)
            ->get();
        $productIdsToUpdate = [];
        if (!$quoteExports->isEmpty()) {
            for ($i = 0; $i < count($data['product_name']); $i++) {
                $productIdsToUpdate[] = $data['product_id'][$i];
                $price = str_replace(',', '', $data['product_price'][$i]);
                if (!empty($data['price_import'][$i])) {
                    $priceImport = str_replace(',', '', $data['price_import'][$i]);
                } else {
                    $priceImport = null;
                }
                $subtotal = $data['product_qty'][$i] * (float) $price;
                if ($data['product_id'][$i] == null) {
                    $checkProduct = Products::where('product_name', $data['product_name'][$i])
                        ->first();
                    $dataProduct = [
                        'product_code' => $data['product_code'][$i],
                        'product_name' => $data['product_name'][$i],
                        'product_unit' => $data['product_unit'][$i],
                        'product_tax' => $data['product_tax'][$i],
                        'product_guarantee' => 1,
                        'product_price_export' => $price,
                        'product_price_import' => isset($priceImport) ? $priceImport : 0,
                        'product_ratio' => isset($data['product_ratio'][$i]) ? $data['product_ratio'][$i] : 0,
                        'check_seri' => 1,
                        'type' => 1,
                        'user_id' => Auth::user()->id,
                        'workspace_id' => Auth::user()->current_workspace,
                    ];
                    if (!$checkProduct) {
                        $product = new Products($dataProduct);
                        $product->save();
                        $productIdsToUpdate[] = $product->id;
                        $dataQuote = [
                            'detailexport_id' => $id,
                            'product_code' => $data['product_code'][$i],
                            'product_id' => $product->id,
                            'product_name' => $data['product_name'][$i],
                            'product_unit' => $data['product_unit'][$i],
                            'product_qty' => $data['product_qty'][$i],
                            'product_tax' => $data['product_tax'][$i],
                            'product_total' => $subtotal,
                            'price_export' => $price,
                            'product_ratio' => isset($data['product_ratio'][$i]) ? $data['product_ratio'][$i] : 0,
                            'price_import' => $priceImport,
                            'product_note' => isset($data['product_note'][$i]) ? $data['product_note'][$i] : null,
                            'created_at' => Carbon::now(),
                            'updated_at' => Carbon::now(),
                            'status' => 1,
                            'user_id' => Auth::user()->id,
                            'workspace_id' => Auth::user()->current_workspace,
                        ];
                        DB::table($this->table)->insert($dataQuote);
                    } else {
                        $productIdsToUpdate[] = $checkProduct->id;
                        QuoteExport::where('detailexport_id', $id)
                            ->where('product_id', $checkProduct->id)
                            ->update(['status' => 2]);
                        $dataQuote = [
                            'detailexport_id' => $id,
                            'product_code' => $data['product_code'][$i],
                            'product_id' => $checkProduct->id,
                            'product_name' => $data['product_name'][$i],
                            'product_unit' => $data['product_unit'][$i],
                            'product_qty' => $data['product_qty'][$i],
                            'product_tax' => $data['product_tax'][$i],
                            'product_total' => $subtotal,
                            'price_export' => $price,
                            'product_ratio' => isset($data['product_ratio'][$i]) ? $data['product_ratio'][$i] : 0,
                            'price_import' => $priceImport,
                            'product_note' => isset($data['product_note'][$i]) ? $data['product_note'][$i] : null,
                            'created_at' => Carbon::now(),
                            'updated_at' => Carbon::now(),
                            'status' => 1,
                            'user_id' => Auth::user()->id,
                            'workspace_id' => Auth::user()->current_workspace,
                        ];
                        DB::table($this->table)->insert($dataQuote);
                    }
                } else {
                    $quoteExport = QuoteExport::where('detailexport_id', $id)
                        ->where('quoteexport.product_id', $data['product_id'][$i])
                        ->where('quoteexport.status', 1)
                        ->first();
                    if ($quoteExport) {
                        //mảng thông tin hiện tại
                        $dataQuote = [
                            'detailexport_id' => $id,
                            'product_code' => $data['product_code'][$i],
                            'product_id' => $data['product_id'][$i],
                            'product_name' => $data['product_name'][$i],
                            'product_unit' => $data['product_unit'][$i],
                            'product_qty' => $data['product_qty'][$i],
                            'product_tax' => $data['product_tax'][$i],
                            'product_total' => $subtotal,
                            'price_export' => $price,
                            'product_ratio' => isset($data['product_ratio'][$i]) ? $data['product_ratio'][$i] : 0,
                            'price_import' => $priceImport,
                            'product_note' => isset($data['product_note'][$i]) ? $data['product_note'][$i] : null,
                            'status' => 1,
                            'user_id' => Auth::user()->id,
                            'workspace_id' => Auth::user()->current_workspace,
                        ];
                        //Mảng thông tin từ bảng quoteExport
                        $currentValues = [
                            'detailexport_id' => $quoteExport->detailexport_id,
                            'product_code' => $quoteExport->product_code,
                            'product_id' => $quoteExport->product_id,
                            'product_name' => $quoteExport->product_name,
                            'product_unit' => $quoteExport->product_unit,
                            'product_qty' => $quoteExport->product_qty,
                            'product_tax' => $quoteExport->product_tax,
                            'product_total' => $quoteExport->product_total,
                            'price_export' => $quoteExport->price_export,
                            'product_ratio' => $quoteExport->product_ratio,
                            'price_import' => $quoteExport->price_import,
                            'product_note' => $quoteExport->product_note,
                            'status' => $quoteExport->status,
                            'user_id' => Auth::user()->id,
                            'workspace_id' => Auth::user()->current_workspace,
                        ];

                        if ($currentValues != $dataQuote) {
                            //Cập nhật sản phẩm báo giá
                            $quoteExport->fill($dataQuote);
                            $quoteExport->status = 1;
                            $quoteExport->created_at = Carbon::now();
                            $quoteExport->updated_at = Carbon::now();
                            $quoteExport->save();

                            //Thêm sản phẩm với status = 3
                            $newQuoteExport = new QuoteExport();
                            $newQuoteExport->fill($currentValues);
                            $newQuoteExport->status = 3;
                            $newQuoteExport->created_at = Carbon::now();
                            $newQuoteExport->updated_at = Carbon::now();
                            $newQuoteExport->save();
                        }
                    } else {
                        $dataQuote = [
                            'detailexport_id' => $id,
                            'product_code' => $data['product_code'][$i],
                            'product_id' => $data['product_id'][$i],
                            'product_name' => $data['product_name'][$i],
                            'product_unit' => $data['product_unit'][$i],
                            'product_qty' => $data['product_qty'][$i],
                            'product_tax' => $data['product_tax'][$i],
                            'product_total' => $subtotal,
                            'price_export' => $price,
                            'product_ratio' => isset($data['product_ratio'][$i]) ? $data['product_ratio'][$i] : 0,
                            'price_import' => $priceImport,
                            'product_note' => isset($data['product_note'][$i]) ? $data['product_note'][$i] : null,
                            'created_at' => Carbon::now(),
                            'updated_at' => Carbon::now(),
                            'status' => 1,
                            'user_id' => Auth::user()->id,
                            'workspace_id' => Auth::user()->current_workspace,
                        ];
                        DB::table($this->table)->insert($dataQuote);
                        //Cập nhật tồn kho sản phẩm
                        $product = Products::where('id', $data['product_id'][$i])->first();
                        $product->product_inventory = $product->product_inventory - $data['product_qty'][$i];
                        $product->save();
                    }
                }
            }
            // Lấy danh sách product_id từ bảng QuoteExport
            $existingProductIds = QuoteExport::where('detailexport_id', $id)
                ->pluck('product_id')
                ->toArray();

            // Tìm các product_id không trùng khớp và cập nhật status = 2
            $productsToUpdate = array_diff($existingProductIds, $productIdsToUpdate);

            if (!empty($productsToUpdate)) {
                QuoteExport::where('detailexport_id', $id)
                    ->whereIn('product_id', $productsToUpdate)
                    ->update(['status' => 2]);
            }
        }
    }
    public function getProductsbyId($id)
    {
        $products = DB::table('quoteexport')
            ->whereIn('product_id', $id)
            ->join('products', 'quoteexport.product_id', '=', 'products.id')
            ->select('products.product_inventory', 'quoteexport.*', 'quoteexport.product_qty', 'quoteexport.product_unit')
            ->where('quoteexport.workspace_id', Auth::user()->current_workspace)
            ->get();
        return $products;
    }
    public function history($id)
    {
        $quoteExport = QuoteExport::where('detailexport.id', $id)
            ->leftJoin('detailexport', 'detailexport.id', 'quoteexport.detailexport_id')
            ->leftJoin('products', 'quoteexport.product_id', 'products.id')
            ->where(function ($query) {
                $query->where('quoteexport.product_delivery', null)
                    ->orWhere('quoteexport.product_delivery', 0);
            })
            ->where('detailexport.workspace_id', Auth::user()->current_workspace)
            ->where('products.workspace_id', Auth::user()->current_workspace)
            ->orderBy('quoteexport.created_at', 'desc')
            ->select('quoteexport.*', 'quoteexport.created_at as ngayChinhSua', 'quoteexport.product_unit as product_unit', 'products.product_inventory')
            ->get();
        return $quoteExport;
    }
}
