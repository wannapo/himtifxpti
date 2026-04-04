<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Course;
use App\Models\Lesson;
use App\Services\EnrollmentService;
use App\Services\ProgressService;

class LessonController extends Controller
{
    public function show(Course $course, Lesson $lesson, EnrollmentService $enrollmentService, ProgressService $progressService)
    {
        if ($lesson->module->course_id !== $course->id) {
            abort(404);
        }

        if ($course->status !== 'published') {
            if (!auth()->check() || !in_array(auth()->user()->role, ['instructor', 'admin'])) {
                abort(404, 'Kursus tidak ditemukan atau sedang dalam draft.');
            }
        }

        if (!auth()->check() || !$enrollmentService->isUserEnrolled($course->id, auth()->id())) {
            return redirect()->route('courses.show', $course->slug)->with('error', 'Silakan daftar kursus terlebih dahulu.');
        }

        $course->load(['modules' => function ($query) {
            $query->orderBy('order_index');
        }, 'modules.lessons' => function ($query) {
            $query->orderBy('order_index');
        }]);

        $isCompleted = $progressService->isLessonCompleted($lesson->id, auth()->id());
        $progressPercent = $progressService->getCourseProgress($course, auth()->id());
        $completedLessonIds = $progressService->getCompletedLessonIds($course, auth()->id());

        return view('lessons.show', compact('course', 'lesson', 'isCompleted', 'progressPercent', 'completedLessonIds'));
    }

    public function markComplete(Request $request, Course $course, Lesson $lesson, ProgressService $progressService, \App\Services\GamificationService $gamificationService)
    {
        if ($lesson->module->course_id !== $course->id) {
            abort(404);
        }
        
        if (!$progressService->isLessonCompleted($lesson->id, auth()->id())) {
            $progressService->markLessonComplete($lesson->id, auth()->id());
            
            // Award points for completing a lesson (e.g. 10 points)
            /** @var \App\Models\User $user */
            $user = auth()->user();
            $gamificationService->recordActivity($user, 10);

            // Trigger Gamification Modal on next page load
            session()->flash('challenge_completed', true);
            session()->flash('points_earned', 10);
            session()->flash('current_streak', $user->current_streak);
        }
        // Redirect to next unfinished lesson or back to course details
        $nextLesson = $progressService->getNextUnfinishedLesson($course, auth()->id());
        if ($nextLesson) {
            return redirect()->route('lessons.show', [$course->slug, $nextLesson->id])
                             ->with('success', 'Materi selesai! Melanjutkan ke materi berikutnya.');
        }

        return redirect()->route('courses.show', $course->slug)->with('success', 'Selamat, Anda telah menyelesaikan seluruh materi kursus!');
    }
}
