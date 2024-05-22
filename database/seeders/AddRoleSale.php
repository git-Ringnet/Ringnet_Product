<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddRoleSale extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->insert([
            [
                'name' => 'Sale',
                'shortname' => 'sale',
                'description' => 'Sale',
                'created_at' => now(), 'updated_at' => now(),
            ],

        ]);
    }
}
