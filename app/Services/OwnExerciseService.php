<?php

namespace App\Services;

use App\Models\Exercise;
use App\Models\OwnExercise;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Validation\ValidationException;

class OwnExerciseService
{
	public function getOwnExercises(User $user): Collection
	{
		return OwnExercise::query()
			->with(['exercise.category'])
			->where('user_id', $user->id)
			->latest()
			->get();
	}

	public function addOwnExercise(array $validated, User $user): OwnExercise
	{
		$exercise = Exercise::query()
			->where('id', $validated['exercise_id'])
			->whereNull('user_id')
			->first();

		if (! $exercise) {
			throw ValidationException::withMessages([
				'exercise_id' => ['Only default exercises can be added to own exercises.'],
			]);
		}

		return OwnExercise::firstOrCreate([
			'user_id' => $user->id,
			'exercise_id' => $exercise->id,
		])->load(['exercise.category']);
	}
}
