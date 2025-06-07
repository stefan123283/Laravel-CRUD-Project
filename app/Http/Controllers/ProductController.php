<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::all();
        return view('products.index', ['products' => $products]);
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            "image" => [
                "required",
                "image",
                "mimes:jpg,png"
            ],
            "name" => ["required", "string", "min:5", "max:30"],
            "price" => ["required", "decimal:2"]
        ]);

        if ($request->hasFile("image")) {
            $imagepath = $request->file("image")->store('products', 'public');
        } else {
            $imagepath = null;
        }

        Product::create([
            "image" => $imagepath,
            "name" => $request->name,
            "price" => $request->price
        ]);

        return redirect()->route("product.index")->with("success", "Product created succesfully!");
    }

    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            "image" => ["image", "mimes:jpg,png"],
            "name" => ["required", "string", "min:5", "max:30"],
            "price" => ["required", "decimal:2"]
        ]);

        if ($request->hasFile("image")) {
            Storage::disk('public')->delete($product->image);
            $imagepath = $request->file("image")->store('products', 'public');
        } else {
            $imagepath = $product->image;
        }

        $product->update([
            'image' => $imagepath,
            'name' => $request->name,
            'price' => $request->price
        ]);

        return redirect()->route("product.index")->with("success", "Product updated succesfully!");
    }

    public function destroy(Product $product)
    {
        $product->delete();
        Storage::disk('public')->delete($product->image);
        return redirect()->route('product.index')->with("success", "Product deleted succesfully!");
    }
}
