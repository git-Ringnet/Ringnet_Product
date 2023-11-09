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
        $check_status = true;
        $detail =  DetailImport::findOrFail($id);
        if ($detail) {
            $dataReceive = [
                'detailimport_id' => $id,
                'quotation_number' => $data['quotation_number'],
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
            // Cập nhật tình trạng
            $product = QuoteImport::where('detailimport_id', $id)->get();
            foreach ($product as $item) {
                if ($item->receive_id == 0) {
                    $check_status = false;
                }
            }
            if ($check_status) {
                $status_receive = 2;
            } else {
                $status_receive = 1;
            }
            DB::table('detailimport')->where('id', $id)->update([
                'status_receive' => $status_receive
            ]);
            return $receive_id;
        }
    }
    public function updateReceive($data, $id)
    {
        $re = Receive_bill::findOrFail($id);
        $dataUpdate = [
            'status' => 2,
        ];
        DB::table($this->table)->where('id', $id)->update($dataUpdate);
    }
}
