<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia; // Make sure to import the Inertia class.

class IndexController extends Controller
{
    public function index()
    {
        return Inertia::render('Index/Index', [ // Use Inertia::render instead of returninertia.
            'message' => 'Hello from Laravel!',
        ]);
    }

    public function show()
    {
        return Inertia::render('Index/Show'); // Use Inertia::render.
    }
}
