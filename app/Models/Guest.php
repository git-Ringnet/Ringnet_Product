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
                'guest_debt' => 0,
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
