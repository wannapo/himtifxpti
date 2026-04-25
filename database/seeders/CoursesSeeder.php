<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CoursesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Populates the courses table with initial data.
     */
    public function run()
    {
        DB::table('courses')->insert([
            [
                'id' => 1,
                'title' => 'Github',
                'slug' => 'github-69d2279059dbb',
                'description' => 'GitHub is a provider of Internet hosting for software development and version control using Git. It offers the distributed version control and source code management functionality of Git, plus its own features.',
                'image' => '/storage/courses/mxSqqG21XzWIxBikNUZMQluL2QOHjjgAg2JKZarM.png',
                'status' => 'published',
                'created_at' => '2026-03-28 14:07:09',
                'updated_at' => '2026-04-18 22:07:36'
            ],
            [
                'id' => 2,
                'title' => 'Git',
                'slug' => 'git-69d227fa45535',
                'description' => 'Git is a free and open source distributed version control system designed to handle everything from small to very large projects with speed and efficiency.',
                'image' => '/storage/courses/nIKTC9wSU7Y7UVuyWr7QJIJU1N9K2CeNeQP6brwk.png',
                'status' => 'published',
                'created_at' => '2026-04-05 02:14:34',
                'updated_at' => '2026-04-05 02:24:05'
            ],
            [
                'id' => 4,
                'title' => 'JavaScript',
                'slug' => 'javascript-69d22d1ce621a',
                'description' => 'bahasa pemrograman tingkat tinggi, dinamis, dan bertipe skrip yang menjadi teknologi inti internet bersama HTML (struktur) dan CSS (tampilan). JavaScript memberikan "kehidupan" pada website dengan memungkinkan adanya elemen interaktif dan fungsionalitas kompleks',
                'image' => '/storage/courses/RDNC5FB6sP0pDwtkRTqHvBD5SBxM12cELB3NxjeC.png',
                'status' => 'published',
                'created_at' => '2026-04-05 02:36:28',
                'updated_at' => '2026-04-18 21:51:18'
            ],
            [
                'id' => 5,
                'title' => 'Cascading Style Sheets (CSS)',
                'slug' => 'cascading-style-sheets-css-69d22d66a7790',
                'description' => 'bahasa yang digunakan untuk mengatur tampilan dan desain sebuah halaman website',
                'image' => '/storage/courses/8F5u9t2SrnSO8SaCbIYoCK87gWAZ5nFrWkv4k0mb.png',
                'status' => 'published',
                'created_at' => '2026-04-05 02:37:42',
                'updated_at' => '2026-04-18 21:50:46'
            ],
            [
                'id' => 6,
                'title' => 'HyperText Markup Language (HTML)',
                'slug' => 'hypertext-markup-language-html-69d22da962373',
                'description' => 'HTML stands for HyperText Markup Language. It is used on the frontend and gives the structure to the webpage which you can style using CSS and make interactive using JavaScript.',
                'image' => '/storage/courses/VEqoXncMKsZ2uScRPh9p6pc716h9OYOLx8kwLaFx.png',
                'status' => 'published',
                'created_at' => '2026-04-05 02:38:49',
                'updated_at' => '2026-04-18 21:40:09'
            ]
        ]);
    }
}