<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Inertia\Response;

class InertiaToastsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
	    Response::macro('withSessionToasts', function () {
			if(session()->has('toastification')) {
				$this->with([ 'toastification' => session()->pull('toastification', []) ]);
			}
		    return $this; // Для цепочки вызовов
	    });
    }
}
