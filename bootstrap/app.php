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
    ->withMiddleware(function (Middleware $middleware): void {
        // Legacy pages that bypass CSRF (handled by LegacyPageController)
        $middleware->preventRequestForgery(except: [
            'reviewDbProc',
            'reviewDbProc.php',
            'reviewAppProc',
            'reviewAppProc.php',
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
