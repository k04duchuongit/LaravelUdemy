<?php

use App\Models\User;
use App\Jobs\SendWelcomeEmail;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/send',function(){
    $user = User::find(1);
    dispatch(new SendWelcomeEmail($user)); // <- Gọi job gửi email
    dd('Email sent successfully!');
});