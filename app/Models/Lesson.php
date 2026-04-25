<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $fillable = ['module_id', 'title', 'content', 'content_type', 'video_url', 'order_index', 'quiz_question', 'quiz_options',
        'quiz_correct_index',
        'quiz_explanation',
        'has_workspace',
        'code_html',
        'code_css',
        'code_js'
    ];

    protected $casts = [
        'quiz_options' => 'array',
    ];

    public function module()
    {
        return $this->belongsTo(Module::class);
    }

    public function progress()
    {
        return $this->hasMany(UserProgress::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
