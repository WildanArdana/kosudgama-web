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
        // Menambahkan middleware LogVisitor ke dalam grup 'web'.
        // Middleware ini akan dijalankan untuk setiap request HTTP
        // yang masuk melalui routes/web.php.
        $middleware->web(append: [
            \App\Http\Middleware\LogVisitor::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        // Konfigurasi penanganan exception bisa ditambahkan di sini.
    })->create();
