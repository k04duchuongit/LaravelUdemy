<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
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



Route::get('/contact', function () {
    return view('contact.index');
});

Route::get('/get-route', function () {
    return 'This is a GET request';
});

Route::post('/post-route', function () {
    return 'This is a POST request';
});

Route::put('/put-route', function () {
    return 'This is a PUT request';
});

Route::patch('/patch-route', function () {
    return 'This is a PATCH request';
});

Route::delete('/delete-route', function () {
    return 'This is a DELETE request';
});

// Route fallback xử lý khi không tìm thấy route nào phù hợp
Route::fallback(function () {
    return "khong co route phu hop";
});
