<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::latest()->get();
        return view('instructor.courses.index', compact('courses'));
    }

    public function create()
    {
        return view('instructor.courses.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|in:draft,published',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $validated['slug'] = Str::slug($validated['title']) . '-' . uniqid();
        
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('courses', 'public');
            $validated['image'] = '/storage/' . $path;
        }

        Course::create($validated);

        return redirect()->route('instructor.courses.index')->with('success', 'Kursus berhasil ditambahkan!');
    }

    public function show(Course $course)
    {
        $course->load(['modules' => function ($query) {
            $query->orderBy('order_index');
        }, 'modules.lessons' => function ($query) {
            $query->orderBy('order_index');
        }]);
        return view('instructor.courses.show', compact('course'));
    }

    public function edit(Course $course)
    {
        return view('instructor.courses.edit', compact('course'));
    }

    public function update(Request $request, Course $course)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|in:draft,published',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->title !== $course->title) {
            $validated['slug'] = Str::slug($validated['title']) . '-' . uniqid();
        }

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('courses', 'public');
            $validated['image'] = '/storage/' . $path;
        }

        $course->update($validated);

        return redirect()->route('instructor.courses.index')->with('success', 'Kursus berhasil diperbarui!');
    }

    public function destroy(Course $course)
    {
        // Delete image from storage physically if you want, skipping for MVP simplicity
        $course->delete();
        return redirect()->route('instructor.courses.index')->with('success', 'Kursus berhasil dihapus!');
    }
}
