<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
       //globale middleware
       // $middleware->append(\App\Http\Middleware\checkuser::class);

        $middleware->alias([
            'check' => \App\Http\Middleware\checkuser::class,
            'admin'=> \App\Http\Middleware\checkadmon::class
        ]);
        $middleware->validateCsrfTokens(except: [
            'my-post',
            "createm3",
            "createm4",
            "updatem2/*"
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
