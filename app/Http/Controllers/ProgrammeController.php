<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Programme; // import your model

class ProgrammeController extends Controller
{
    public function index()
    {
        # Fetch Exercises
        $programmes = Programme::with('exercises')->get();
        
        # Return all Programme Data
        return Inertia::render('Programme', [
            'programmes' => $programmes,
        ]);
    }
}
