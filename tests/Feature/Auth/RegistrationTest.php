<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use App\Notifications\QueuedVerifyEmail;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Notification;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_registration_screen_can_be_rendered(): void
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
    }

    public function test_new_users_can_register(): void
    {
        Notification::fake();
        $csrfToken = 'test-token';

        $response = $this->withSession(['_token' => $csrfToken])->post('/register', [
            '_token'                => $csrfToken,
            'name'                  => 'Test User',
            'email'                 => 'test@example.com',
            'password'              => 'password',
            'password_confirmation' => 'password',
            // Anti-bot fields: honeypot kosong & timestamp 10 detik lalu (lolos validasi)
            'website'               => '',
            'form_start_time'       => time() - 10,
        ]);

        $user = User::where('email', 'test@example.com')->firstOrFail();

        $this->assertAuthenticated();
        Notification::assertSentTo($user, QueuedVerifyEmail::class);
        // Setelah MustVerifyEmail aktif, user diarahkan ke halaman verifikasi email
        $response->assertRedirect(route('verification.notice'));
    }
}
