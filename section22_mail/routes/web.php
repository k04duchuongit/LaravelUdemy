<?php

use App\Mail\SendMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/send-mail', function () {
    return view('send-mail');
});

Route::post('/send-mail', function (Request $request) {
    // Mail::raw($request->input('message'), function ($message) use ($request) { // $message ở đây là đối tượng của lớp Illuminate\Mail\Message để cấu hình thông tin ng nhận
    //     $message->to($request->input('email'))
    //         ->subject('Laravel Mail Test');
    // });

    Mail::to($request->email)->send(new SendMail($request->message));  // thường
    Mail::to($request->email)->queue(new SendMail($request->message));  // sử dụng queue 
})->name('send.mail');
