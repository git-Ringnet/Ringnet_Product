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
        return $this->belongsTo(DetailExport::class, 'delivery_id', 'id');
    }
    public function getQuoteCount()
    {
        // Tạo DGH
        $currentDate = Carbon::now()->format('dmy');
        $lastInvoice = CashReceipt::where('workspace_id', Auth::user()->current_workspace)
            ->orderBy('created_at', 'desc')
            ->first();
        $getNumber = 0;
        if ($lastInvoice) {
            $pattern = '/PTT(\d+)-/';
            preg_match($pattern, $lastInvoice->invoice_number, $matches);
            $getNumber = isset($matches[1]) ? $matches[1] : 0;
        }
        $newInvoiceNumber = $getNumber + 1;
        $countFormattedInvoice = str_pad($newInvoiceNumber, 2, '0', STR_PAD_LEFT);
        $invoicenumber = "PTT{$countFormattedInvoice}-{$currentDate}";
        return $invoicenumber;
    }
    public function fetchDelivery($data)
    {
        $detailOwed = DetailExport::leftJoin('guest', 'detailexport.guest_id', 'guest.id')
            ->leftJoin('delivery', 'delivery.detailexport_id', 'detailexport.id')
            ->where('detailexport.workspace_id', Auth::user()->current_workspace)
            ->where('detailexport.id',  $data['detail_id'])
            ->where('detailexport.amount_owed', '>', 0)
            ->select('detailexport.*', 'guest.guest_name_display as nameGuest','delivery.id as idGH')
            ->first();
        return $detailOwed;
    }
    public function addCashReciept($data)
    {
        if (isset($data['returnImport_id'])) {
            $dataCashRC = [
                'receipt_code' => $data['code_reciept'],
                'date_created' =>  $data['payment_date'],
                'guest_id' =>  $data['guest_id'],
                'payer' =>  $data['fund_id'] ?? '',
                'amount' => isset($data['total']) ? str_replace(',', '', $data['total']) : 0,
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
                $returnImport->payment = $returnImport->payment + isset($data['total']) ? str_replace(',', '', $data['total']) : 0;
                $returnImport->save();
            }
        } else {
            $dataCashRC = [
                'receipt_code' => $data['code_reciept'],
                'date_created' =>  $data['payment_date'],
                'guest_id' =>  $data['guest_id'],
                'payer' =>  $data['fund_id'] ?? '',
                'amount' => isset($data['total']) ? str_replace(',', '', $data['total']) : 0,
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
                $detailE = $this->fetchDelivery($data);
                if ($detailE) {
                    $conlai =  $detailE->amount_owed - $cashRC->amount;
                    $detailE->amount_owed = $conlai;
                    if ($conlai == 0) {
                        $detailE->status = 2;
                        $detailE->status_pay = 2;
                    } else {
                        $detailE->status_pay = 3;
                    }
                    $detailE->save();
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
            'amount' => isset($data['total']) ? str_replace(',', '', $data['total']) : 0,
            'content_id' => $data['content_pay'] ?? 0,
            'fund_id' => $data['fund_id'] ?? 0,
            'user_id' => Auth::user()->id,
            'delivery_id' => $data['detail_id'] ?? 0,
            'note' => $data['note'],
            'status' => 2,
            'workspace_id' => Auth::user()->current_workspace,
        ];
        $cashReceipt->update($dataCashRC);

        $detailE = $this->fetchDelivery($data);
        if ($detailE) {
            $conlai = $detailE->amount_owed - $cashReceipt->amount;
            $detailE->amount_owed = $conlai;
            if ($conlai == 0) {
                $detailE->status = 2;
                $detailE->status_pay = 2;
            } else {
                $detailE->status_pay = 3;
            }
            $detailE->save();
        }
        return $cashReceipt;
    }
}