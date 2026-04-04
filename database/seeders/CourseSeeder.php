<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $course = \App\Models\Course::firstOrCreate(
            ['slug' => \Illuminate\Support\Str::slug('Belajar Dasar Pemrograman')],
            [
                'title' => 'Belajar Dasar Pemrograman',
                'description' => 'Mempelajari konsep dasar pemrograman web untuk pemula.',
                'image' => 'https://via.placeholder.com/800x400.png?text=Pemrograman+Dasar',
                'status' => 'published',
            ]
        );

        $module1 = \App\Models\Module::firstOrCreate(
            ['course_id' => $course->id, 'title' => 'Pendahuluan'],
            ['order_index' => 1]
        );

        $lesson1 = \App\Models\Lesson::firstOrCreate(
            ['module_id' => $module1->id, 'title' => 'Apa itu Programming?'],
            [
                'content_type' => 'text',
                'content' => 'Programming adalah proses menulis, menguji, dan memperbaiki (mende-bug) kode yang membangun program komputer. Tujuan dari programming adalah untuk memuat suatu kalkulasi atau alur kerja menjadi otomatis.',
                'order_index' => 1,
                'quiz_question' => 'Apa tujuan utama dari programming?',
                'quiz_options' => ['Membuat komputer menjadi lambat', 'Membuat suatu alur kerja otomatis', 'Hanya untuk bermain game'],
                'quiz_correct_index' => 1,
                'quiz_explanation' => 'Programming bertujuan untuk mengotomasi tugas-tugas sehingga komputer dapat bekerja lebih efisien.',
            ]
        );

        \App\Models\Lesson::firstOrCreate(
            ['module_id' => $module1->id, 'title' => 'Instalasi Tools'],
            [
                'content_type' => 'video',
                'video_url' => 'https://www.youtube.com/embed/dQw4w9WgXcQ',
                'order_index' => 2,
                'quiz_question' => 'Video di atas menggunakan platform apa?',
                'quiz_options' => ['YouTube', 'Vimeo', 'Dailymotion'],
                'quiz_correct_index' => 0,
                'quiz_explanation' => 'URL yang digunakan adalah embed dari platform YouTube.',
            ]
        );

        $admin = \App\Models\User::where('email', 'admin@example.com')->first();
        if ($admin && $lesson1) {
            \App\Models\Comment::firstOrCreate(
                ['lesson_id' => $lesson1->id, 'user_id' => $admin->id],
                ['body' => 'Materi pendahuluan yang sangat informatif! Silakan berdiskusi di sini jika ada pertanyaan.']
            );
        }
    }
}
