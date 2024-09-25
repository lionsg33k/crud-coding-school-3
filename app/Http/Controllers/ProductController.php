<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Student;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $products = Product::all();
        return view("product.product", compact("products"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        request()->validate([
            "name" => "required|max:100",
            "description" => "required|max:500",
            "price" => "required|integer|min:0",
            "stock" => "required|integer|min:0",
            "size" => "required|in:s,m,l"
        ]);

        Product::create([
            "name" => $request->name,
            "description" => $request->description,
            "price" => $request->price,
            "stock" => $request->stock,
            "size" => $request->size,
        ]);

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //

        return view("product.partials.show", compact("product"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
        return view("product.partials.edit", compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
        request()->validate([
            "name" => "required|max:100",
            "description" => "required|max:500",
            "price" => "required|integer|min:0",
            "stock" => "required|integer|min:0",
            "size" => "required|in:s,m,l"
        ]);

        // * method  1

        // $product->name = $request->name;
        // $product->description = $request->description;
        // $product->price = $request->price;
        // $product->stock = $request->stock;
        // $product->size = $request->size;
        // $product->save();

        // * method 2
        
        $product->update([
            "name" => $request->name,
            "description" => $request->description,
            "price" => $request->price,
            "stock" => $request->stock,
            "size" => $request->size,
        ]);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
        $product->delete();
        return back();
    }
}
