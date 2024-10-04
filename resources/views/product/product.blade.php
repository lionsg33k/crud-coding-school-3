@extends('layouts.index')

@section('content')
    <div class="h-24  fixed top-0 flex items-center justify-between px-[2vw] w-5/6">
        <input class=" bg-[#f4f6f8] w-1/5 px-2 py-2 rounded-lg placeholder:text-black/90" type="search"
            placeholder="Search ...">

        <!-- Button trigger modal -->
        <button class="bg-black/95 transition text-alpha px-3 py-2 rounded-lg hover:bg-alpha hover:text-black" type="button"
            class="" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Product</button>


    </div>




    {{-- table --}}

    <div class="pt-[15vh] px-5">

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Image</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Category</th>
                    <th scope="col">Update</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr valign="middle">
                        <td>{{ $product->id }}</td>
                        <td class=""><img class="w-24 h-24 object-cover"
                                src="{{ asset('storage/images/' . $product->image) }}" alt=""></td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->price }}</td>
                        <td> {{ $product->stock > 0 ? $product->stock : 'Out of Stock' }}</td>
                        <td>{{ $product->category }}</td>
                        <td> <button class="px-7 py-1 bg-alpha  rounded-lg" type="button" class=""
                                data-bs-toggle="modal" data-bs-target="#updateModal{{ $product->id }}">Edit</button>
                        </td>

                        <td>
                            <form method="post" action="{{ route('product.destroy', $product->id) }}">
                                @csrf @method('DELETE')

                                <button class="px-7 py-1 bg-red-500 text-white rounded-lg" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @include('product.partials.edit')
                @endforeach

            </tbody>
        </table>
    </div>



    @include('product.partials.create')
@endsection
