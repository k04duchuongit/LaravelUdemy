<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.dashboard', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductStoreRequest $request)
    {
        $product = new Product();
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            // Lưu file vào thư mục storage/app/public
            $fileName = $image->store('', 'public');
            $filePath = 'uploads/' . $fileName;
        }

        $product->name              = $request->name;
        $product->image             = $filePath ?? null;
        $product->price             = $request->price;
        $product->short_description = $request->short_description;
        $product->qty               = $request->qty;
        $product->sku               = $request->sku;
        $product->description       = $request->description;
        $product->save();

        //insert colors
        if ($request->has('colors') && $request->filled('colors')) {  //filled kiểm tra xem colors có rỗng hay không
            foreach ($request->colors as $color) {
                ProductColor::create([
                    'product_id' => $product->id,
                    'name' => $color,
                ]);
            }
        }

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                // Lưu file vào thư mục storage/app/public
                $fileName = $image->store('', 'public');

                // Tạo đường dẫn để lưu vào DB
                $filePath = 'uploads/' . $fileName;

                // Lưu vào bảng product_images
                ProductImage::create([
                    'product_id' => $product->id,
                    'path' => $filePath,
                ]);
            }
        }

        return redirect()->route('product.index')->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::with(['colors', 'images'])->findOrFail($id);
        $colors = $product->colors->pluck('name')->toArray();
        $images = $product->images->pluck('path')->toArray();

        return view('admin.products.edit', compact('product', 'colors', 'images'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductUpdateRequest $request, string $id)
    {
        $product = Product::findOrFail($id);
        if ($request->hasFile('image')) {
            //delete old image
            File::delete(public_path($product->image));
            $image = $request->file('image');
            // Lưu file vào thư mục storage/app/public
            $fileName = $image->store('', 'public');
            $filePath = 'uploads/' . $fileName;
        }

        $product->name              = $request->name;
        $product->image             = $filePath ?? null;
        $product->price             = $request->price;
        $product->short_description = $request->short_description;
        $product->qty               = $request->qty;
        $product->sku               = $request->sku;
        $product->description       = $request->description;
        $product->save();

        //insert colors
        if ($request->has('colors') && $request->filled('colors')) {  //filled kiểm tra xem colors có rỗng hay không

            foreach ($product->colors as $color) {
                $color->delete();
            }

            foreach ($request->colors as $color) {
                ProductColor::create([
                    'product_id' => $product->id,
                    'name' => $color,
                ]);
            }
        }

        if ($request->hasFile('images')) {

            foreach ($product->images as $image) {
                File::delete(public_path($image->path));
            }
            $product->images()->delete();

            foreach ($request->file('images') as $image) {
                // Lưu file vào thư mục storage/app/public
                $fileName = $image->store('', 'public');

                // Tạo đường dẫn để lưu vào DB
                $filePath = 'uploads/' . $fileName;

                // Lưu vào bảng product_images
                ProductImage::create([
                    'product_id' => $product->id,
                    'path' => $filePath,
                ]);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        File::delete(public_path($product->image));

        foreach ($product->images as $image) {
            File::delete(public_path($image->path));
        }

        $product->images()->delete();
        $product->colors()->delete();
        $product->delete();

        return redirect()->route('product.index')->with('success', 'Product deleted successfully.');        
    }
}
