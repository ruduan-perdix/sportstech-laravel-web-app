<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExerciseSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('exercises')->insert([
            // Exercises for Strength Training
            ['programme_id' => 1, 'name' => 'Squats', 'quantity' => 12],
            ['programme_id' => 1, 'name' => 'Deadlifts', 'quantity' => 8],
            ['programme_id' => 1, 'name' => 'Bench Press', 'quantity' => 10],

            // Exercises for Endurance Challenge
            ['programme_id' => 2, 'name' => 'Running', 'quantity' => 30],
            ['programme_id' => 2, 'name' => 'Cycling', 'quantity' => 20],
            ['programme_id' => 2, 'name' => 'Swimming', 'quantity' => 15],
    
                // Flexibility & Mobility (programme_id = 3)
            ['programme_id' => 3, 'name' => 'Yoga', 'quantity' => 10],
            ['programme_id' => 3, 'name' => 'Stretching', 'quantity' => 15],

            // Fat Burn Bootcamp (programme_id = 4)
            ['programme_id' => 4, 'name' => 'Burpees', 'quantity' => 20],
            ['programme_id' => 4, 'name' => 'Jumping Jacks', 'quantity' => 30],
            ['programme_id' => 4, 'name' => 'Mountain Climbers', 'quantity' => 25],
        ]);
    }
}
