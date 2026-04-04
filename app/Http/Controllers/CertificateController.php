<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Services\ProgressService;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CertificateController extends Controller
{
    public function show(Course $course, ProgressService $progressService)
    {
        $user = Auth::user();
        
        $progressPercent = $progressService->getCourseProgress($course, $user->id);

        if ($progressPercent < 100) {
            return back()->with('error', 'Anda belum menyelesaikan kursus ini sepenuhnya.');
        }

        $pdf = Pdf::loadView('certificate.pdf', [
            'course' => $course,
            'user' => $user,
            'date' => now()->format('d F Y')
        ])->setPaper('a4', 'landscape');

        return $pdf->stream('Sertifikat-Kelulusan-' . $course->slug . '.pdf');
    }
}
