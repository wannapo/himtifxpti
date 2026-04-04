<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Course;
use App\Services\EnrollmentService;

class EnrollmentController extends Controller
{
    public function store(Request $request, Course $course, EnrollmentService $enrollmentService)
    {
        $enrollmentService->enrollUser($course->id, auth()->id());
        return redirect()->route('courses.show', $course->slug)->with('success', 'Berhasil mendaftar kursus!');
    }
}
