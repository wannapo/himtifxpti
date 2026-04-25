<?php

namespace App\Services;

use App\Models\Course;
use App\Models\Lesson;
use App\Models\UserProgress;

class ProgressService
{
    /**
     * Get course progress percentage for a user
     */
    public function getCourseProgress(Course $course, int $userId): int
    {
        $lessonIds = Lesson::whereIn('module_id', $course->modules()->pluck('id'))->pluck('id');
        $totalLessons = $lessonIds->count();
        if ($totalLessons === 0) return 0;
        
        $completedLessons = UserProgress::where('user_id', $userId)
            ->whereIn('lesson_id', $lessonIds)
            ->count();
            
        return round(($completedLessons / $totalLessons) * 100);
    }

    /**
     * Check if a specific lesson is completed
     */
    public function isLessonCompleted(int $lessonId, int $userId): bool
    {
        return UserProgress::where('user_id', $userId)
            ->where('lesson_id', $lessonId)
            ->exists();
    }

    /**
     * Mark a lesson as complete for a user
     */
    public function markLessonComplete(int $lessonId, int $userId): void
    {
        UserProgress::firstOrCreate(
            ['user_id' => $userId, 'lesson_id' => $lessonId],
            ['completed_at' => now()]
        );
    }

    /**
     * Get the next unfinished lesson for a course
     */
    public function getNextUnfinishedLesson(Course $course, int $userId): ?Lesson
    {
        // Load modules and lessons in order if not already loaded
        if (!$course->relationLoaded('modules')) {
            $course->load(['modules.lessons' => function ($query) {
                $query->orderBy('order_index');
            }]);
        }

        $completedLessonIds = UserProgress::where('user_id', $userId)->pluck('lesson_id')->toArray();

        foreach ($course->modules as $module) {
            foreach ($module->lessons as $lesson) {
                if (!in_array($lesson->id, $completedLessonIds)) {
                    return $lesson;
                }
            }
        }
        
        return null;
    }
    
    /**
     * Return all completed lesson IDs for a user inside a course
     */
    public function getCompletedLessonIds(Course $course, int $userId): array
    {
        $lessonIds = Lesson::whereIn('module_id', $course->modules()->pluck('id'))->pluck('id');
        return UserProgress::where('user_id', $userId)
            ->whereIn('lesson_id', $lessonIds)
            ->pluck('lesson_id')
            ->toArray();
    }
}
