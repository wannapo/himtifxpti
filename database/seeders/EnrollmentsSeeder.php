<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EnrollmentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Populates the enrollments table with initial data.
     */
    public function run()
    {
        DB::table('enrollments')->insert([
            [
                'id' => 1,
                'user_id' => 2,
                'course_id' => 1,
                'enrolled_at' => '2026-03-31 22:02:06',
                'status' => 'active',
                'created_at' => '2026-03-31 22:02:06',
                'updated_at' => '2026-03-31 22:02:06'
            ],
            [
                'id' => 2,
                'user_id' => 1,
                'course_id' => 1,
                'enrolled_at' => '2026-03-31 22:44:49',
                'status' => 'active',
                'created_at' => '2026-03-31 22:44:49',
                'updated_at' => '2026-03-31 22:44:49'
            ],
            [
                'id' => 3,
                'user_id' => 2,
                'course_id' => 6,
                'enrolled_at' => '2026-04-05 22:21:40',
                'status' => 'active',
                'created_at' => '2026-04-05 22:21:40',
                'updated_at' => '2026-04-05 22:21:40'
            ],
            [
                'id' => 4,
                'user_id' => 1,
                'course_id' => 6,
                'enrolled_at' => '2026-04-15 06:24:03',
                'status' => 'active',
                'created_at' => '2026-04-15 06:24:03',
                'updated_at' => '2026-04-15 06:24:03'
            ],
            [
                'id' => 5,
                'user_id' => 1,
                'course_id' => 5,
                'enrolled_at' => '2026-04-17 01:28:41',
                'status' => 'active',
                'created_at' => '2026-04-17 01:28:41',
                'updated_at' => '2026-04-17 01:28:41'
            ],
            [
                'id' => 6,
                'user_id' => 2,
                'course_id' => 5,
                'enrolled_at' => '2026-04-20 00:35:10',
                'status' => 'active',
                'created_at' => '2026-04-20 00:35:10',
                'updated_at' => '2026-04-20 00:35:10'
            ]
        ]);
    }
}