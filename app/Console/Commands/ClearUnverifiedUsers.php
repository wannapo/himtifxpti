<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;

#[Signature('users:clear-unverified {email? : Specific email to delete} {--all : Delete ALL unverified users}')]
#[Description('Delete users who registered but never verified their email')]
class ClearUnverifiedUsers extends Command
{
    public function handle(): void
    {
        $email = $this->argument('email');

        // Delete a specific email
        if ($email) {
            $user = User::where('email', $email)->whereNull('email_verified_at')->first();

            if (! $user) {
                $this->warn("No unverified user found with email: {$email}");
                return;
            }

            $user->delete();
            $this->info("Deleted unverified user: {$email}");
            return;
        }

        // List + delete all unverified
        $users = User::whereNull('email_verified_at')->get(['id', 'name', 'email', 'created_at']);

        if ($users->isEmpty()) {
            $this->info('No unverified users found.');
            return;
        }

        $this->table(['ID', 'Name', 'Email', 'Registered At'], $users->map(fn($u) => [
            $u->id, $u->name, $u->email, $u->created_at,
        ]));

        if (! $this->option('all')) {
            if (! $this->confirm("Delete all {$users->count()} unverified user(s) above?")) {
                $this->info('Cancelled.');
                return;
            }
        }

        $count = User::whereNull('email_verified_at')->delete();
        $this->info("Deleted {$count} unverified user(s).");
    }
}
