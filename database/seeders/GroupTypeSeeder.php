<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GroupTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('grouptype')->insert([
            [
                'name' => 'Nhân viên',
                'description' => 'Nhóm dành cho nhân viên',
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'name' => 'Khách hàng',
                'description' => 'Nhóm dành cho khách hàng',
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'name' => 'Nhà cung cấp',
                'description' => 'Nhóm dành cho nhà cung cấp',
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'name' => 'Hàng hoá',
                'description' => 'Nhóm dành cho hàng hoá',
                'created_at' => now(), 'updated_at' => now(),
            ],
        ]);
    }
}
