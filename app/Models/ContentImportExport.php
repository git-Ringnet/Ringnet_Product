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



    public function createContent($data)
    {

        // dd($data);
        $status = [];
        // $check = $this->checkFund($data['fund_id'], $data['qty_money']);
        // if ($check) {
            $dataContent = [
                'document' => $data['document'],
                'name' => $data['name'],
                'content' => $data['content'],
                'qty_money' => $data['qty_money'],
                'fund_id' => $data['fund_id'],
                'notes' => $data['notes'],
                'type' => $data['type'],
                'created_at' => isset($data['date']) ? $data['date'] : Carbon::now(),
                'user_id' => Auth::user()->id,
                'workspace_id' => Auth::user()->current_workspace
            ];
            $id = DB::table($this->table)->insertGetId($dataContent);
            if ($data['type'] == 1) {
                $this->plus_funds($data['fund_id'], str_replace(',', '', $data['qty_money']));
            } else {
                $this->deduction($data['fund_id'], $data['qty_money']);
            }
            $status = [
                'status' => true,
                'id' => $id,
            ];
        // } else {
        //     $status = [
        //         'status' => false,
        //     ];
        // }
        return $status;
    }


    public function updateContent($id, $data)
    {
        // Kiểm tra quỹ
        $money =  str_replace(',', '', $data['qty_money']);
        $status = $this->checkUpdate($id, $money, $data['fund_id']);
        if ($status['status']) {
            $dataUpdate = [
                'document' => $data['document'],
                'type' => $data['type'],
                'name' => $data['name'],
                'content' => $data['content'],
                'qty_money' => $money,
                'fund_id' => $data['fund_id'],
                'created_at' => isset($data['date']) ? $data['date'] : Carbon::now()
            ];
            DB::table($this->table)->update($dataUpdate);
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
        $fund = DB::table('quy')->where('id', $id)->first();
        if ($fund) {
            if ($fund->qyt < $money) {
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
        $fund = DB::table('quy')->where('id', $fund_id)->first();
        if ($fund) {
            $debt = $fund->qyt - $money;
            DB::table('quy')->where('id', $fund_id)->update(
                ['qyt' => $debt]
            );
            $status = true;
        }

        return $status;
    }

    public function plus_funds($fund_id, $money)
    {
        $fund = DB::table('quy')->where('id', $fund_id)->first();
        if ($fund) {
            $debt = $fund->qyt + $money;
            DB::table('quy')->where('id', $fund_id)->update(
                ['qyt' => $debt]
            );
            $status = true;
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
            $getQuy = DB::table('quy')->where('id', $getContent->fund_id)->first();
            if ($getContent->type == 1) {
                DB::table('quy')->where('id', $getQuy->id)->update([
                    'qyt' => ($getQuy->qyt - $getContent->qty_money)
                ]);
            } else {
                // Cộng lại tiền quỹ cũ
                DB::table('quy')->where('id', $getQuy->id)->update([
                    'qyt' => ($getQuy->qyt + $getContent->qty_money)
                ]);
            }
            $getContent->delete();
            $status = ['status' => true];
        } else {
            $status = ['status' => false];
        }
        return $status;
    }
}
