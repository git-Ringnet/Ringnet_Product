<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WareHouse extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('warehouse')->insert([
            [
                'id' => 1,
                'warehouse_name' => 'Kho 1',
            ],
        ]);
    }
}
