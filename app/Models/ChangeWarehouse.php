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

        // dd($data);
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
            'quoteImport_id' => $data['quoteImport_id'],
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
            ChangeWarehouse::where('id', $changeWarehouse->id)->delete();
            $status['status'] = true;
        } else {
            $status['status'] = false;
        }
        return $status;
    }
}
