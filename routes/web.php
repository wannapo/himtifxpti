<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Instructor\CourseController as InstructorCourseController;
use App\Http\Controllers\Instructor\ModuleController as InstructorModuleController;
use App\Http\Controllers\Instructor\LessonController as InstructorLessonController;
use Illuminate\Support\Facades\Route;

// ⚠️ TEMPORARY DEBUG — hapus setelah selesai debug
Route::get('/debug-auth-check', function () {
    $admin = \App\Models\User::where('email', 'admin@example.com')->first();
    if (!$admin) {
        return response()->json(['error' => 'Admin user NOT FOUND — seeder belum jalan!']);
    }
    return response()->json([
        'email' => $admin->email,
        'verified' => $admin->email_verified_at ? 'YES' : 'NO',
        'password_hash_prefix' => substr($admin->password, 0, 15),
        'password_check' => \Illuminate\Support\Facades\Hash::check('password', $admin->password) ? 'MATCH ✓' : 'MISMATCH ✗',
        'total_users' => \App\Models\User::count(),
    ]);
});

Route::get('/debug-mail-test', function () {
    try {
        \Illuminate\Support\Facades\Mail::raw('Test email dari LMS Collab - ' . now(), function ($msg) {
            $msg->to('ahmadd.renaldyy@gmail.com')->subject('LMS Mail Test');
        });
        return response()->json(['status' => 'Email TERKIRIM ✓', 'mailer' => config('mail.default'), 'queue' => config('queue.default')]);
    } catch (\Throwable $e) {
        return response()->json(['status' => 'GAGAL ✗', 'error' => $e->getMessage(), 'mailer' => config('mail.default'), 'queue' => config('queue.default')]);
    }
});

Route::get('/', [PageController::class, 'landing'])->name('landing');
Route::get('/about', [PageController::class, 'about'])->name('about');

Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
Route::get('/courses/{course:slug}', [CourseController::class, 'show'])->name('courses.show');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Enrollment
    Route::post('/courses/{course}/enroll', [EnrollmentController::class, 'store'])->name('enrollments.store');
    
    // Certificate
    Route::get('/courses/{course:slug}/certificate', [\App\Http\Controllers\CertificateController::class, 'show'])->name('certificates.show');
    
    // Lessons
    Route::get('/courses/{course:slug}/lessons/{lesson}', [LessonController::class, 'show'])->name('lessons.show');
    Route::post('/courses/{course:slug}/lessons/{lesson}/complete', [LessonController::class, 'markComplete'])->name('lessons.complete');
    Route::post('/lessons/{lesson}/comments', [\App\Http\Controllers\CommentController::class, 'store'])->name('comments.store');
});

// Instructor Routes
Route::middleware(['auth', \App\Http\Middleware\IsInstructor::class])
    ->prefix('instructor')
    ->name('instructor.')
    ->group(function () {
        
    Route::get('/dashboard', [InstructorCourseController::class, 'index'])->name('dashboard');
    Route::resource('courses', InstructorCourseController::class);
    Route::resource('courses.modules', InstructorModuleController::class)->shallow();
    Route::resource('modules.lessons', InstructorLessonController::class)->shallow();
});

// Admin Routes
Route::middleware(['auth', \App\Http\Middleware\IsAdmin::class])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::resource('users', \App\Http\Controllers\Admin\UserController::class);
    });

require __DIR__.'/auth.php';
