<?php

namespace App\Http\Controllers;

use App\Http\Middleware\CheckRoleMiddleware;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;

class PostController extends Controller implements HasMiddleware
{
    public static function middleware()
    {
        //function middleware
        // return [new Middleware(CheckRoleMiddleware::class, only: ['store','index'])]; //load midleware với phương thức chỉ định
    }

    function index(Request $request)
    {
        return view('post.index');
    }

    function handlePost(Request $request)
    {
        $data = $request->all();
        dd($data);
    }
}
