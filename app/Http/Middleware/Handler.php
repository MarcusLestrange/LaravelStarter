<?php

namespace App\Http\Middleware;

use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Configuration\Middleware as BaseMiddleware;

class Handler
{
    protected array $middlewareGroups = [
        'web' => [
            HandleInertiaRequests::class,
        ],
        'api' => [],
    ];

    protected array $middlewareAliases = [];

    public function __invoke(BaseMiddleware $middleware): BaseMiddleware {
	    foreach ($this->middlewareGroups as $key => $m) {
		    $middleware->appendToGroup($key, $m);
	    }
		
        if ($this->middlewareAliases) {
	        $middleware->alias($this->middlewareAliases);
        }
		
        return $middleware;
    }
}
