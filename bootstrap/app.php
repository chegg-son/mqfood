<?php

use Illuminate\Foundation\Application;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'isAdmin' => \App\Http\Middleware\IsAdmin::class,
            'Cart' => Darryldecode\Cart\Facades\CartFacade::class,
            'auth.session' => \App\Http\Middleware\AuthSessionExists::class,
            'check.role' => \App\Http\Middleware\CheckRole::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        // oke
        $exceptions->respond(function (Response $response) {
            if ($response->getStatusCode() === 419) {
                return redirect()->route('home');
            }

            return $response;
        });
    })->create();
