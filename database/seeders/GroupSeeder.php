<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('groups')->insert([
            ['group_name' => 'your day', 'group_type' => 'static', 'created_at' => now(), 'updated_at' => now()],
            ['group_name' => 'scheduled', 'group_type' => 'static', 'created_at' => now(), 'updated_at' => now()],
            ['group_name' => 'important', 'group_type' => 'static', 'created_at' => now(), 'updated_at' => now()],
        ]
        );
    }
}
