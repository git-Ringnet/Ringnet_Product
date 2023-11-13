<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillSale extends Model
{
    use HasFactory;
    protected $fillable = [
        'detailexport_id',
        'delivery_id',
        'guest_id',
        'price_total',
        'status',
    ];
    protected $table = 'bill_sale';

    public function getBillSale()
    {
        $bill_sale = BillSale::leftJoin('detailexport', 'bill_sale.detailexport_id', 'detailexport.id')
            ->leftJoin('guest', 'bill_sale.guest_id', 'guest.id')
            ->get();
        return $bill_sale;
    }
    public function addBillSale($data)
    {
        $totalBeforeTax = 0;
        $totalTax = 0;
        for ($i = 0; $i < count($data['product_code']); $i++) {
            $price = str_replace(',', '', $data['product_price'][$i]);
            $subtotal = $data['product_qty'][$i] * (float) $price;
            $subTax = ($subtotal * $data['product_tax'][$i]) / 100;
            $totalBeforeTax += $subtotal;
            $totalTax += $subTax;
            $tolal_all = $totalTax + $totalBeforeTax;
        }
        $dataBill = [
            'detailexport_id' => $data['detailexport_id'],
            'delivery_id' => $data['delivery_id'],
            'guest_id' => $data['guest_id'],
            'price_total' => $tolal_all,
            'status' => 1,
            'created_at' => $data['date_bill'],
        ];
        $detailExport = DetailExport::where('id', $data['detailexport_id'])->first();
        if ($detailExport) {
            $detailExport->update([
                'status_receive' => 2,
            ]);
        }
        $delivery = Delivery::where('id', $data['delivery_id'])->first();
        if ($delivery) {
            $delivery->update([
                'status' => 2,
            ]);
        }
        $bill_sale = new BillSale($dataBill);
        $bill_sale->save();
        return $bill_sale;
    }
}
