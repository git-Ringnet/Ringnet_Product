<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Serialnumber extends Model
{
    use HasFactory;
    protected $table = 'serialnumber';
    protected $fillable = [
        'serinumber',
        'receive_id',
        'detailimport_id',
        'detailexport_id',
        'product_id',
        'status',
        'delivery_id',
    ];

    public function getQuotation(){
        return $this->hasOne(Delivery::class, 'id', 'delivery_id');
    }

    public function checkSN($data)
    {
        foreach ($data as $value ) {
            foreach ($value as $SN => $productName) {
                $product = Products::where('product_name', $SN)->first();
                if ($product) {
                    $checkSN = Serialnumber::where('product_id', $product->id)->get();
                    foreach ($productName['sn'] as $SN) {
                        foreach($checkSN as $list){
                            if($list->serinumber == $SN){
                                return response()->json(['success' => false, 'msg' => $product->product_name, 'data' => $SN]);
                            }
                        }
                    }
                }
            }
        }
        return response()->json(['success' => true]);
    }
}








