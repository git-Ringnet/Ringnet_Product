<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCode extends Model
{
    use HasFactory;
    protected $table = 'product_code';
    protected $fillable = [
        'product_code',
    ];
}
