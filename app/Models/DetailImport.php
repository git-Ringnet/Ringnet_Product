<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DetailImport extends Model
{
    use HasFactory;
    protected $table = 'detailimport';
    protected $fillable = [
        'provide_id',
        'project_id',
        'product_id',
        'user_id',
        'quotation_number',
        'reference_number',
        'price_effect',
        'status',
    ];


    public function getAllImport()
    {
        return DB::table($this->table)->get();
    }
    public function addImport($data)
    {
        $total = 0;
        for ($i = 0; $i < count($data['product_code']); $i++) {
            $total +=  $data['product_qty'][$i] * $data['total_price'][$i];
        }
        $dataImport = [
            'provide_id' => $data['provides_id'],
            'project_id' => $data['project_id'],
            'product_id' => 1,
            'user_id' => 1,
            'quotation_number' => $data['quotation_number'],
            'reference_number' => $data['reference_number'],
            'price_effect' => $data['price_effect'],
            'status' => 1,
            'warehouse_id' => 1,
            'created_at' => $data['date_quote'],
            'total_price' => $total,
            'terms_pay' => $data['terms_pay']
        ];
        $result = DB::table($this->table)->insertGetId($dataImport);
        return  $result;
    }
}
