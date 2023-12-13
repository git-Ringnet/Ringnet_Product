<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DetailImport extends Model
{
    use HasFactory;
    protected $table = 'detailimport';
    protected $fillable = [
        'provide_id',
        'project_id',
        'product_id',
        'user_id',
        'quotation_number',
        'reference_number',
        'price_effect',
        'status',
        'status_receive',
        'status_reciept',
        'status_pay',
        'warehouse_id',
        'total_tax',
        'discount',
        'transfer_fee',
        'terms_pay'
    ];
    public function getProvideName()
    {
        return $this->hasOne(Provides::class, 'id', 'provide_id');
    }
    public function getProjectName()
    {
        return $this->hasOne(Project::class, 'id', 'project_id');
    }
    public function getProductImport()
    {
        return $this->hasMany(QuoteImport::class, 'detailimport_id', 'id');
    }
    public function getAttachment($name)
    {
        return $this->hasMany(Attachment::class, 'table_id', 'id')->where('table_name', $name)->get();
    }
    public function getPayOrder(){
        return $this->hasOne(PayOder::class, 'detailimport_id', 'id');
    }


    public function getAllImport()
    {
        return DB::table($this->table)->get();
    }
    public function addImport($data)
    {
        $total = 0;
        $total_tax = 0;
        for ($i = 0; $i < count($data['product_name']); $i++) {
            $product_ratio = 0;
            $price_import = 0;
            $price_export = 0;
            isset($data['product_ratio']) ? $product_ratio = $data['product_ratio'][$i] : $product_ratio = 0;
            isset($data['price_import']) ? $price_import = str_replace(',', '', $data['price_import'][$i]) : $price_import = 0;
            if ($product_ratio > 0 && $price_import > 0) {
                $price_export = (($product_ratio + 100) * $price_import) / 100;
                $total += $price_export * str_replace(',', '', $data['product_qty'][$i]);
            } else {
                $price_export = str_replace(',', '', $data['product_qty'][$i]) * str_replace(',', '', $data['price_export'][$i]);
                $total += $price_export;
            }
            $total_tax += $data['product_tax'][$i] * $total;
        }
        $dataImport = [
            'provide_id' => $data['provides_id'],
            'project_id' => isset($data['project_id']) ? $data['project_id'] : 1,
            'user_id' => 1,
            'quotation_number' => $data['quotation_number'],
            'reference_number' => $data['reference_number'],
            'price_effect' => $data['price_effect'],
            'status' => 1,
            'created_at' => $data['date_quote'],
            'total_price' => $total,
            'total_tax' => $total_tax,
            'discount' =>   isset($data['discount']) ? str_replace(',', '', $data['discount']) : 0,
            'transfer_fee' =>  isset($data['transport_fee']) ? str_replace(',', '', $data['transport_fee']) : 0,
            'status_receive' => 0,
            'status_reciept' => 0,
            'status_pay' => 0,
            'terms_pay' => $data['terms_pay']
        ];
        $result = DB::table($this->table)->insertGetId($dataImport);
        if(!isset($data['quotation_number'])){
            DB::table($this->table)->where('id', $result)->update([
                'quotation_number' => $result
            ]);
        }
        return  $result;
    }

    public function updateImport($data, $id, $status)
    {
        $total = 0;
        $total_tax = 0;
        $check_status = false;
        $detail = DetailImport::where('id', $id)->first();
        if ($detail) {
            if ($data['action'] == "action_1") {
                $check_status = true;
                for ($i = 0; $i < count($data['product_name']); $i++) {
                    $product_ratio = 0;
                    $price_import = 0;
                    $price_export = 0;
                    isset($data['product_ratio']) ? $product_ratio = $data['product_ratio'][$i] : $product_ratio = 0;
                    isset($data['price_import']) ? $$price_import = str_replace(',', '', $data['price_import'][$i]) : $price_import = 0;
                    if ($product_ratio > 0 && $price_import > 0) {
                        $price_export = (($product_ratio + 100) * $price_import) / 100;
                        $total += $price_export * str_replace(',', '', $data['product_qty'][$i]);
                    } else {
                        $price_export = str_replace(',', '', $data['product_qty'][$i]) * str_replace(',', '', $data['price_export'][$i]);
                        $total += $price_export;
                    }
                    $total_tax += $data['product_tax'][$i] * $total;
                }
            } else {
                $product = QuoteImport::where('detailimport_id', $id)->get();
                foreach ($product as $item) {
                    if ($item->product_ratio > 0 && $item->price_import) {
                        $total += (($item->product_ratio + 100) * $item->price_import / 100) * $item->product_qty;
                    } else {
                        $total += $item->product_qty * $item->price_export;
                    }
                    $total_tax += $item->product_tax * $total;

                    $check_status = $check_status || (
                        ($data['action'] == "action_2" && $item->product_qty != $item->receive_qty) ||
                        ($data['action'] == "action_3" && $item->product_qty != $item->reciept_qty) ||
                        ($data['action'] != "action_2" && $data['action'] != "action_3" && $item->product_qty != $item->payment_qty)
                    );
                }
                // if ($data['action'] == "action_2") {
                //     foreach ($product as $item) {
                //         if ($item->product_qty != $item->receive_qty) {
                //             $check_status = true;
                //         }
                //     }
                // } elseif ($data['action'] == "action_3") {
                //     foreach ($product as $item) {
                //         if ($item->product_qty != $item->reciept_qty) {
                //             $check_status = true;
                //         }
                //     }
                // } else {
                //     foreach ($product as $item) {
                //         if ($item->product_qty != $item->payment_qty) {
                //             $check_status = true;
                //         }
                //     }
                // }
            }
            if ($check_status && $detail->status == 1) {
                $dataImport = [
                    'provide_id' => $data['provides_id'],
                    'project_id' => isset($data['project_id']) ? $data['project_id'] : 1,
                    'user_id' => 1,
                    'quotation_number' => $data['quotation_number'],
                    'reference_number' => $data['reference_number'],
                    'price_effect' => $data['price_effect'],
                    'status' => $status,
                    'created_at' => $data['date_quote'],
                    'total_price' => $total,
                    'total_tax' => $total_tax,
                    'discount' =>   isset($data['discount']) ? str_replace(',', '', $data['discount']) : 0,
                    'transfer_fee' =>  isset($data['transport_fee']) ? str_replace(',', '', $data['transport_fee']) : 0,
                    'terms_pay' => $data['terms_pay']
                ];
                $result = DB::table($this->table)->where('id', $id)->update($dataImport);
            }
        } else {
            $check_status = false;
        }

        return $check_status;
    }


    public function deleteDetail($id)
    {
        $result = [];
        $checkReceive = Receive_bill::where('detailimport_id', $id)->get();
        $checkReciept = Reciept::where('detailimport_id', $id)->get();
        $checkPayOrder = PayOder::where('detailimport_id', $id)->get();
        if (count($checkReceive) > 0) {
            $result = [
                'status' => false,
                'msg' => 'Vui lòng xóa đơn nhận hàng'
            ];
        } elseif (count($checkReciept) > 0) {
            $result = [
                'status' => false,
                'msg' => 'Vui lòng xóa hóa đơn mua hàng'
            ];
        } elseif (count($checkPayOrder) > 0) {
            $result = [
                'status' => false,
                'msg' => 'Vui lòng xóa thanh toán mua hàng'
            ];
        } else {
            $detail = DetailImport::where('id', $id)->first();
            if ($detail) {
                $quote = QuoteImport::where('detailimport_id', $detail->id)->get();
                if ($quote) {
                    foreach ($quote as $qt) {
                        $qt->delete();
                    }
                }
                $detail->delete();
                $result = [
                    'status' => true,
                    'msg' => 'Xóa đơn mua hàng thành công !'
                ];
            } else {
                $result = [
                    'status' => false,
                    'msg' => 'Không tìm thấy đơn mua hàng cần xóa !'
                ];
            }
        }
        return $result;
    }


    public function dataImport($dataImport)
    {
        // $result = $data;
        // dd($dataImport);
        // product_id
        $data = DB::table('products')->whereIn('id', $dataImport['product_id'])->get();
        return $data;
    }
}
