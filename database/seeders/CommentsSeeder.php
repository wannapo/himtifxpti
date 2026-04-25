<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Populates the comments table with initial data.
     */
    public function run()
    {
        DB::table('comments')->insert([
            [
                'id' => 1,
                'lesson_id' => 1,
                'user_id' => 1,
                'body' => 'Materi pendahuluan yang sangat informatif! Silakan berdiskusi di sini jika ada pertanyaan.',
                'created_at' => '2026-03-28 14:07:09',
                'updated_at' => '2026-03-28 14:07:09'
            ]
        ]);
    }
}