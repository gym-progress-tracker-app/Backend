<?php

namespace App\Policies;

use App\Models\User;

class ExercisePolicy
{
    public function viewAny(User $user): bool
    {
        return $user !== null;
    }

    public function create(User $user): bool
    {
        return $user !== null;
    }
}
