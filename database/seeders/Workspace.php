<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Workspace extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('workspaces')->insert([
            [
                'user_id' => 1,
                'workspace_name' => 'Ringnet',
                'name_company' => 'Ringnet',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
        DB::table('user_workspaces')->insert([
            [
                'user_id' => 1,
                'workspace_id' => 1,
                'roleid' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
