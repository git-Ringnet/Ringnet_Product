<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CashReceipt extends Model
{
    use HasFactory;
    protected $table = 'cash_receipts';
    protected $fillable = [
        'receipt_code',
        'date_created',
        'guest_id',
        'payer',
        'amount',
        'content',
        'fund_id',
        'user_id',
        'note',
        'workspace_id'
    ];
    public function guest()
    {
        return $this->belongsTo(Guest::class);
    }

    public function fund()
    {
        return $this->belongsTo(Fund::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function workspace()
    {
        return $this->belongsTo(Workspace::class);
    }
    public function getQuoteCount()
    {
        // Tạo DGH
        $currentDate = Carbon::now()->format('dmY');
        $lastInvoiceNumber =
            CashReceipt::where('workspace_id', Auth::user()->current_workspace)
            ->whereDate('created_at', now())
            ->count() + 1;
        $lastInvoiceNumber = $lastInvoiceNumber !== null ? $lastInvoiceNumber : 1;
        $countFormattedInvoice = str_pad($lastInvoiceNumber, 2, '0', STR_PAD_LEFT);
        $invoicenumber = "PTT{$countFormattedInvoice}-{$currentDate}";
        return $invoicenumber;
    }
    public function getDelivery($data)
    {
        $deliveries = Delivery::leftJoin('detailexport', 'detailexport.id', 'delivery.detailexport_id')
            ->leftJoin('guest', 'guest.id', 'delivery.guest_id')
            ->select(
                'delivery.id',
                'delivery.guest_id',
                'delivery.quotation_number',
                'delivery.code_delivery',
                'delivery.shipping_unit',
                'delivery.shipping_fee',
                'delivery.id as maGiaoHang',
                'delivery.created_at as ngayGiao',
                'delivery.status as trangThai',
                'users.name',
                'guest.guest_name_display as nameGuest',
                'detailexport.guest_name',
                'delivery.promotion',
                DB::raw('(SELECT 
                        CASE 
                            WHEN JSON_UNQUOTE(JSON_EXTRACT(delivery.promotion, "$.type")) = 1 THEN COALESCE(SUM(product_total_vat), 0) - CAST(JSON_UNQUOTE(JSON_EXTRACT(delivery.promotion, "$.value")) AS DECIMAL) -- Giảm số tiền trực tiếp
                            WHEN JSON_UNQUOTE(JSON_EXTRACT(delivery.promotion, "$.type")) = 2 THEN (COALESCE(SUM(product_total_vat), 0) * (100 - CAST(JSON_UNQUOTE(JSON_EXTRACT(delivery.promotion, "$.value")) AS DECIMAL)) / 100) -- Giảm phần trăm trên tổng giá trị sản phẩm
                            ELSE COALESCE(SUM(product_total_vat), 0) -- Không có khuyến mãi
                        END
                    FROM delivered WHERE delivered.delivery_id = delivery.id) as totalProductVat')
            )
            ->leftJoin('users', 'users.id', 'delivery.user_id')
            ->where('delivery.workspace_id', Auth::user()->current_workspace)
            ->where('delivery.status', 2)
            ->where('delivery.id', $data['detail_id'])
            ->groupBy(
                'delivery.id',
                'delivery.guest_id',
                'delivery.quotation_number',
                'delivery.code_delivery',
                'delivery.shipping_unit',
                'delivery.shipping_fee',
                'users.name',
                'delivery.created_at',
                'delivery.status',
                'guest.guest_name_display',
                'detailexport.guest_name',
                'delivery.promotion',
            )
            ->orderBy('delivery.id', 'desc');
        $deliveries = $deliveries->first();
        return $deliveries;
    }
    public function addCashReciept($data)
    {
        $dataCashRC = [
            'receipt_code' => $data['quotation_number'],
            'date_created' =>  $data['payment_date'],
            'guest_id' =>  $data['guest_id'],
            'payer' =>  $data['fund_id'],
            'amount' =>  $data['total'],
            'content' =>  $data['content_pay'],
            'fund_id' => $data['fund_id'],
            'user_id' => Auth::user()->id,
            'delivery_id' => $data['detail_id'] ?? 0,
            'note' => $data['note'],
            'workspace_id' => Auth::user()->current_workspace,
        ];
    }
}
