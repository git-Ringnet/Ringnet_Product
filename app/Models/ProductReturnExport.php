<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductReturnExport extends Model
{
    use HasFactory;
    protected $table = 'product_return_export';

    protected $fillable = [
        'return_export_id',
        'product_id',
        'return_qty',
        'price_export',
        'product_total_vat',
        'description',
        'workspace_id',
        'created_at',
        'updated_at',
        'user_id',
        'promotion',
    ];
    public function sumReturnExport()
    {
        $detailReturnExport = ProductReturnExport::leftJoin('return_export', 'product_return_export.return_export_id', 'return_export.id')
            ->leftJoin('delivery', 'delivery.id', 'return_export.delivery_id')->select('*')->get();

        return $detailReturnExport;
    }
}
