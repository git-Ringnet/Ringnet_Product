<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuoteImport extends Model
{
    use HasFactory;
    protected $fillable = [
        'detailimport_id',
        'product_id',
    ];
}
