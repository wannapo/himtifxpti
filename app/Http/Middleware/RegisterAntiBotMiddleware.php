<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Anti-bot middleware untuk form register.
 *
 * Lapisan proteksi:
 *  1. Honeypot  — field "website" harus kosong (bot mengisi semua field)
 *  2. Time-check — formulir tidak mungkin diisi manusia dalam < 3 detik
 */
class RegisterAntiBotMiddleware
{
    /**
     * Handle an incoming request.
     *
     * Hanya aktif untuk request POST ke rute register.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // ── Periksa hanya pada request POST ──────────────────────────────────
        if ($request->isMethod('POST')) {

            // 1. HONEYPOT CHECK
            // Field "website" disembunyikan via CSS (bukan type="hidden").
            // Manusia tidak akan pernah mengisinya; bot biasanya isi semua field.
            if ($request->filled('website')) {
                // Diam-diam redirect kembali — jangan beri tahu bot kenapa gagal
                return redirect()->route('register')
                    ->withErrors(['email' => 'Pendaftaran tidak dapat diproses.']);
            }

            // 2. TIME-BASED CHECK
            // Timestamp halaman dibuka dikirim via hidden field "form_start_time".
            // Jika waktu submit - waktu buka < 3 detik → kemungkinan besar bot.
            $formStartTime = (int) $request->input('form_start_time', 0);
            $elapsedSeconds = time() - $formStartTime;

            if ($formStartTime > 0 && $elapsedSeconds < 3) {
                return redirect()->route('register')
                    ->withErrors(['email' => 'Pendaftaran tidak dapat diproses. Silakan coba lagi.']);
            }
        }

        return $next($request);
    }
}
