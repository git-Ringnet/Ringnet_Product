<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Reciept extends Model
{
    use HasFactory;
    protected $table = 'reciept';
    protected $fillable = [
        'detailimport_id',
        'receive_id',
        'provide_id',
        'status',
        'price_total'
    ];
    public function getProvideName()
    {
        return $this->hasOne(Provides::class, 'id', 'provide_id');
    }
    public function getQuotation()
    {
        return $this->hasOne(DetailImport::class, 'id', 'detailimport_id');
    }
    public function addReciept($data, $id)
    {
        $total = 0;
        $product_id = 0;
        if ($id == "") {
            $receive_id = Receive_bill::findOrFail($data['detailimport_id']);
            $product_id = $receive_id->id;
        } else {
            $product_id = $id;
            $receive_id = Receive_bill::findOrFail($id);
        }
        if ($receive_id) {
            $detail = DetailImport::findOrFail($receive_id->detailimport_id);
            $receive_id->status = 2;
            $receive_id->save();
        }
        $product = QuoteImport::where('receive_id', $product_id)->get();
        foreach ($product as $item) {
            if ($item->product_ratio > 0 && $item->price_import > 0) {
                $total += (($item->product_ratio + 100) * $item->price_import / 100) * $item->product_qty;
            } else {
                $total += $item->product_qty * $item->price_export;
            }
        }
        $dataReciept = [
            'detailimport_id' => $detail->id,
            'receive_id' => $product_id,
            'provide_id' => $detail->provide_id,
            'status' => 1,
            'price_total' => $total,
            'created_at' => Carbon::now(),
        ];
        DB::table($this->table)->insert($dataReciept);
    }
}
