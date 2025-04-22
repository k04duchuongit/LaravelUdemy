<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/user/dashboard', function () {

    // $user = Auth::user();  // lấy thông tin người dùng đang đăng nhập

    // if(Auth::check()){  // kiểm tra xem người dùng đã đăng nhập hay chưa
    //     dd($user);
    // }

    return view('user-dashboard');
})->name('user.dashboard')->middleware(['auth', 'verified']);


Route::group(['middleware' => ['auth']], function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
