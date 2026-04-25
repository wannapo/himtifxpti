<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        $this->call([
            CommentsSeeder::class,
            CoursesSeeder::class,
            EnrollmentsSeeder::class,
            LessonsSeeder::class,
            MigrationsSeeder::class,
            ModulesSeeder::class,
            SessionsSeeder::class,
            UsersSeeder::class,
            UserActivitiesSeeder::class,
            UserProgressSeeder::class
        ]);
    }
}