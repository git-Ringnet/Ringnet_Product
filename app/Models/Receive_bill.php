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

    public function getAttachment($name)
    {
        return $this->hasMany(Attachment::class, 'table_id', 'id')->where('table_name', $name)->get();
    }

    public function addReceiveBill($data, $id)
    {
        // $check_status = true;
        $detail =  DetailImport::findOrFail($id);
        if ($detail) {
            $dataReceive = [
                'detailimport_id' => $id,
                'provide_id' => $detail->provide_id,
                'shipping_unit' => isset($data['shipping_unit']) ? $data['shipping_unit'] : "",
                'delivery_charges' => isset($data['delivery_charges']) ? str_replace(',', '', $data['delivery_charges']) : 0,
                'status' => 1,
                'created_at' => Carbon::now(),
            ];
            $receive_id = DB::table($this->table)->insertGetId($dataReceive);
            for ($i = 0; $i < count($data['product_name']); $i++) {
                $dataupdate = [
                    'receive_id' => $receive_id,
                ];
                $checkQuote = QuoteImport::where('detailimport_id', $detail->id)->get();
                if ($checkQuote) {
                    foreach ($checkQuote as $value) {
                        $productImport = ProductImport::where('quoteImport_id', $value->id)
                            ->where('receive_id', 0)->first();
                        if ($productImport) {
                            DB::table('products_import')->where('id', $productImport->id)->update($dataupdate);
                        }
                    }
                }
            }

            // Cập nhật trạng thái đơn hàng
            if ($detail->status == 1) {
                $detail->status = 2;
                $detail->save();
            }
            return $receive_id;
        }
    }
    public function updateReceive($data, $id)
    {
        $result = true;
        $receive = Receive_bill::where('id', $id)->first();
        if ($receive && $receive->status == 1) {
            $dataUpdate = [
                'shipping_unit' => $data['shipping_unit'],
                'delivery_charges' => $data['delivery_charges'] == null ? 0 : str_replace(',', '', $data['delivery_charges']),
                'status' => 2,
            ];
            DB::table($this->table)->where('id', $receive->id)->update($dataUpdate);

            // Cập nhập dư nợ
            $detail = DetailImport::findOrFail($receive->detailimport_id);

            // Lấy tổng tiền hóa đơn nhập
            $product = ProductImport::where('receive_id', $receive->id)->get();
            $total = 0;
            foreach ($product as $item) {
                $getProduct = QuoteImport::where('id', $item->quoteImport_id)->first();
                if ($getProduct->product_ratio > 0 && $getProduct->price_import > 0) {
                    $price_export = ($getProduct->product_ratio + 100) * $getProduct->price_import / 100;
                    $total += $price_export * $item->product_qty;
                } else {
                    $price_export = $getProduct->price_export;
                    $total += $price_export * $item->product_qty;
                }
            }
            $getDebt = Provides::where('id', $detail->provide_id)->first();
            $total += $getDebt->provide_debt;
            DB::table('provides')->where('id', $detail->provide_id)->update([
                'provide_debt' => $total
            ]);

            // Cập nhật trạng thái nhận hàng
            $this->updateStatus($detail->id, Receive_bill::class, 'receive_qty', 'status_receive');

            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }

    public function updateStatus($id, $table, $colum, $columStatus)
    {
        $check = false;
        $detail = DetailImport::where('id', $id)->first();
        $product = QuoteImport::where('detailimport_id', $detail->id)->get();
        foreach ($product as $item) {
            if ($item->product_qty != $item->$colum) {
                $check = true;
                break;
            }
        }
        $receive = $table::where('detailimport_id', $detail->id)->get();
        foreach ($receive as $value) {
            if ($value->status == 1) {
                $check = true;
                break;
            }
        }
        if ($check) {
            $status = 1;
        } else {
            $status = 2;
        }
        $dataUpdate = [
            $columStatus => $status
        ];
        DB::table('detailimport')->where('id', $detail->id)->update($dataUpdate);
    }
    public function deleteReceive($id)
    {
        $status = false;
        $receive = DB::table($this->table)->where('id', $id)->first();
        if ($receive) {
            // Lấy thông tin sản phẩm 
            $productImport = ProductImport::where('receive_id', $receive->id)->get();
            if ($productImport) {
                foreach ($productImport as $item) {
                    $quoteImport = QuoteImport::where('id', $item->quoteImport_id)->first();
                    if ($quoteImport) {
                        $dataUpdate = [
                            'receive_qty' => $quoteImport->receive_qty - $item->product_qty
                        ];
                        DB::table('quoteimport')->where('id', $quoteImport->id)->update($dataUpdate);
                    }
                    $item->delete();
                }
            }
            $status = true;
            DB::table('receive_bill')->where('id', $receive->id)->delete();
        } else {
            $status = false;
        }
        return $status;
    }
}
