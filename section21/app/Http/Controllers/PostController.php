<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        // return redirect()->action([PostController::class, 'create'],['id' => 1]); 

       return response()->json([
            'message' => 'Hello World',
            'statement' => 'CA'
        ]);
     
    }
    public function create()
    {
        // dd('create');
        // return view('post.create');
    }
}
