<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExerciseSeeder extends Seeder
{
    public function run(): void
    {
        $categories = DB::table('categories')->pluck('id', 'name');

        $exercises = [

            // CHEST
            ['name' => 'Bench Press', 'category' => 'Chest'],
            ['name' => 'Incline Bench Press', 'category' => 'Chest'],
            ['name' => 'Dumbbell Press', 'category' => 'Chest'],
            ['name' => 'Chest Fly', 'category' => 'Chest'],
            ['name' => 'Dips', 'category' => 'Chest'],
            ['name' => 'Machine Chest Press', 'category' => 'Chest'],

            // BACK
            ['name' => 'Pull Up', 'category' => 'Back'],
            ['name' => 'Lat Pulldown', 'category' => 'Back'],
            ['name' => 'Barbell Row', 'category' => 'Back'],
            ['name' => 'Seated Cable Row', 'category' => 'Back'],
            ['name' => 'One Arm Dumbbell Row', 'category' => 'Back'],
            ['name' => 'Face Pull', 'category' => 'Back'],

            // LEGS
            ['name' => 'Squat', 'category' => 'Legs'],
            ['name' => 'Leg Press', 'category' => 'Legs'],
            ['name' => 'Romanian Deadlift', 'category' => 'Legs'],
            ['name' => 'Leg Extension', 'category' => 'Legs'],
            ['name' => 'Hamstring Curl', 'category' => 'Legs'],
            ['name' => 'Walking Lunges', 'category' => 'Legs'],

            // SHOULDERS
            ['name' => 'Overhead Press', 'category' => 'Shoulders'],
            ['name' => 'Dumbbell Shoulder Press', 'category' => 'Shoulders'],
            ['name' => 'Lateral Raise', 'category' => 'Shoulders'],
            ['name' => 'Rear Delt Fly', 'category' => 'Shoulders'],
            ['name' => 'Arnold Press', 'category' => 'Shoulders'],
            ['name' => 'Upright Row', 'category' => 'Shoulders'],

            // ARMS
            ['name' => 'Barbell Curl', 'category' => 'Arms'],
            ['name' => 'Hammer Curl', 'category' => 'Arms'],
            ['name' => 'Concentration Curl', 'category' => 'Arms'],
            ['name' => 'Tricep Pushdown', 'category' => 'Arms'],
            ['name' => 'Skull Crusher', 'category' => 'Arms'],
            ['name' => 'Close Grip Bench Press', 'category' => 'Arms'],

            // ABS
            ['name' => 'Crunch', 'category' => 'Abs'],
            ['name' => 'Hanging Leg Raise', 'category' => 'Abs'],
            ['name' => 'Cable Crunch', 'category' => 'Abs'],
            ['name' => 'Plank', 'category' => 'Abs'],
            ['name' => 'Russian Twist', 'category' => 'Abs'],
            ['name' => 'Leg Raises', 'category' => 'Abs'],
        ];

        foreach ($exercises as $exercise) {

            DB::table('exercises')->insert([
                'name' => $exercise['name'],
                'category_id' => $categories[$exercise['category']],
                'user_id' => null,
                'description' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}