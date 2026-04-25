<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Contracts\Queue\ShouldQueue;

/**
 * Queued version dari SendEmailVerificationNotification bawaan Laravel.
 *
 * Dengan implements ShouldQueue, listener ini berjalan di background —
 * request web selesai langsung tanpa menunggu koneksi SMTP.
 * Ini mencegah timeout di Railway / cloud hosting lainnya.
 */
class SendQueuedEmailVerificationNotification implements ShouldQueue
{
    /**
     * Nama queue yang digunakan.
     * Pastikan queue worker berjalan dengan: php artisan queue:work
     */
    public string $queue = 'default';

    /**
     * Handle the event.
     */
    public function handle(Registered $event): void
    {
        if ($event->user instanceof MustVerifyEmail && ! $event->user->hasVerifiedEmail()) {
            $event->user->sendEmailVerificationNotification();
        }
    }
}
