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
        'warehouse_id',
        'qty_bill_sale',
        'qty_bill_sale',
        'product_delivery',
        'promotion',
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
    public function getWareHouse()
    {
        return $this->hasOne(Warehouse::class, 'id', 'warehouse_id');
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
            $promotion = [
                'type' => $data['promotion-option'][$i],
                'value' => str_replace(',', '', $data['promotion'][$i]),
            ];

            if ($promotion['type'] == 1) { // Giảm số tiền trực tiếp
                $subtotal -= (float)$promotion['value'];
            } elseif ($promotion['type'] == 2) { // Giảm phần trăm trên giá trị sản phẩm
                $discountAmount = ($subtotal * (float)$promotion['value']) / 100;
                $subtotal -= $discountAmount;
            }
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
                    ->where('workspace_id', Auth::user()->current_workspace)
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
                    'promotion' => json_encode($promotion),
                    'product_total' => $subtotal,
                    'price_export' => $price,
                    'product_ratio' => isset($data['product_ratio'][$i]) ? $data['product_ratio'][$i] : 0,
                    'price_import' => $priceImport,
                    'workspace_id' => Auth::user()->current_workspace,
                    'product_note' => isset($data['product_note'][$i]) ? $data['product_note'][$i] : null,
                    'warehouse_id' => isset($data['warehouse_id'][$i]) ? $data['warehouse_id'][$i] : 1,
                    'user_id' => Auth::user()->id,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                    'status' => 1,
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
                    'promotion' => json_encode($promotion),
                    'product_total' => $subtotal,
                    'price_export' => $price,
                    'product_ratio' => isset($data['product_ratio'][$i]) ? $data['product_ratio'][$i] : 0,
                    'price_import' => $priceImport,
                    'workspace_id' => Auth::user()->current_workspace,
                    'product_note' => isset($data['product_note'][$i]) ? $data['product_note'][$i] : null,
                    'warehouse_id' => isset($data['warehouse_id'][$i]) ? $data['warehouse_id'][$i] : 1,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                    'user_id' => Auth::user()->id,
                    'status' => 1,
                ];
                DB::table($this->table)->insert($dataQuote);
            }
        }
    }
    public function updateQuoteExport($data, $id)
    {
        $quoteExports = QuoteExport::where('detailexport_id', $id)
            ->where('quoteexport.workspace_id', Auth::user()->current_workspace)
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
                $promotion = [
                    'type' => $data['promotion-option'][$i],
                    'value' => str_replace(',', '', $data['promotion'][$i]),
                ];

                if ($promotion['type'] == 1) { // Giảm số tiền trực tiếp
                    $subtotal -= (float)$promotion['value'];
                } elseif ($promotion['type'] == 2) { // Giảm phần trăm trên giá trị sản phẩm
                    $discountAmount = ($subtotal * (float)$promotion['value']) / 100;
                    $subtotal -= $discountAmount;
                }
                if ($data['product_id'][$i] == null) {
                    $checkProduct = Products::where('product_name', $data['product_name'][$i])
                        ->where('workspace_id', Auth::user()->current_workspace)
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
                        'workspace_id' => Auth::user()->current_workspace,
                        'check_seri' => 1,
                        'type' => 1,
                        'user_id' => Auth::user()->id,
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
                            'promotion' => json_encode($promotion),
                            'product_total' => $subtotal,
                            'price_export' => $price,
                            'product_ratio' => isset($data['product_ratio'][$i]) ? $data['product_ratio'][$i] : 0,
                            'price_import' => $priceImport,
                            'product_note' => isset($data['product_note'][$i]) ? $data['product_note'][$i] : null,
                            'warehouse_id' => isset($data['warehouse_id'][$i]) ? $data['warehouse_id'][$i] : 1,
                            'workspace_id' => Auth::user()->current_workspace,
                            'created_at' => Carbon::now(),
                            'updated_at' => Carbon::now(),
                            'status' => 1,
                            'user_id' => Auth::user()->id,
                        ];
                        DB::table($this->table)->insert($dataQuote);
                    } else {
                        $productIdsToUpdate[] = $checkProduct->id;
                        QuoteExport::where('detailexport_id', $id)
                            ->where('quoteexport.workspace_id', Auth::user()->current_workspace)
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
                            'promotion' => json_encode($promotion),
                            'product_total' => $subtotal,
                            'price_export' => $price,
                            'product_ratio' => isset($data['product_ratio'][$i]) ? $data['product_ratio'][$i] : 0,
                            'price_import' => $priceImport,
                            'product_note' => isset($data['product_note'][$i]) ? $data['product_note'][$i] : null,
                            'warehouse_id' => isset($data['warehouse_id'][$i]) ? $data['warehouse_id'][$i] : 1,
                            'workspace_id' => Auth::user()->current_workspace,
                            'created_at' => Carbon::now(),
                            'updated_at' => Carbon::now(),
                            'status' => 1,
                            'user_id' => Auth::user()->id,
                        ];
                        DB::table($this->table)->insert($dataQuote);
                    }
                } else {
                    $quoteExport = QuoteExport::where('detailexport_id', $id)
                        ->where('quoteexport.workspace_id', Auth::user()->current_workspace)
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
                            'promotion' => json_encode($promotion),
                            'product_total' => $subtotal,
                            'price_export' => $price,
                            'product_ratio' => isset($data['product_ratio'][$i]) ? $data['product_ratio'][$i] : 0,
                            'price_import' => $priceImport,
                            'product_note' => isset($data['product_note'][$i]) ? $data['product_note'][$i] : null,
                            'warehouse_id' => isset($data['warehouse_id'][$i]) ? $data['warehouse_id'][$i] : 1,
                            'workspace_id' => Auth::user()->current_workspace,
                            'status' => 1,
                            'user_id' => Auth::user()->id,
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
                            'warehouse_id' => $quoteExport->warehouse_id,
                            'workspace_id' => $quoteExport->workspace_id,
                            'status' => $quoteExport->status,
                            'user_id' => Auth::user()->id,
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
                            $newQuoteExport->workspace_id = Auth::user()->current_workspace;
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
                            'promotion' => json_encode($promotion),
                            'product_total' => $subtotal,
                            'price_export' => $price,
                            'product_ratio' => isset($data['product_ratio'][$i]) ? $data['product_ratio'][$i] : 0,
                            'price_import' => $priceImport,
                            'product_note' => isset($data['product_note'][$i]) ? $data['product_note'][$i] : null,
                            'warehouse_id' => isset($data['warehouse_id'][$i]) ? $data['warehouse_id'][$i] : 1,
                            'workspace_id' => Auth::user()->current_workspace,
                            'created_at' => Carbon::now(),
                            'updated_at' => Carbon::now(),
                            'status' => 1,
                            'user_id' => Auth::user()->id,
                        ];
                        DB::table($this->table)->insert($dataQuote);
                    }
                }
            }
            // Lấy danh sách product_id từ bảng QuoteExport
            $existingProductIds = QuoteExport::where('detailexport_id', $id)
                ->where('quoteexport.workspace_id', Auth::user()->current_workspace)
                ->pluck('product_id')
                ->toArray();

            // Tìm các product_id không trùng khớp và cập nhật status = 2
            $productsToUpdate = array_diff($existingProductIds, $productIdsToUpdate);

            if (!empty($productsToUpdate)) {
                QuoteExport::where('detailexport_id', $id)
                    ->where('quoteexport.workspace_id', Auth::user()->current_workspace)
                    ->whereIn('product_id', $productsToUpdate)
                    ->update(['status' => 2]);
            }
        }
    }
    public function sumProductsQuote()
    {
        $quoteE = QuoteExport::leftJoin('detailexport', 'quoteexport.detailexport_id', 'detailexport.id')
            ->leftJoin('products', 'products.id', 'quoteexport.product_id')
            ->leftJoin('groups', 'groups.id', 'products.group_id')
            ->where('quoteexport.status', 1)
            ->select(
                'detailexport.*',
                'quoteexport.*',
                'groups.name as nameGr',
                'quoteexport.product_qty as slxuat',
            )
            ->get();
        return $quoteE;
    }
    public function sumProductsQuoteSale()
    {
        $quoteE = QuoteExport::leftJoin('detailexport', 'quoteexport.detailexport_id', 'detailexport.id')
            ->leftJoin('products', 'products.id', 'quoteexport.product_id')
            ->leftJoin('commissions', 'quoteexport.id', 'commissions.quoteE_id')
            ->leftJoin('groups', 'groups.id', 'products.group_id')
            ->where('quoteexport.status', 1)
            ->select(
                'detailexport.*',
                'quoteexport.*',
                'commissions.amount as commission',
                'quoteexport.id as id_quote',
                'groups.name as nameGr',
                'quoteexport.product_qty as slxuat',
            )
            ->get();
        return $quoteE;
    }
    public function sumProductsQuoteByGuest($idGuest)
    {
        $quoteE = QuoteExport::leftJoin('detailexport', 'quoteexport.detailexport_id', 'detailexport.id')
            ->where('detailexport.guest_id', $idGuest)
            ->where('quoteexport.status', 1)
            ->select(
                'detailexport.*',
                'quoteexport.*',
                'quoteexport.product_qty as slxuat',
                'quoteexport.price_export as giaXuat'
            )
            ->get();
        return $quoteE;
    }
    public function getProductsbyId($id)
    {
        $products = DB::table('quoteexport')
            ->whereIn('product_id', $id)
            ->join('products', 'quoteexport.product_id', '=', 'products.id')
            ->select('products.product_inventory', 'quoteexport.*', 'quoteexport.product_qty', 'quoteexport.product_unit')
            ->get();
        return $products;
    }
    public function history($id)
    {
        $quoteExport = QuoteExport::where('detailexport.id', $id)
            ->where('quoteexport.workspace_id', Auth::user()->current_workspace)
            ->leftJoin('detailexport', 'detailexport.id', 'quoteexport.detailexport_id')
            ->leftJoin('products', 'quoteexport.product_id', 'products.id')
            ->where(function ($query) {
                $query->where('quoteexport.product_delivery', null)
                    ->orWhere('quoteexport.product_delivery', 0);
            })
            ->orderBy('quoteexport.created_at', 'desc')
            ->select('quoteexport.*', 'quoteexport.created_at as ngayChinhSua', 'quoteexport.product_unit as product_unit', 'products.product_inventory')
            ->get();
        return $quoteExport;
    }
}
