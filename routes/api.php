<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\OwnExerciseController;
use App\Http\Controllers\api\ExerciseController;
use App\Http\Controllers\api\ProgressLogController;
use App\Http\Controllers\api\UserController;
use App\Http\Controllers\api\CategoryController;

// user
Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);
Route::get('/users', [UserController::class, 'getUsers']);

// exercise
Route::get('/exercises-without-logged-in', [ExerciseController::class, 'getExercisesWithoutLoggedIn']);

// category
Route::get('/categories', [CategoryController::class, 'getCategories']);

Route::middleware('auth:sanctum')->group(function () {
    //user
	Route::get('/user', [UserController::class, 'getUser']);
	Route::post('/logout', [UserController::class, 'logout']);

    //exercise
	Route::get('/exercises', [ExerciseController::class, 'getExercises']);
	Route::post('/exercises', [ExerciseController::class, 'createExercise']);
	Route::get('/exercises/{id}', [ExerciseController::class, 'getExerciseById']);
	Route::get('/own-exercises', [OwnExerciseController::class, 'getOwnExercises']);
	Route::post('/own-exercises', [OwnExerciseController::class, 'addOwnExercise']);
	Route::delete('/own-exercises/{id}', [OwnExerciseController::class, 'removeOwnExercise']);
	Route::get('/own-exercises/count', [OwnExerciseController::class, 'countOwnExercises']);
    
    //progress log
	Route::get('/progresslogs/favorite/exercise', [ProgressLogController::class, 'favoriteExercise']);
	Route::get('/progresslogs/count', [ProgressLogController::class, 'countProgressLogs']);
	Route::get('/progresslogs/{exerciseid}', [ProgressLogController::class, 'getProgressLogByExerciseId'])->whereNumber('exerciseid');
	Route::post('/progresslogs', [ProgressLogController::class, 'createProgressLog']);
	Route::get('/progresslogs', [ProgressLogController::class, 'getProgressLogs']);
	Route::delete('/progresslogs/{progressLogId}', [ProgressLogController::class, 'deleteProgressLog']);
	
});
