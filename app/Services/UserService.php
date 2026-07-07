<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public function __construct(private TokenService $tokenService)
    {
    }

	public function register(array $validated): User
	{
		return User::create([
			'name' => $validated['name'],
			'email' => $validated['email'],
			'password' => Hash::make($validated['password']),
		]);
	}

    public function login(array $validated): ?array
    {
        $user = User::where('email', $validated['email'])->first();

        if (! $user || ! Hash::check($validated['password'], $user->password)) {
            return null;
        }

        return [
            'user' => $user,
            'token' => $this->tokenService->generateToken($user),
        ];
    }

    public function logout(User $user): void
    {
        $this->tokenService->revokeCurrentToken($user);
    }

    public function getUser(User $user): User
    {
        return $user;
    }

    public function getUsers()
    {
        return User::all();
    }
}
