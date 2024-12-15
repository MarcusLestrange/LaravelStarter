<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index(Request $request) {
	    return Inertia::render('Dashboard', [
			'current_time' => now()->format('d.m.Y H:i:s'),
	    ]);
    }
}
