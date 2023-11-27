<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class history_Pay_Export extends Model
{
    use HasFactory;
    protected $fillable = [
        'pay_id',
        'total',
        'payment',
        'debt',
    ];
    protected $table = 'history_payment_export';
}
