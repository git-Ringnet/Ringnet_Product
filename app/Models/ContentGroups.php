<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ContentGroups extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'contenttype_id',
        'description',
        'created_at',
        'updated_at',
        'workspace_id',
        'user_id',
    ];
    protected $table = 'contentgroups';



    public function createContentGroup($data)
    {
        $status = [];
        if (!$this->checkContentGroup("", $data['type'], $data['content'])) {
            $dataContentG = [
                'name' => $data['content'],
                'contenttype_id' => $data['type'],
                'created_at' => Carbon::now(),
                'workspace_id' => Auth::user()->current_workspace,
                'user_id' => Auth::user()->id
            ];
            $id = DB::table($this->table)->insertGetId($dataContentG);
            $status = [
                'status' => true,
                'id' => $id,
            ];
        } else {
            $status = ['status' => false];
        }
        return $status;
    }

    public function updateContentGroup($id, $data)
    {
        if (!$this->checkContentGroup($id, $data['type'], $data['content'])) {
            $dataContentG = [
                'name' => $data['content'],
                'contenttype_id' => $data['type'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];

            DB::table($this->table)->where('id', $id)->update($dataContentG);
            $status = [
                'status' => true,
            ];
        } else {
            $status = ['status' => false];
        }
        return $status;
    }


    public function checkContentGroup($id, $type_id, $name)
    {
        $getData = DB::table($this->table)->where('contenttype_id', $type_id)
            ->where('name', $name);
        if (isset($id)) {
            $getData->where('id', '!=', $id);
        }
        $getData = $getData->first();
        if (isset($getData)) {
            $status = true;
        } else {
            $status = false;
        }

        return $status;
    }

    public function deleteContentGroup($id)
    {
        $status = [];
        $getData = DB::table($this->table)->where('id', $id)->first();
        if ($getData) {
            DB::table($this->table)->where('id', $id)->delete();
            $status = [
                'status' => true
            ];
        } else {
            $status = [
                'status' => false
            ];
        }
        return $status;
    }
    public function ajax($data)
    {
        $contentGroups = ContentGroups::where('workspace_id', Auth::user()->current_workspace)
            ->leftJoin('contenttype', 'contenttype.id', 'contentgroups.contenttype_id')
            ->select('contentgroups.*', 'contenttype.name as nameType')
            ->orderBy('contentgroups.id', 'desc');
        // Kiểm tra nếu có dữ liệu tìm kiếm
        if (isset($data['search'])) {
            $contentGroups = $contentGroups->where(function ($query) use ($data) {
                $query->orWhere('contentgroups.name', 'like', '%' . $data['search'] . '%');
            });
        }
        // Lấy dữ liệu và nhóm theo 'contenttype_id'
        $contentGroups = $contentGroups->get();
        return $contentGroups;
    }
    public function ajaxDetailContent($data)
    {
        // CHI
        $contentChi = ContentGroups::where('pay_order.content_pay', $data['data'])
            ->leftJoin('pay_order', 'pay_order.content_pay', 'contentgroups.id')
            ->leftJoin('funds', 'pay_order.fund_id', 'funds.id')
            ->select('contentgroups.*', 'pay_order.*', 'funds.name as tenQuy', 'pay_order.id as id');

        if (isset($data['search'])) {
            $contentChi = $contentChi->where(function ($query) use ($data) {
                $query->orWhere('contentgroups.name', 'like', '%' . $data['search'] . '%');
                $query->orWhere('pay_order.payment_code', 'like', '%' . $data['search'] . '%');
            });
        }
        if (isset($data['ma'])) {
            $contentChi = $contentChi->where('pay_order.payment_code', 'like', '%' . $data['ma'] . '%');
        }
        if (isset($data['noidung'])) {
            $contentChi = $contentChi->where('contentgroups.name', 'like', '%' . $data['noidung'] . '%');
        }
        if (isset($data['quy'])) {
            $contentChi = $contentChi->where('funds.name', 'like', '%' . $data['quy'] . '%');
        }
        if (isset($data['ghichu'])) {
            $contentChi = $contentChi->where('pay_order.note', 'like', '%' . $data['ghichu'] . '%');
        }
        if (isset($data['total'][0]) && isset($data['total'][1])) {
            $contentChi = $contentChi->where('pay_order.total', $data['total'][0], $data['total'][1]);
        }
        if (isset($data['sort']) && isset($data['sort'][0])) {
            $contentChi = $contentChi->orderBy($data['sort'][0], $data['sort'][1]);
        }

        $contentChi = $contentChi->get()->map(function ($item) {
            $item->source_id = 'pay_order';
            return $item;
        });

        // THU
        $contentThu = ContentGroups::where('cash_receipts.content_id', $data['data'])
            ->leftJoin('cash_receipts', 'cash_receipts.content_id', 'contentgroups.id')
            ->leftJoin('funds', 'cash_receipts.fund_id', 'funds.id')
            ->select('contentgroups.*', 'cash_receipts.*', 'cash_receipts.id as id', 'funds.name as tenQuy');

        if (isset($data['search'])) {
            $contentThu = $contentThu->where(function ($query) use ($data) {
                $query->orWhere('contentgroups.name', 'like', '%' . $data['search'] . '%');
                $query->orWhere('cash_receipts.receipt_code', 'like', '%' . $data['search'] . '%');
            });
        }
        if (isset($data['ma'])) {
            $contentThu = $contentThu->where('cash_receipts.receipt_code', 'like', '%' . $data['ma'] . '%');
        }
        if (isset($data['noidung'])) {
            $contentThu = $contentThu->where('contentgroups.name', 'like', '%' . $data['noidung'] . '%');
        }
        if (isset($data['quy'])) {
            $contentThu = $contentThu->where('funds.name', 'like', '%' . $data['quy'] . '%');
        }
        if (isset($data['ghichu'])) {
            $contentThu = $contentThu->where('cash_receipts.note', 'like', '%' . $data['ghichu'] . '%');
        }
        if (isset($data['total'][0]) && isset($data['total'][1])) {
            $contentThu = $contentThu->where('cash_receipts.amount', $data['total'][0], $data['total'][1]);
        }
        if (isset($data['sort']) && isset($data['sort'][0])) {
            $contentThu = $contentThu->orderBy($data['sort'][0], $data['sort'][1]);
        }

        $contentThu = $contentThu->get()->map(function ($item) {
            $item->source_id = 'cash_receipts';
            return $item;
        });

        // Return results
        if (!$contentThu->isEmpty()) {
            return $contentThu;
        }
        if (!$contentChi->isEmpty()) {
            return $contentChi;
        }

        return false;
    }
}
