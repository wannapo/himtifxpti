<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Services\ProgressService;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

class CertificateController extends Controller
{
    /**
     * Menampilkan sertifikat dalam format PDF
     */
    public function show(Course $course, ProgressService $progressService)
    {
        $user = Auth::user();
        
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