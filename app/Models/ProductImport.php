<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductImport extends Model
{
    use HasFactory;
    protected $table = 'products_import';
    protected $fillable = [
        'detailimport_id',
        'quoteImport_id',
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
        'receive_id',
        'reciept_id',
        'payOrder_id',
        'cbSN'
    ];

    public function getSerialNumber()
    {
        return $this->hasMany(Serialnumber::class, 'receive_id', 'receive_id');
    }
    public function getQuoteImport()
    {
        return $this->hasOne(QuoteImport::class, 'id', 'quoteImport_id');
    }
    public function getQuotetion()
    {
        return $this->hasOne(DetailImport::class, 'id', 'detailimport_id');
    }
    public function getDataProduct()
    {
        return $this->hasOne(QuoteImport::class, 'id', 'quoteImport_id');
    }
    public function getReceive()
    {
        return $this->hasOne(Receive_bill::class, 'id', 'receive_id');
    }
    public function addProductImport($data, $id, $colum, $columQuote)
    {
        $status = false;
        for ($i = 0; $i < count($data['product_name']); $i++) {
            $qty = 0;
            $product = QuoteImport::where('detailimport_id', $id)
                ->where('product_name', $data['product_name'][$i])
                ->where('workspace_id', Auth::user()->current_workspace)
                ->first();
            if ($product) {
                if ($colum == 'payOrder_id' && $columQuote == 'payment_qty') {
                    if ($product->product_qty == $product->$columQuote) {
                        $status = true;
                    } else {
                        $qty = str_replace(',', '', $data['product_qty'][$i]);
                    }
                } else {
                    if (str_replace(',', '', $data['product_qty'][$i]) > ($product->product_qty - $product->$columQuote)) {
                        $qty = $product->product_qty - $product->$columQuote;
                    } else {
                        $qty = str_replace(',', '', $data['product_qty'][$i]);
                    }
                }
                if ($qty == 0) {
                    continue;
                } else {
                    $checkCBSN = Products::where('product_name', $data['product_name'][$i])
                        ->where('workspace_id', Auth::user()->current_workspace)
                        ->where(DB::raw('COALESCE(product_inventory,0)'), '>', 0)
                        ->first();
                    $productExist = QuoteImport::where('product_name', $data['product_name'][$i])
                        ->where('workspace_id', Auth::user()->current_workspace)
                        ->first();
                    if ($productExist) {
                        $checkCBImport = ProductImport::where('quoteImport_id', $productExist->id)
                            ->where('workspace_id', Auth::user()->current_workspace)
                            ->where('receive_id', '!=', 'null')
                            ->first();
                        if ($checkCBSN) {
                            $cbSN = $checkCBSN->check_seri;
                        } else if ($checkCBImport) {
                            $cbSN = $checkCBImport->cbSN;
                        } else {
                            $cbSN = isset($data['cbSeri']) ? $data['cbSeri'][$i] : 1;
                        }
                        $dataProductImport = [
                            'detailimport_id' => $id,
                            'quoteImport_id' => $product->id,
                            'product_qty' => $qty,
                            $colum => 0,
                            // 'cbSN' => $checkCBSN == null ? (isset($data['cbSN']) ? $data['cbSN'][$i] : 1) : $checkCBSN->check_seri,
                            'cbSN' => $cbSN,
                            'created_at' => Carbon::now(),
                            'workspace_id' => Auth::user()->current_workspace
                        ];
                    }
                }
                DB::table($this->table)->insert($dataProductImport);
                // Thêm số lượng sản phẩm đã nhập
                if ($columQuote == "receive_qty") {
                    $receive_qty = $product->receive_qty;
                } else if ($columQuote == "reciept_qty") {
                    $receive_qty = $product->reciept_qty;
                } else {
                    $receive_qty = $product->payment_qty;
                }

                $dataQuote = [
                    $columQuote => $receive_qty + $qty
                ];
                QuoteImport::where('id', $product->id)
                ->where('workspace_id', Auth::user()->current_workspace)
                ->update($dataQuote);
                $status = true;
            }
        }
        return $status;
    }
}
