<?php

namespace App\Http\Controllers;

use App\Enums\ToastTypesEnum;
use Illuminate\Http\Request;
use Inertia\Inertia;
use function App\Helpers\toast;

class DashboardController extends Controller
{
    public function index(Request $request) {
	    toast(ToastTypesEnum::Success, 'DashboardController');
		
	    return Inertia::render('Dashboard', [
			'current_time' => now()->format('d.m.Y H:i:s'),
	    ])->withSessionToasts();
    }
}
