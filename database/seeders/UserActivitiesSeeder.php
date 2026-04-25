<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserActivitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Populates the user_activities table with initial data.
     */
    public function run()
    {
        DB::table('user_activities')->insert([
            [
                'id' => 1,
                'user_id' => 1,
                'date' => '2026-04-01',
                'points_earned' => 20,
                'created_at' => '2026-03-31 22:45:47',
                'updated_at' => '2026-03-31 22:45:54'
            ]
        ]);
    }
}