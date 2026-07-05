<?php

namespace App\Services;

use App\Models\ProgressLog;
use App\Models\User;

class ProgressLogService
{
    public function createProgressLog(array $validated, User $user): ProgressLog
    {
        return ProgressLog::create([
            'user_id' => $user->id,
            'exercise_id' => $validated['exercise_id'],
            'weight' => $validated['weight'],
            'reps' => $validated['reps'],
            'sets' => $validated['sets'],
            'note' => $validated['note'] ?? null,
            'recorded_at' => $validated['recorded_at'],
        ]);
    }

    public function getProgressLogs(User $user)
    {
        return ProgressLog::where('user_id', $user->id)->get();
    }

    public function getProgressLogByExerciseId(User $user, int $exerciseid)
    {
        return ProgressLog::where('user_id', $user->id)
            ->where('exercise_id', $exerciseid)
            ->get();
    }
}