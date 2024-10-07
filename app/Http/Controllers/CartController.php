<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $carts = Cart::all();


        $cartItems =  $carts->map(function ($row) {

            $product = Product::find($row->item_id);

            return (object) [
                "product" => $product,
                "quantity" => $row->quantity,
                "price" => $product->price *  $row->quantity
            ];
        });

        $totalPrice = $cartItems->reduce(function ($total, $item) {
            return $total +  $item->price;
        });

        return view("product.cart.cart", compact("cartItems" , "totalPrice"));
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
            "item_id" => "required|integer"
        ]);

        $exist = Cart::all()->where("item_id", $request->item_id)->first();
        $product = Product::find($request->item_id);


        if ($exist) {
            $exist->increment("quantity");
        } else {
            Cart::create([
                "item_id" => $request->item_id,
                "quantity" => 1
            ]);
        }

        $product->decrement("stock");

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cart $cart)
    {
        //
    }
}
