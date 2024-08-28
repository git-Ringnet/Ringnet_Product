<?php

namespace App\Models;

use App\Http\Controllers\ProductChangeWarehouseController;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ChangeWarehouse extends Model
{
    use HasFactory;

    protected $fillable = [
        'from_warehouse',
        'to_warehouse',
        'workspace_id',
        'user_id',
        'note',
        'created_at',
        'updated_at',
        'change_warehouse_code',
        'manager_warehouse',
        'type_change_warehouse'
    ];
    protected $table = 'change_warehouse';

    public function getFromWarehouse()
    {
        return $this->hasOne(Warehouse::class, 'id', 'from_warehouse');
    }

    public function getToWarehouse()
    {
        return $this->hasOne(Warehouse::class, 'id', 'to_warehouse');
    }

    public function getUser()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function getQuoteCount()
    {
        // Tạo DGH
        $currentDate = Carbon::now()->format('dmY');

        // Lấy số thứ tự lớn nhất của mã phiếu hiện có
        $lastInvoiceNumber = ChangeWarehouse::where('workspace_id', Auth::user()->current_workspace)
            ->where('type_change_warehouse', 1)
            ->max('change_warehouse_code');

        // Tách phần số thứ tự từ mã phiếu lớn nhất
        $lastNumber = 0;
        if ($lastInvoiceNumber) {
            preg_match('/XCK(\d+)/', $lastInvoiceNumber, $matches);
            $lastNumber = isset($matches[1]) ? (int)$matches[1] : 0;
        }

        // Tăng số thứ tự lên 1 để tạo mã phiếu mới
        $newInvoiceNumber = $lastNumber + 1;
        $countFormattedInvoice = str_pad($newInvoiceNumber, 2, '0', STR_PAD_LEFT);
        $invoicenumber = "XCK{$countFormattedInvoice}-{$currentDate}";

        return $invoicenumber;
    }
    public function getQuoteCount1()
    {
        // Tạo DGH
        $currentDate = Carbon::now()->format('dmY');

        // Lấy số thứ tự lớn nhất của mã phiếu hiện có
        $lastInvoiceNumber = ChangeWarehouse::where('workspace_id', Auth::user()->current_workspace)
            ->where('type_change_warehouse', 2)
            ->max('change_warehouse_code');

        // Tách phần số thứ tự từ mã phiếu lớn nhất
        $lastNumber = 0;
        if ($lastInvoiceNumber) {
            preg_match('/NCK(\d+)/', $lastInvoiceNumber, $matches);
            $lastNumber = isset($matches[1]) ? (int)$matches[1] : 0;
        }

        // Tăng số thứ tự lên 1 để tạo mã phiếu mới
        $newInvoiceNumber = $lastNumber + 1;
        $countFormattedInvoice = str_pad($newInvoiceNumber, 2, '0', STR_PAD_LEFT);
        $invoicenumber = "NCK{$countFormattedInvoice}-{$currentDate}";

        return $invoicenumber;
    }

    public function addChangeWarehouse($data, $type)
    {
        $result = [];
        $dataChange = [
            'manager_warehouse' => $data['manager_warehouse'],
            'change_warehouse_code' => isset($data['change_warehouse_code']) ? $data['change_warehouse_code'] : "",
            'from_warehouse' => $data['from_warehouse'],
            'to_warehouse' => $data['to_warehouse'],
            'workspace_id' => Auth::user()->current_workspace,
            'user_id' => Auth::user()->id,
            'note' => isset($data['note']) ? $data['note'] : "",
            'created_at' => isset($data['created_at']) ? $data['created_at'] : Carbon::now(),
            'type_change_warehouse' => $type,
        ];
        foreach ($dataChange as $key => $value) {
            if (is_array($value)) {
                $dataChange[$key] = json_encode($value);
            }
        }
        $id = DB::table($this->table)->insertGetId($dataChange);
        if ($id) {
            $result['status'] = true;
            $result['id'] = $id;
        } else {
            $result['status'] = false;
        }

        return $result;
    }

    public function deleteChangeWarehouse($id)
    {
        $status = [];

        $changeWarehouse = ChangeWarehouse::where('id', $id)->first();
        if ($changeWarehouse) {
            ProductChangeWarehouse::where('id_change_warehouse', $changeWarehouse->id)->delete();
            ChangeWarehouse::where('id', $changeWarehouse->id)->delete();
            $status['status'] = true;
        } else {
            $status['status'] = false;
        }
        return $status;
    }
    public function ajax($data)
    {
        $changeWarehouse = ChangeWarehouse::where('workspace_id', Auth::user()->current_workspace);
        if (isset($data['search'])) {
            $changeWarehouse = $changeWarehouse->where(function ($query) use ($data) {
                $query->orWhere('form_code', 'like', '%' . $data['search'] . '%');
            });
        }
        if (!empty($data['date'][0]) && !empty($data['date'][1])) {
            $dateStart = Carbon::parse($data['date'][0]);
            $dateEnd = Carbon::parse($data['date'][1])->endOfDay();
            $changeWarehouse = $changeWarehouse->whereBetween('change_warehouse.created_at', [$dateStart, $dateEnd]);
        }
        if (isset($data['sort']) && isset($data['sort'][0])) {
            $changeWarehouse = $changeWarehouse->orderBy($data['sort'][0], $data['sort'][1]);
        }

        $changeWarehouse = $changeWarehouse->get();
        return $changeWarehouse;
    }
}
