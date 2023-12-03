<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Reciept extends Model
{
    use HasFactory;
    protected $table = 'reciept';
    protected $fillable = [
        'detailimport_id',
        'receive_id',
        'provide_id',
        'date_bill',
        'number_bill',
        'status',
        'price_total'
    ];
    public function getProvideName()
    {
        return $this->hasOne(Provides::class, 'id', 'provide_id');
    }
    public function getQuotation()
    {
        return $this->hasOne(DetailImport::class, 'id', 'detailimport_id');
    }
    public function getAttachment($name)
    {
        return $this->hasMany(Attachment::class, 'table_id', 'id')->where('table_name', $name)->get();
    }

    public function addReciept($data, $id)
    {
        $detail =  DetailImport::findOrFail($id);
        $total = 0;
        if ($detail) {
            $dataReciept = [
                'detailimport_id' => $id,
                'provide_id' => $detail->provide_id,
                'date_bill' => isset($data['date_bill']) ?  Carbon::parse($data['date_bill']) : Carbon::now(),
                'number_bill' => isset($data['number_bill'])  ? $data['number_bill'] :  0,
                'status' => 1,
                'price_total' => 0,
                'created_at' => Carbon::now(),
            ];
            $reciept_id = DB::table($this->table)->insertGetId($dataReciept);
            for ($i = 0; $i < count($data['product_name']); $i++) {
                $dataupdate = [
                    'reciept_id' => $reciept_id,
                ];
                $checkQuote = QuoteImport::where('detailimport_id', $detail->id)->get();
                if ($checkQuote) {
                    foreach ($checkQuote as $value) {
                        $productImport = ProductImport::where('quoteImport_id', $value->id)
                            ->where('reciept_id', 0)->first();
                        if ($productImport) {
                            DB::table('products_import')->where('id', $productImport->id)->update($dataupdate);
                            $product = QuoteImport::where('id', $productImport->quoteImport_id)->first();
                            if ($product->product_ratio > 0 && $product->price_import > 0) {
                                $price_export = ($product->product_ratio + 100) * $product->price_import / 100;
                                $total += $price_export * $productImport->product_qty;
                            } else {
                                $price_export = $product->price_export;
                                $total += $price_export * $productImport->product_qty;
                            }
                        }
                    }
                }
            }
            DB::table($this->table)->where('id', $reciept_id)->update([
                'price_total' => $total
            ]);
        }
        if ($detail->status == 1) {
            $detail->status = 2;
            $detail->save();
        }
        return $reciept_id;
    }
    public function updateReciept($data, $id)
    {
        $result = true;
        $reciept = Reciept::where('id', $id)->first();
        if ($reciept && $reciept->status == 1) {
            $dataUpdate = [
                'date_bill' => Carbon::parse($data['date_bill']),
                'number_bill' => $data['number_bill'] == null ? 0 : $data['number_bill'],
                'status' => 2,
            ];
            DB::table($this->table)->where('id', $reciept->id)->update($dataUpdate);

            $this->updateStatus($reciept->detailimport_id, Reciept::class, 'reciept_qty', 'status_reciept');

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
    public function deleteReciept($id)
    {
        $status = false;
        $reciept = DB::table($this->table)->where('id', $id)->first();
        if ($reciept) {
            $detail = $reciept->detailimport_id;
            $productImport = ProductImport::where('reciept_id', $reciept->id)->get();
            if ($productImport) {
                foreach ($productImport as $item) {
                    $quoteImport = QuoteImport::where('id', $item->quoteImport_id)->first();
                    if ($quoteImport) {
                        $dataUpdate = [
                            'reciept_qty' => $quoteImport->reciept_qty - $item->product_qty
                        ];
                        DB::table('quoteimport')->where('id', $quoteImport->id)->update($dataUpdate);
                    }
                }
            }
            DB::table('reciept')->where('id', $reciept->id)->delete();
            // Cập nhật lại trạng thái đơn hàng
            $checkReceive = Receive_bill::where('detailimport_id', $detail)->first();
            $checkReciept = Reciept::where('detailimport_id', $detail)->first();
            $checkPayment = PayOder::where('detailimport_id', $detail)->first();
            if ($checkReciept) {
                $st = 1;
            } else {
                $st = 0;
            }
            if ($checkReceive || $checkReciept || $checkPayment) {
                $stDetail = 2;
            } else {
                $stDetail = 1;
            }
            DB::table('detailimport')->where('id', $detail)->update([
                'status_reciept' => $st,
                'status' => $stDetail
            ]);
            $status = true;
        } else {
            $status = false;
        }
        return $status;
    }
}
