<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;

Route::get('/', function () {
    return 123;
})->name('home');

Route::get('customers/trash' ,[CustomerController::class,'trashIndex'])->name('customers.trash');
Route::get('customers/restore/{id}' ,[CustomerController::class,'restore'])->name('customers.restore');
Route::delete('customers/trash/{id}' ,[CustomerController::class,'forceDestroy'])->name('customers.force.destroy');
Route::resource('customers', CustomerController::class);

