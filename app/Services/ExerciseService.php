<?php

namespace App\Services;

use App\Models\Exercise;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class ExerciseService
{
    public function getExercises(User $user): Collection
    {
        return Exercise::query()
            ->where(function ($query) use ($user) {
                $query->where('user_id', $user->id)
                    ->orWhereNull('user_id');
            })
            ->get();
    }

    public function createExercise(array $validated, User $user): Exercise
    {
        return Exercise::create([
            'name' => $validated['name'],
            'category_id' => $validated['category_id'],
            'user_id' => $user->id,
            'description' => $validated['description'] ?? null,
        ]);
    }
}