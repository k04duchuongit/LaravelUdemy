<?php

use App\Http\Middleware\CheckRoleMiddleware;
use App\Http\Middleware\Testmiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
        // $middleware->append(Testmiddleware::class);  
        // $middleware->append(CheckRoleMiddleware::class);  //append đăng ký middleware toàn cục, nó sẽ chạy sau tất cả middleware mặc dịnh khác


        // $middleware->appendToGroup('test-group', [    // nhóm middleware nhưng phải gọi ở route mới chạy được chứ không như trên
        //     Testmiddleware::class,
        //     CheckRoleMiddleware::class,
        // ]);


        // $middleware->web(append: [    // thêm middleware vào group web 
        //     Testmiddleware::class,
        //     CheckRoleMiddleware::class,
        // ]);


        $middleware->alias(
            [
                'checkRole' => CheckRoleMiddleware::class, // alias cho middleware
                'test-group' => Testmiddleware::class, // alias cho middleware
            ]
        );
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
