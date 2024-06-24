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
        'content_id',
        'fund_id',
        'user_id',
        'note',
        'status',
        'workspace_id', 'delivery_id',
        'returnImport_id'
    ];
    public function guest()
    {
        return $this->belongsTo(Guest::class);
    }

    public function getGuest()
    {
        return $this->hasOne(Guest::class, 'id', 'guest_id');
    }

    public function getContentPay()
    {
        return $this->hasOne(ContentGroups::class, 'id', 'content_id');
    }

    public function getFund()
    {
        return $this->hasOne(Fund::class, 'id', 'fund_id');
    }

    public function fund()
    {
        return $this->belongsTo(Fund::class);
    }
    public function content()
    {
        return $this->belongsTo(ContentGroups::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function workspace()
    {
        return $this->belongsTo(Workspace::class);
    }
    public function delivery()
    {
        return $this->belongsTo(Delivery::class);
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
    public function fetchDelivery($data)
    {
        $deliveries = Delivery::leftJoin('detailexport', 'detailexport.id', 'delivery.detailexport_id')
            ->leftJoin('guest', 'guest.id', 'delivery.guest_id')
            ->where('delivery.id', $data['detail_id'])
            ->where('delivery.totalVat', '>', 0)
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
                'delivery.totalVat as totalVat',
                DB::raw('(
                        SELECT 
                            CASE 
                                WHEN JSON_UNQUOTE(JSON_EXTRACT(delivery.promotion, "$.value")) != 0 THEN 
                                    CASE 
                                        WHEN JSON_UNQUOTE(JSON_EXTRACT(delivery.promotion, "$.type")) = 1 THEN 
                                            (COALESCE(SUM(product_total_vat), 0) - CAST(JSON_UNQUOTE(JSON_EXTRACT(delivery.promotion, "$.value")) AS DECIMAL)) * (1 + (COALESCE(MAX(products.product_tax), 0) / 100)) -- Giảm số tiền trực tiếp và áp dụng thuế
                                        WHEN JSON_UNQUOTE(JSON_EXTRACT(delivery.promotion, "$.type")) = 2 THEN 
                                            ((COALESCE(SUM(product_total_vat), 0) * (100 - CAST(JSON_UNQUOTE(JSON_EXTRACT(delivery.promotion, "$.value")) AS DECIMAL)) / 100)) * (1 + (COALESCE(MAX(products.product_tax), 0) / 100)) -- Giảm phần trăm trên tổng giá trị sản phẩm và áp dụng thuế
                                        ELSE 
                                            COALESCE(SUM(product_total_vat), 0) -- Không có khuyến mãi
                                    END
                                ELSE
                                    COALESCE(SUM(product_total_vat), 0) -- Giá trị ban đầu nếu $.value = 0
                            END
                        FROM delivered 
                        LEFT JOIN products ON delivered.product_id = products.id
                        WHERE delivered.delivery_id = delivery.id
                    ) as totalProductVat')
            )
            ->leftJoin('users', 'users.id', 'delivery.user_id')
            ->where('delivery.workspace_id', Auth::user()->current_workspace)
            ->where('delivery.status', 2)
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
                'delivery.totalVat',
            )
            ->orderBy('delivery.id', 'desc');
        $deliveries = $deliveries->first();
        return $deliveries;
    }
    public function addCashReciept($data)
    {
        if (isset($data['returnImport_id'])) {
            $dataCashRC = [
                'receipt_code' => $data['code_reciept'],
                'date_created' =>  $data['payment_date'],
                'guest_id' =>  $data['guest_id'],
                'payer' =>  $data['fund_id'] ?? '',
                'amount' =>  $data['total'] ?? 0,
                'content_id' =>  $data['content_pay'] ?? 0,
                'fund_id' => $data['fund_id'] ??  0,
                'user_id' => Auth::user()->id,
                'note' => $data['note'],
                'status' => $data['action'] == 1 ? 1 : 2,
                'workspace_id' => Auth::user()->current_workspace,
                'returnImport_id' => isset($data['returnImport_id']) ? $data['returnImport_id'] : 0,
            ];


            $cashRC = CashReceipt::create($dataCashRC);
            // Cộng tiền vào đơn trả hàng
            $returnImport = ReturnImport::where('id', $data['returnImport_id'])->first();
            if ($returnImport) {
                $returnImport->payment = $returnImport->payment + $data['total'] ?? 0;
                $returnImport->save();
            }
        } else {
            $dataCashRC = [
                'receipt_code' => $data['code_reciept'],
                'date_created' =>  $data['payment_date'],
                'guest_id' =>  $data['guest_id'],
                'payer' =>  $data['fund_id'] ?? '',
                'amount' =>  $data['total'] ?? 0,
                'content_id' =>  $data['content_pay'] ?? 0,
                'fund_id' => $data['fund_id'] ??  0,
                'user_id' => Auth::user()->id,
                'delivery_id' => $data['detail_id'] ?? 0,
                'note' => $data['note'],
                'status' => $data['action'] == 1 ? 1 : 2,
                'workspace_id' => Auth::user()->current_workspace,
            ];
            $cashRC = CashReceipt::create($dataCashRC);
            if ($cashRC->status == 2) {
                $delivery = $this->fetchDelivery($data);
                if ($delivery) {
                    $conlai =  $delivery->totalVat - $cashRC->amount;
                    $delivery->totalVat = $conlai;
                    $delivery->save();
                }
            }
        }
    }
    public function updateCashReceipt($data, $id)
    {
        $cashReceipt = CashReceipt::findOrFail($id);

        $dataCashRC = [
            'receipt_code' => $data['code_reciept'],
            'date_created' => $data['payment_date'],
            'guest_id' => $data['guest_id'],
            'payer' => $data['fund_id'] ?? '',
            'amount' => $data['total'] ?? 0,
            'content_id' => $data['content_pay'] ?? 0,
            'fund_id' => $data['fund_id'] ?? 0,
            'user_id' => Auth::user()->id,
            'delivery_id' => $data['detail_id'] ?? 0,
            'note' => $data['note'],
            'status' => 2,
            'workspace_id' => Auth::user()->current_workspace,
        ];
        $cashReceipt->update($dataCashRC);

        $delivery = $this->fetchDelivery($data);
        if ($delivery) {
            $conlai = $delivery->totalVat - $cashReceipt->amount;
            $delivery->totalVat = $conlai;
            $delivery->save();
        }
        return $cashReceipt;
    }
}
