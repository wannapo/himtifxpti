<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MigrationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Populates the migrations table with initial data.
     */
    public function run()
    {
        DB::table('migrations')->insert([
            [
                'id' => 1,
                'migration' => '0001_01_01_000000_create_users_table',
                'batch' => 1
            ],
            [
                'id' => 2,
                'migration' => '0001_01_01_000001_create_cache_table',
                'batch' => 1
            ],
            [
                'id' => 3,
                'migration' => '0001_01_01_000002_create_jobs_table',
                'batch' => 1
            ],
            [
                'id' => 4,
                'migration' => '2026_03_26_175911_create_courses_table',
                'batch' => 1
            ],
            [
                'id' => 5,
                'migration' => '2026_03_26_175912_create_modules_table',
                'batch' => 1
            ],
            [
                'id' => 6,
                'migration' => '2026_03_26_175913_create_lessons_table',
                'batch' => 1
            ],
            [
                'id' => 7,
                'migration' => '2026_03_26_175914_create_enrollments_table',
                'batch' => 1
            ],
            [
                'id' => 8,
                'migration' => '2026_03_26_175915_create_user_progress_table',
                'batch' => 1
            ],
            [
                'id' => 9,
                'migration' => '2026_03_26_181719_add_role_to_users_table',
                'batch' => 1
            ],
            [
                'id' => 10,
                'migration' => '2026_03_26_193803_add_gamification_to_users_table',
                'batch' => 1
            ],
            [
                'id' => 11,
                'migration' => '2026_03_26_193805_create_user_activities_table',
                'batch' => 1
            ],
            [
                'id' => 12,
                'migration' => '2026_03_26_194716_add_quiz_to_lessons_table',
                'batch' => 1
            ],
            [
                'id' => 13,
                'migration' => '2026_03_26_194951_create_comments_table',
                'batch' => 1
            ],
            [
                'id' => 14,
                'migration' => '2026_03_26_233801_add_workspace_to_lessons_table',
                'batch' => 1
            ],
            [
                'id' => 15,
                'migration' => '2026_03_29_000000_seed_default_users',
                'batch' => 2
            ]
        ]);
    }
}