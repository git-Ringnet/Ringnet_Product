<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class representGuest extends Model
{
    use HasFactory;
    protected $table = 'represent_guest';
    protected $fillable = [
        'guest_id',
        'represent_name',
        'represent_email',
        'represent_phone',
        'represent_address',
        'created_at',
        'updated_at'
    ];
    public function updateRepresentGuest($data, $id)
    {
        representGuest::where('guest_id', $id)->delete();
        //Thêm người đại diện
        if (isset($data['represent_name'])) {
            for ($i = 0; $i < count($data['represent_name']); $i++) {
                $dataRepresent = [
                    'guest_id' => $id,
                    'represent_name' => $data['represent_name'][$i],
                    'represent_email' => $data['represent_email'][$i],
                    'represent_phone' => $data['represent_phone'][$i],
                    'represent_address' => $data['represent_address'][$i],
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ];
                DB::table('represent_guest')->insert($dataRepresent);
            }
        }
    }
}
