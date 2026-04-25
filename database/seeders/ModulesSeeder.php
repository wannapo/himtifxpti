<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModulesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Populates the modules table with initial data.
     */
    public function run()
    {
        DB::table('modules')->insert([
            [
                'id' => 1,
                'course_id' => 1,
                'title' => 'Pendahuluan',
                'order_index' => 1,
                'created_at' => '2026-03-28 14:07:09',
                'updated_at' => '2026-03-28 14:07:09'
            ],
            [
                'id' => 2,
                'course_id' => 6,
                'title' => 'Pengenalan & Persiapan Lingkungan Kerja',
                'order_index' => 1,
                'created_at' => '2026-04-05 02:42:14',
                'updated_at' => '2026-04-05 04:20:01'
            ],
            [
                'id' => 5,
                'course_id' => 6,
                'title' => 'Dasar-Dasar Teks & Tipografi',
                'order_index' => 2,
                'created_at' => '2026-04-05 02:56:38',
                'updated_at' => '2026-04-05 04:21:30'
            ],
            [
                'id' => 6,
                'course_id' => 6,
                'title' => 'Struktur Navigasi & Informasi',
                'order_index' => 3,
                'created_at' => '2026-04-05 02:57:42',
                'updated_at' => '2026-04-05 04:22:08'
            ],
            [
                'id' => 7,
                'course_id' => 6,
                'title' => 'Data & Interaksi Pengguna',
                'order_index' => 4,
                'created_at' => '2026-04-05 02:57:53',
                'updated_at' => '2026-04-05 04:23:02'
            ],
            [
                'id' => 8,
                'course_id' => 6,
                'title' => 'Multimedia dalam Web',
                'order_index' => 5,
                'created_at' => '2026-04-05 02:58:18',
                'updated_at' => '2026-04-05 04:23:29'
            ],
            [
                'id' => 9,
                'course_id' => 6,
                'title' => 'Projek Akhir & Pemantapan',
                'order_index' => 6,
                'created_at' => '2026-04-05 02:58:26',
                'updated_at' => '2026-04-05 04:23:48'
            ],
            [
                'id' => 11,
                'course_id' => 5,
                'title' => 'Pengenalan CSS',
                'order_index' => 1,
                'created_at' => '2026-04-05 02:59:31',
                'updated_at' => '2026-04-05 02:59:31'
            ],
            [
                'id' => 13,
                'course_id' => 5,
                'title' => 'Selector',
                'order_index' => 2,
                'created_at' => '2026-04-05 03:00:16',
                'updated_at' => '2026-04-05 03:00:16'
            ],
            [
                'id' => 14,
                'course_id' => 5,
                'title' => 'Warna dan Font',
                'order_index' => 3,
                'created_at' => '2026-04-05 03:00:33',
                'updated_at' => '2026-04-05 03:00:33'
            ],
            [
                'id' => 15,
                'course_id' => 5,
                'title' => 'Box Model',
                'order_index' => 4,
                'created_at' => '2026-04-05 03:00:44',
                'updated_at' => '2026-04-05 03:00:44'
            ],
            [
                'id' => 16,
                'course_id' => 5,
                'title' => 'Layout',
                'order_index' => 5,
                'created_at' => '2026-04-05 03:00:54',
                'updated_at' => '2026-04-05 03:00:54'
            ],
            [
                'id' => 17,
                'course_id' => 5,
                'title' => 'Responsive',
                'order_index' => 6,
                'created_at' => '2026-04-05 03:01:02',
                'updated_at' => '2026-04-05 03:01:02'
            ],
            [
                'id' => 18,
                'course_id' => 4,
                'title' => 'Pengenalan JavaScript',
                'order_index' => 1,
                'created_at' => '2026-04-05 03:01:42',
                'updated_at' => '2026-04-05 03:01:42'
            ],
            [
                'id' => 19,
                'course_id' => 4,
                'title' => 'Variabel',
                'order_index' => 2,
                'created_at' => '2026-04-05 03:01:53',
                'updated_at' => '2026-04-05 03:01:53'
            ],
            [
                'id' => 20,
                'course_id' => 4,
                'title' => 'Tipe Data',
                'order_index' => 3,
                'created_at' => '2026-04-05 03:02:17',
                'updated_at' => '2026-04-05 03:02:17'
            ],
            [
                'id' => 21,
                'course_id' => 4,
                'title' => 'Operator dan Kondisi',
                'order_index' => 4,
                'created_at' => '2026-04-05 03:02:38',
                'updated_at' => '2026-04-05 03:02:38'
            ],
            [
                'id' => 22,
                'course_id' => 4,
                'title' => 'Function',
                'order_index' => 5,
                'created_at' => '2026-04-05 03:02:56',
                'updated_at' => '2026-04-05 03:02:56'
            ],
            [
                'id' => 23,
                'course_id' => 4,
                'title' => 'DOM',
                'order_index' => 6,
                'created_at' => '2026-04-05 03:03:07',
                'updated_at' => '2026-04-05 03:03:07'
            ],
            [
                'id' => 24,
                'course_id' => 4,
                'title' => 'Event',
                'order_index' => 7,
                'created_at' => '2026-04-05 03:03:15',
                'updated_at' => '2026-04-05 03:03:15'
            ]
        ]);
    }
}