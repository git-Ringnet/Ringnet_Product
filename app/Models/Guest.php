<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Guest extends Model
{
    use HasFactory;
    protected $fillable = [
        'guest_name_display',
        'guest_name',
        'guest_address',
        'guest_code',
        'guest_email',
        'guest_phone',
        'guest_receiver',
        'guest_email_personal',
        'guest_phone_receiver',
        'guest_debt',
        'guest_note'
    ];
    protected $table = 'guest';

    public function getAllGuest()
    {
        return DB::table($this->table)->get();
    }
    public function getGuestbyCompany($data)
    {
        $guests = DB::table($this->table);
        if (isset($data['idCompany'])) {
            $guests = $guests->whereIn('guest.id', $data['idCompany']);
        }
        $guests = $guests->pluck('guest_name')->all();
        return $guests;
    }
    public function getGuestbyName($data)
    {
        $guests = DB::table($this->table);
        if (isset($data['idName'])) {
            $guests = $guests->whereIn('guest.id', $data['idName']);
        }
        $guests = $guests->pluck('guest_name_display')->all();
        return $guests;
    }
    public function getGuestbyId($id)
    {
        $guests = DB::table($this->table);
        $guests = $guests->where('guest.id', $id)->get();

        return $guests;
    }
    public function ajax($data)
    {
        $guests =  DB::table($this->table);
        if (isset($data['search'])) {
            $guests = $guests->where(function ($query) use ($data) {
                $query->orWhere('guest_name', 'like', '%' . $data['search'] . '%');
                $query->orWhere('guest_name_display', 'like', '%' . $data['search'] . '%');
            });
        }
        if (isset($data['idName'])) {
            $guests = $guests->whereIn('guest.id', $data['idName']);
        }
        if (isset($data['idCompany'])) {
            $guests = $guests->whereIn('guest.id', $data['idCompany']);
        }
        if (isset($data['email'])) {
            $guests = $guests->where('guest_email', 'like', '%' . $data['email'] . '%');
        }
        if (isset($data['phone'])) {
            $guests = $guests->where('guest_phone', 'like', '%' . $data['phone'] . '%');
        }
        if (isset($data['debt'][0]) && isset($data['debt'][1])) {
            $guests = $guests->where('guest_debt', $data['debt'][0], $data['debt'][1]);
        }
        if (isset($data['sort_by']) && $data['sort_type']) {
            $guests = $guests->orderBy($data['sort_by'], $data['sort_type']);
        }
        $guests = $guests->get();
        return $guests;
    }

    public function addGuest($data)
    {
        $exist = false;
        $guests = DB::table($this->table)->where('guest_code', $data['guest_code'])->first();
        if ($guests) {
            $exist = true;
        } else {
            $dataguest = [
                'guest_name_display' => $data['guest_name_display'],
                'guest_name' => $data['guest_name'],
                'guest_address' => $data['guest_address'],
                'guest_code' => $data['guest_code'],
                'guest_phone' => $data['guest_phone'],
                'guest_email' => $data['guest_email'],
                'guest_receiver' => $data['guest_receiver'],
                'guest_email_personal' => $data['guest_email_personal'],
                'guest_phone_receiver' => $data['guest_phone_receiver'],
                'guest_debt' => $data['guest_debt'],
                'guest_note' => $data['guest_note']
            ];
            $provide_id =  DB::table($this->table)->insert($dataguest);
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
}
