<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReturnImport extends Model
{
    use HasFactory;
    protected $table = "returnImport";

    protected $fillable = [
        'id',
        'receive_id',
        'description',
        'created_at',
        'updated_at',
        'workspace_id',
        'user_id',
        'status',
    ];

    public function getReceive()
    {
        return $this->hasOne(Receive_bill::class, 'id', 'receive_id');
    }
    public function getUser()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function getAllReturnProduct()
    {
        return $this->hasMany(ReturnProduct::class, 'returnImport_id', 'id');
    }

    public function getPayment() {
        return $this->hasOne(PayOder::class, 'return_id', 'id');
    }


    public function addReturnImport($data)
    {
        $status = [];
        $dataReturn = [
            'receive_id' => $data['detailimport_id'],
            'description' => $data['content'],
            'created_at' => isset($data['received_date']) ? $data['received_date'] : Carbon::now(),
            'workspace_id' => Auth::user()->current_workspace,
            'user_id' => Auth::user()->id,
            'return_code' => "PTH-" . $data['detailimport_id']
        ];
        if ($data['action'] == "action_1") {
            $dataReturn['status'] = 1;
        } else {
            $dataReturn['status'] = 2;
        }

        $id = DB::table($this->table)->insertGetId($dataReturn);
        if ($id) {
            $status['status'] = true;
            $status['id'] = $id;
        } else {
            $status['status'] = false;
        }
        return $status;
    }



    public function updateReturnImport($data, $id)
    {
        $status = [];
        // Lấy đơn trả hàng
        $returnImport = ReturnImport::where('id', $id)->first();
        if ($returnImport) {
            // Lấy thông tin sản phẩm trả
            $returnProduct = ReturnProduct::where('returnImport_id', $returnImport->id)->get();

            if ($returnProduct) {
                foreach ($returnProduct as $item) {
                    $quoteImport = QuoteImport::where('id', $item->quoteimport_id)->where('receive_id', $returnImport->receive_id)->first();
                    if ($quoteImport) {
                        // Trừ sản phẩm 
                        $product = Products::where('id', $quoteImport->product_id)->first();
                        if ($product) {
                            $qty = $product->product_inventory - $item->qty;
                            $product->product_inventory = $qty;
                            $product->save();


                            // Xóa SN khỏi sản phẩm
                            if ($product->check_seri == 1) {
                                $sn = json_decode($item->sn, true);
                                Serialnumber::whereIn('serinumber', $sn)->where('product_id', $product->id)->delete();
                            }
                        }

                        // Thêm lịch sử sản phẩm 
                        $dataProductImport = [
                            'detailimport_id' => $quoteImport->detailimport_id,
                            'quoteImport_id' => $quoteImport->id,
                            'product_qty' => (0 - $item->qty),
                            'cbSN' => $product->check_seri,
                            'receive_id' => $returnImport->receive_id,
                            'product_id' => $product->id,
                            'workspace_id' => Auth::user()->current_workspace,
                            'user_id' => Auth::user()->id,
                            'created_at' => Carbon::now(),
                        ];
                        DB::table('products_import')->insert($dataProductImport);
                    }
                }
                // Cập nhật trạng thái đơn hàng
                $returnImport->status = 2;
                $returnImport->updated_at = Carbon::now();
                $returnImport->save();
                $status['status'] = true;
            }
        } else {
            $status['status'] = false;
        }
        return $status;
    }

    public function deleteReturn($id)
    {
        $status = [];
        $returnImport = ReturnImport::where('id', $id)->first();
        if ($returnImport) {
            $returnProduct = ReturnProduct::where('returnImport_id', $returnImport->id)->get();
            if ($returnProduct) {
                foreach ($returnProduct as $item) {
                    // Lấy thông tin quoteImport
                    $quoteImport = QuoteImport::where('id', $item->quoteimport_id)->first();

                    // Lấy sản phẩm
                    $product = Products::where('id', $quoteImport->product_id)->first();

                    if ($product) {
                        if ($product->check_seri == 1) {
                            // Kiểm tra SN đã được nhập chưa
                            $sn = json_decode($item->sn, true);

                            $seri = Serialnumber::whereIn('serinumber', $sn)->where('product_id', $product->id)->first();
                            if (isset($seri)) {
                                // Nếu sản phẩm đã thêm SN 
                                $status['status'] = false;
                                // Dừng vòng lặp
                                break;
                            } else {
                                // Thêm SN theo sản phẩm nếu chưa tồn tại
                                foreach ($sn as $seri) {
                                    $dataSN = [
                                        'serinumber' => $seri,
                                        'receive_id' => $returnImport->receive_id,
                                        'detailimport_id' => $quoteImport->detailimport_id,
                                        'quoteImport_id' => $quoteImport->id,
                                        'detailexport_id' => 0,
                                        'product_id' => $product->id,
                                        'status' => 1,
                                        'workspace_id' => Auth::user()->current_workspace,
                                        'user_id' => Auth::user()->id,
                                        'created_at' => Carbon::now(),
                                        'delivery_id' => 0
                                    ];
                                    DB::table('serialnumber')->insert($dataSN);
                                }
                            }
                        }

                        // Cập nhật lại số lượng sản phẩm
                        $qty = $product->product_inventory + $item->qty;
                        $product->product_inventory = $qty;
                        $product->save();

                        // Xóa lịch sử thêm sản phẩm
                        ProductImport::where('product_id', $product->id)->where('receive_id', $returnImport->receive_id)
                            ->where('quoteImport_id', $quoteImport->id)->where('product_qty', '<', 0)->delete();
                    }
                }
                // Xóa thông tin sản phẩm trả hàng
                ReturnProduct::where('id', $item->id)->delete();
            }
            // Xóa đơn trả hàng
            ReturnImport::where('id', $returnImport->id)->delete();
            $status['status'] = true;
        } else {
            $status['status'] = false;
        }
        return $status;
    }
}
