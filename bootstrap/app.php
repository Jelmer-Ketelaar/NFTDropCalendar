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
        $middleware->preventRequestForgery(except: [
            'contactMail',
            'contactMail.php',
            'listingProces',
            'listingProces.php',
            'listingProjectProces',
            'listingProjectProces.php',
            'notifyMail',
            'notifyMail.php',
            'reviewDbProc',
            'reviewDbProc.php',
            'updateDropProc',
            'updateDropProc.php',
            'updateProjProc',
            'updateProjProc.php',
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
