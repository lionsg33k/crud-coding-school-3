@extends('layouts.index')

@section('content')
    <div class="py-4  fixed top-0 flex items-center justify-between px-[2vw] w-5/6">
        <input class=" bg-[#f4f6f8] w-1/5 px-2 py-2 rounded-lg placeholder:text-black/90" type="search"
            placeholder="Search ...">

        <!-- Button trigger modal -->
        <a href="/product/show"
            class="bg-alpha/95 no-underline transition text-black/90 font-semibold px-3 py-2 rounded-lg hover:bg-black hover:text-alpha">Back
            To Shope</a>

    </div>

    <div class="pt-[15vh] px-[2vw] flex gap-x-6">
        {{-- left side  --}}
        <div class="w-3/4 ">
            <div class="">
                <h3 class="font-bold">Cart</h3>

                <table class="table mt-4">
                    <thead>
                        <tr>
                            <th class="py-4 text-secondary" scope="col">Product</th>
                            <th class="py-4 text-secondary" scope="col">Quantity</th>
                            <th class="py-4 text-secondary" scope="col">Price</th>
                            <th class="py-4 text-secondary" scope="col">Remove</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($cartItems as $item)

                            <tr valign="middle">
                            <td class="py-3" scope="row">
                                <div class="flex gap-x-3">
                                    <img class="w-24 h-24 rounded-lg"
                                        src="{{ asset("storage/images/". $item->product->image) }}"
                                        alt="">
                                    <div class="">
                                        <h5 class="text-lg font-bold mb-0">{{ $item->product->name }}</h5>
                                        <p class="mb-0 text-sm font-semibold text-gray-500">{{ $item->product->category }}</p>
                                    </div>
                                </div>
                            </td>

                            <td class="py-3">
                                <div
                                    class="flex justify-center h-full  border-2 text-gray-700 rounded-lg w-1/2 px-3 items-center gap-x-5">
                                    <form action="">
                                        <button class="text-2xl">-</button>
                                    </form>
                                    <h3 class="mb-0 text-lg">{{ $item->quantity }}</h3>
                                    <form action="">
                                        <button class="text-2xl">+</button>
                                    </form>
                                </div>
                            </td>
                            <td class="py-3"><span class="text-lg font-bold mb-0">{{ $item->price }} $</span></td>


                            <td class="py-5">
                                <form action="">
                                    <button class="font-semibold text-sm">

                                        <i class="bi bi-trash3-fill"></i>
                                        Remove</button>
                                </form>
                            </td>
                        </tr>
                            
                        @endforeach


                    </tbody>
                </table>
            </div>


        </div>



        {{-- right side --}}
        <div class="w-1/4 h-fit  border rounded-lg p-3">
            <div class="flex  items-center justify-between">
                <p class="mb-0 text-sm text-gray-400 font-semibold">Subtotal</p>
                <p class="mb-0 font-bold">{{ $totalPrice }} $</p>
            </div>
            <div class="flex  items-center justify-between mt-3">
                <p class="mb-0 text-sm text-gray-400 font-semibold">Discount</p>
                <p class="mb-0 font-semibold text-gray-400">0 $</p>
            </div>
            <div class="flex border-t  items-center justify-between mt-3 py-2">
                <p class="mb-0 text-sm text-gray-400 font-semibold">Total</p>
                <p class="mb-0 font-bold ">{{ $totalPrice }} $</p>
            </div>
            <div class="mt-3">
                <button
                    class="bg-black/95 transition w-full py-2 rounded-lg text-alpha font-semibold hover:bg-alpha hover:text-black/95">Checkout</button>
            </div>

        </div>

    </div>
@endsection
