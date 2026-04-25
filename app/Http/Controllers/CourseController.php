<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Course;
use App\Services\EnrollmentService;
use App\Services\ProgressService;

class CourseController extends Controller
{
    public function index(Request $request)
    {
        $query = Course::where('status', 'published')->latest();

        if ($request->filled('search')) {
            $searchTerm = '%' . $request->search . '%';
            $query->where(function($q) use ($searchTerm) {
                $q->where('title', 'like', $searchTerm)
                  ->orWhere('description', 'like', $searchTerm);
            });
        }

        $courses = $query->get();
        return view('courses.index', compact('courses'));
    }

    public function show(Course $course, EnrollmentService $enrollmentService, ProgressService $progressService)
    {
        if ($course->status !== 'published') {
            if (!auth()->check() || !in_array(auth()->user()->role, ['instructor', 'admin'])) {
                abort(404, 'Kursus tidak ditemukan atau sedang dalam draft.');
            }
        }

        $course->load(['modules.lessons' => function ($query) {
            $query->orderBy('order_index');
        }]);

        $isEnrolled = false;
        $progressPercent = 0;
        $nextLesson = null;
        $completedLessonIds = [];

        if (auth()->check()) {
            $isEnrolled = $enrollmentService->isUserEnrolled($course->id, auth()->id());
            if ($isEnrolled) {
                $progressPercent = $progressService->getCourseProgress($course, auth()->id());
                $nextLesson = $progressService->getNextUnfinishedLesson($course, auth()->id());
                $completedLessonIds = $progressService->getCompletedLessonIds($course, auth()->id());
            }
        }

        return view('courses.show', compact('course', 'isEnrolled', 'progressPercent', 'nextLesson', 'completedLessonIds'));
    }
}
