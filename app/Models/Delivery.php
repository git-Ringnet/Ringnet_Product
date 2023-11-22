<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    use HasFactory;
    protected $fillable = [
        'guest_id',
        'quotation_number',
        'shipping_unit',
        'shipping_fee',
        'detailexport_id',
        'status',
    ];
    protected $table = 'delivery';

    public function addDelivery($data)
    {
        $shipping_fee = $data['shipping_fee'];
        if ($shipping_fee !== null) {
            $shipping_fee = str_replace(',', '', $shipping_fee);
        }
        $dataDelivery = [
            'guest_id' => $data['guest_id'],
            'quotation_number' => $data['quotation_number'],
            'shipping_unit' => $data['shipping_unit'],
            'shipping_fee' => $shipping_fee,
            'detailexport_id' => $data['detailexport_id'],
            'status' => 1,
            'created_at' => $data['date_deliver'],
        ];
        $detaiExport = DetailExport::where('id', $data['detailexport_id'])->first();
        if ($detaiExport) {
            $detaiExport->update([
                'status' => 2,
            ]);
        }
        $delivery = new Delivery($dataDelivery);
        $delivery->save();
        $detailexportId = $delivery->id;
        QuoteExport::where('detailexport_id', $data['detailexport_id'])
            ->update(['deliver_id' => $detailexportId]);
        return $delivery->id;
    }
}
