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
        'status_receive',
        'status_reciept',
        'status_pay',
        'total_price',
        'terms_pay',
        'total_tax',
        'discount',
        'transfer_fee',
        'amount_owed'
    ];
    protected $table = 'detailexport';

    public function getAllDetailExport()
    {
        $detailExport = DetailExport::leftJoin('guest', 'guest.id', 'detailexport.guest_id')
            ->select('*', 'detailexport.id as maBG')
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
            'user_id' => 1,
            'reference_number' => $data['reference_number'],
            'price_effect' => $data['price_effect'],
            'status' => 1,
            'status_receive' => 1,
            'status_reciept' => 1,
            'status_pay' => 1,
            'created_at' => $data['date_quote'],
            'total_price' => $totalBeforeTax,
            'terms_pay' => $data['terms_pay'],
            'total_tax' => $totalTax,
            'discount' => $discount,
            'transfer_fee' => $transport,
            'amount_owed' => $totalBeforeTax + $totalTax,
        ];
        $detailexport = new DetailExport($dataExport);
        $detailexport->save();
        $updateDetail = DetailExport::find($detailexport->id);
        if ($data['quotation_number'] == null) {
            $updateDetail->update([
                'quotation_number' => $detailexport->id,
            ]);
        } else {
            $updateDetail->update([
                'quotation_number' => $data['quotation_number'],
            ]);
        }
        return $detailexport->id;
    }
    public function getDetailExportToId($id)
    {
        $detailExport = DetailExport::where('detailexport.id', $id)
            ->leftJoin('guest', 'detailexport.guest_id', 'guest.id')
            ->select('*', 'guest.id as maKH', 'detailexport.id as maBG')
            ->first();
        return $detailExport;
    }
    public function getProductToId($id)
    {
        $quoteExport = QuoteExport::where('detailexport.id', $id)
            ->leftJoin('detailexport', 'detailexport.id', 'quoteexport.detailexport_id')
            ->get();
        return $quoteExport;
    }
    public function updateExport($data, $id)
    {
        $detailExport = DetailExport::find($id);
        if ($detailExport) {
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
            $detailExport->update([
                'guest_id' => $data['guest_id'],
                'project_id' => 1,
                'user_id' => 1,
                'quotation_number' => $data['quotation_number'],
                'reference_number' => $data['reference_number'],
                'price_effect' => $data['price_effect'],
                'status' => 1,
                'status_receive' => 1,
                'status_reciept' => 1,
                'status_pay' => 1,
                'created_at' => $data['date_quote'],
                'total_price' => $totalBeforeTax,
                'terms_pay' => $data['terms_pay'],
                'total_tax' => $totalTax,
                'discount' => $discount,
                'transfer_fee' => $transport,
                'amount_owed' => $totalBeforeTax + $totalTax,
            ]);
        }
        return $detailExport->id;
    }
}
