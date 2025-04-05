<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/join', function () {

    //INNER JOIN
    // $userWithOrder = DB::table('users')
    // ->join('orders', 'users.id', '=', 'orders.user_id')
    // ->select('users.name','users.email','orders.product_name')
    // ->get();

    //LEFT JOIN
    // $userWithOrder = DB::table('users')
    // ->leftJoin('orders' ,'users.id' , '=' ,'orders.user_id')
    // ->select('users.name','orders.product_name')
    // ->get();
    // dd($userWithOrder);

    // $userWithOrder = DB::table('orders')
    // ->rightJoin('users' ,'users.id' , '=' ,'orders.user_id')
    // ->select('users.id','orders.product_name')
    // ->get();

    $fullOuterJoin = DB::table('users')
    ->leftJoin('orders', 'users.id', '=', 'orders.user_id')
    ->select('users.name', 'orders.product_name')
    ->unionAll(
        DB::table('users')
            ->rightJoin('orders', 'users.id', '=', 'orders.user_id')
            ->select('users.name', 'orders.product_name')
    )
    ->get();

    dd($fullOuterJoin);
});
