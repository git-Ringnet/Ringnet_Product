<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class History extends Model
{
    protected $table = 'history';
    protected $fillable = [
        'id',
        'detailimport_id', 'detailexport_id', 'delivered_id', 'provide_id',
        'tax_import', 'price_import', 'total_import', 'history_import', 'workspace_id', 'hdv', 'hdr'
    ];
    use HasFactory;
    public function getAllHistory()
    {
        $history = History::leftJoin('delivered', 'history.delivered_id', 'delivered.id')
            ->leftJoin('delivery', 'delivery.id', 'delivered.delivery_id')
            ->leftJoin('products', 'products.id', 'delivered.product_id')
            ->leftJoin('history_import', 'history_import.id', 'history.history_import')
            ->leftJoin('detailexport', 'history.detailexport_id', 'detailexport.id')
            ->leftJoin('bill_sale', 'bill_sale.detailexport_id', 'history.detailexport_id')
            ->leftJoin('detailimport', 'detailimport.id', 'history.detailimport_id')
            ->leftJoin('pay_export', 'pay_export.detailexport_id', 'detailexport.id')
            // ->leftJoin('reciept', 'reciept.detailimport_id', 'history.detailimport_id')
            ->leftJoin('pay_order', 'pay_order.detailimport_id', 'history.detailimport_id')
            ->leftJoin('provides', 'provides.id', 'history.provide_id')
            ->leftJoin('guest', 'guest.id', 'detailexport.guest_id')
            ->where('delivery.status', 2)
            ->where('history.workspace_id', Auth::user()->current_workspace)
            ->select(
                'delivered.*',
                'delivery.*',
                // 'delivered.price_export as giaban',
                'delivered.created_at as time',
                'delivered.deliver_qty as slXuat',
                'products.product_name as tensp',
                'history_import.*',
                'history_import.price_export as gianhap',
                'history_import.product_qty as slNhap',
                'detailexport.reference_number as POxuat',
                'detailexport.total_price as giaXuat',
                'detailexport.total_tax as VATXuat',
                'detailexport.quotation_number as HDXuat',
                'products.product_tax as thueXuat',
                'detailexport.*',
                'history.hdr as hdra',
                'history.hdv as hdvao',
                'history.price_import as trcVat',
                DB::raw('delivered.price_export * delivered.deliver_qty as giaban'),
                DB::raw('CASE 
                    WHEN products.product_tax = 99 THEN delivered.price_export * delivered.deliver_qty 
                    ELSE (products.product_tax * delivered.price_export * delivered.deliver_qty) / 100 
                END as thueXuatCalculated'),
                DB::raw('delivered.price_export * delivered.deliver_qty + CASE 
                    WHEN products.product_tax = 99 THEN delivered.price_export * delivered.deliver_qty 
                    ELSE (products.product_tax * delivered.price_export * delivered.deliver_qty) / 100 
                END as thanhtienxuat'),
                DB::raw('history_import.product_qty * history.price_import as tienThue'),
                DB::raw('CASE 
                    WHEN products.product_tax = 99 THEN history.price_import * history_import.product_qty 
                    ELSE (products.product_tax * history.price_import * history_import.product_qty) / 100 
                END as thueNhapCalculated'),
                DB::raw('history.price_import * history_import.product_qty + CASE 
                    WHEN products.product_tax = 99 THEN history.price_import * history_import.product_qty 
                    ELSE (products.product_tax * history.price_import * history_import.product_qty) / 100 
                END as thanhtiennhap'),
                'history.total_import as sauVat',
                'bill_sale.created_at as ngayHDxuat',
                'pay_export.payment_day as ngayTTxuat',
                'pay_export.payment_type as HTTTxuat',
                'detailexport.status_pay as status_pay',
                'guest.guest_name_display as tenKhach',
                'provides.provide_name_display as tenNCC',
                'products.product_guarantee as baoHanh',
                'detailimport.reference_number as POnhap',
                'detailimport.created_at as ngayHDnhap',
                'detailimport.status_pay as TTnhap',
                'pay_order.payment_day as ngayTT',
                'pay_order.payment_type as HTTT',
                'history.*',
                'history.id',
                DB::raw('delivered.deliver_qty * delivered.price_export AS tongban'),
            )->distinct()->get();
        // dd($history);
        return $history;
    }
    public function getProductToId($id_delivery, $idproduct)
    {
        $product = Delivery::join('quoteexport', 'delivery.detailexport_id', '=', 'quoteexport.detailexport_id')
            ->leftJoin('delivered', function ($join) {
                $join->on('delivered.delivery_id', '=', 'delivery.id');
                $join->on('delivered.product_id', '=', 'quoteexport.product_id');
            })
            ->join('products', 'products.id', 'delivered.product_id')
            ->where('delivery.id', $id_delivery)
            ->where('delivered.product_id', $idproduct)
            ->select(
                'quoteexport.product_id',
                'quoteexport.product_code',
                'quoteexport.product_name',
                'quoteexport.product_unit',
                'quoteexport.product_note',
                'quoteexport.product_note',
                'quoteexport.price_export',
                'quoteexport.product_ratio',
                'products.product_inventory',
                'quoteexport.product_tax',
                'quoteexport.price_import',
                'quoteexport.product_total',
                'delivered.deliver_qty',
                'delivery.created_at as ngayGiao'
            )
            ->groupBy(
                'quoteexport.product_code',
                'quoteexport.product_name',
                'quoteexport.product_unit',
                'delivered.deliver_qty',
                'products.product_inventory',
                'quoteexport.product_id',
                'quoteexport.product_note',
                'quoteexport.price_export',
                'quoteexport.product_ratio',
                'quoteexport.product_tax',
                'quoteexport.price_import',
                'quoteexport.product_total',
                'delivery.created_at'
            )
            ->get();
        return $product;
    }
    public function addHistory($data)
    {
        return self::create($data);
    }
    public function updateHistory($id, $data)
    {
        $history = self::find($id);
        if ($history) {
            $history->update($data);
            return $history;
        }
        return null;
    }
    public function updateHdr($billsaleid, $detailexport_id, $number_bill)
    {
        $history = History::leftJoin('history_import', 'history_import.id', 'history.history_import')
            ->leftJoin('product_bill', 'product_bill.product_id', 'history_import.product_id')
            ->leftJoin('bill_sale', 'bill_sale.id', 'product_bill.billSale_id')
            ->where('bill_sale.id', $billsaleid)
            ->where('history.detailexport_id', $detailexport_id)
            ->select('history.*')
            ->get();
        foreach ($history as $key => $value) {
            $value->update([
                'hdr' => $number_bill
            ]);
        }
        return $history;
    }
    public function updateHdv($reciept_id, $detaiImportId, $number_bill)
    {
        $history = History::leftJoin('history_import', 'history_import.id', 'history.history_import')
            ->leftJoin('products_import', 'products_import.product_id', 'history_import.product_id')
            ->leftJoin('reciept', 'reciept.id', 'products_import.reciept_id')
            ->where('reciept.id', $reciept_id)
            ->where('history.detailimport_id', $detaiImportId)
            ->select('history.*')
            ->get();
        dd($history);
        foreach ($history as $key => $value) {
            $value->update([
                'hdr' => $number_bill
            ]);
        }
        return $history;
    }
    public function ajax($data)
    {
        $history = History::leftJoin('delivered', 'history.delivered_id', 'delivered.id')
            ->leftJoin('delivery', 'delivery.id', 'delivered.delivery_id')
            ->leftJoin('products', 'products.id', 'delivered.product_id')
            ->leftJoin('history_import', 'history_import.id', 'history.history_import')
            ->leftJoin('detailexport', 'history.detailexport_id', 'detailexport.id')
            ->leftJoin('bill_sale', 'bill_sale.detailexport_id', 'history.detailexport_id')
            ->leftJoin('detailimport', 'detailimport.id', 'history.detailimport_id')
            ->leftJoin('pay_export', 'pay_export.detailexport_id', 'detailexport.id')
            // ->leftJoin('reciept', 'reciept.detailimport_id', 'history.detailimport_id')
            ->leftJoin('pay_order', 'pay_order.detailimport_id', 'history.detailimport_id')
            ->leftJoin('provides', 'provides.id', 'history.provide_id')
            ->leftJoin('guest', 'guest.id', 'detailexport.guest_id')
            ->where('delivery.status', 2)
            ->where('history.workspace_id', Auth::user()->current_workspace)
            ->select(
                'delivered.*',
                'delivery.*',
                // 'delivered.price_export as giaban',
                'delivered.created_at as time',
                'delivered.deliver_qty as slXuat',
                'products.product_name as tensp',
                'history_import.*',
                'history_import.price_export as gianhap',
                'history_import.product_qty as slNhap',
                'detailexport.reference_number as POxuat',
                'detailexport.total_price as giaXuat',
                'detailexport.total_tax as VATXuat',
                'detailexport.quotation_number as HDXuat',
                'products.product_tax as thueXuat',
                'detailexport.*',
                'history.hdr as hdra',
                'history.hdv as hdvao',
                'history.price_import as trcVat',
                DB::raw('delivered.price_export * delivered.deliver_qty as giaban'),
                DB::raw('CASE 
                    WHEN products.product_tax = 99 THEN delivered.price_export * delivered.deliver_qty 
                    ELSE (products.product_tax * delivered.price_export * delivered.deliver_qty) / 100 
                END as thueXuatCalculated'),
                DB::raw('delivered.price_export * delivered.deliver_qty + CASE 
                    WHEN products.product_tax = 99 THEN delivered.price_export * delivered.deliver_qty 
                    ELSE (products.product_tax * delivered.price_export * delivered.deliver_qty) / 100 
                END as thanhtienxuat'),
                DB::raw('history_import.product_qty * history.price_import as tienThue'),
                DB::raw('CASE 
                    WHEN products.product_tax = 99 THEN history.price_import * history_import.product_qty 
                    ELSE (products.product_tax * history.price_import * history_import.product_qty) / 100 
                END as thueNhapCalculated'),
                DB::raw('history.price_import * history_import.product_qty + CASE 
                    WHEN products.product_tax = 99 THEN history.price_import * history_import.product_qty 
                    ELSE (products.product_tax * history.price_import * history_import.product_qty) / 100 
                END as thanhtiennhap'),
                'history.total_import as sauVat',
                'bill_sale.created_at as ngayHDxuat',
                'pay_export.payment_day as ngayTTxuat',
                'pay_export.payment_type as HTTTxuat',
                'detailexport.status_pay as status_pay',
                'guest.guest_name_display as tenKhach',
                'provides.provide_name_display as tenNCC',
                'products.product_guarantee as baoHanh',
                'detailimport.reference_number as POnhap',
                'detailimport.created_at as ngayHDnhap',
                'detailimport.status_pay as TTnhap',
                'pay_order.payment_day as ngayTT',
                'pay_order.payment_type as HTTT',
                'history.*',
                'history.id',
                DB::raw('delivered.deliver_qty * delivered.price_export AS tongban'),
            )->distinct();

        if (isset($data['search'])) {
            $seri = new Serialnumber();
            $product = array();
            $product = $seri->getProductIdsHistory($data['search']);
            // dd($product);
            $history = $history->where(function ($query) use ($data, $product) {
                $query->orWhere('products.product_name', 'like', '%' . $data['search'] . '%');
                $query->orWhere('guest.guest_name_display', 'like', '%' . $data['search'] . '%');
                $query->orWhere('detailimport.reference_number', 'like', '%' . $data['search'] . '%');
                $query->orWhere('detailexport.reference_number', 'like', '%' . $data['search'] . '%');
                $query->orWhere('provides.provide_name_display', 'like', '%' . $data['search'] . '%');
                $query->orWhereIn('delivered.id', $product);
            });
        }
        if (isset($data['provides'])) {
            $history = $history->where('provides.provide_name_display', 'like', '%' . $data['provides'] . '%');
        }
        if (isset($data['guests'])) {
            $history = $history->where('guest.guest_name_display', 'like', '%' . $data['guests'] . '%');
        }
        if (isset($data['tensp'])) {
            $history = $history->where('products.product_name', 'like', '%' . $data['tensp'] . '%');
        }
        if (isset($data['hdvao'])) {
            $history = $history->having('hdvao', 'like', '%' . $data['hdvao'] . '%');
        }
        if (isset($data['hdra'])) {
            $history = $history->having('hdra', 'like', '%' . $data['hdra'] . '%');
        }
        if (isset($data['BH'])) {
            $history = $history->where('products.product_guarantee', 'like', '%' . $data['BH'] . '%');
        }
        // Nhập
        if (isset($data['POnhap'])) {
            $history = $history->where('detailimport.reference_number', 'like', '%' . $data['POnhap'] . '%');
        }
        if (isset($data['HTTTN'])) {
            $history = $history->where('pay_order.payment_type', 'like', '%' . $data['HTTTN'] . '%');
        }
        if (isset($data['slnhap'][0]) && isset($data['slnhap'][1])) {
            $history = $history->where('history_import.product_qty', $data['slnhap'][0], $data['slnhap'][1]);
        }
        if (isset($data['trcVATN'][0]) && isset($data['trcVATN'][1])) {
            $history = $history->having('tienThue', $data['trcVATN'][0], $data['trcVATN'][1]);
        }
        if (isset($data['VATN'][0]) && isset($data['VATN'][1])) {
            $history = $history->having('thueNhapCalculated', $data['VATN'][0], $data['VATN'][1]);
        }
        if (isset($data['sauVATN'][0]) && isset($data['sauVATN'][1])) {
            $history = $history->having('thanhtiennhap', $data['sauVATN'][0], $data['sauVATN'][1]);
        }
        if (isset($data['TTN'])) {
            $history = $history->whereIn('detailimport.status_pay', $data['TTN']);
        }
        // Xuất
        if (isset($data['POxuat'])) {
            $history = $history->where('detailexport.reference_number', 'like', '%' . $data['POxuat'] . '%');
        }
        if (isset($data['HTTTX'])) {
            $history = $history->where('pay_export.payment_type', 'like', '%' . $data['HTTTX'] . '%');
        }
        if (isset($data['slxuat'][0]) && isset($data['slxuat'][1])) {
            $history = $history->where('delivered.deliver_qty', $data['slxuat'][0], $data['slxuat'][1]);
        }
        if (isset($data['trcVATX'][0]) && isset($data['trcVATX'][1])) {
            $history = $history->having('giaban', $data['trcVATX'][0], $data['trcVATX'][1]);
        }
        if (isset($data['VATX'][0]) && isset($data['VATX'][1])) {
            $history = $history->having('thueXuatCalculated', $data['VATX'][0], $data['VATX'][1]);
        }
        if (isset($data['sauVATX'][0]) && isset($data['sauVATX'][1])) {
            $history = $history->having('thanhtienxuat', $data['sauVATX'][0], $data['sauVATX'][1]);
        }
        if (isset($data['TTX'])) {
            $history = $history->whereIn('detailexport.status_pay', $data['TTX']);
        }

        // dd($data);
        if (isset($data['sort']) && isset($data['sort'][0])) {
            $history = $history->orderBy($data['sort'][0], $data['sort'][1]);
        }
        $history = $history->get();
        return $history;
    }
}
