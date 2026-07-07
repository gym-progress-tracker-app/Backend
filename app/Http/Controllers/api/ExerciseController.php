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
