<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserProgressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Populates the user_progress table with initial data.
     */
    public function run()
    {
        DB::table('user_progress')->insert([
            [
                'id' => 1,
                'user_id' => 1,
                'lesson_id' => 1,
                'completed_at' => '2026-03-31 22:45:47',
                'created_at' => '2026-03-31 22:45:47',
                'updated_at' => '2026-03-31 22:45:47'
            ],
            [
                'id' => 2,
                'user_id' => 1,
                'lesson_id' => 2,
                'completed_at' => '2026-03-31 22:45:54',
                'created_at' => '2026-03-31 22:45:54',
                'updated_at' => '2026-03-31 22:45:54'
            ]
        ]);
    }
}