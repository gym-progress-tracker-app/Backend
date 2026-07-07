<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Services\UserService;
use App\Traits\ResponseTrait;
use App\Http\Requests\LoginRequest;

 

class UserController extends Controller
{
    use ResponseTrait;

    public function register(RegisterRequest $request, UserService $userService)
    {
        $user = $userService->register($request->validated());

        return $this->success($user, 'User registered successfully', 201);
    }

    public function login(LoginRequest $request, UserService $userService)
    {
        $validated = $request->validated();

        $loginData = $userService->login($validated);

        if (! $loginData) {
            return $this->error('Invalid credentials', 401);
        }

        return $this->success($loginData, 'User logged in successfully');
    }

    public function logout(Request $request, UserService $userService)
    {
        $userService->logout($request->user());

        return $this->success(null, 'User logged out successfully');
    }

    public function getUser(Request $request, UserService $userService)
    {
        $user = $userService->getUser($request->user());

        return $this->success($user, 'User fetched successfully');
    }

    public function getUsers(UserService $userService)
    {
        $users = $userService->getUsers();

        return $this->success($users, 'Users fetched successfully');
    }
}
