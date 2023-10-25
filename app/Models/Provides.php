<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Provides extends Model
{
    use HasFactory;
    protected $table = 'provides';
    protected $fillable = [
        'provide_name_display',
        'provide_name',
        'provide_address',
        'provide_code',
        'provide_represent',
        'provide_email',
        'provide_phone',
        'provide_debt',
        'provide_address_delivery',
    ];
    public function getAllProvide(){
        return DB::table($this->table)->get();
    }
    public function addProvide($data){
        $exist = false;
        $provides = DB::table($this->table)->where('provide_code',$data['provide_code'])->first();
        if($provides){
            $exist = true;
        }else{
            $dataProvide = [
                'provide_name_display' => $data['provide_name_display'],
                'provide_name' => $data['provide_name'],
                'provide_address' => $data['provide_address'],
                'provide_code' => $data['provide_code'],
                'provide_represent' => $data['provide_represent'],
                'provide_email' => $data['provide_email'],
                'provide_phone' => $data['provide_phone'],
                'provide_debt' => 0,
                'provide_address_delivery' => $data['provide_address_delivery']
            ];
            $provide_id =  DB::table($this->table)->insert($dataProvide);
            if($provide_id){
                $exist = false;
            }
        }
        return $exist;
    }
}
