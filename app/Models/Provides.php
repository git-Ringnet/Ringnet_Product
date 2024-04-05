<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Provides extends Model
{
    use HasFactory;
    protected $table = 'provides';
    protected $fillable = [
        'id',
        'provide_name_display',
        'provide_name',
        'provide_address',
        'provide_code',
        'provide_represent',
        'provide_email',
        'provide_phone',
        'provide_debt',
        'provide_address_delivery',
        'workspace_id'
    ];

    public function getAllDetail()
    {
        return $this->hasMany(DetailImport::class, 'provide_id', 'id');
    }
    public function getAllDetailByID()
    {
        return $this->hasMany(DetailImport::class, 'provide_id', 'id')
            ->where('detailimport.status', 2);
    }

    public function getPayment()
    {
        return $this->hasOne(PayOder::class, 'provide_id', 'id');
    }

    public function getAllProvide()
    {
        return DB::table($this->table)->where('workspace_id', Auth::user()->current_workspace)->get();
    }
    public function addProvide($data)
    {
        $result = [];
        $provides = DB::table($this->table)->where('provide_code', $data['provide_code'])
            ->orWhere('provide_name_display', $data['provide_name_display'])
            ->where('workspace_id', Auth::user()->current_workspace)
            ->first();
        if ($provides) {
            $result = [
                'status' => true,
            ];
        } else {
            if (isset($data['key'])) {
                $key = $data['key'];
            } else {
                $key = preg_match_all('/[A-ZĐ]/u', $data['provide_name_display'], $matches);
                if ($key > 0) {
                    $key = implode('', $matches[0]);
                } else {
                    $key =  ucfirst($data['provide_name_display']);
                    $key = preg_match_all('/[A-ZĐ]/u', $key, $matches);
                    $key = implode('', $matches[0]);
                    if ($key) {
                        $key = $key;
                    } else {
                        $key = "RN";
                    }
                }
            }
            $dataProvide = [
                'provide_name_display' => $data['provide_name_display'],
                'provide_name' => $data['provide_name'],
                'provide_address' => $data['provide_address'],
                'provide_code' => $data['provide_code'],
                'key' => $key,
                'provide_debt' => 0,
                'workspace_id' => Auth::user()->current_workspace
            ];
            $provide_id =  DB::table($this->table)->insertGetId($dataProvide);
            if ($provide_id) {
                $result = [
                    'status' => false,
                    'id' => $provide_id
                ];
            }
        }
        return $result;
    }
    public function updateProvide($data, $id)
    {
        $exist = false;
        // $check = DB::table($this->table)
        //     ->where('id', '!=', $id)
        //     ->where('provide_code', $data['provide_code'])
        //     ->orWhere('provide_name_display', $data['provide_name_display'])
        //     ->where('workspace_id', Auth::user()->current_workspace)
        //     ->first();

        $check = DB::table($this->table)
            ->where('id', '!=', $id)
            ->where(function ($query) use ($data) {
                $query->where('provide_code', $data['provide_code'])
                    ->orWhere('provide_name_display', $data['provide_name_display']);
            })
            ->where('workspace_id', Auth::user()->current_workspace)
            ->first();

        if ($check) {
            $exist = true;
        } else {
            $dataUpdate = [
                'provide_name_display' => $data['provide_name_display'],
                'key' => $data['key'],
                'provide_name' => $data['provide_name'],
                'provide_address' => $data['provide_address'],
                'provide_code' => $data['provide_code'],
            ];
            Provides::where('id', $id)->update($dataUpdate);
            if (isset($data['represent_name'])) {
                // Xóa các id không tòn tại
                if (isset($data['repesent_id'])) {
                    ProvideRepesent::where('provide_id', $id)->whereNotIn('id', $data['repesent_id'])->delete();
                }
                // Chỉnh sửa thông tin người đại diện và thêm người đại diện
                for ($i = 0; $i < count($data['represent_name']); $i++) {
                    $represent = ProvideRepesent::where('id', isset($data['repesent_id'][$i]) ? $data['repesent_id'][$i]  : "")
                        ->where('workspace_id', Auth::user()->current_workspace)
                        ->first();
                    $dataRepresent = [
                        'represent_name' => $data['represent_name'][$i],
                        'represent_email' => $data['represent_email'][$i],
                        'represent_phone' => $data['represent_phone'][$i],
                        'represent_address' => $data['represent_address'][$i],
                        // 'workspace_id' => Auth::user()->current_workspace
                    ];
                    if ($represent) {
                        ProvideRepesent::where('id', $represent->id)->update($dataRepresent);
                    } else {
                        $dataRepresent['provide_id'] = $id;
                        $dataRepresent['workspace_id'] =  Auth::user()->current_workspace;
                        DB::table('represent_provide')->insert($dataRepresent);
                    }
                }
            } else {
                ProvideRepesent::where('provide_id', $id)->delete();
            }
            $exist = false;
        }
        return $exist;
    }
    public function getprovidebyCode($data)
    {
        $provides = DB::table($this->table);
        if (isset($data['idCode'])) {
            $provides = $provides->whereIn('provides.id', $data['idCode']);
        }
        $provides = $provides->pluck('provide_code')->all();
        return $provides;
    }
    public function getprovidebyName($data)
    {
        $provides = DB::table($this->table);
        if (isset($data['idName'])) {
            $provides = $provides->whereIn('provides.id', $data['idName']);
        }
        if (isset($data['filters']['idProvides'])) {
            $provides = $provides->whereIn('provides.id', $data['filters']['idProvides']);
        }
        $provides = $provides->pluck('provide_name_display')->all();
        return $provides;
    }
    public function ajax($data)
    {
        $provides =  DB::table($this->table);
        if (isset($data['search'])) {
            $provides = $provides->where(function ($query) use ($data) {
                $query->orWhere('provide_code', 'like', '%' . $data['search'] . '%');
                $query->orWhere('provide_name_display', 'like', '%' . $data['search'] . '%');
            });
        }
        if (isset($data['idName'])) {
            $provides = $provides->whereIn('provides.id', $data['idName']);
        }
        if (isset($data['idCode'])) {
            $provides = $provides->whereIn('provides.id', $data['idCode']);
        }
        if (isset($data['email'])) {
            $provides = $provides->where('provide_email', 'like', '%' . $data['email'] . '%');
        }
        if (isset($data['phone'])) {
            $provides = $provides->where('provide_phone', 'like', '%' . $data['phone'] . '%');
        }
        if (isset($data['debt'][0]) && isset($data['debt'][1])) {
            $provides = $provides->where('provide_debt', $data['debt'][0], $data['debt'][1]);
        }
        if (isset($data['sort']) && isset($data['sort'][0])) {
            $provides = $provides->orderBy($data['sort'][0], $data['sort'][1]);
        }
        $provides = $provides->get();
        return $provides;
    }
    public function model(array $row)
    {
        return new Provides([
            'provide_name_display' => $row['C'], // Thay $row[0] bằng cột tương ứng trong file Excel
            'provide_code' => $row['D'],
        ]);
    }
    public function provideName($data)
    {
        $provides = DB::table($this->table);
        if (isset($data)) {
            $provides = $provides->whereIn('provides.id', $data);
        }
        $provides = $provides->pluck('provide_name_display')->all();
        return $provides;
    }
}
