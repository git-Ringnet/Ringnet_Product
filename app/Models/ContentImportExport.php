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

    public function createContent($data)
    {
        $status = [];
        $check = $this->checkFund($data['from_fund'], $data['qty_money']);
        if ($check) {
            $dataContent = [
                'payment_day' => isset($data['payment_day']) ?  $data['payment_day'] : Carbon::now(),
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
            $this->deduction($data['from_fund'],  str_replace(',', '', $data['qty_money']), 1);
            // Cộng tiền vào quỹ cần chuyển
            $this->plus_funds($data['to_fund'], str_replace(',', '', $data['qty_money']), 1);

            $status = [
                'status' => true,
                'id' => $id,
            ];
        } else {
            $status = [
                'status' => false,
            ];
        }
        return $status;
    }


    public function updateContent($id, $data)
    {
        $update = true;
        // Kiểm tra quỹ
        $content = DB::table($this->table)->where('id', $id)->first();
        if ($content) {
            // Kiểm tra tiền chuyển
            $money = str_replace(',', '', $data['qty_money']);
            if ($content->qty_money > $money) {
                $qty = $content->qty_money - $money;
                $check = $this->checkFund($content->from_fund_id, $qty);
                if ($check) {
                    // Cộng tiền quỹ cũ
                    $this->plus_funds($content->from_fund_id, $qty, 2);
                    // Trừ tiền quỹ mới
                    $this->deduction($content->to_fund_id,  $qty, 2);
                } else {
                    // Không cập nhật phiếu chuyển tiền
                    $status['status'] = false;
                    $update = false;
                }
            } elseif ($content->qty_money < $money) {
                $qty =  $money - $content->qty_money;
                $check = $this->checkFund($content->from_fund_id, $qty);
                if ($check) {
                    // Trừ tiền quỹ cũ
                    $this->deduction($content->from_fund_id,  $qty, 2);

                    // Cộng tiền quỹ mới
                    $this->plus_funds($content->to_fund_id, $qty, 2);
                } else {
                    // Không cập nhật phiếu chuyển tiền
                    $status['status'] = false;
                    $update = false;
                }
            }
            // else {
            //     $qty = 0;
            // }
            // dd($qty);

            // $check = $this->checkFund($content->from_fund_id, $qty);
            // if ($check) {
            //     // Trừ thêm tiền vào quỹ 
            //     $this->deduction($content->from_fund_id,  $qty, 2);

            //     // Cộng thêm tiền vào quỹ mới
            //     $this->plus_funds($content->to_fund_id, $qty, 2);
            // } else {
            //     // Không cập nhật phiếu chuyển tiền
            //     $status['status'] = false;
            //     $update = false;
            // }
            if ($update) {
                $money =  str_replace(',', '', $data['qty_money']);
                $dataUpdate = [
                    'payment_day' => isset($data['payment_day']) ? $data['payment_day'] : Carbon::now(),
                    'form_code' => $data['form_code'],
                    // 'name' => $data['name'],
                    // 'content' => $data['content'],
                    'qty_money' => $money,
                    // 'from_fund_id' => $data['from_fund'],
                    // 'to_fund_id' => $data['to_fund'],
                    'notes' => $data['notes'],
                ];
                DB::table($this->table)->where('id', $id)->update($dataUpdate);
                $status = [
                    'status' => true,
                ];
            }
        } else {
            $status['status'] = false;
        }


        // if ($content) {
        //     // Thay đổi quỹ cũ
        //     if ($content->from_fund_id == $data['from_fund']) {
        //         // Kiểm tra tiền chuyển
        //         $money = str_replace(',', '', $data['qty_money']);
        //         if ($content->qty_money > $money) {
        //             $qty = $money - $content->qty_money;

        //             $check = $this->checkFund($data['from_fund'], $qty);
        //             if ($check) {
        //                 // Trừ thêm tiền vào quỹ 
        //                 $this->deduction($data['from_fund'],  $qty, 2);

        //                 // Cộng thêm tiền vào quỹ mới
        //                 $this->plus_funds($data['to_fund'], $qty, 2);
        //             } else {
        //                 // Không cập nhật phiếu chuyển tiền
        //                 $update = false;
        //             }
        //         } elseif ($content->qty_money < $money) {
        //             $qty = $content->qty_money - $money;
        //             // Cộng thêm tiền vào quỹ cũ
        //             $this->plus_funds($data['from_fund'], $qty, 2);

        //             // Trừ tiền từ quỹ mới
        //             $this->deduction($data['to_fund'],  $qty, 2);
        //         } else {
        //             $qty = $content->qty_money;
        //             $check = $this->checkFund($data['from_fund'], $qty);
        //             if ($check) {
        //                 // Trừ thêm tiền vào quỹ 
        //                 $this->deduction($data['from_fund'],  $qty, 2);

        //                 // Cộng thêm tiền vào quỹ mới
        //                 $this->plus_funds($data['to_fund'], $qty, 2);
        //             } else {
        //                 // Không cập nhật phiếu chuyển tiền
        //                 $update = false;
        //             }
        //         }
        //     } else {
        //         $check = $this->checkFund($data['from_fund'], str_replace(',', '', $data['qty_money']));
        //         if ($check) {
        //             if ($content->to_fund_id == $data['from_fund']) {
        //                 // dd(1);
        //                 // Trừ tiền quỹ cũ
        //                 $this->deduction($content->to_fund_id,  $content->qty_money, 1);
        //                 // Cộng tiền vào quỹ mới
        //                 $this->plus_funds($data['to_fund'], $content->qty_money, 1);
        //             } else {
        //                 // dd(2);
        //                 // Cộng tiền vào quỹ cũ
        //                 $this->plus_funds($content->from_fund_id, $content->qty_money, 1);
        //                 // Trừ tiền từ quỹ mới
        //                 $this->deduction($content->to_fund_id,  $content->qty_money, 1);


        //                 // Trừ tiền từ quỹ mới
        //                 $this->deduction($data['from_fund'],  str_replace(',', '', $data['qty_money']), 1);

        //                 // Cộng tiền vào quỹ mới
        //                 $this->plus_funds($data['from_fund'], str_replace(',', '', $data['qty_money']), 1);
        //             }
        //         } else {
        //             $update = false;
        //             $status['status'] = false;
        //         }
        //     }
        //     // Thay đổi quỹ mới
        //     // if ($content->to_fund_id != $data['to_fund']) {
        //     //     // Trừ tiền quỹ cũ
        //     //     $this->deduction($content->to_fund_id,  $content->qty_money, 1);
        //     //     // Cộng tiền vào quỹ mới
        //     //     $this->plus_funds($data['to_fund'], str_replace(',', '', $data['qty_money']), 1);
        //     // }
        // } else {
        //     $update = false;
        //     $status['status'] = false;
        // }

        // if ($update) {

        // } else {
        //     $status = [
        //         'status' => false,
        //     ];
        // }
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

    public function deduction($fund_id, $money, $status)
    {
        $fund = DB::table('funds')->where('id', $fund_id)->first();
        if ($status == 1) {
            if ($fund) {
                $debt = $fund->amount - $money;
                DB::table('funds')->where('id', $fund_id)->update(
                    ['amount' => $debt]
                );
                $status = true;
            }
        } else {
            if ($fund) {
                $debt = $fund->amount - $money;
                DB::table('funds')->where('id', $fund_id)->update(
                    ['amount' => $debt]
                );
                $status = true;
            }
        }
        return $status;
    }

    public function plus_funds($fund_id, $money, $status)
    {
        $fund = DB::table('funds')->where('id', $fund_id)->first();
        if ($status == 1) {
            if ($fund) {
                $debt = $fund->amount + $money;
                DB::table('funds')->where('id', $fund_id)->update(
                    ['amount' => $debt]
                );
                $status = true;
            }
        } else {
            if ($fund) {
                $debt = $fund->amount + $money;
                DB::table('funds')->where('id', $fund_id)->update(
                    ['amount' => $debt]
                );
                $status = true;
            }
        }
        return $status;
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
}
