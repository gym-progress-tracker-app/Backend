<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ExerciseRequest;
use App\Models\Exercise;
use App\Services\ExerciseService;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ExerciseController extends Controller
{
    use ResponseTrait;

    public function getExercises(Request $request, ExerciseService $exerciseService)
    {
        Gate::authorize('viewAny', Exercise::class);

        $exercises = $exerciseService->getExercises($request->user());

        return $this->success($exercises, 'Exercises fetched successfully');
    }

    public function getExerciseById(Request $request, ExerciseService $exerciseService, $id)
    {
        Gate::authorize('view', Exercise::class);

        $exercise = $exerciseService->getExerciseById($request->user(), $id);

        if (! $exercise) {
            return $this->error('Exercise not found', 404);
        }

        return $this->success($exercise, 'Exercise fetched successfully');
    }

    public function getExercisesWithoutLoggedIn(Request $request, ExerciseService $exerciseService)
    {
        

        $exercises = $exerciseService->getExercisesWithoutLoggedIn();

        return $this->success($exercises, 'Exercises fetched successfully');
    }

    public function createExercise(ExerciseRequest $request, ExerciseService $exerciseService)
    {
        Gate::authorize('create', Exercise::class);

        $exercise = $exerciseService->createExercise($request->validated(), $request->user());

        return $this->success($exercise, 'Exercise created successfully', 201);
    }
}
