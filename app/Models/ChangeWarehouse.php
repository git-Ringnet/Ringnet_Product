<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ChangeWarehouse extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_name',
        'quoteImport_id',
        'product_id',
        'qty',
        'from_warehouse',
        'to_warehouse',
        'workspace_id',
        'user_id',
        'note',
        'created_at',
        'updated_at'
    ];
    protected $table = 'change_warehouse';

    public function getFromWarehouse()
    {
        return $this->hasOne(Warehouse::class, 'id', 'from_warehouse');
    }

    public function getToWarehouse()
    {
        return $this->hasOne(Warehouse::class, 'id', 'to_warehouse');
    }

    public function getUser()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }


    public function addChangeWarehouse($data)
    {

        $result = [];
        $product = Products::where('id', $data['product_id'])->first();
        $SN = [];

        if (isset($data['SN_id'])) {
            $productSN = $data['SN_id'];
            for ($j = 0; $j < count($productSN); $j++) {
                if (!empty($productSN[$j])) {
                    array_push($SN, $productSN[$j]);
                }
            }
        }
        $dataChange = [
            'product_name' => isset($product) ? $product->product_name : 0,
            'quoteImport_id' => isset($data['quoteImport_id']) ? $data['quoteImport_id'] : 0,
            'product_id' => isset($product) ? $product->id : 0,
            'qty' => isset($data['qty']) ? str_replace(',', '', $data['qty']) : 0,
            'from_warehouse' => $data['from_warehouse'],
            'to_warehouse' => $data['to_warehouse'],
            'workspace_id' => Auth::user()->current_workspace,
            'user_id' => Auth::user()->id,
            'note' => isset($data['note']) ? $data['note'] : "",
            'sn' => isset($data['SN_id']) ?  json_encode($SN) : "",
            'created_at' => Carbon::now()
        ];
        $id = DB::table($this->table)->insertGetId($dataChange);

        if ($id) {
            if (isset($data['SN_id'])) {
                // Cập nhật lại kho hàng SN
                Serialnumber::whereIn('id', $SN)->update([
                    'warehouse_id' => $data['to_warehouse']
                ]);
            }

            // Cập nhật số lượng sản phẩm theo kho hàng
            $checkProductWarehouse = ProductWarehouse::where('product_id', $data['product_id'])
                ->where('warehouse_id', $data['from_warehouse'])
                ->where('workspace_id', Auth::user()->current_workspace)->first();
            if ($checkProductWarehouse) {
                $checkProductWarehouse->qty = $checkProductWarehouse->qty - (isset($data['qty']) ? str_replace(',', '', $data['qty']) : 0);
                $checkProductWarehouse->save();
            }

            // Cộng thêm sản phẩm vào kho mới 
            $getProductWarehosue = ProductWarehouse::where('product_id', $data['product_id'])
                ->where('warehouse_id', $data['to_warehouse'])
                ->where('workspace_id', Auth::user()->current_workspace)->first();
            if ($getProductWarehosue) {
                $getProductWarehosue->qty = $getProductWarehosue->qty + (isset($data['qty']) ? str_replace(',', '', $data['qty']) : 0);
                $getProductWarehosue->save();
            } else {
                $dataProductWarehouse = [
                    'product_id' => $data['product_id'],
                    'warehouse_id' => $data['to_warehouse'],
                    'qty' => (isset($data['qty']) ? str_replace(',', '', $data['qty']) : 0),
                    'workspace_id' => Auth::user()->current_workspace
                ];
                DB::table('productwarehouse')->insertGetId($dataProductWarehouse);
            }

            $result['status'] = true;
            $result['id'] = $id;
        } else {
            $result['status'] = false;
        }

        return $result;
    }

    public function deleteChangeWarehouse($id)
    {
        $status = [];

        $changeWarehouse = ChangeWarehouse::where('id', $id)->first();
        if ($changeWarehouse) {
            // Cộng lại hàng vào kho cũ
            $checkProductWarehouse = ProductWarehouse::where('product_id',$changeWarehouse->product_id)
            ->where('warehouse_id',$changeWarehouse->from_warehouse)
            ->where('workspace_id',Auth::user()->current_workspace)->first();
            if($checkProductWarehouse){
                $checkProductWarehouse->qty = $checkProductWarehouse->qty + $changeWarehouse->qty;
                $checkProductWarehouse->save();
            }else{
                $dataProductWarehouse = [
                    'product_id' => $changeWarehouse->product_id,
                    'warehouse_id' => $changeWarehouse->from_warehouse,
                    'qty' => $changeWarehouse->qty ,
                    'workspace_id' => Auth::user()->current_workspace
                ];
                DB::table('productwarehouse')->insertGetId($dataProductWarehouse);
            }

            // Trừ số lượng sản phẩm kho cũ
            $getProductWarehosue = ProductWarehouse::where('product_id', $changeWarehouse->product_id)
            ->where('warehouse_id',$changeWarehouse->to_warehouse)
            ->where('workspace_id',Auth::user()->current_workspace)
            ->first();
            if($getProductWarehosue){
                $getProductWarehosue->qty = $getProductWarehosue->qty - $changeWarehouse->qty;
                $getProductWarehosue->save();
            }

            ChangeWarehouse::where('id', $changeWarehouse->id)->delete();
            $status['status'] = true;
        } else {
            $status['status'] = false;
        }
        return $status;
    }
}
