<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category_id',
        'user_id',
        'description',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function progressLogs()
    {
        return $this->hasMany(ProgressLog::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}