<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Provides extends Model
{
    use HasFactory;
    protected $table = 'provides';
    protected $fillable = [
        'provide_name_display',
        'provide_name',
        'provide_address',
        'provide_code',
        'provide_represent',
        'provide_email',
        'provide_phone',
        'provide_debt',
        'provide_address_delivery',
    ];

    public function getAllDetail()
    {
        return $this->hasMany(DetailImport::class, 'provide_id', 'id');
    }

    public function getAllProvide()
    {
        return DB::table($this->table)->get();
    }
    public function addProvide($data)
    {
        $exist = false;
        $provides = DB::table($this->table)->where('provide_code', $data['provide_code'])->first();
        if ($provides) {
            $exist = true;
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
                'provide_represent' => $data['provide_represent'],
                'provide_email' => $data['provide_email'],
                'provide_phone' => $data['provide_phone'],
                'provide_debt' => 0,
                'provide_address_delivery' => $data['provide_address_delivery']
            ];
            $provide_id =  DB::table($this->table)->insert($dataProvide);
            if ($provide_id) {
                $exist = false;
            }
        }
        return $exist;
    }
    public function updateProvide($data, $id)
    {
        return DB::table($this->table)->where('id', $id)->update($data);
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
        if (isset($data['sort_by']) && $data['sort_type']) {
            $provides = $provides->orderBy($data['sort_by'], $data['sort_type']);
        }
        $provides = $provides->get();
        return $provides;
    }
}
