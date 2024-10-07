<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use function PHPUnit\Framework\fileExists;

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
            "name" => "required",
            "price" => "required|integer|min:0",
            "stock"  => "required|integer|min:0",
            "category" => "required|in:men,women,child|",
            "image" => "required|image|max:3072"
        ]);

        $file =  file_get_contents($request->image);

        $fileName = hash("sha256", $file) . "." . $request->image->getClientOriginalExtension();

        Storage::disk("public")->put("images/" . $fileName, $file);

        Product::create([
            "name" => $request->name,
            "price" => $request->price,
            "stock" => $request->stock,
            "category" => $request->category,
            "image" => $fileName
        ]);


        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
        $products = Product::all();
        $cartCount = Cart::count();

        //* if  u dont wanna  compact all the  products  u can simply  filter  everything on ur ctrl

        // $products = Product::all()->where("stock", ">", "0");
        // dd($products);

        return view("product.partials.show", compact("products" , "cartCount"));
    }


    public function filtredProduct(Request $request)
    {

        request()->validate([
            "category" => "required|in:men,women,child,all",
            "price" => "required|in:random,expensive,cheap"
        ]);
        $filterCategory = $request->category;
        $filterPrice = $request->price;

        // dd($request->all());

        $query = Product::query();

        // - 1 -> column    2 -> asc  desc

        if ($filterPrice != "random") {
            $query->orderBy("price", $filterPrice == "expensive" ? "desc" : "asc");
        }

        if ($filterCategory != "all") {
            $query->where("category", $filterCategory);
        }


        $products =  $query->get();


        return view("product.partials.show", compact("products"));
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
            "name" => "required",
            "price" => "required|integer|min:0",
            "stock"  => "required|integer|min:0",
            "category" => "required|in:men,women,child|",
        ]);

        if ($request->hasFile("image")) {
            $path = storage_path('app/public/images/' . $product->image);
            if (file_exists($path)) {
                unlink($path);
                $request->image->move(storage_path("app/public/images/"), $product->image);
            }
        }


        $product->update([
            "name" => $request->name,
            "price" => $request->price,
            "stock" => $request->stock,
            "category" => $request->category,
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
