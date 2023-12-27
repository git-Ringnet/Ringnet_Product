<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
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

    public function getQuotation()
    {
        return $this->hasOne(DetailImport::class, 'id', 'detailimport_id');
    }

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
                'workspace_id' => Auth::user()->current_workspace
            ];
            $receive_id = DB::table($this->table)->insertGetId($dataReceive);
            for ($i = 0; $i < count($data['product_name']); $i++) {
                $dataupdate = [
                    'receive_id' => $receive_id,
                ];
                $checkQuote = QuoteImport::where('detailimport_id', $detail->id)
                    ->where('workspace_id', Auth::user()->current_workspace)
                    ->get();
                if ($checkQuote) {
                    foreach ($checkQuote as $value) {
                        $productImport = ProductImport::where('quoteImport_id', $value->id)
                            ->where('workspace_id', Auth::user()->current_workspace)
                            ->where('receive_id', 0)->first();
                        if ($productImport) {
                            DB::table('products_import')->where('id', $productImport->id)
                                ->where('workspace_id', Auth::user()->current_workspace)
                                ->update($dataupdate);
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
            DB::table($this->table)->where('id', $receive->id)
                ->where('workspace_id', Auth::user()->current_workspace)
                ->update($dataUpdate);

            // Cập nhập dư nợ
            $detail = DetailImport::findOrFail($receive->detailimport_id);

            // Lấy tổng tiền hóa đơn nhập
            $product = ProductImport::where('receive_id', $receive->id)
                ->where('workspace_id', Auth::user()->current_workspace)
                ->get();
            $total = 0;
            $total_tax = 0;
            $sum = 0;
            foreach ($product as $item) {
                $getProduct = QuoteImport::where('id', $item->quoteImport_id)
                    ->where('workspace_id', Auth::user()->current_workspace)
                    ->first();
                if ($getProduct->product_ratio > 0 && $getProduct->price_import > 0) {
                    $price_export = ($getProduct->product_ratio + 100) * $getProduct->price_import / 100;
                    $total += $price_export * $item->product_qty;
                } else {
                    $price_export = $getProduct->price_export;
                    $total += $price_export * $item->product_qty;
                }
                $total_tax += ($price_export * $item->product_qty) * $getProduct->product_tax / 100;
            }
            $sum = $total + $total_tax;
            $getDebt = Provides::where('id', $detail->provide_id)
                ->where('workspace_id', Auth::user()->current_workspace)
                ->first();
            $sum += $getDebt->provide_debt;
            DB::table('provides')->where('id', $detail->provide_id)
                ->where('workspace_id', Auth::user()->current_workspace)
                ->update([
                    'provide_debt' => $sum
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
    public function deleteReceive($id)
    {
        $status = false;
        $total = 0;
        $total_tax = 0;
        $listID = [];
        $receive = DB::table($this->table)->where('id', $id)->first();
        if ($receive) {
            $detail = $receive->detailimport_id;
            // Lấy thông tin sản phẩm 
            $productImport = ProductImport::where('receive_id', $receive->id)
                ->where('workspace_id', Auth::user()->current_workspace)
                ->get();
            if ($productImport) {
                foreach ($productImport as $item) {
                    $product = Products::where('id', $item->product_id)
                        ->where('workspace_id', Auth::user()->current_workspace)
                        ->first();
                    if ($product) {
                        array_push($listID, $product->id);
                    }
                }
                // Kiểm tra đã tạo đơn bán hàng chưa
                $checkExport = QuoteExport::whereIn('product_id', $listID)
                    ->where('workspace_id', Auth::user()->current_workspace)
                    ->first();
                if ($checkExport) {
                    $status = false;
                } else {
                    // Tiến hành xóa đơn
                    foreach ($productImport as $item) {
                        $quoteImport = QuoteImport::where('id', $item->quoteImport_id)
                            ->where('workspace_id', Auth::user()->current_workspace)
                            ->first();
                        if ($quoteImport) {
                            $total += $item->product_qty * $quoteImport->price_export;
                            $total_tax += ($item->product_qty * $quoteImport->price_export) * $quoteImport->product_tax / 100;
                            $dataUpdate = [
                                'receive_qty' => $quoteImport->receive_qty - $item->product_qty
                            ];
                            DB::table('quoteimport')->where('id', $quoteImport->id)
                                ->where('workspace_id', Auth::user()->current_workspace)
                                ->update($dataUpdate);
                            // Xóa serial number
                            $SN = Serialnumber::where('receive_id', $item->receive_id)
                                ->where('quoteImport_id', $quoteImport->id)
                                ->where('workspace_id', Auth::user()->current_workspace)
                                ->get();
                            foreach ($SN as $sn) {
                                $sn->delete();
                            }
                        }
                        // Trừ sản phẩm khỏi tồn kho
                        $product = Products::where('id', $item->product_id)
                            ->where('workspace_id', Auth::user()->current_workspace)
                            ->first();
                        if ($product) {
                            $dataProduct = [
                                'product_inventory' => ($product->product_inventory - $item->product_qty),
                            ];
                            DB::table('products')
                                ->where('id', $product->id)
                                ->where('workspace_id', Auth::user()->current_workspace)
                                ->update($dataProduct);
                        }
                        // Xóa đơn hàng
                        $item->delete();
                    }

                    // Xóa đơn nhận hàng
                    DB::table('receive_bill')->where('id', $receive->id)
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
                    // Cập nhật trạng thái nhận hàng
                    if ($checkReceive) {
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
                            'status_receive' => $st,
                            'status' => $stDetail
                        ]);
                    // Cập nhật dư nợ
                    if ($receive->status == 2) {
                        $provide = Provides::where('id', $receive->provide_id)
                            ->where('workspace_id', Auth::user()->current_workspace)
                            ->first();
                        if ($provide) {
                            $dataProvide = [
                                'provide_debt' => ($provide->provide_debt - ($total + $total_tax)),
                            ];
                            DB::table('provides')->where('id', $provide->id)
                                ->where('workspace_id', Auth::user()->current_workspace)
                                ->update($dataProvide);
                        }
                    }
                    $status = true;
                }
            }
        } else {
            $status = false;
        }
        return $status;
    }
    public function getProduct_receive($id)
    {
        $data = [];
        $list = [];
        $id_quote = [];
        $checked = [];
        $value = [];
        $quote = QuoteImport::where('detailimport_id', $id)->where('product_qty', '>', DB::raw('COALESCE(receive_qty,0)'))
        ->where('workspace_id', Auth::user()->current_workspace)
        ->get();
        foreach ($quote as $qt) {
            $product = Products::where('product_name', $qt->product_name)
            ->where('workspace_id', Auth::user()->current_workspace)
            ->first();
            $productImport = QuoteImport::where('product_name', $qt->product_name)
            ->where('workspace_id', Auth::user()->current_workspace)
            ->get();
            foreach ($productImport as $ip) {
                array_push($id_quote, $ip->id);
            }
            $CBSN = ProductImport::whereIn('quoteImport_id', $id_quote)
                ->where('receive_id', '!=', 'null')
                ->where('workspace_id', Auth::user()->current_workspace)
                ->first();
            if ($product) {
                // array_push($list, $product->check_seri == 0 ? 1 : $product->check_seri);
                array_push($list, $product->check_seri);
                array_push($checked, 'disabled');
            } else if ($CBSN) {
                // array_push($list, $CBSN->cbSN == 0 ? 1 : $CBSN->cbSN);
                array_push($list, $CBSN->cbSN);
                array_push($checked, 'disabled');
            } else {
                array_push($list, 0);
                array_push($checked, 'endable');
            }
        }
        $data = [
            'checked' => $checked,
            'cb' => $list,
            'quoteImport' => $quote,
        ];
        return $data;
    }
    public function show_receive($detail_id)
    {
        $data = [];
        $detail = DetailImport::FindOrFail($detail_id);
        $name =  $detail->getProvideName->provide_name_display;
        $data = [
            'quotation_number' => $detail->quotation_number,
            'provide_name' => $name,
            'id' => $detail->id
        ];
        return $data;
    }
}
