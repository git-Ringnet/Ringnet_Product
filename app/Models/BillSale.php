<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BillSale extends Model
{
    use HasFactory;
    protected $fillable = [
        'detailexport_id',
        'guest_id',
        'price_total',
        'status',
        'number_bill',
        'created_at',
        'updated_at'
    ];
    protected $table = 'bill_sale';

    public function getBillSale()
    {
        $bill_sale = BillSale::leftJoin('detailexport', 'bill_sale.detailexport_id', 'detailexport.id')
            ->leftJoin('guest', 'bill_sale.guest_id', 'guest.id')
            ->select('*', 'bill_sale.status as tinhTrang', 'bill_sale.id as idHD', 'bill_sale.created_at as ngayHD')
            ->get();
        return $bill_sale;
    }

    public function checkSL($data)
    {
        $bill_sale = DetailExport::leftJoin('quoteexport', 'quoteexport.detailexport_id', 'detailexport.id')
            ->select('*', 'detailexport.id as maXuat')
            ->selectRaw('COALESCE(quoteexport.product_qty, 0) - COALESCE(quoteexport.qty_bill_sale, 0) as soLuong')
            ->where('detailexport.id', $data['detailexport_id'])
            ->whereRaw('COALESCE(quoteexport.product_qty, 0) - COALESCE(quoteexport.qty_bill_sale, 0) > 0')
            ->get();
        $check = !$bill_sale->isEmpty();
        return $check;
    }

    public function addBillSale($data)
    {
        $totalBeforeTax = 0;
        $totalTax = 0;
        for ($i = 0; $i < count($data['product_name']); $i++) {
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
            'updated_at' => $date_bill,
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
                ->where('bill_sale.detailexport_id', $detailexport_id)
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
                if ($detailExport->status_receive == 2 && $detailExport->status_reciept == 2 && $detailExport->status_pay == 2) {
                    $detailExport->update([
                        'status' => 3,
                    ]);
                }
            }
        }
    }
    public function getAttachment($name)
    {
        return $this->hasMany(Attachment::class, 'table_id', 'idHD')->where('table_name', $name)->get();
    }
    public function getProductDelivery($idQuote)
    {
        $delivery = DetailExport::leftJoin('quoteexport', 'quoteexport.detailexport_id', 'detailexport.id')
            ->where('detailexport.id', $idQuote)
            ->select('*')
            ->selectRaw('COALESCE(quoteexport.product_qty, 0) - COALESCE(quoteexport.qty_bill_sale, 0) as soLuongHoaDon')
            ->whereRaw('COALESCE(quoteexport.product_qty, 0) - COALESCE(quoteexport.qty_bill_sale, 0) > 0')
            ->get();
        return $delivery;
    }
    public function deleteBillSale($data, $id)
    {
        $billSale = BillSale::find($id);
        for ($i = 0; $i < count($data['product_name']); $i++) {
            if (!empty($data['product_id'][$i])) {
                QuoteExport::where('detailexport_id', $billSale->detailexport_id)
                    ->where('product_id', $data['product_id'][$i])
                    ->update([
                        'qty_bill_sale' => 0,
                    ]);
            }
        }
        if ($billSale->status == 1) {
            productBill::where('billSale_id', $id)->delete();
        } elseif ($billSale->status == 2) {
            productBill::where('billSale_id', $id)->delete();
            $BillCount = productBill::where('bill_sale.detailexport_id', $billSale->detailexport_id)
                ->leftJoin('bill_sale', 'product_bill.billSale_id', 'bill_sale.id')
                ->where('bill_sale.status', 2)
                ->count();
            if ($BillCount > 0) {
                DetailExport::where('id', $billSale->detailexport_id)
                    ->update([
                        'status_reciept' => 3,
                    ]);
            } else {
                DetailExport::where('id', $billSale->detailexport_id)
                    ->update([
                        'status_reciept' => 1,
                    ]);
            }
        }
        $BillCount = productBill::where('bill_sale.detailexport_id', $billSale->detailexport_id)
            ->leftJoin('bill_sale', 'product_bill.billSale_id', 'bill_sale.id')
            ->count();
        $deliveredCount = Delivered::where('delivery.detailexport_id', $billSale->detailexport_id)
            ->leftJoin('delivery', 'delivered.delivery_id', 'delivery.id')
            ->count();
        $PayCount = productPay::where('pay_export.detailexport_id', $billSale->detailexport_id)
            ->leftJoin('pay_export', 'product_pay.pay_id', 'pay_export.id')
            ->count();
        if ($deliveredCount == 0 && $BillCount == 0 && $PayCount == 0) {
            DetailExport::where('id', $billSale->detailexport_id)
                ->update([
                    'status' => 1,
                ]);
        } else {
            DetailExport::where('id', $billSale->detailexport_id)
                ->update([
                    'status' => 2,
                ]);
        }
        BillSale::find($id)->delete();
    }
    public function acceptBillSale($data)
    {
        $totalBeforeTax = 0;
        $totalTax = 0;
        for ($i = 0; $i < count($data['product_name']); $i++) {
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
        //add bill sale
        $dataBill = [
            'detailexport_id' => $data['detailexport_id'],
            'guest_id' => $data['guest_id'],
            'price_total' => $tolal_all,
            'status' => 2,
            'created_at' => $date_bill,
            'updated_at' => $date_bill,
            'number_bill' =>  $number_bill,
        ];
        $bill_sale = new BillSale($dataBill);
        $bill_sale->save();
        //approve
        $detaiExport = DetailExport::where('id', $data['detailexport_id'])->first();
        if ($detaiExport) {
            $detaiExport->update([
                'status' => 2,
            ]);
        }
        //add product_bill
        for ($i = 0; $i < count($data['product_name']); $i++) {
            if ($data['product_id'][$i] != null) {
                $quoteExport = QuoteExport::where('product_id', $data['product_id'][$i])
                    ->where('detailexport_id', $data['detailexport_id'])
                    ->first();
                if ($quoteExport) {
                    $quoteExport->qty_bill_sale += $data['product_qty'][$i];
                    $quoteExport->save();
                }
            }

            $dataBill = [
                'billSale_id' => $bill_sale->id,
                'product_id' => $data['product_id'][$i],
                'billSale_qty' => $data['product_qty'][$i],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
            DB::table('product_bill')->insert($dataBill);
        }
        //cập nhật
        $quoteExports = QuoteExport::where('detailexport_id', $data['detailexport_id'])->get();

        // Biến để kiểm tra xem có ít nhất một giá trị nào lớn hơn 0 không
        $hasNonZeroDifference = false;

        foreach ($quoteExports as $quoteExport) {
            $product_id = $quoteExport->product_id;

            // Lấy tất cả các bản ghi delivered có product_id tương ứng và status = 2 từ bảng Delivery
            $deliveriesForProduct = productBill::join('bill_sale', 'bill_sale.id', '=', 'product_bill.billSale_id')
                ->where('product_bill.product_id', $product_id)
                ->where('bill_sale.detailexport_id', $data['detailexport_id'])
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

        $detailExport = DetailExport::where('id', $data['detailexport_id'])->first();

        if ($detailExport) {
            if ($hasNonZeroDifference) {
                $detailExport->update([
                    'status_reciept' => 3,
                ]);
            } else {
                $detailExport->update([
                    'status_reciept' => 2,
                ]);
                if ($detailExport->status_receive == 2 && $detailExport->status_reciept == 2 && $detailExport->status_pay == 2) {
                    $detailExport->update([
                        'status' => 3,
                    ]);
                }
            }
        }
    }
}
