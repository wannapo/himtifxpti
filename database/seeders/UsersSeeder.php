<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Populates the users table with initial data.
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'id' => 1,
                'name' => 'Admin System',
                'email' => 'admin@example.com',
                'email_verified_at' => '2026-03-28 14:15:06',
                'password' => '$2y$12$ukx8qoWJmM4rNQ6HNMlmmeySXubsifUc/1xrwdd79C2m8EEqNkKS2',
                'avatar' => null,
                'remember_token' => null,
                'created_at' => '2026-03-28 14:07:09',
                'updated_at' => '2026-04-20 01:43:47',
                'role' => 'admin',
                'points' => 20,
                'current_streak' => 2,
                'longest_streak' => 3,
                'last_activity_date' => '2026-04-20 01:43:47'
            ],
            [
                'id' => 2,
                'name' => 'Student Test',
                'email' => 'student@example.com',
                'email_verified_at' => '2026-03-28 14:15:06',
                'password' => '$2y$12$gfkue8QkH9.Pcc7rZsyw1eatq0nY60AnaobSno/PxSwq/5D5b/K3y',
                'avatar' => 'avatars/1nKKLQnLh2rVHEI1yP3nydLmyDk07lEpozLcmIkr.jpg',
                'remember_token' => null,
                'created_at' => '2026-03-28 14:07:09',
                'updated_at' => '2026-04-20 01:20:14',
                'role' => 'student',
                'points' => 0,
                'current_streak' => 2,
                'longest_streak' => 2,
                'last_activity_date' => '2026-04-20 01:20:14'
            ]
        ]);
    }
}