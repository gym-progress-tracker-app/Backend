<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class TokenService
{
    public function generateToken(User $user): string
    {
        return $user->createToken('auth_token')->plainTextToken;
    }

    public function revokeCurrentToken(User $user): void
    {
        $user->currentAccessToken()?->delete();
    }
}