<?php

namespace App\Services;

use App\Models\User;
use App\Models\UserActivity;
use Carbon\Carbon;

class GamificationService
{
    /**
     * Catat aktivitas user untuk Streak & penambahan Point untuk Heatmap
     */
    public function recordActivity(User $user, int $points = 0)
    {
        $today = Carbon::today();
        $lastActivity = $user->last_activity_date ? Carbon::parse($user->last_activity_date)->startOfDay() : null;

        // Update Points
        if ($points > 0) {
            $user->points += $points;
            
            // Record in Heatmap (user_activities)
            $activity = UserActivity::firstOrCreate(
                ['user_id' => $user->id, 'date' => $today->format('Y-m-d')],
                ['points_earned' => 0]
            );
            $activity->increment('points_earned', $points);
        }

        // Update Streak Logic
        if (!$lastActivity) {
            // First time activity
            $user->current_streak = 1;
            $user->longest_streak = 1;
        } elseif ($lastActivity->eq($today->copy()->subDay())) {
            // Consecutive day
            $user->current_streak += 1;
            if ($user->current_streak > $user->longest_streak) {
                $user->longest_streak = $user->current_streak;
            }
        } elseif ($lastActivity->lt($today->copy()->subDay())) {
            // Streak broken
            $user->current_streak = 1;
        }
        // If $lastActivity is today, streak remains the same

        $user->last_activity_date = Carbon::now();
        $user->save();
    }
}
