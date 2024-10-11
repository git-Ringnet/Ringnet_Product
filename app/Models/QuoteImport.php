<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class QuoteImport extends Model
{
    use HasFactory;
    protected $table = 'quoteimport';
    protected $fillable = [
        'id',
        'detailimport_id',
        'product_id',
        'product_name',
        'product_unit',
        'product_qty',
        'product_tax',
        'product_total',
        'reciept_qty',
        'payment_qty',
        'price_export',
        'version',
        'warehouse_id',
        'workspace_id',
        'product_code',
        'created_at',
        'promotion'
    ];
    public function getProductCode()
    {
        return $this->hasOne(ProductCode::class, 'id', 'product_code');
    }
    public function getSerialNumber()
    {
        return $this->hasMany(Serialnumber::class, 'product_id', 'product_id');
    }
    public function getSerialNumberByID()
    {
        return $this->hasMany(Serialnumber::class, 'product_id', 'product_id')->where('quoteimport.id', 'serialnumber.quoteImport_id');
    }

    public function getAllQuote()
    {
        return DB::table($this->table)->get();
    }
    public function getProductImport()
    {
        return $this->hasOne(ProductImport::class, 'quoteImport_id', 'id');
    }
    public function getQuoteNumber()
    {
        return $this->hasOne(DetailImport::class, 'id', 'detailimport_id');
    }
    public function getWareHouse()
    {
        return $this->hasOne(Warehouse::class, 'id', 'warehouse_id');
    }
    public function getProduct()
    {
        return $this->hasOne(Products::class, 'product_name', 'product_name');
    }
    public function getPayment()
    {
        return $this->hasMany(PayOder::class, 'detailimport_id', 'detailimport_id');
    }
    public function addQuoteImport($data, $id)
    {
        for ($i = 0; $i < count($data['product_name']); $i++) {
            $promotion = [];
            $promotion['type'] = $data['promotion-option'][$i];
            $promotion['value'] = isset($data['promotion'][$i]) ? str_replace(',', '', $data['promotion'][$i]) : 0;

            $dataQuote = [
                'detailimport_id' => $id,
                'product_id' => $data['product_id'][$i],
                'product_code' => $data['product_code'][$i],
                'product_name' => $data['product_name'][$i],
                'product_unit' => $data['product_unit'][$i],
                'product_qty' => str_replace(',', '', $data['product_qty'][$i]),
                'product_tax' => $data['product_tax'][$i],
                'product_total' => str_replace(',', '', $data['product_qty'][$i]) * str_replace(',', '', $data['price_export'][$i]),
                'price_export' => str_replace(',', '', $data['price_export'][$i]),
                'product_note' => $data['product_note'][$i],
                'receive_id' => 0,
                'warehouse_id' => 0,
                'version' => 1,
                'created_at' => Carbon::now(),
                'workspace_id' => Auth::user()->current_workspace,
                'user_id' => Auth::user()->id,
                'receive_qty' => 0,
                'reciept_qty' => 0,
                'payment_qty' => 0,
                'promotion' => json_encode($promotion),
                'warehouse_id' => isset($data['warehouse_id'][$i]) ? $data['warehouse_id'][$i] : 0,
            ];
            $quote_id = DB::table($this->table)->insertGetId($dataQuote);
            $getProvide = DetailImport::where('id', $id)->first();
            if ($quote_id && $getProvide) {
                $dataHistory = [
                    'detailimport_id' => $id,
                    'quoteImport_id' => $quote_id,
                    'product_code' => $data['product_code'][$i],
                    'product_name' => $data['product_name'][$i],
                    'product_unit' => $data['product_unit'][$i],
                    'product_qty' => str_replace(',', '', $data['product_qty'][$i]),
                    'product_tax' => $data['product_tax'][$i],
                    'product_total' => str_replace(',', '', $data['product_qty'][$i]) * str_replace(',', '', $data['price_export'][$i]),
                    'price_export' => str_replace(',', '', $data['price_export'][$i]),
                    'product_note' => $data['product_note'][$i],
                    'version' => 1,
                    'created_at' => Carbon::now(),
                    'workspace_id' => Auth::user()->current_workspace,
                    'provide_id' => $getProvide->provide_id,
                    'user_id' => Auth::user()->id,
                    'promotion' => json_encode($promotion)
                ];
                DB::table('history_import')->insert($dataHistory);
            }
        }
        // return $result;
    }
    public function sumProductsQuote()
    {
        $quoteI = QuoteImport::leftJoin('detailimport', 'quoteimport.detailimport_id', 'detailimport.id')
            ->select(
                'detailimport.*',
                'quoteimport.*',
                'quoteimport.product_qty as slxuat',
            )
            ->get();
        return $quoteI;
    }
    public function AjaxSumProductsQuote($data)
    {
        $quoteI = QuoteImport::leftJoin('detailimport', 'quoteimport.detailimport_id', 'detailimport.id')
            ->select(
                'detailimport.*',
                'quoteimport.*',
                'detailimport.id as id',
                'quoteimport.product_qty as slxuat',
            );
        if (!empty($data['date'][0]) && !empty($data['date'][1])) {
            $dateStart = Carbon::parse($data['date'][0]);
            $dateEnd = Carbon::parse($data['date'][1])->endOfDay();
            $quoteI = $quoteI->whereBetween('detailimport.created_at', [$dateStart, $dateEnd]);
        };
        $quoteI = $quoteI->get();
        return $quoteI;
    }

    public function sumProductsQuoteByProvide($idProvide, $data = null)
    {
        // Đặt biến truy vấn đúng là $quoteI (vì bạn đang sử dụng QuoteImport)
        $quoteI = QuoteImport::leftJoin('detailimport', 'quoteimport.detailimport_id', 'detailimport.id')
            ->leftJoin('users', 'users.id', 'detailimport.id_sale')
            ->where('detailimport.provide_id', $idProvide);

        if (isset($data)) {
            // Sử dụng $quoteI thay vì $quoteE
            $quoteI = $quoteI->select(
                'detailimport.*',
                'quoteimport.*',
                'users.*',
                'quoteimport.product_qty as slxuat',
                'quoteimport.price_export as giaNhap',
                'detailimport.id as id'
            );
        } else {
            // Sử dụng $quoteI thay vì $quoteE
            $quoteI = $quoteI->select(
                'detailimport.*',
                'quoteimport.*',
                'users.*',
                'quoteimport.product_qty as slxuat',
                'quoteimport.price_export as giaNhap'
            );
        }
        // Tìm kiếm từ khóa
        if (isset($data['search'])) {
            $quoteI = $quoteI->where(function ($query) use ($data) {
                $query->orWhere('detailimport.quotation_number', 'like', '%' . $data['search'] . '%')
                    ->orWhere('users.name', 'like', '%' . $data['search'] . '%')
                    ->orWhere('quoteimport.product_name', 'like', '%' . $data['search'] . '%')
                    ->orWhere('quoteimport.product_code', 'like', '%' . $data['search'] . '%')
                    ->orWhere('quoteimport.product_unit', 'like', '%' . $data['search'] . '%');
            });
        }

        // Lọc theo các trường khác
        if (isset($data['chungtu'])) {
            $quoteI = $quoteI->where('detailimport.quotation_number', 'like', '%' . $data['chungtu'] . '%');
        }

        if (isset($data['ctvbanhang'])) {
            $quoteI = $quoteI->where('users.name', 'like', '%' . $data['ctvbanhang'] . '%');
        }

        if (isset($data['mahang'])) {
            $quoteI = $quoteI->where('quoteimport.product_code', 'like', '%' . $data['mahang'] . '%');
        }

        if (isset($data['tenhang'])) {
            $quoteI = $quoteI->where('quoteimport.product_name', 'like', '%' . $data['tenhang'] . '%');
        }

        if (isset($data['dvt'])) {
            $quoteI = $quoteI->where('quoteimport.product_unit', 'like', '%' . $data['dvt'] . '%');
        }

        if (isset($data['slban'][0]) && isset($data['slban'][1])) {
            $quoteI = $quoteI->having('slxuat', $data['slban'][0], $data['slban'][1]);
        }

        // So sánh Đơn giá với operation
        if (isset($data['dongia'][0]) && isset($data['dongia'][1])) {
            $quoteI = $quoteI->having('giaNhap', $data['dongia'][0], $data['dongia'][1]);
        }

        // So sánh Thành tiền (tính dựa trên slxuat * giaNhap) với operation
        if (isset($data['thanhtien'][0]) && isset($data['thanhtien'][1])) {
            $quoteI = $quoteI->havingRaw('slxuat * giaXuat' . $data['thanhtien'][0] . ' ?', [$data['thanhtien'][1]]);
        }

        // Sắp xếp
        if (isset($data['sort']) && isset($data['sort'][0])) {
            $quoteI = $quoteI->orderBy($data['sort'][0], $data['sort'][1]);
        }

        return $quoteI->get();
    }
    public function updateImport($data, $id)
    {
        // Xóa sản phẩm khi chỉnh sửa đơn hàng
        if ($data['action'] == 'action_1') {
            $id_detail = DB::table($this->table)->where('detailimport_id', $id)
                ->where('workspace_id', Auth::user()->current_workspace)
                ->whereNotIn('id', $data['listProduct'])
                ->delete();
        }
        for ($i = 0; $i < count($data['product_name']); $i++) {
            $promotion = [];
            // Kiểm tra và thêm sản phẩm mới vào kho hàng
            $checkProduct = Products::where('product_name', $data['product_name'][$i])
                ->where('workspace_id', Auth::user()->current_workspace)
                ->first();
            if (!$checkProduct) {
                $dataProduct = [
                    'product_code' => $data['product_code'][$i],
                    'product_name' => $data['product_name'][$i],
                    'product_unit' => $data['product_unit'][$i],
                    'product_tax' => $data['product_tax'][$i],
                    'product_inventory' => 0,
                    'check_seri' => 1,
                    'workspace_id' => Auth::user()->current_workspace
                ];
                DB::table('products')->insert($dataProduct);
            }

            // Lấy sản phẩm cần sửa
            $dataUpdate = QuoteImport::where('id', $data['listProduct'][$i])
                ->where('workspace_id', Auth::user()->current_workspace)
                ->first();
            $price_export = floatval(str_replace(',', '', $data['price_export'][$i]));
            $total_price = floatval(str_replace(',', '', $data['product_qty'][$i])) * $price_export;
            $promotion['type'] = $data['promotion-option'][$i];
            $promotion['value'] = isset($data['promotion'][$i]) ? str_replace(',', '', $data['promotion'][$i]) : 0;
            if ($dataUpdate) {
                if (
                    $dataUpdate->product_code != $data['product_code'][$i] || $dataUpdate->product_name != $data['product_name'][$i] || $dataUpdate->product_unit != $data['product_unit'][$i] ||
                    $dataUpdate->product_qty != str_replace(',', '', $data['product_qty'][$i]) || $dataUpdate->product_tax != $data['product_tax'][$i] ||
                    $dataUpdate->product_total != $total_price || $dataUpdate->price_export != $price_export || $dataUpdate->product_note != $data['product_note'][$i] || $dataUpdate->promotion != $promotion
                ) {

                    $dataQuoteUpdate = [
                        'product_id' => $data['product_id'][$i],
                        'product_code' => $data['product_code'][$i],
                        'product_name' => $data['product_name'][$i],
                        'product_unit' => $data['product_unit'][$i],
                        'product_qty' => str_replace(',', '', $data['product_qty'][$i]),
                        'product_tax' => $data['product_tax'][$i],
                        'product_total' => $total_price,
                        'price_export' => $price_export,
                        'version' => ($dataUpdate->version + 1),
                        'product_note' => $data['product_note'][$i],
                        'promotion' => json_encode($promotion),
                        'warehouse_id' => 0
                    ];
                    DB::table($this->table)->where('id', $dataUpdate->id)->update($dataQuoteUpdate);
                }
            } else {
                $dataQuote = [
                    'detailimport_id' => $id,
                    'product_id' => $data['product_id'][$i],
                    'product_code' => $data['product_code'][$i],
                    'product_name' => $data['product_name'][$i],
                    'product_unit' => $data['product_unit'][$i],
                    'product_qty' =>  str_replace(',', '', $data['product_qty'][$i]),
                    'product_tax' => $data['product_tax'][$i],
                    'product_total' => $total_price,
                    'price_export' => $price_export,
                    'product_note' => $data['product_note'][$i],
                    'receive_id' => 0,
                    'warehouse_id' => 0,
                    'version' => 1,
                    'created_at' => Carbon::now(),
                    'workspace_id' => Auth::user()->current_workspace,
                    'receive_qty' => 0,
                    'reciept_qty' => 0,
                    'payment_qty' => 0,
                    'promotion' => json_encode($promotion),
                ];
                DB::table($this->table)->insert($dataQuote);
            }
        }
    }
}
