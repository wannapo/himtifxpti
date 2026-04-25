<?php

namespace Database\Seeders;

<<<<<<< HEAD
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
=======
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // forceFill + explicit Hash::make bypass model 'hashed' cast
        // sehingga password PASTI hanya di-hash 1x
        $admin = User::firstOrNew(['email' => 'admin@example.com']);
        $admin->forceFill([
            'name' => 'Admin System',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'email_verified_at' => now(),
        ])->save();

        $student = User::firstOrNew(['email' => 'student@example.com']);
        $student->forceFill([
            'name' => 'Student Test',
            'password' => Hash::make('password'),
            'role' => 'student',
            'email_verified_at' => now(),
        ])->save();

        $this->call(CourseSeeder::class);
    }
}
>>>>>>> 16daf2ab4b3ba50f6b77b31ce427a4794e96c73c
