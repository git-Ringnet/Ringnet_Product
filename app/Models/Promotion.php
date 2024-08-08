<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;
    protected $table = 'promotions';
    protected $fillable = [
        'name',
        'guest_id',
        'quoteE_id',
        'description',
        'type',
        'cash_value',
        'gold_value',
        'product_quantity',
        'total',
        'month', 'status'
    ];
    public function guest()
    {
        return $this->belongsTo(Guest::class);
    }

    // Định nghĩa quan hệ với model QuoteE
    public function quoteE()
    {
        return $this->belongsTo(QuoteExport::class);
    }
}
