<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\Enrollment;
use App\Services\ProgressService;

class DashboardController extends Controller
{
    public function index(ProgressService $progressService)
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

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
