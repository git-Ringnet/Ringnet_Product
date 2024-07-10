<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->insert([
            [
                'id' => 1,
                'name' => 'SupperADMIN',
                'shortname' => 'spAdmin',
                'description' => 'SupperADMIN',
            ],
            [
                'id' => 2,
                'name' => 'Admin',
                'shortname' => 'admin',
                'description' => 'Admin',
            ],
            [
                'id' => 3,
                'name' => 'Sale',
                'shortname' => 'sale',
                'description' => 'Sale',
            ],
            //  [
            //     'id' => 3,
            //     'name' => 'Quản lí kho',
            //     'shortname' => 'manager',
            //     'description' => 'Quản lí kho',
            // ],
            // [
            //     'id' => 4,
            //     'name' => 'Sale',
            //     'shortname' => 'sale',
            //     'description' => 'Sale',
            // ],
        ]);
    }
}
