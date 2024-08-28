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
        'workspace_id',
        'delivery_id',
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
        $currentDate = Carbon::now()->format('dmY');

        // Lấy số thứ tự lớn nhất của mã phiếu hiện có
        $lastInvoiceNumber = CashReceipt::where('workspace_id', Auth::user()->current_workspace)
            ->max('receipt_code');

        // Tách phần số thứ tự từ mã phiếu lớn nhất
        $lastNumber = 0;
        if ($lastInvoiceNumber) {
            preg_match('/PTT(\d+)/', $lastInvoiceNumber, $matches);
            $lastNumber = isset($matches[1]) ? (int)$matches[1] : 0;
        }

        // Tăng số thứ tự lên 1 để tạo mã phiếu mới
        $newInvoiceNumber = $lastNumber + 1;
        $countFormattedInvoice = str_pad($newInvoiceNumber, 2, '0', STR_PAD_LEFT);
        $invoicenumber = "PTT{$countFormattedInvoice}-{$currentDate}";

        return $invoicenumber;
    }
    public function cashReceiptByGuest($id)
    {
        $cashReceipt = CashReceipt::where('guest_id', $id)
            ->where('cash_receipts.workspace_id', Auth::user()->current_workspace)
            ->get();
        return $cashReceipt;
    }
    public function fetchDelivery($data)
    {
        $detailOwed = DetailExport::leftJoin('guest', 'detailexport.guest_id', 'guest.id')
            ->where('detailexport.workspace_id', Auth::user()->current_workspace)
            ->where('detailexport.amount_owed', '>', 0)
            ->select('detailexport.*', 'guest.guest_name_display as nameGuest')
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
                'payer' =>  $data['payer'] ?? '',
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
                'payer' =>  $data['payer'] ?? '',
                'amount' => isset($data['total']) ? str_replace(',', '', $data['total']) : 0,
                'content_id' =>  $data['content_pay'] ?? 0,
                'fund_id' => $data['fund_id'] ??  0,
                'user_id' => Auth::user()->id,
                'note' => $data['note'],
                'status' => $data['action'] == 1 ? 1 : 2,
                'workspace_id' => Auth::user()->current_workspace,
            ];
            $cashRC = CashReceipt::create($dataCashRC);
            $guest = Guest::find($data['guest_id']);
            $guest->guest_debt = $guest->guest_debt - $cashRC->amount;
            $guest->save();

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
            'payer' => $data['payer'] ?? '',
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
        $guest = Guest::find($data['guest_id']);
        $guest->guest_debt = $guest->guest_debt - $cashReceipt->amount;
        $guest->save();
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

    public function ajax($data)
    {
        $returnImport = CashReceipt::with(['guest', 'fund', 'user', 'workspace'])->where('workspace_id', Auth::user()->current_workspace);
        if (isset($data['search'])) {
            $returnImport = $returnImport->where(function ($query) use ($data) {
                $query->orWhere('return_code', 'like', '%' . $data['search'] . '%');
            });
        }
        if (!empty($data['date'][0]) && !empty($data['date'][1])) {
            $dateStart = Carbon::parse($data['date'][0]);
            $dateEnd = Carbon::parse($data['date'][1])->endOfDay();
            $returnImport = $returnImport->whereBetween('cash_receipts.created_at', [$dateStart, $dateEnd]);
        }
        if (!empty($data['date_thu'][0]) && !empty($data['date_thu'][1])) {
            $dateStart = Carbon::parse($data['date_thu'][0]);
            $dateEnd = Carbon::parse($data['date_thu'][1])->endOfDay();
            $returnImport = $returnImport->whereBetween('cash_receipts.created_at', [$dateStart, $dateEnd]);
        }
        if (isset($data['sort']) && isset($data['sort'][0])) {
            $returnImport = $returnImport->orderBy($data['sort'][0], $data['sort'][1]);
        }

        $returnImport = $returnImport->get();
        return $returnImport;
    }
}
