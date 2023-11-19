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
            if ($data['product_id'][$i] != null) {
                $quoteExport = QuoteExport::where('product_id', $data['product_id'][$i])->first();
                if ($quoteExport) {
                    $quoteExport->qty_bill_sale += $data['product_qty'][$i];
                    $quoteExport->save();
                }
            }
        }
        $dataBill = [
            'detailexport_id' => $data['detailexport_id'],
            'delivery_id' => $data['delivery_id'],
            'guest_id' => $data['guest_id'],
            'price_total' => $tolal_all,
            'status' => 1,
            'created_at' => $data['date_bill'],
        ];
        $bill_sale = new BillSale($dataBill);
        $bill_sale->save();
        // Lấy tất cả các bản ghi từ bảng QuoteExport theo điều kiện
        $quoteExports = QuoteExport::where('detailexport_id', $data['detailexport_id'])->get();

        // Biến để kiểm tra xem có ít nhất một giá trị nào lớn hơn 0 không
        $hasNonZeroDifference = false;

        foreach ($quoteExports as $quoteExport) {
            $productQty = bcsub($quoteExport->product_qty, '0', 4);
            $qtyBill = bcsub($quoteExport->qty_bill_sale, '0', 4);

            if (bccomp($productQty, $qtyBill, 4) !== 0) {
                $hasNonZeroDifference = true;
                break;
            }
        }

        // Nếu có ít nhất một giá trị nào đó không bằng 0, cập nhật 'status_reciept' thành 3
        if ($hasNonZeroDifference) {
            $detailExport = DetailExport::where('id', $data['detailexport_id'])->first();
            if ($detailExport) {
                $detailExport->update([
                    'status_reciept' => 3,
                ]);
            }
        } else {
            // Nếu tất cả đều bằng 0, cập nhật 'status_reciept' thành 2
            $detailExport = DetailExport::where('id', $data['detailexport_id'])->first();
            if ($detailExport) {
                $detailExport->update([
                    'status_reciept' => 2,
                ]);
            }
        }
        return $bill_sale;
    }
}
