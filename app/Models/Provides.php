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

}
