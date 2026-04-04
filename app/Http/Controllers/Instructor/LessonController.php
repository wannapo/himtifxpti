<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use App\Models\Lesson;
use App\Models\Module;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function create(Module $module)
    {
        return view('instructor.lessons.create', compact('module'));
    }

    public function store(Request $request, Module $module)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content_type' => 'required|in:text,video',
            'content' => 'nullable|string',
            'video_url' => 'nullable|string',
            'video_file' => 'nullable|file|mimes:mp4,mov,ogg,qt|max:51200', // 50MB max
            'order_index' => 'required|integer',
            'quiz_question' => 'nullable|string',
            'quiz_options' => 'nullable|array',
            'quiz_options.*' => 'nullable|string',
            'quiz_correct_index' => 'nullable|integer',
            'quiz_explanation' => 'nullable|string',
            'has_workspace' => 'nullable',
            'code_html' => 'nullable|string',
            'code_css' => 'nullable|string',
            'code_js' => 'nullable|string',
        ]);

        $validated['has_workspace'] = $request->has('has_workspace');

        if ($request->hasFile('video_file') && $validated['content_type'] === 'video') {
            $path = $request->file('video_file')->store('videos', 'public');
            $validated['video_url'] = '/storage/' . $path;
        }

        if (!empty($validated['quiz_options'])) {
            $options = array_values(array_filter($validated['quiz_options'], fn($opt) => !empty(trim($opt ?? ''))));
            $validated['quiz_options'] = count($options) > 0 ? $options : null;
        } else {
            $validated['quiz_options'] = null;
        }

        if (empty($validated['quiz_question']) || empty($validated['quiz_options'])) {
            $validated['quiz_question'] = null;
            $validated['quiz_options'] = null;
            $validated['quiz_correct_index'] = null;
            $validated['quiz_explanation'] = null;
        }

        $module->lessons()->create($validated);

        return redirect()->route('instructor.courses.show', $module->course_id)->with('success', 'Materi berhasil ditambahkan.');
    }

    public function edit(Lesson $lesson)
    {
        return view('instructor.lessons.edit', compact('lesson'));
    }

    public function update(Request $request, Lesson $lesson)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content_type' => 'required|in:text,video',
            'content' => 'nullable|string',
            'video_url' => 'nullable|string',
            'video_file' => 'nullable|file|mimes:mp4,mov,ogg,qt|max:51200',
            'order_index' => 'required|integer',
            'quiz_question' => 'nullable|string',
            'quiz_options' => 'nullable|array',
            'quiz_options.*' => 'nullable|string',
            'quiz_correct_index' => 'nullable|integer',
            'quiz_explanation' => 'nullable|string',
            'has_workspace' => 'nullable',
            'code_html' => 'nullable|string',
            'code_css' => 'nullable|string',
            'code_js' => 'nullable|string',
        ]);

        $validated['has_workspace'] = $request->has('has_workspace');

        if ($request->hasFile('video_file') && $validated['content_type'] === 'video') {
            $path = $request->file('video_file')->store('videos', 'public');
            $validated['video_url'] = '/storage/' . $path;
        }

        if (!empty($validated['quiz_options'])) {
            $options = array_values(array_filter($validated['quiz_options'], fn($opt) => !empty(trim($opt ?? ''))));
            $validated['quiz_options'] = count($options) > 0 ? $options : null;
        } else {
            $validated['quiz_options'] = null;
        }

        if (empty($validated['quiz_question']) || empty($validated['quiz_options'])) {
            $validated['quiz_question'] = null;
            $validated['quiz_options'] = null;
            $validated['quiz_correct_index'] = null;
            $validated['quiz_explanation'] = null;
        }

        $lesson->update($validated);

        return redirect()->route('instructor.courses.show', $lesson->module->course_id)->with('success', 'Materi berhasil diperbarui.');
    }

    public function destroy(Lesson $lesson)
    {
        $courseId = $lesson->module->course_id;
        $lesson->delete();
        return redirect()->route('instructor.courses.show', $courseId)->with('success', 'Materi berhasil dihapus.');
    }
}
