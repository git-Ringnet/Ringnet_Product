<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ContentImportExport extends Model
{
    use HasFactory;


    protected $fillable = [
        'document',
        'name',
        'content',
        'qty_money',
        'fund_id',
        'fund_name',
        'notes',
        'type',
        'user_id',
        'workspace_id',
        'created_at',
        'updated_at'
    ];
    protected $table = 'content-import-export';

    // public function createContentGroup($data){
    //     $dataContent =[
    //         ''
    //     ]
    // }

    public function formatDate($data)
    {
        return Carbon::parse($data);
    }
    public function getUser()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
    public function getFromFund()
    {
        return $this->hasOne(Fund::class, 'id', 'from_fund_id');
    }
    public function getToFund()
    {
        return $this->hasOne(Fund::class, 'id', 'to_fund_id');
    }

    public function getQuoteCount()
    {
        $currentDate = Carbon::now()->format('dmY');
        $lastInvoiceNumber =
            ContentImportExport::where('workspace_id', Auth::user()->current_workspace)
            // ->whereDate('created_at', now())
            ->count() + 1;


        // $lastInvoiceNumber = $lastInvoiceNumber !== null ? $lastInvoiceNumber : 1;
        if ($lastInvoiceNumber !== null) {
            $last =
                ContentImportExport::where('workspace_id', Auth::user()->current_workspace)
                ->orderBy('id', 'desc')
                ->first();

            $pattern = '/PCT(\d+)-/';
            if ($last) {
                preg_match($pattern, $last->form_code, $matches);
                $getNumber = isset($matches[1]) ? $matches[1] : 0;
                $lastInvoiceNumber = $getNumber + 1;
            }
        } else {
            $lastInvoiceNumber = 1;
        }


        $countFormattedInvoice = str_pad($lastInvoiceNumber, 2, '0', STR_PAD_LEFT);
        $invoicenumber = "PCT{$countFormattedInvoice}-{$currentDate}";
        return $invoicenumber;
    }



    public function createContent($data)
    {
        $status = [];
        if ($data['from_fund'] == $data['to_fund']) {
            $status = [
                'status' => false,
                'message' => 'Từ quỹ và Đến quỹ không được giống nhau.',
            ];
            return $status;
        }

        $dataContent = [
            'payment_day' => isset($data['payment_day']) ? $data['payment_day'] : Carbon::now(),
            'form_code' => $data['form_code'],
            'user_id' => Auth::user()->id,
            'qty_money' => str_replace(',', '', $data['qty_money']),
            'from_fund_id' => $data['from_fund'],
            'to_fund_id' => $data['to_fund'],
            'notes' => isset($data['notes']) ? $data['notes'] : "",
            'workspace_id' => Auth::user()->current_workspace,
            'created_at' => Carbon::now(),
        ];

        // Thêm mới nội dung thu chi
        $id = DB::table($this->table)->insertGetId($dataContent);

        // Trừ tiền quỹ chuyển
        $this->deduction($data['from_fund'], str_replace(',', '', $data['qty_money']));
        // Cộng tiền vào quỹ cần chuyển
        $this->plus_funds($data['to_fund'], str_replace(',', '', $data['qty_money']));

        $status = [
            'status' => true,
            'id' => $id,
        ];

        return $status;
    }


    public function updateContent($id, $data)
    {
        $content = DB::table($this->table)->where('id', $id)->first();

        if ($content) {
            $money = str_replace(',', '', $data['qty_money']);
            $qtyDifference = abs($content->qty_money - $money);

            if ($content->qty_money > $money) {
                // Cộng tiền quỹ cũ
                $this->plus_funds($content->from_fund_id, $qtyDifference);
                // Trừ tiền quỹ mới
                $this->deduction($content->to_fund_id, $qtyDifference);
            } elseif ($content->qty_money < $money) {
                // Trừ tiền quỹ cũ
                $this->deduction($content->from_fund_id, $qtyDifference);
                // Cộng tiền quỹ mới
                $this->plus_funds($content->to_fund_id, $qtyDifference);
            }

            $dataUpdate = [
                'payment_day' => isset($data['payment_day']) ? $data['payment_day'] : Carbon::now(),
                'form_code' => $data['form_code'],
                'qty_money' => $money,
                'notes' => isset($data['notes']) ? $data['notes'] : "",
            ];

            DB::table($this->table)->where('id', $id)->update($dataUpdate);

            $status = [
                'status' => true,
            ];
        } else {
            $status = [
                'status' => false,
            ];
        }

        return $status;
    }
    public function checkFund($id, $money)
    {
        $fund = DB::table('funds')->where('id', $id)->first();
        $money = str_replace(',', '', $money);
        if ($fund) {
            if ($fund->amount < $money) {
                $status = false;
            } else {
                $status = true;
            }
        } else {
            $status = false;
        }
        return $status;
    }

    public function deduction($fund_id, $money)
    {
        $fund = DB::table('funds')->where('id', $fund_id)->first();
        if ($fund) {
            $debt = $fund->amount - $money;
            DB::table('funds')->where('id', $fund_id)->update(['amount' => $debt]);
            return true;
        }
        return false;
    }

    public function plus_funds($fund_id, $money)
    {
        $fund = DB::table('funds')->where('id', $fund_id)->first();
        if ($fund) {
            $debt = $fund->amount + $money;
            DB::table('funds')->where('id', $fund_id)->update(['amount' => $debt]);
            return true;
        }
        return false;
    }

    public function checkUpdate($id, $money, $new_fund)
    {
        $content = DB::table('content-import-export')->where('id', $id)->first();
        $status = [];
        $debt = 0;
        if ($content) {
            // Lấy tiền hiện tại
            $getQuy = DB::table('quy')->where('id', $content->fund_id)->first();
            if ($content->fund_id == $new_fund) {
                // Lấy số tiền cộng thêm
                $qty = $money - $content->qty_money;

                if ($getQuy->qyt < $qty) {
                    return $status = ['status' => false];
                } else {
                    // trừ thêm tiền
                    DB::table('quy')->where('id', $content->fund_id)->update([
                        'qyt' => ($getQuy->qyt - $qty)
                    ]);
                    $status = ['status' => true];
                }
            } else {
                // Kiểm tra tiền quỹ mới
                $newQuy = DB::table('quy')->where('id', $new_fund)->first();
                if ($newQuy) {
                    if ($newQuy->qyt < $money) {
                        return $status = ['status' => false];
                    } else {
                        // Cộng lại tiền quỹ cũ
                        DB::table('quy')->where('id', $content->fund_id)->update([
                            'qyt' => ($getQuy->qyt + $content->qty_money)
                        ]);
                        var_dump($getQuy->qyt + $content->qty_money);
                        // Trừ tiền quỹ mới
                        DB::table('quy')->where('id', $new_fund)->update([
                            'qyt' => ($newQuy->qyt - $money)
                        ]);
                        $status = ['status' => true];
                    }
                }
            }
        } else {
            $status = ['status' => false];
        }
        return $status;
    }

    public function deleteContent($id)
    {
        // Lấy content
        $getContent = ContentImportExport::where('id', $id)->first();
        if ($getContent) {
            // Cộng tiền vào quỹ cũ
            $this->plus_funds($getContent->from_fund_id, $getContent->qty_money, 1);

            // Trừ tiền từ quỹ mới
            $this->deduction($getContent->to_fund_id, $getContent->qty_money, 1);

            // Xóa nội chuyển tiền
            $getContent->delete();
            $status = ['status' => true];
        } else {
            $status = ['status' => false];
        }
        return $status;
    }
    public function ajax($data)
    {
        $content = ContentImportExport::where('workspace_id', Auth::user()->current_workspace)->with(['getFromFund', 'getToFund', 'getUser']);
        if (isset($data['search'])) {
            $content = $content->where(function ($query) use ($data) {
                $query->orWhere('form_code', 'like', '%' . $data['search'] . '%');
                $query->orWhere('notes', 'like', '%' . $data['search'] . '%');
            });
        }
        if (isset($data['return_code'])) {
            $content = $content->where('form_code', 'like', '%' . $data['return_code'] . '%');
        }
        if (isset($data['note'])) {
            $content = $content->where('notes', 'like', '%' . $data['note'] . '%');
        }
        if (isset($data['fund_from'])) {
            $content = $content->whereHas('getFromFund', function ($query) use ($data) {
                $query->where('name', 'like', '%' . $data['fund_from'] . '%');
            });
        }
        if (isset($data['fund_to'])) {
            $content = $content->whereHas('getToFund', function ($query) use ($data) {
                $query->where('name', 'like', '%' . $data['fund_to'] . '%');
            });
        }
        if (!empty($data['amount'][0]) && !empty($data['amount'][1])) {
            $content = $content->where('qty_money', $data['amount'][0], $data['amount'][1]);
        }
        if (isset($data['users'])) {
            $content = $content->whereHas('getUser', function ($query) use ($data) {
                $query->whereIn('id', $data['users']);
            });
        }

        if (!empty($data['date'][0]) && !empty($data['date'][1])) {
            $dateStart = Carbon::parse($data['date'][0]);
            $dateEnd = Carbon::parse($data['date'][1])->endOfDay();
            $content = $content->whereBetween('content-import-export.payment_day', [$dateStart, $dateEnd]);
        }
        if (isset($data['sort']) && isset($data['sort'][0])) {
            $content = $content->orderBy($data['sort'][0], $data['sort'][1]);
        }

        $content = $content->get();
        return $content;
    }
}
