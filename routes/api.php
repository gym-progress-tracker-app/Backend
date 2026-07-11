<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
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
    
    //progress log
	Route::get('/progresslogs/{exerciseid}', [ProgressLogController::class, 'getProgressLogByExerciseId']);
	Route::post('/progresslogs', [ProgressLogController::class, 'createProgressLog']);
	Route::get('/progresslogs', [ProgressLogController::class, 'getProgressLogs']);
	
});
