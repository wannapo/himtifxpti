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
        return view('pages.about');
    }

    public function sponsorship()
    {
        return view('pages.sponsorship'); // Pastikan kamu sudah punya file resources/views/sponsorship.blade.php
    }
}
