<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportDB implements ToModel
{
    public function model(array $row)
    {
        // return new Guest([
        //     'guest_name_display' => $row[0], // Thay $row[0] bằng cột tương ứng trong file Excel
        //     'guest_code' => $row[1],
        //     'guest_address' => $row[2],
        // ]);
        $models = [];
        $models[] = new Guest([
            'guest_name_display' =>  $row[0],
            'guest_code' => $row[1],
            'guest_address' => $row[1],
        ]);

        // Tạo model Provides
        $models[] = new Provides([
            'provide_name_display' => $row[2],
            'provide_code' => $row[3],
            'provide_address' => $row[3],
            'provide_debt' => 0,
        ]);

        return $models;
    }
}
