<?php

use Illuminate\Foundation\Application;
use App\Http\Middleware\IsAdminMiddleware;
use App\Http\Middleware\SiteSettingMiddleware;
use App\Http\Middleware\PanelSettingMiddleware;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'sitesetting'=>  SiteSettingMiddleware::class,
            'panelsetting'=>   PanelSettingMiddleware::class,
            'is_admin' => IsAdminMiddleware::class
        ]);
        $middleware->validateCsrfTokens(
            except: []
        );
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
