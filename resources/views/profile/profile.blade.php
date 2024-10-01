@extends('layouts.index')

@section('content')
    <div class="py-3  flex items-center justify-center">

        <form enctype="multipart/form-data" method="post" action="/profile/store">
            @csrf
            <input name="file" accept="image/png,jpg" type="file">
            <button type="submit">Save</button>
        </form>
    </div>

    <hr>
    <hr>
    <div class="flex gap-x-5 flex-wrap">

        @foreach ($profiles as $profile)
<div class="flex flex-col">

    <form action="/profile/update/{{ $profile->id }}" method="post" enctype="multipart/form-data" class="relative">
        @csrf @method("PUT")
        <img width="200" src="{{ asset('storage/images/' . $profile->name) }}" alt="">
        <input name="file"  accept="image/png,jpg" class="w-full h-full absolute top-0 opacity-0 imageUpdateInputs" type="file">
        <button  class="bg-blue-500 px-5 py-1 hidden">Update</button>
    </form>

    <div class="flex flex-col gap-y-5">
        <form  action="/profile/destroy/{{ $profile->id }}" method="post">
            @csrf @method('DELETE')
            <button class="bg-red-500 px-5 py-1 ">Delete</button>
        </form>

    </div>

</div>
        @endforeach

    </div>
@endsection
