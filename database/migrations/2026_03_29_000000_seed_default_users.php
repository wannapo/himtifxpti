<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

/**
 * Migration untuk memastikan user default (admin & student) selalu ada
 * dengan password yang benar. Ini dipakai karena db:seed tidak selalu
 * dijalankan oleh Railway/Nixpacks saat startup.
 */
return new class extends Migration
{
    public function up(): void
    {
        $this->upsertUser('admin@example.com', 'Admin System', 'password', 'admin');
        $this->upsertUser('student@example.com', 'Student Test', 'password', 'student');
    }

    private function upsertUser(string $email, string $name, string $password, string $role): void
    {
        $exists = DB::table('users')->where('email', $email)->first();

        if ($exists) {
            DB::table('users')->where('email', $email)->update([
                'password' => Hash::make($password),
                'email_verified_at' => now(),
                'updated_at' => now(),
            ]);
        } else {
            DB::table('users')->insert([
                'name' => $name,
                'email' => $email,
                'password' => Hash::make($password),
                'role' => $role,
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    public function down(): void
    {
        // Tidak menghapus user saat rollback
    }
};
