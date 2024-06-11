<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChangeInventory extends Model
{
    use HasFactory;

    protected $table = 'change_inventory';

    protected $fillable = [
        'product_name',
        'product_id',
        'status',
        'qty',
        'warehouse_id',
        'created_at',
        'updated_at'
    ];

}
