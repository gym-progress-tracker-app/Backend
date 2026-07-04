<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProgressLog extends Model
{
    protected $fillable = [
        'user_id',
        'exercise_id',
        'weight',
        'reps',
        'sets',
        'note',
        'recorded_at',
    ];
}
