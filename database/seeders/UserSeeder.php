<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin',
                'email' => 'admin@ringnet.vn',
                'provider' => 'login',
                'provider_id' => 1,
                'password' => bcrypt('Ringnet@123'),
                'current_workspace' => 1,
                'origin_workspace' => 1,
                'status' => 1,
                'roleid' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
