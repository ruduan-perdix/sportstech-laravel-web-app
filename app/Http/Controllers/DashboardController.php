<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Programme;

class DashboardController extends Controller
{
    public function index()
    {
        $programmes = Programme::with('exercises')->get();

        return Inertia::render('Dashboard', [
            'programmes' => $programmes,
        ]);
    }
}
