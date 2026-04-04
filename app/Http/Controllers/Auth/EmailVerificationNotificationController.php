<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmailVerificationNotificationController extends Controller
{
    /**
     * Kirim ulang email verifikasi.
     * Bisa diakses oleh user yang sudah login (email change) maupun guest (registrasi baru).
     */
    public function store(Request $request): RedirectResponse
    {
        if (Auth::check()) {
            // User sudah login (contoh: ganti email di profil)
            $user = $request->user();
        } else {
            // Guest: butuh input email
            $request->validate(['email' => ['required', 'email']]);
            $user = User::where('email', $request->email)->first();
        }

        if ($user && !$user->hasVerifiedEmail()) {
            $user->sendEmailVerificationNotification();
        }

        // Selalu tampilkan pesan sukses untuk mencegah email enumeration
        return back()->with('status', 'verification-link-sent');
    }
}
