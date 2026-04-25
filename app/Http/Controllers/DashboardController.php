<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
<<<<<<< HEAD
use Illuminate\Support\Facades\Auth;
use App\Models\Enrollment;
use App\Models\UserActivity;
use App\Models\User;
use App\Models\Course; // Pastikan ini sudah di-import
use App\Models\Lesson;
=======

use Illuminate\Support\Facades\Auth;
use App\Models\Enrollment;
>>>>>>> 16daf2ab4b3ba50f6b77b31ce427a4794e96c73c
use App\Services\ProgressService;

class DashboardController extends Controller
{
    public function index(ProgressService $progressService)
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

<<<<<<< HEAD
        // 1. Ambil data statistik untuk Stats Row
        $stats = [
            'students' => User::count(),
            'courses'  => Course::count(),
            'lessons'  => Lesson::count(),
        ];

        // 2. Ambil data kursus untuk bagian "Mulai dari Kursus Ini"
        // Kita ambil 6 kursus terbaru misalnya
        $courses = Course::latest()->take(6)->get();

        // 3. Inisialisasi default
        $enrollments = collect();
        $activities = [];

        // 4. Logika khusus jika User sudah LOGIN
        if ($user) {
            $enrollments = Enrollment::with('course')->where('user_id', $user->id)->get();

            foreach ($enrollments as $enrollment) {
                if ($enrollment->course) {
                    $enrollment->progressPercent = $progressService->getCourseProgress($enrollment->course, $user->id);
                    $enrollment->nextLesson = $progressService->getNextUnfinishedLesson($enrollment->course, $user->id);
                }
            }

            $activities = UserActivity::where('user_id', $user->id)
                ->where('date', '>=', now()->subMonths(6))
                ->get()
                ->keyBy(function($item) {
                    return is_string($item->date) ? date('Y-m-d', strtotime($item->date)) : $item->date->format('Y-m-d');
                })
                ->map(function ($activity) {
                    return $activity->points_earned;
                })->toArray();
        }

        // 5. Kirim SEMUA variabel ke view (tambahkan 'courses')
        return view('dashboard', compact('enrollments', 'user', 'activities', 'stats', 'courses'));
    }
}
=======
        // Admin/Instructor can have a different dashboard, but for now we list enrollments if any.
        // It serves correctly for student roles.
        $enrollments = Enrollment::with('course')->where('user_id', $user->id)->get();
        
        foreach ($enrollments as $enrollment) {
            if ($enrollment->course) {
                $enrollment->progressPercent = $progressService->getCourseProgress($enrollment->course, $user->id);
                $enrollment->nextLesson = $progressService->getNextUnfinishedLesson($enrollment->course, $user->id);
            }
        }

        // Fetch User Activities for Heatmap (last 6 months)
        $activities = \App\Models\UserActivity::where('user_id', $user->id)
            ->where('date', '>=', now()->subMonths(6))
            ->get()
            ->keyBy(function($item) {
                return $item->date->format('Y-m-d');
            })
            ->map(function ($activity) {
                return $activity->points_earned;
            })->toArray();

        return view('dashboard', compact('enrollments', 'user', 'activities'));
    }
}
>>>>>>> 16daf2ab4b3ba50f6b77b31ce427a4794e96c73c
