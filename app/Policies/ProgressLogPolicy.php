<?php

namespace App\Policies;

use App\Models\ProgressLog;
use App\Models\User;

class ProgressLogPolicy
{
    public function create(User $user): bool
    {
        return $user !== null;
    }
}
