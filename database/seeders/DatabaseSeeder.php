<?php

namespace Database\Seeders;

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
