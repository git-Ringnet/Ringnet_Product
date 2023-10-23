<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuoteExport extends Model
{
    use HasFactory;
    protected $fillable = [
        'detailexport_id',
        'product_id',
    ];
}
