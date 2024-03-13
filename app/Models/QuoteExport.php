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
        'product_id',
        'qty_delivery',
        'qty_bill_sale',
        'qty_bill_sale',
        'product_delivery',
        'status',
    ];
    public function getAllQuoteExport()
    {
        $quoteExport = QuoteExport::all();
        return $quoteExport;
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
                    'product_total' => $subtotal,
                    'price_export' => $price,
                    'product_ratio' => isset($data['product_ratio'][$i]) ? $data['product_ratio'][$i] : 0,
                    'price_import' => $priceImport,
                    'workspace_id' => Auth::user()->current_workspace,
                    'product_note' => isset($data['product_note'][$i]) ? $data['product_note'][$i] : null,
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
                    'product_total' => $subtotal,
                    'price_export' => $price,
                    'product_ratio' => isset($data['product_ratio'][$i]) ? $data['product_ratio'][$i] : 0,
                    'price_import' => $priceImport,
                    'workspace_id' => Auth::user()->current_workspace,
                    'product_note' => isset($data['product_note'][$i]) ? $data['product_note'][$i] : null,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                    'status' => 1,
                ];
                DB::table($this->table)->insert($dataQuote);
            }
        }
    }
    public function updateQuoteExport($data, $id)
    {
        //status = 1 -> báo giá, status = 2 -> xóa, status = 3 -> sửa
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
                        'workspace_id' => Auth::user()->current_workspace,
                    ];
                    $product = new Products($dataProduct);
                    $product->save();
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
                        'workspace_id' => Auth::user()->current_workspace,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                        'status' => 1,
                    ];
                    DB::table($this->table)->insert($dataQuote);
                    $productIdsToUpdate[] = $product->id;
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
                            'product_total' => $subtotal,
                            'price_export' => $price,
                            'product_ratio' => isset($data['product_ratio'][$i]) ? $data['product_ratio'][$i] : 0,
                            'price_import' => $priceImport,
                            'product_note' => isset($data['product_note'][$i]) ? $data['product_note'][$i] : null,
                            'workspace_id' => Auth::user()->current_workspace,
                            'status' => 1,
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
                            'workspace_id' => $quoteExport->workspace_id,
                            'status' => $quoteExport->status,
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
                            'product_total' => $subtotal,
                            'price_export' => $price,
                            'product_ratio' => isset($data['product_ratio'][$i]) ? $data['product_ratio'][$i] : 0,
                            'price_import' => $priceImport,
                            'product_note' => isset($data['product_note'][$i]) ? $data['product_note'][$i] : null,
                            'workspace_id' => Auth::user()->current_workspace,
                            'created_at' => Carbon::now(),
                            'updated_at' => Carbon::now(),
                            'status' => 1,
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
    public function getProductsbyId($id)
    {
        $products = DB::table('quoteexport')
            ->whereIn('product_id', $id)
            ->where('quoteexport.workspace_id', Auth::user()->current_workspace)
            ->where('products.workspace_id', Auth::user()->current_workspace)
            ->join('products', 'quoteexport.product_id', '=', 'products.id')
            ->select('products.*', 'quoteexport.*', 'quoteexport.product_qty')
            ->get();
        return $products;
    }
    public function history($id)
    {
        $quoteExport = QuoteExport::where('detailexport.id', $id)
            ->leftJoin('detailexport', 'detailexport.id', 'quoteexport.detailexport_id')
            ->where(function ($query) {
                $query->where('quoteexport.product_delivery', null)
                    ->orWhere('quoteexport.product_delivery', 0);
            })
            ->orderBy('quoteexport.created_at', 'desc')
            ->select('*','quoteexport.created_at as ngayChinhSua')
            ->get();
        return $quoteExport;
    }
}
