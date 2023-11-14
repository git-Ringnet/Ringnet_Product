<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Receive_bill extends Model
{
    use HasFactory;
    protected $table = 'receive_bill';
    protected $fillable = [
        'detailimport_id',
        'quotation_number',
        'provide_id',
        'shipping_unit',
        'delivery_charges',
        'status'
    ];

    public function getNameProvide()
    {
        return $this->hasOne(Provides::class, 'id', 'provide_id');
    }

    public function addReceiveBill($data, $id)
    {

        $check_status = true;
        $detail =  DetailImport::findOrFail($id);
        if ($detail) {
            $dataReceive = [
                'detailimport_id' => $id,
                'quotation_number' => $data['quotation_number'],
                'provide_id' => $detail->provide_id,
                'status' => 1,
                'created_at' => Carbon::now(),
            ];
            $receive_id = DB::table($this->table)->insertGetId($dataReceive);
            for ($i = 0; $i < count($data['product_name']); $i++) {
                $dataupdate = [
                    'receive_id' => $receive_id,
                ];
                $checkQuote = ProductImport::where('product_name', $data['product_name'][$i])->first();
                if ($checkQuote) {
                    DB::table('products_import')->where('id', $checkQuote->id)->update($dataupdate);
                }
            }

            // Cập nhật tình trạng
            $product = QuoteImport::where('detailimport_id', $id)->get();
            foreach ($product as $item) {
                if ($item->receive_id == 0) {
                    $check_status = false;
                }
            }
            $receive = Receive_bill::where('detailimport_id', $id)->get();
            foreach ($receive as $value) {
                if ($value->status == 1) {
                    $check_status = false;
                }
            }
            if ($check_status) {
                $status_receive = 2;
            } else {
                $status_receive = 1;
            }
            DB::table('detailimport')->where('id', $id)->update([
                'status_receive' => $status_receive
            ]);


            // Cập nhật trạng thái đơn hàng
            $detail->status = 2;
            $detail->save();

            // Cập nhật dư nợ nhà cung cấp
            DB::table('provides')->where('id', $detail->provide_id)->update([
                'provide_debt' => $detail->total_price
            ]);

            return $receive_id;
        }
    }
    public function updateReceive($data, $id)
    {
        $result = true;
        $checkStatus = Reciept::where('receive_id', $id)->first();
        if ($checkStatus) {
            $result = false;
        } else {
            // $re = Receive_bill::findOrFail($id);
            $dataUpdate = [
                'status' => 2,
            ];
            // DB::table($this->table)->where('id', $id)->update($dataUpdate);
        }
        return $result;
    }


    // public function getQty($id)
    // {
    //     $data = [];
    //     $productID = [];
    //     $productCode = [];
    //     $productName = [];
    //     $productUnit = [];
    //     $product_qty = [];
    //     $product_tax = [];
    //     $product_total = [];
    //     $priceExport = [];
    //     $product_ratio = [];
    //     $price_import = [];
    //     $product_note = [];
    //     $qtyImport = ProductImport::where('detailimport_id', $id)->get();

    //     $getQty = QuoteImport::where('detailimport_id', $id)->get();
    //     if (count($qtyImport) == 0) {
    //         foreach ($getQty as $index => $item) {
    //             if ($item->product_ratio > 0 && $item->price_import > 0) {
    //                 $price_export = (($item->product_ratio + 100) * $item->price_import / 100);
    //                 $total =  $price_export * $item->product_qty;
    //             } else {
    //                 $price_export = $item->price_export;
    //                 $total =  $price_export * $item->product_qty;
    //             }
    //             array_push($productID, $item->id);
    //             array_push($productCode, $item->product_code);
    //             array_push($productName, $item->product_name);
    //             array_push($productUnit, $item->product_unit);
    //             array_push($product_qty, $item->product_qty);
    //             array_push($product_tax, $item->product_tax);
    //             array_push($product_total, $total);
    //             array_push($priceExport, $price_export);
    //             array_push($product_ratio, $item->product_ratio);
    //             array_push($price_import, $item->price_import);
    //             array_push($product_note, $item->product_note);
    //         }
    //     } elseif (count($qtyImport) == count($getQty)) {
    //         foreach ($getQty as $index => $item) {
    //             if ($item->id == $qtyImport[$index]->quoteImport_id) {
    //                 $qty = $item->product_qty - $qtyImport[$index]->product_qty;
    //             }
    //             if ($item->product_ratio > 0 && $item->price_import > 0) {
    //                 $price_export = ($item->product_ratio + 100) * $item->price_import / 100;
    //                 $total = isset($qty) ? $qty : $item->product_qty * $price_export;
    //             } else {
    //                 $price_export = $item->price_export * $qty;
    //             }
    //             array_push($productID, $item->id);
    //             array_push($productCode, $item->product_code);
    //             array_push($productName, $item->product_name);
    //             array_push($productUnit, $item->product_unit);
    //             array_push($product_qty, isset($qty) ? $qty : $item->product_qty);
    //             array_push($product_tax, $item->product_tax);
    //             array_push($product_total, $total);
    //             array_push($priceExport, $price_export);
    //             array_push($product_ratio, $item->product_ratio);
    //             array_push($price_import, $item->price_import);
    //             array_push($product_note, $item->product_note);
    //         }
    //     } else {
    //         foreach ($getQty as $item) {
    //             foreach ($qtyImport as $value) {
    //                 if ($item->id != $value->quoteImport_id) {
    //                     $qty = $item->product_qty;
    //                 } else {
    //                     $qty = $item->product_qty - $value->product_qty;
    //                 }
    //             }
    //             if ($item->product_ratio > 0 && $item->price_import > 0) {
    //                 $price_export = ($item->product_ratio + 100) * $item->price_import / 100;
    //                 $total = isset($qty) ? $qty : $item->product_qty * $price_export;
    //             } else {
    //                 $price_export = $item->price_export * $qty;
    //             }
    //             array_push($productID, $item->id);
    //             array_push($productCode, $item->product_code);
    //             array_push($productName, $item->product_name);
    //             array_push($productUnit, $item->product_unit);
    //             array_push($product_qty, isset($qty) ? $qty : $item->product_qty);
    //             array_push($product_tax, $item->product_tax);
    //             array_push($product_total, $total);
    //             array_push($priceExport, $price_export);
    //             array_push($product_ratio, $item->product_ratio);
    //             array_push($price_import, $item->price_import);
    //             array_push($product_note, $item->product_note);
    //         }
    //     }

    //     $data = [
    //         'productID' => $productID,
    //         'productCode' => $productCode,
    //         'productName' => $productName,
    //         'productUnit' => $productUnit,
    //         'product_qty' => $product_qty,
    //         'product_tax' => $product_tax,
    //         'product_total' => $product_total,
    //         'price_export' => $priceExport,
    //         'product_ratio' => $product_ratio,
    //         'price_import' => $price_import,
    //         'product_note' => $product_note
    //     ];
    //     return $data;
    // }
}
