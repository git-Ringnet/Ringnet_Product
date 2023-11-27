<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillSale extends Model
{
    use HasFactory;
    protected $fillable = [
        'detailexport_id',
        'guest_id',
        'price_total',
        'status',
        'number_bill',
    ];
    protected $table = 'bill_sale';

    public function getBillSale()
    {
        $bill_sale = BillSale::leftJoin('detailexport', 'bill_sale.detailexport_id', 'detailexport.id')
            ->leftJoin('guest', 'bill_sale.guest_id', 'guest.id')
            ->select('*', 'bill_sale.status as tinhTrang', 'bill_sale.id as idHD')
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
        if (isset($data['date_bill'])) {
            $date_bill = $data['date_bill'];
        } else {
            $date_bill = null;
        }
        if (isset($data['number_bill'])) {
            $number_bill = $data['number_bill'];
        } else {
            $number_bill = null;
        }
        $dataBill = [
            'detailexport_id' => $data['detailexport_id'],
            'guest_id' => $data['guest_id'],
            'price_total' => $tolal_all,
            'status' => 1,
            'created_at' => $date_bill,
            'number_bill' =>  $number_bill,
        ];
        $bill_sale = new BillSale($dataBill);
        $bill_sale->save();
        $detaiExport = DetailExport::where('id', $data['detailexport_id'])->first();
        if ($detaiExport) {
            $detaiExport->update([
                'status' => 2,
            ]);
        }
        return $bill_sale->id;
    }
    public function updateDetailExport($detailexport_id)
    {
        $quoteExports = QuoteExport::where('detailexport_id', $detailexport_id)->get();

        // Biến để kiểm tra xem có ít nhất một giá trị nào lớn hơn 0 không
        $hasNonZeroDifference = false;

        foreach ($quoteExports as $quoteExport) {
            $product_id = $quoteExport->product_id;

            // Lấy tất cả các bản ghi delivered có product_id tương ứng và status = 2 từ bảng Delivery
            $deliveriesForProduct = productBill::join('bill_sale', 'bill_sale.id', '=', 'product_bill.billSale_id')
                ->where('product_bill.product_id', $product_id)
                ->where('bill_sale.status', 2)
                ->get();

            // Tính tổng billSale_qty
            $totalDeliveredQty = $deliveriesForProduct->sum('billSale_qty');
            $productQty = bcsub($quoteExport->product_qty, '0', 4);

            // So sánh tổng billSale_qty với product_qty
            if (bccomp($totalDeliveredQty, $productQty, 4) !== 0) {
                $hasNonZeroDifference = true;
                break;
            }
        }

        $detailExport = DetailExport::where('id', $detailexport_id)->first();

        if ($detailExport) {
            if ($hasNonZeroDifference) {
                $detailExport->update([
                    'status_reciept' => 3,
                ]);
            } else {
                $detailExport->update([
                    'status_reciept' => 2,
                ]);
            }
        }
    }
}
