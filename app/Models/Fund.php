<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fund extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'amount',
        'bank_name',
        'bank_account_number',
        'bank_account_holder',
        'start_date',
        'end_date',
    ];
}
