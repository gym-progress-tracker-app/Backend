<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

    protected $appends = [
        'exercise_name',
    ];

    public function exercise(): BelongsTo
    {
        return $this->belongsTo(Exercise::class);
    }

    public function getExerciseNameAttribute(): ?string
    {
        return $this->exercise?->name;
    }
}
