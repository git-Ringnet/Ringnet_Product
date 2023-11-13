<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DetailExport extends Model
{
    use HasFactory;
    protected $fillable = [
        'guest_id',
        'project_id',
        'product_id',
        'user_id',
        'quotation_number',
        'reference_number',
        'price_effect',
        'status',
        'total_price',
        'terms_pay',
        'total_tax',
        'discount',
        'transfer_fee'
    ];
    protected $table = 'detailexport';

    public function getAllDetailExport()
    {
        $detailExport = DetailExport::leftJoin('guest', 'guest.id', 'detailexport.guest_id')
            ->orderBy('detailexport.id', 'desc')->get();
        return $detailExport;
    }
    public function addExport($data)
    {
        $totalBeforeTax = 0;
        $totalTax = 0;
        $transport = str_replace(',', '', $data['transport_fee']);
        $discount = str_replace(',', '', $data['discount']);
        for ($i = 0; $i < count($data['product_code']); $i++) {
            $price = str_replace(',', '', $data['product_price'][$i]);
            $subtotal = $data['product_qty'][$i] * (float) $price;
            $subTax = ($subtotal * $data['product_tax'][$i]) / 100;
            $totalBeforeTax += $subtotal;
            $totalTax += $subTax;
        }
        $dataExport = [
            'guest_id' => $data['guest_id'],
            'project_id' => 1,
            'product_id' => 1,
            'user_id' => 1,
            'quotation_number' => $data['quotation_number'],
            'reference_number' => $data['reference_number'],
            'price_effect' => $data['price_effect'],
            'status' => 1,
            'created_at' => $data['date_quote'],
            'total_price' => $totalBeforeTax,
            'terms_pay' => $data['terms_pay'],
            'total_tax' => $totalTax,
            'discount' => $discount,
            'transfer_fee' => $transport,
        ];
        $detailexport = new DetailExport($dataExport);
        $detailexport->save();
        return $detailexport->id;
    }
}
