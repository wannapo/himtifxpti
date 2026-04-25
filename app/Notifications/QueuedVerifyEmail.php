<?php

namespace App\Notifications;

use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Bus\Queueable;

/**
 * Queued email verification notification.
 *
 * Extend dari VerifyEmail bawaan Laravel, tambahkan ShouldQueue
 * agar pengiriman email dilakukan di background (queue worker),
 * bukan saat request HTTP sedang berjalan.
 *
 * Ini mencegah timeout SMTP di Railway / cloud hosting.
 */
class QueuedVerifyEmail extends VerifyEmail implements ShouldQueue
{
    use Queueable;
    // Tidak perlu deklarasi $queue — sudah disediakan oleh Queueable trait
}

