<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('contenttype')->insert([
            [
                'name' => 'Thu',
                'description' => 'Thu',
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'name' => 'Chi',
                'description' => 'Chi',
                'created_at' => now(), 'updated_at' => now(),
            ],
        ]);
    }
}
