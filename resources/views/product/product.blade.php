@extends('layouts.index')

@section('content')
    <h1>Hello from Products view</h1>

    <form action="/products/store" method="post">
        @csrf

        <div>
            <label for="">name</label> :
            <input name="name" required type="text" placeholder="please insert a valid Product name">
        </div>
        <br><br>

        <div>
            <label for="">description</label> :
            <input name="description" required type="text" placeholder="please insert a valid Product description">
        </div>
        <br><br>

        <div>
            <label for="">price</label> :
            <input min="0" name="price" required type="number" placeholder="please insert a valid Product price">
        </div>
        <br><br>


        <div>
            <label for="">stock</label> :
            <input min="0" name="stock" required type="number" placeholder="please insert a valid Product stock">
        </div>
        <br><br>


        <select name="size" id="">
            <option selected disabled value=""> Select Product size </option>
            <option value="s">s</option>
            <option value="m">m</option>
            <option value="l">l</option>
        </select>
        <br><br>

        <button type="submit">Submit</button>


    </form>

    <hr>
    <hr>

    <h1>This is the product list ( you have {{ $products->count() }} products) </h1> <br> <br>

    @foreach ($products as $product)
        <div>
            <h2>{{ $product->name }}</h2>
            <h3>{{ $product->description }}</h3>
            <h5> price : {{ $product->price }}</h5>
            <h3> stock : {{ $product->stock }}</h3>
            <h3> size : {{ $product->size }}</h3>
            <a href="/product/show/{{ $product->id }}">Show Product</a> <br> <br>

            <form action="/product/destroy/{{ $product->id }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit">Delete Product</button>
            </form>
        </div>
        <hr>
        <hr><br>
    @endforeach
@endsection
