<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array<int, class-string|string>
     */
    protected $middleware = [
        \App\Http\Middleware\TrustProxies::class,
        \Illuminate\Http\Middleware\HandleCors::class,
        \App\Http\Middleware\PreventRequestsDuringMaintenance::class,
        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,
        \App\Http\Middleware\TrimStrings::class,
        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
        \Fruitcake\Cors\HandleCors::class,
        \App\Http\Middleware\IsAdmin::class,
    ];

    /**
     * The application's route middleware.
     *
     * @var array<string, class-string|string>
     */
    // app/Http/Kernel.php

    protected $routeMiddleware = [
        // ...
        'is_admin' => \App\Http\Middleware\IsAdmin::class,
        'is_chef' => \App\Http\Middleware\IsChef::class, // Register new middleware
        'is_user' => \App\Http\Middleware\IsUser::class, // Register new middleware


    ];
    /**
     * The application's route middleware groups.
     *
     * @var array<string, array<int, class-string|string>>
     */
    protected $middlewareGroups = [
        'web' => [
            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \App\Http\Middleware\VerifyCsrfToken::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],
        'api' => [
            'throttle:api',
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],
        'admin_or_chef' => [
            \App\Http\Middleware\IsAdmin::class,
            \App\Http\Middleware\IsChef::class,
        ],
    ];
    
    
}
