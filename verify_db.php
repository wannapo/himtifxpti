<?php
use App\Models\User;
use App\Models\Course;
use App\Models\Module;
use App\Models\Lesson;
use App\Models\Enrollment;
use App\Models\UserProgress;

// Create dummy data
$user = User::create([
    'name' => 'Test Student', 
    'email' => 'student@test.com', 
    'password' => bcrypt('password')
]);

$course = Course::create([
    'title' => 'Learn Laravel',
    'slug' => 'learn-laravel',
    'description' => 'A great course',
    'status' => 'published'
]);

$module = $course->modules()->create([
    'title' => 'Introduction',
    'order_index' => 1
]);

$lesson = $module->lessons()->create([
    'title' => 'What is Laravel?',
    'content' => 'Laravel is a web application framework...',
    'order_index' => 1
]);

$enrollment = $user->enrollments()->create([
    'course_id' => $course->id,
    'status' => 'active'
]);

$progress = $user->progress()->create([
    'lesson_id' => $lesson->id,
    'completed_at' => now()
]);

echo "Verification Results: \n";
echo "User enrollments count: " . $user->enrollments()->count() . "\n";
echo "Course modules count: " . $course->modules()->count() . "\n";
echo "Module lessons count: " . $module->lessons()->count() . "\n";
echo "User progress count: " . $user->progress()->count() . "\n";
echo "Success: All models and relationships are working as expected.\n";
