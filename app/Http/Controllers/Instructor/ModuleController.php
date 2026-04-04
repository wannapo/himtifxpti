<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Module;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    public function create(Course $course)
    {
        return view('instructor.modules.create', compact('course'));
    }

    public function store(Request $request, Course $course)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'order_index' => 'required|integer',
        ]);

        $course->modules()->create($validated);

        return redirect()->route('instructor.courses.show', $course->id)->with('success', 'Modul berhasil ditambahkan.');
    }

    public function edit(Module $module)
    {
        return view('instructor.modules.edit', compact('module'));
    }

    public function update(Request $request, Module $module)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'order_index' => 'required|integer',
        ]);

        $module->update($validated);

        return redirect()->route('instructor.courses.show', $module->course_id)->with('success', 'Modul berhasil diperbarui.');
    }

    public function destroy(Module $module)
    {
        $courseId = $module->course_id;
        $module->delete();
        return redirect()->route('instructor.courses.show', $courseId)->with('success', 'Modul berhasil dihapus.');
    }
}
