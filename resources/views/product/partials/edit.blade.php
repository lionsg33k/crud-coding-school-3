@extends('layouts.index')

@section('content')
    <h1>You are <span class="text-red-900 bg-black">editing</span> {{ $product->name }}</h1>


    <form action="/product/update/{{ $product->id }}" method="post">
        @csrf
        @method("PUT")

        <div>
            <label for="">name</label> :
            <input value="{{ old('name', $product->name) }}" name="name" required type="text"
                placeholder="please insert a valid Product name">
        </div>
        <br><br>

        <div>
            <label for="">description</label> :
            <input value="{{ old('description', $product->description) }}" name="description" required type="text"
                placeholder="please insert a valid Product description">
        </div>
        <br><br>

        <div>
            <label for="">price</label> :
            <input value="{{ old('price', $product->price) }}" min="0" name="price" required type="number"
                placeholder="please insert a valid Product price">
        </div>
        <br><br>


        <div>
            <label for="">stock</label> :
            <input value="{{ old('stock', $product->stock) }}" min="0" name="stock" required type="number"
                placeholder="please insert a valid Product stock">
        </div>
        <br><br>


        <select name="size" id="">
            <option selected disabled value=""> Select Product size </option>
            <option @selected($product->size == 's') value="s">s</option>
            <option @selected($product->size == 'm') value="m">m</option>
            <option @selected($product->size == 'l') value="l">l</option>
        </select>
        <br><br>

        <button type="submit">Submit</button>


    </form>
@endsection
