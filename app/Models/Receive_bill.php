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

    public function addReceiveBill($data, $id)
    {
        // dd($data['listProduct']);
        $detail =  DetailImport::findOrFail($id);
        if ($detail) {
            $dataReceive = [
                'detailimport_id' => $id,
                'quotation_number' => $data['quotation_number'],
                // 'provide_id' => $data['provides_id'],
                'provide_id' => $detail->provide_id,
                'status' => 1,
                'created_at' => Carbon::now(),
            ];
            $receive_id = DB::table($this->table)->insertGetId($dataReceive);
            for ($i = 0; $i < count($data['listProduct']); $i++) {
                $dataupdate = [
                    'receive_id' => $receive_id,
                ];
                DB::table('quoteimport')->where('id', $data['listProduct'][$i])->update($dataupdate);
            }
            return $receive_id;
        }
    }
    public function updateReceive($data,$id){
        $dataUpdate =[
            'status' => 2,
        ];
        DB::table($this->table)->where('id',$id)->update($dataUpdate);
    }
}
