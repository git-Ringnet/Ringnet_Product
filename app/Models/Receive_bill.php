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
        'id',
        'detailimport_id',
        'quotation_number',
        'provide_id',
        'total_tax',
        'shipping_unit',
        'delivery_charges', 'delivery_code',
        'status', 'created_at', 'workspace_id'
    ];

    public function getQuotation()
    {
        return $this->hasOne(DetailImport::class, 'id', 'detailimport_id');
    }

    public function getNameProvide()
    {
        return $this->hasOne(Provides::class, 'id', 'provide_id');
    }

    public function getReturnImport()
    {
        return $this->hasMany(ReturnImport::class, 'receive_id', 'id');
    }

    public function getNameUser()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function getAttachment($name)
    {
        return $this->hasMany(Attachment::class, 'table_id', 'id')->where('table_name', $name)->get();
    }

    public function addReceiveBill($data, $id, $list_id)
    {
        // $check_status = true;
        $total = 0;
        $total_tax = 0;
        $sum = 0;
        $count = Receive_bill::where('workspace_id', Auth::user()->current_workspace)->count();
        $lastReceive = Receive_bill::where('workspace_id', Auth::user()->current_workspace)
            ->orderBy('id', 'desc')
            ->first();
        if ($lastReceive) {
            $parts = explode('-', $lastReceive->delivery_code);
            $getNumber = end($parts);
            $count = (int)$getNumber + 1;
        } else {
            $count = $count == 0 ? $count += 1 : $count;
        }
        if ($count < 10) {
            $count = "0" . $count;
        }
        $resultNumber = "PNH-" . $count;
        if (isset($data['id_import'])) {

            $delivery_code = $resultNumber;
        } else {
            if (isset($data['provide_id'])) {
                $delivery_code = $resultNumber;
            } else {
                $delivery_code =  isset($data['delivery_code']) ? $data['delivery_code'] : $resultNumber;
            }
        }
        $detail = DetailImport::where('id', $id)->first();
        if ($detail) {
            $promotion = [];

            $promotion['type'] = isset($data['promotion-option-total']) ? $data['promotion-option-total'] : 1;
            $promotion['value'] = isset($data['promotion-total']) ? str_replace(',', '', $data['promotion-total']) : 0;

            $dataReceive = [
                'detailimport_id' => $id,
                'provide_id' => $detail->provide_id,
                'shipping_unit' => isset($data['shipping_unit']) ? $data['shipping_unit'] : "",
                'delivery_charges' => isset($data['delivery_charges']) ? str_replace(',', '', $data['delivery_charges']) : 0,
                'status' => 1,
                'created_at' => isset($data['received_date']) ? $data['received_date'] : Carbon::now(),
                'workspace_id' => Auth::user()->current_workspace,
                'delivery_code' => isset($data['delivery_code']) ? $data['delivery_code'] : $delivery_code,
                'user_id' => Auth::user()->id,
                'promotion' => json_encode($promotion)
            ];
            $receive_id = DB::table($this->table)->insertGetId($dataReceive);

            $dataupdate = [
                'receive_id' => $receive_id,
            ];


            // Cập nhật theo đơn hàng
            DB::table('products_import')->whereIn('id', $list_id)
                ->where('workspace_id', Auth::user()->current_workspace)
                ->update($dataupdate);

            // Cập nhật receive_id tại quoteImport
            $getProductImport = DB::table('products_import')->whereIn('id', $list_id)
                ->where('workspace_id', Auth::user()->current_workspace)
                ->get();
            if ($getProductImport) {
                foreach ($getProductImport as $item) {
                    DB::table('quoteimport')->where('id', $item->quoteImport_id)->update($dataupdate);
                }
            }

            // for ($i = 0; $i < count($data['product_name']); $i++) {
            $checkQuote = QuoteImport::where('detailimport_id', $detail->id)
                ->where('workspace_id', Auth::user()->current_workspace)
                ->get();
            if ($checkQuote) {
                foreach ($checkQuote as $value) {
                    $total1 = 0;
                    $productImport = ProductImport::where('quoteImport_id', $value->id)
                        ->where('workspace_id', Auth::user()->current_workspace)
                        // ->where('receive_id', 0)->first();
                        ->where('receive_id', $receive_id)->first();

                    // var_dump($productImport->quoteImport_id);

                    if ($productImport) {
                        // DB::table('products_import')->where('id', $productImport->id)
                        //     ->where('workspace_id', Auth::user()->current_workspace)
                        //     ->update($dataupdate);

                        $product = QuoteImport::where('id', $productImport->quoteImport_id)
                            ->where('workspace_id', Auth::user()->current_workspace)
                            ->first();

                        // $price_export = $product->price_export;
                        // if ($data['promotion-option'][$i] == 1) {
                        //     $total += $price_export * $productImport->product_qty - $data['promotion'][$i];
                        // } else {
                        //     $total += $price_export * $productImport->product_qty - $price_export * $productImport->product_qty * $data['promotion'][$i] / 100;
                        // }

                        // $total_tax += (($total) * ($product->product_tax == 99 ? 0 : $product->product_tax)) / 100;


                        $price_export = $product->price_export;

                        $promotionArray = json_decode($product->promotion, true);
                        $promotionValue = isset($promotionArray['value'])
                            ? $promotionArray['value']
                            : 0;
                        $promotionOption = isset($promotionArray['type'])
                            ? $promotionArray['type']
                            : 1;

                        $price_total = $price_export * $productImport->product_qty;

                        if ($promotionOption == 1) {
                            // $total = $price_export * $productImport->product_qty - isset($data['promotion'][$i]) ? str_replace(',','',$data['promotion'][$i]) : 0;
                            $total1 += $price_total - $promotionValue;
                        } else {
                            $total1 += $price_total - ($price_total * $promotionValue / 100);
                        }
                        $total += $total1;
                        $total_tax += $total1 * ($product->product_tax == 99 ? 0 : $product->product_tax) / 100;
                    }
                }
            }

            // }

            if (isset($data['promotion-total']) > 0) {
                if ($data['promotion-option-total'] == 1) {
                    $total = $total - (isset($data['promotion-total']) ? str_replace(',', '', $data['promotion-total']) : 0);
                } else {
                    $total = $total - $total * (isset($data['promotion-total']) ? str_replace(',', '', $data['promotion-total']) : 0) / 100;
                }
            }

            $sum = round($total_tax) + round($total);
        } else {
            $promotion = [];

            $promotion['type'] = isset($data['promotion-option-total']) ? $data['promotion-option-total'] : 1;
            $promotion['value'] = isset($data['promotion-total']) ? str_replace(',', '', $data['promotion-total']) : 0;
            $dataReceive = [
                'detailimport_id' => 0,
                'provide_id' => isset($data['provide_id']) ? $data['provide_id'] : 0,
                'shipping_unit' => isset($data['shipping_unit']) ? $data['shipping_unit'] : "",
                'delivery_charges' => isset($data['delivery_charges']) ? str_replace(',', '', $data['delivery_charges']) : 0,
                'status' => 1,
                'created_at' => isset($data['received_date']) ? $data['received_date'] : Carbon::now(),
                'workspace_id' => Auth::user()->current_workspace,
                'delivery_code' => isset($data['delivery_code']) ? $data['delivery_code'] : $delivery_code,
                'user_id' => Auth::user()->id,
                'promotion' => json_encode($promotion)
            ];
            $receive_id = DB::table($this->table)->insertGetId($dataReceive);

            $dataupdate = [
                'receive_id' => $receive_id,
            ];

            // Cập nhật theo đơn hàng
            DB::table('products_import')->whereIn('id', $list_id)
                ->where('workspace_id', Auth::user()->current_workspace)
                ->update($dataupdate);

            // Cập nhật receive_id tại quoteImport
            $getProductImport = DB::table('products_import')->whereIn('id', $list_id)
                ->where('workspace_id', Auth::user()->current_workspace)
                ->get();
            if ($getProductImport) {
                foreach ($getProductImport as $item) {
                    DB::table('quoteimport')->where('id', $item->quoteImport_id)->update($dataupdate);
                }
            }

            for ($i = 0; $i < count($data['product_name']); $i++) {
                $getProductImport = DB::table('products_import')->where('id', $list_id[$i])
                    ->where('workspace_id', Auth::user()->current_workspace)
                    // ->get();
                    ->first();
                if ($getProductImport) {
                    // foreach ($getProductImport as $item) {
                    $total1 = 0;
                    $product = QuoteImport::where('id', $getProductImport->quoteImport_id)
                        ->where('workspace_id', Auth::user()->current_workspace)
                        ->first();

                    $price_export = $product->price_export;

                    // if ($data['promotion-option'][$i] == 1) {
                    //     $total += $price_export * $item->product_qty - $data['promotion'][$i];
                    // } else {
                    //     $total += $price_export * $item->product_qty - $price_export * $item->product_qty * $data['promotion'][$i] / 100;
                    // }

                    // // $total_tax += (($price_export * $item->product_qty) * ($product->product_tax == 99 ? 0 : $product->product_tax)) / 100;
                    // $total_tax += (($total) * ($product->product_tax == 99 ? 0 : $product->product_tax)) / 100;


                    $promotionArray = json_decode($product->promotion, true);
                    $promotionValue = isset($promotionArray['value'])
                        ? $promotionArray['value']
                        : 0;
                    $promotionOption = isset($promotionArray['type'])
                        ? $promotionArray['type']
                        : 1;

                    $price_total = $price_export * $item->product_qty;
                    if ($promotionOption == 1) {
                        // $total = $price_export * $productImport->product_qty - isset($data['promotion'][$i]) ? str_replace(',','',$data['promotion'][$i]) : 0;
                        $total1 += $price_total - $promotionValue;
                    } else {
                        $total1 += $price_total - ($price_total * $promotionValue / 100);
                    }
                    $total += $total1;
                    $total_tax += (($total1) * ($product->product_tax == 99 ? 0 : $product->product_tax)) / 100;
                    // }
                }


                // $checkQuote = QuoteImport::where('detailimport_id', $detail->id)
                //     ->where('workspace_id', Auth::user()->current_workspace)
                //     ->get();
                // if ($checkQuote) {
                //     foreach ($checkQuote as $value) {
                //         $productImport = ProductImport::where('quoteImport_id', $value->id)
                //             ->where('workspace_id', Auth::user()->current_workspace)
                //             ->where('receive_id', 0)->first();
                //         if ($productImport) {

                //             $product = QuoteImport::where('id', $productImport->quoteImport_id)
                //                 ->where('workspace_id', Auth::user()->current_workspace)
                //                 ->first();


                //         }
                //     }
                // }
            }
            $sum = round($total_tax) + round($total);
        }

        // die();

        DB::table('receive_bill')->where('id', $receive_id)->update([
            // 'total_tax' => $sum
            'total_tax' => (isset($data['total_bill']) ? str_replace(',', '', $data['total_bill']) : $sum)
        ]);
        // Cập nhật trạng thái đơn hàng
        if (isset($data['action']) && $data['action'] == 'action_2') {
            $dataDetail = [
                'status' => 0
            ];
            // $detail->status = 2;
        } else {
            $dataDetail['status_receive'] = 3;
        }
        if (isset($detail) && $detail->status == 1) {
            $dataDetail['status_debt'] = 1;
            // $detail->status_debt = 1;
            // $detail->save();
            DB::table('detailimport')->where('id', $detail->id)->update($dataDetail);

            // Cập nhật dư nợ nhà cung cấp
            // $this->calculateDebt($detail->provide_id, $sum);
        }
        return $receive_id;
    }

    public function updateReceive($data, $id)
    {
        $result = true;
        $receive = Receive_bill::where('id', $id)->first();
        if ($receive && $receive->status == 1) {
            $dataUpdate = [
                'status' => 2,
            ];
            if (!isset($data['id_import'])) {
                $dataUpdate['shipping_unit'] = $data['shipping_unit'];
                $dataUpdate['delivery_charges'] = $data['delivery_charges'] == null ? 0 : str_replace(',', '', $data['delivery_charges']);
            }

            DB::table($this->table)->where('id', $receive->id)
                ->where('workspace_id', Auth::user()->current_workspace)
                ->update($dataUpdate);

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
                $total_tax += ($price_export * $item->product_qty) * ($getProduct->product_tax == 99 ? 0 : $getProduct->product_tax) / 100;
            }
            $sum =  round($total) + round($total_tax);

            // Cập nhập dư nợ
            $detail = DetailImport::where('id', $receive->detailimport_id)->first();

            if ($detail && $detail->status == 1) {
                $detail->status = 0;
                $detail->save();
            }
            if ($detail) {
                // Cập nhật trạng thái nhận hàng
                $this->updateStatus($detail->id, Receive_bill::class, 'receive_qty', 'status_receive');
            }

            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }

    public function calculateDebt($provide_id, $total)
    {
        $provide = DB::table('provides')->where('id', $provide_id)
            ->where('workspace_id', Auth::user()->current_workspace)
            ->first();
        if ($provide) {
            $debt = $provide->provide_debt + $total;
            $dataProvide = [
                'provide_debt' => $debt,
            ];
            Provides::where('id', $provide->id)
                ->where('workspace_id', Auth::user()->current_workspace)
                ->update($dataProvide);
        }
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
        if ($status == 2 && $detail->status_reciept == 2 && $detail->status_pay == 2) {
            $dataUpdate['status'] = 2;
        }
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
            $checkReturn = ReturnImport::where('id', $receive->id)->first();
            if ($checkReturn) {
                $status = false;
            } else {
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
                    $checkExport = Delivered::whereIn('product_id', $listID)
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
                                $total_tax += ($item->product_qty * $quoteImport->price_export) * ($quoteImport->product_tax == 99 ? 0 : $quoteImport->product_tax) / 100;

                                $dataUpdate = [
                                    'receive_qty' => $quoteImport->receive_qty - $item->product_qty
                                ];


                                if ($quoteImport->receive_qty - $item->product_qty == 0) {
                                    $dataUpdate['product_id'] = null;
                                }


                                // Trừ số lượng sản phẩm theo kho
                                $getProductWarehouse = ProductWarehouse::where('product_id', $quoteImport->product_id)
                                    ->where('warehouse_id', $quoteImport->warehouse_id)
                                    ->where('workspace_id', Auth::user()->current_workspace)
                                    ->first();

                                if ($getProductWarehouse) {
                                    $getProductWarehouse->qty = $getProductWarehouse->qty - $item->product_qty;
                                    $getProductWarehouse->save();
                                }


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

                        // Cập nhật id product null khi xóa đơn


                        // Xóa đơn nhận hàng
                        DB::table('receive_bill')->where('id', $receive->id)
                            ->where('workspace_id', Auth::user()->current_workspace)
                            ->delete();


                        // Cập nhật lại receive_id và xóa sản phẩm đã thêm không theo đơn
                        $getQuoteImport = QuoteImport::where('receive_id', $receive->id)->where('workspace_id', Auth::user()->current_workspace)->get();
                        if ($getQuoteImport) {
                            foreach ($getQuoteImport as $item) {
                                if ($item->detailimport_id == 0) {
                                    $item->delete();
                                } else {
                                    $item->receive_id = 0;
                                    $item->save();
                                }
                            }
                        }
                        // Xóa file đính kèm theo đơn nhận hàng
                        // DB::table('attachment')->where('table_id', $receive->id)
                        //     ->where('table_name', 'DNH')
                        //     ->where('workspace_id', Auth::user()->current_workspace)
                        //     ->delete();

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
                            $stDetail = 0;
                            $stDebt = 1;
                        } else {
                            $stDetail = 1;
                            $stDebt = 0;
                        }
                        DB::table('detailimport')->where('id', $detail)
                            ->where('workspace_id', Auth::user()->current_workspace)
                            ->update([
                                'status_receive' => $st,
                                'status' => $stDetail,
                                'status_debt' => $stDebt
                            ]);

                        // Xóa dư nợ nhà cung cấp nếu tình trạng là 1
                        if ($stDetail == 1) {
                            $detailImport = DetailImport::where('id', $detail)->first();
                            if ($detailImport) {
                                $this->updateDebtProvide($detailImport->provide_id, $detailImport->total_tax);
                            }
                        }


                        $status = true;
                    }
                }
            }
        } else {
            $status = false;
        }
        return $status;
    }

    public function updateDebtProvide($provide_id, $total)
    {
        $provide = Provides::where('id', $provide_id)->first();
        if ($provide) {
            $debt = $provide->provide_debt - $total;

            DB::table('provides')->where('id', $provide->id)->update(
                ['provide_debt' => $debt]
            );
        }
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
    public function getUserInReceive()
    {
        $receive = Receive_bill::leftJoin('users', 'users.id', 'receive_bill.user_id')
            ->where('receive_bill.workspace_id', Auth::user()->current_workspace)
            ->select(
                'receive_bill.*',
                'users.*'
            )->get();
        return $receive;
    }
    public function receive_bill_codeById($data)
    {
        $receive_bill = DB::table($this->table);
        if (isset($data)) {
            $receive_bill = $receive_bill->whereIn('id', $data);
        }
        $receive_bill = $receive_bill->pluck('delivery_code')->all();
        return $receive_bill;
    }
    public function ajax($data)
    {
        $receive = Receive_bill::leftJoin('provides', 'provides.id', 'receive_bill.provide_id')
            ->leftJoin('detailimport', 'detailimport.id', 'receive_bill.detailimport_id')
            ->select('detailimport.provide_name as provide_name', 'provides.provide_name_display', 'detailimport.quotation_number as quotation_number', 'receive_bill.status as status', 'receive_bill.*')
            ->where('receive_bill.workspace_id', Auth::user()->current_workspace);

        if (isset($data['search'])) {
            $receive = $receive->where(function ($query) use ($data) {
                $query->orWhere('receive_bill.delivery_code', 'like', '%' . $data['search'] . '%');
                $query->orWhere('quotation_number', 'like', '%' . $data['search'] . '%');
                $query->orWhere('provide_name_display', 'like', '%' . $data['search'] . '%');
                $query->orWhere('detailimport.provide_name', 'like', '%' . $data['search'] . '%');
            });
        }
        if (isset($data['quotenumber'])) {
            $receive = $receive->where('quotation_number', 'like', '%' . $data['quotenumber'] . '%');
        }
        if (isset($data['provides'])) {
            $receive = $receive->where('detailimport.provide_name', 'like', '%' . $data['provides'] . '%');
        }
        if (isset($data['shipping_unit'])) {
            $receive = $receive->where('receive_bill.shipping_unit', 'like', '%' . $data['shipping_unit'] . '%');
        }
        if (isset($data['delivery_code'])) {
            $receive = $receive->whereIn('receive_bill.id', $data['delivery_code']);
        }
        if (isset($data['users'])) {
            $receive = $receive->whereIn('receive_bill.user_id', $data['users']);
        }
        if (isset($data['status'])) {
            $receive = $receive->whereIn('receive_bill.status', $data['status']);
        }
        if (isset($data['shipping_fee'][0]) && isset($data['shipping_fee'][1])) {
            $receive = $receive->where('receive_bill.delivery_charges', $data['shipping_fee'][0], $data['shipping_fee'][1]);
        }
        if (isset($data['total'][0]) && isset($data['total'][1])) {
            $receive = $receive->where('receive_bill.total_tax', $data['total'][0], $data['total'][1]);
        }
        if (!empty($data['date'][0]) && !empty($data['date'][1])) {
            $dateStart = Carbon::parse($data['date'][0]);
            $dateEnd = Carbon::parse($data['date'][1])->endOfDay();
            $receive = $receive->whereBetween('receive_bill.created_at', [$dateStart, $dateEnd]);
        }
        if (isset($data['sort']) && isset($data['sort'][0])) {
            $receive = $receive->orderBy($data['sort'][0], $data['sort'][1]);
        }
        $receive = $receive->get();
        return $receive;
    }
}
