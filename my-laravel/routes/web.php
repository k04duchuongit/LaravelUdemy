<?php

use Faker\Core\File;
use App\Models\Myblog;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\SingleActionController;

Route::get('/', [HomeController::class, 'index']);


Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');

Route::post('/contact', [ContactController::class, 'contactSubmit'])->name('contact.submit');

Route::get('/file-upload', [FileUploadController::class, 'index'])->name('file.upload');

Route::post('/file-upload', [FileUploadController::class, 'store'])->name('file.store');
Route::get('/file-download', [FileUploadController::class, 'download'])->name('file.download');

// Route::get('/about', [HomeController::class, 'showAboutPage']);
// Route::get('/single-action', SingleActionController::class);
// Route::resource('/blog', BlogController::class);
// Route::get('/about', function () {
//     return 'This is page about';
// })->name('about');       //đặt tên cho router

// Route::get('/user/{id}/{slug}', function ($id, $slug) {
//     return 'This is user ' . $id . ' with slug ' . $slug;
// })->name('user');

// Route::group(['prefix' => 'blog', 'as' => 'blog.'], function () {    // đặt tiền tố cho các router nếu cùng điểm chung , giúp viết code gọn hơn dẽ thay đổi khi cần 
//     Route::get('/create', function () {
//         return 'This is page blog create';
//     })->name('create');

//     Route::get('/edit', function () {
//         return 'This is page blog edit';
//     })->name('edit');

//     Route::get('/show', function () {
//         return 'This is page blog show';
//     })->name('show');
// });
