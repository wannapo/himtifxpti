<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Services\ProgressService;
use Barryvdh\DomPDF\Facade\Pdf;
<<<<<<< HEAD
=======
use Illuminate\Http\Request;
>>>>>>> 16daf2ab4b3ba50f6b77b31ce427a4794e96c73c
use Illuminate\Support\Facades\Auth;

class CertificateController extends Controller
{
<<<<<<< HEAD
    /**
     * Menampilkan sertifikat dalam format PDF
     */
=======
>>>>>>> 16daf2ab4b3ba50f6b77b31ce427a4794e96c73c
    public function show(Course $course, ProgressService $progressService)
    {
        $user = Auth::user();
        
<<<<<<< HEAD
        // Cek apakah progres sudah 100%
        $progressPercent = $progressService->getCourseProgress($course, $user->id);

        if ($progressPercent < 100) {
            return back()->with('error', 'Selesaikan kursus 100% untuk mengunduh sertifikat.');
        }

        // Generate PDF dari view
        $pdf = Pdf::loadView('certificate.pdf', [
            'course' => $course,
            'user' => $user,
        ]);

        // Konfigurasi kertas dan izin akses file/font
        $pdf->setPaper('a4', 'landscape');
        $pdf->setOptions([
            'isRemoteEnabled' => true,
            'isHtml5ParserEnabled' => true,
            'chroot' => public_path(), // Izinkan akses ke folder public/images dan public/fonts
        ]);

        return $pdf->stream('Sertifikat-' . $user->name . '.pdf');
    }
}
=======
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
>>>>>>> 16daf2ab4b3ba50f6b77b31ce427a4794e96c73c
