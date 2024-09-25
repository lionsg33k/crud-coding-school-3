@extends('layouts.index')

@section('content')
    <h1>Hello product details</h1>
    <hr>
    <hr>
    <h2>{{ $product->name }}</h2>
    <h3>{{ $product->description }}</h3>
    <h5> price : {{ $product->price }}</h5>
    <h3> stock : {{ $product->stock }}</h3>
    <h3> size : {{ $product->size }}</h3>
@endsection
