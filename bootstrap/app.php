<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
	use App\Http\Middleware\Handler as MiddlewareHandler;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
	->withMiddleware(new MiddlewareHandler())
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
