<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Serialnumber extends Model
{
    use HasFactory;
    protected $fillable = [
        'serinumber',
        'detailimport_id',
        'detailexport_id',
        'product_id',
        'status',
    ];
}
