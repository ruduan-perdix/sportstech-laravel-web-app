<?php

namespace App\Http\Controllers;

use Inertia\Inertia;

class ProgrammeController extends Controller
{
    public function index()
    {
        // Example programmes - later we can fetch from DB
        $programmes = [
            [
                'id' => 1,
                'name' => 'Strength Training',
                'description' => 'A 6-week strength program',
                'duration' => 42,
                'excercises' => [
                    ['name' => 'Squats', 'quantity' => 10],
                    ['name' => 'Deadlifts', 'quantity' => 8],
                ],
            ],
            [
                'id' => 2,
                'name' => 'Cardio Blast',
                'description' => 'High intensity cardio program',
                'duration' => 30,
                'excercises' => [
                    ['name' => 'Running', 'quantity' => 20],
                    ['name' => 'Cycling', 'quantity' => 15],
                ],
            ],
            [
                'id' => 3,
                'name' => 'Insanity HIIT',
                'description' => 'High intensity interval training',
                'duration' => 40,
                'excercises' => [
                    ['name' => 'Warm Up', 'quantity' => 10],
                    ['name' => 'HIIT', 'quantity' => 20],
                    ['name' => 'Stretch', 'quantity' => 10],
                ],
            ],
        ];

        return Inertia::render('Programme', [
            'programmes' => $programmes,
        ]);
    }
}
