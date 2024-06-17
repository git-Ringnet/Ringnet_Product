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
                'phone_number' => '0123456789',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Qui',
                'email' => 'qui@ringnet.vn',
                'provider' => 'login',
                'provider_id' => 1,
                'password' => bcrypt('Ringnet@123'),
                'current_workspace' => 1,
                'origin_workspace' => 1,
                'status' => 1,
                'roleid' => 1,
                'phone_number' => '0987654123',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
        DB::table('user_workspaces')->insert([
            [
                'user_id' => 1,
                'workspace_id' => 1,
                'roleid' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'workspace_id' => 1,
                'roleid' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
