<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\OwnExerciseRequest;
use App\Services\OwnExerciseService;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;

class OwnExerciseController extends Controller
{
    use ResponseTrait;

    public function getOwnExercises(Request $request, OwnExerciseService $ownExerciseService)
    {
        $ownExercises = $ownExerciseService->getOwnExercises($request->user());

        return $this->success($ownExercises, 'Own exercises fetched successfully');
    }

    public function addOwnExercise(OwnExerciseRequest $request, OwnExerciseService $ownExerciseService)
    {
        $ownExercise = $ownExerciseService->addOwnExercise($request->validated(), $request->user());

        return $this->success($ownExercise, 'Own exercise created successfully', 201);
    }

    public function removeOwnExercise(Request $request, OwnExerciseService $ownExerciseService, $id)
    {
        $ownExerciseService->removeOwnExercise($id, $request->user());

        return $this->success(null, 'Own exercise removed successfully');
    }
}
