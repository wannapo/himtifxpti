<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, Lesson $lesson)
    {
        $request->validate([
            'body' => 'required|string|max:1000',
        ]);

        $lesson->comments()->create([
            'user_id' => Auth::id(),
            'body' => $request->body,
        ]);

        return back()->with('success', 'Komentar berhasil ditambahkan.');
    }
}
