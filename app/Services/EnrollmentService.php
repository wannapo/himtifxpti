<?php

namespace App\Services;

use App\Models\Enrollment;

class EnrollmentService
{
    /**
     * Check if a user is enrolled in a course
     */
    public function isUserEnrolled(int $courseId, int $userId): bool
    {
        return Enrollment::where('user_id', $userId)
            ->where('course_id', $courseId)
            ->where('status', 'active')
            ->exists();
    }

    /**
     * Enroll a user in a course
     */
    public function enrollUser(int $courseId, int $userId): Enrollment
    {
        return Enrollment::firstOrCreate(
            ['user_id' => $userId, 'course_id' => $courseId],
            ['enrolled_at' => now(), 'status' => 'active']
        );
    }
}
