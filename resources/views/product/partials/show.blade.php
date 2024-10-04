@extends('layouts.index')

@section('content')
    <div class="p-8">
        <h1 class="text-2xl">All Products</h1>
    </div>

    <form method="post" action="{{ route('products.filter') }}"
        class=" w-full flex items-center justify-end gap-x-5 px-[2vw] py-2">
        @csrf
        <select  class="bg-[#f4f6f8] px-2 py-2 rounded-lg border-1 border-black/50 w-1/5" name="category" id="">
            <option selected value="all">All</option>
            <option value="men">Men</option>
            <option value="women">Women</option>
            <option value="child">Child</option>
        </select>

        <select class="bg-[#f4f6f8] px-2 py-2 rounded-lg border-1 border-black/50 w-1/5" name="price" id="">
            <option selected value="random">Random</option>
            <option value="expensive">Expensive</option>
            <option value="cheap">Cheap</option>
        </select>

        <button class="px-3 w-1/6 py-2 bg-alpha text-black rounded-lg">Filter</button>


    </form>

    <div class="flex items-center gap-x-3 gap-y-3 mt-3 p-8">

        @foreach ($products as $product)
            <div class="card relative" style="width: 18rem;">
                <img src="{{ asset('storage/images/' . $product->image) }}" class="card-img-top  w-fit h-64 object-cover"
                    alt="...">
                <div class="card-body flex items-center justify-between">
                    <div class="flex flex-col">
                        <h5 class="mb-0 text-lg">{{ $product->name }}</h5>
                        <p class="mb-0 absolute top-2 right-2 text-alpha  text-base font-bold bg-black px-2">
                            {{ $product->price }} $</p>
                    </div>

                    <form action="">

                        <button type="submit"
                            class="bg-alpha hover:bg-black hover:text-alpha transition px-3 py-1 rounded-lg font-semibold">Add
                            To Cart</button>

                    </form>

                </div>
            </div>
        @endforeach

    </div>
@endsection
