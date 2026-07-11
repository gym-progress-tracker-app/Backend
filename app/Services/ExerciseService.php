<?php

namespace App\Services;

use App\Models\Category;
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
    public function getExercisesWithOutLoggedIn()
    {
        return Exercise::query()
            ->whereNull('user_id')
            ->get();
    }

    public function getExerciseById(User $user, int $id): ?Exercise
    {
        return Exercise::query()
            ->where('id', $id)
            ->where(function ($query) use ($user) {
                $query->where('user_id', $user->id)
                    ->orWhereNull('user_id');
            })
            ->first();
    }

    public function createExercise(array $validated, User $user): Exercise
    {
        $category = Category::query()
            ->where('name', $validated['category'])
            ->firstOrFail();

        return Exercise::create([
            'name' => $validated['name'],
            'category_id' => $category->id,
            'user_id' => $user->id,
            'description' => $validated['description'] ?? null,
        ]);
    }
}