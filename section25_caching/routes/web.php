<?php

use App\Models\User;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});
Route::get('cache', function () {
    // Cache::put('post', 'post title one', $seconds = 1);  // tạo 1 cache
    // $value = Cache::get('post'); // lấy cache

    $users = Cache::remember('users', 60, function () {  // tạo cache với thời gian sống 60 giây nếu cache không tồn tại 
        return User::all(); // lấy tất cả người dùng đồng thời lưu vào cache
    });

    $users = Cache::pull('users'); // lấy cache và xóa cache
    return view('cache', compact('users'));
});
