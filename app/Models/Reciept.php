<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
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
        return $this->hasMany(Attachment::class, 'table_id', 'id')->where('table_name', $name)
            ->where('workspace_id', Auth::user()->current_workspace)
            ->get();
    }

    public function addReciept($data, $id)
    {
        $detail =  DetailImport::findOrFail($id);
        $total = 0;
        $total_tax = 0;
        $sum = 0;
        if ($detail) {
            $dataReciept = [
                'detailimport_id' => $id,
                'provide_id' => $detail->provide_id,
                'date_bill' => isset($data['date_bill']) ?  Carbon::parse($data['date_bill']) : Carbon::now(),
                'number_bill' => isset($data['number_bill'])  ? $data['number_bill'] :  0,
                'status' => 1,
                'price_total' => 0,
                'created_at' => Carbon::now(),
                'workspace_id' => Auth::user()->current_workspace
            ];
            $reciept_id = DB::table($this->table)->insertGetId($dataReciept);
            for ($i = 0; $i < count($data['product_name']); $i++) {
                $dataupdate = [
                    'reciept_id' => $reciept_id,
                ];
                $checkQuote = QuoteImport::where('detailimport_id', $detail->id)
                    ->where('workspace_id', Auth::user()->current_workspace)
                    ->get();
                if ($checkQuote) {
                    foreach ($checkQuote as $value) {
                        $productImport = ProductImport::where('quoteImport_id', $value->id)
                            ->where('workspace_id', Auth::user()->current_workspace)
                            ->where('reciept_id', 0)->first();
                        if ($productImport) {
                            DB::table('products_import')->where('id', $productImport->id)
                                ->where('workspace_id', Auth::user()->current_workspace)
                                ->update($dataupdate);
                            $product = QuoteImport::where('id', $productImport->quoteImport_id)
                                ->where('workspace_id', Auth::user()->current_workspace)
                                ->first();
                            if ($product->product_ratio > 0 && $product->price_import > 0) {
                                $price_export = ($product->product_ratio + 100) * $product->price_import / 100;
                                $total += $price_export * $productImport->product_qty;
                            } else {
                                $price_export = $product->price_export;
                                $total += $price_export * $productImport->product_qty;
                            }
                            $total_tax += (($price_export * $productImport->product_qty) * ($product->product_tax == 99 ? 0 : $product->product_tax)) / 100;
                        }
                    }
                    $sum = $total_tax + $total;
                }
            }
            DB::table($this->table)->where('id', $reciept_id)
                ->where('workspace_id', Auth::user()->current_workspace)
                ->update([
                    'price_total' => $sum
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
        $reciept = Reciept::where('id', $id)
            ->where('workspace_id', Auth::user()->current_workspace)
            ->first();
        if ($reciept && $reciept->status == 1) {
            $dataUpdate = [
                'date_bill' => Carbon::parse($data['date_bill']),
                'number_bill' => $data['number_bill'] == null ? 0 : $data['number_bill'],
                'status' => 2,
            ];
            DB::table($this->table)->where('id', $reciept->id)
                ->where('workspace_id', Auth::user()->current_workspace)
                ->update($dataUpdate);

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
        $detail = DetailImport::where('id', $id)
            ->where('workspace_id', Auth::user()->current_workspace)
            ->first();
        $product = QuoteImport::where('detailimport_id', $detail->id)
            ->where('workspace_id', Auth::user()->current_workspace)
            ->get();
        foreach ($product as $item) {
            if ($item->product_qty != $item->$colum) {
                $check = true;
                break;
            }
        }
        $receive = $table::where('detailimport_id', $detail->id)
            ->where('workspace_id', Auth::user()->current_workspace)
            ->get();
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
        DB::table('detailimport')->where('id', $detail->id)
            ->where('workspace_id', Auth::user()->current_workspace)
            ->update($dataUpdate);
    }
    public function deleteReciept($id)
    {
        $status = false;
        $reciept = DB::table($this->table)->where('id', $id)
            ->where('workspace_id', Auth::user()->current_workspace)
            ->first();
        if ($reciept) {
            $detail = $reciept->detailimport_id;
            $productImport = ProductImport::where('reciept_id', $reciept->id)
                ->where('workspace_id', Auth::user()->current_workspace)
                ->get();
            if ($productImport) {
                foreach ($productImport as $item) {
                    $quoteImport = QuoteImport::where('id', $item->quoteImport_id)
                        ->where('workspace_id', Auth::user()->current_workspace)
                        ->first();
                    if ($quoteImport) {
                        $dataUpdate = [
                            'reciept_qty' => $quoteImport->reciept_qty - $item->product_qty
                        ];
                        DB::table('quoteimport')->where('id', $quoteImport->id)
                            ->where('workspace_id', Auth::user()->current_workspace)
                            ->update($dataUpdate);
                    }
                }
            }
            DB::table('reciept')->where('id', $reciept->id)
                ->where('workspace_id', Auth::user()->current_workspace)
                ->delete();
            // Cập nhật lại trạng thái đơn hàng
            $checkReceive = Receive_bill::where('detailimport_id', $detail)
                ->where('workspace_id', Auth::user()->current_workspace)
                ->first();
            $checkReciept = Reciept::where('detailimport_id', $detail)
                ->where('workspace_id', Auth::user()->current_workspace)
                ->first();
            $checkPayment = PayOder::where('detailimport_id', $detail)
                ->where('workspace_id', Auth::user()->current_workspace)
                ->first();
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
            DB::table('detailimport')->where('id', $detail)
                ->where('workspace_id', Auth::user()->current_workspace)
                ->update([
                    'status_reciept' => $st,
                    'status' => $stDetail
                ]);
            $status = true;
        } else {
            $status = false;
        }
        return $status;
    }
    public function getProduct_reciept($id)
    {
        return QuoteImport::where('detailimport_id', $id)->where('product_qty', '>', DB::raw('COALESCE(reciept_qty,0)'))
            ->where('workspace_id', Auth::user()->current_workspace)
            ->get();
    }
    public function show_reciept($detail_id)
    {
        $data = [];
        $detail = Receive_bill::FindOrFail($detail_id);
        $name =  $detail->getNameProvide->provide_name_display;
        $data = [
            'quotation_number' => $detail->quotation_number,
            'provide_name' => $name,
            'id' => $detail->id
        ];
        return $data;
    }
}
