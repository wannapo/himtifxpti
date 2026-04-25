<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Lesson;
use App\Models\User;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function landing()
    {
        $courses = Course::where('status', 'published')
            ->latest()
            ->take(3)
            ->get();

        $stats = [
            'students' => User::where('role', 'student')->count(),
            'courses' => Course::where('status', 'published')->count(),
            'lessons' => Lesson::count(),
        ];

        return view('landing', compact('courses', 'stats'));
    }

    public function about()
    {
<<<<<<< HEAD
        return view('pages.about');
    }

    public function sponsorship()
    {
        return view('pages.sponsorship'); // Pastikan kamu sudah punya file resources/views/sponsorship.blade.php
=======
        return view('about');
>>>>>>> 16daf2ab4b3ba50f6b77b31ce427a4794e96c73c
    }
}
