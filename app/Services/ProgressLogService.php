<?php

namespace App\Services;

use App\Models\OwnExercise;
use App\Models\ProgressLog;
use App\Models\User;

class ProgressLogService
{
    public function createProgressLog(array $validated, User $user): ProgressLog
    {
        OwnExercise::firstOrCreate([
            'user_id' => $user->id,
            'exercise_id' => $validated['exercise_id'],
        ]);

        $progressLog = ProgressLog::create([
            'user_id' => $user->id,
            'exercise_id' => $validated['exercise_id'],
            'weight' => $validated['weight'],
            'reps' => $validated['reps'],
            'sets' => $validated['sets'],
            'note' => $validated['note'] ?? null,
            'recorded_at' => now(),
        ]);

        return $progressLog->load('exercise:id,name');
    }

    public function getProgressLogs(User $user)
    {
        return ProgressLog::with('exercise:id,name')
            ->where('user_id', $user->id)
            ->orderByDesc('recorded_at')
            ->get();
    }

    public function getProgressLogByExerciseId(User $user, int $exerciseid)
    {
        return ProgressLog::with('exercise:id,name')
            ->where(function ($query) use ($user) {
                $query->where('user_id', $user->id)
                    ->orWhereNull('user_id');
            })
            ->where('exercise_id', $exerciseid)
            ->orderByDesc('recorded_at')
            ->get();
    }

    public function deleteProgressLog(int $progressLogId, User $user): void
    {
        $progressLog = ProgressLog::query()
            ->where('id', $progressLogId)
            ->where('user_id', $user->id)
            ->firstOrFail();

        $progressLog->delete();
    }
}