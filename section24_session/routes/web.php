<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('session', function (Request $request) {
    $request->session()->put('foo', 'value');

    $value =  $request->session()->get('foo');
   
    return view('session');
});