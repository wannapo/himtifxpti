<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
<<<<<<< HEAD
use Illuminate\Support\Facades\Storage; // <--- WAJIB ADA INI BIAR GAK ERROR 500
=======
>>>>>>> 16daf2ab4b3ba50f6b77b31ce427a4794e96c73c
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
<<<<<<< HEAD
        $user = $request->user();
        
        // Mengisi data teks (nama, email)
        $user->fill($request->validated());

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        // LOGIKA UPLOAD AVATAR
        if ($request->hasFile('avatar')) {
            // 1. Hapus foto lama dari storage jika ada agar tidak menumpuk
            if ($user->avatar) {
                Storage::disk('public')->delete($user->avatar);
            }

            // 2. Simpan foto baru ke folder 'avatars' di disk public
            $path = $request->file('avatar')->store('avatars', 'public');
            
            // 3. Masukkan path file ke kolom 'avatar' di database
            $user->avatar = $path;
        }

        $user->save();

        if ($user->wasChanged('email')) {
            $user->sendEmailVerificationNotification();
        }

        return Redirect::route('profile.edit')
            ->with('status', 'profile-updated');
=======
        $request->user()->fill($request->validated());

        $emailChanged = $request->user()->isDirty('email');

        if ($emailChanged) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        if ($emailChanged) {
            $request->user()->sendEmailVerificationNotification();
        }

        return Redirect::route('profile.edit')
            ->with('status', 'profile-updated')
            ->with('verificationLinkSent', $emailChanged);
>>>>>>> 16daf2ab4b3ba50f6b77b31ce427a4794e96c73c
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
<<<<<<< HEAD
}
=======
}
>>>>>>> 16daf2ab4b3ba50f6b77b31ce427a4794e96c73c
