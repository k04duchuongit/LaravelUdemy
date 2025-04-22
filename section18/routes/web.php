<?php

use App\Http\Controllers\PostController;
use App\Http\Middleware\CheckRoleMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/post',[PostController::class, 'index'])->name('post.index');
// Route::post('/post',[PostController::class, 'handlePost'])->name('post.store')
// ->middleware(CheckRoleMiddleware::class); // sử dụng kiểm tra quyền truy cập


// Route::get('/post', [PostController::class, 'index'])->name('post.index');
// Route::group(['middleware' => CheckRoleMiddleware::class], function () {
//     Route::post('/post', [PostController::class, 'handlePost'])->name('post.store');
// });


// Route::get('/post', [PostController::class, 'index'])->name('post.index');
// Route::post('/post', [PostController::class, 'handlePost'])->name('post.store')->middleware('checkRole'); 

Route::get('user/dashboard', function () {
    dd('User dashboard');
})->middleware('checkRole:user'); // sử dụng middleware với alias , điều kiện là role user đã được set trong checkroleControlle

Route::get('admin/dashboard', function () {
    dd('Admin dashboard');
})->middleware('checkRole:admin');;