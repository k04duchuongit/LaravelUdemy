<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class AddToCardController extends Controller
{
    function store(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        dd($product);
    }
}
