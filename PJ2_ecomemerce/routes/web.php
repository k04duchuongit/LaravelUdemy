<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductPageController;


Route::get('/', [ProductPageController::class, 'index'])->name('name');
Route::get('/product-detail/{id}', [ProductPageController::class, 'show'])->name('/product-detail');

//add to card route
Route::post('/add-to-cart/{id}', [ProductPageController::class, 'stote'])->name('add-to-cart');


Route::get('/dashboard', [ProductController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

route::resource('product', ProductController::class);
require __DIR__ . '/auth.php';
