@extends('layouts.index')

@section('content')
    @include('todo.partials.navbar')




    <div class="py-8 flex flex-wrap  gap-3   px-[2vw]">
        @foreach ($todos as $todo)
            <div class="w-[18.7vw]  px-3 py-2 flex flex-col justify-between h-60  rounded-2xl" style="background-color: {{ $todo->color }}">
                <input type="text"
                    class=" bg-transparent text-wrap focus:outline-none focus:border-none mt-3 font-semibold uiInput" readonly
                    value="{{ $todo->task }}">


                <div class="py-2 flex items-center justify-between">
                    <p class="text-xs text-black/60 mb-0">{{ $todo->created_at->format("Y-M-d")  }} {{ $todo->created_at != $todo->updated_at ? "edited" : ""  }}</p>
                    <div class=" flex items-center gap-x-2">

                        {{--  delete  form --}}
                        <form action="/todo/destroy/{{ $todo->id }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="px-2 text-sm bg-black py-1 text-white rounded-lg" type="submit"><i
                                    class="bi bi-trash-fill"></i></button>
                        </form>

                        <button class="edit px-2 text-sm bg-black py-1 text-white rounded-lg"><i
                                class="bi bi-pencil-fill"></i></button>

                        <form class="hidden" action="/todo/update/{{ $todo->id }}" method="post">
                            @csrf
                            @method('PUT')

                            <input class="hiddenInput" name="task" type="hidden" value="{{ $todo->task }}">

                            <button type="submit" class="edit px-2  bg-black py-1 text-white rounded-lg">
                                <i class="bi bi-check"></i>

                            </button>
                        </form>


                    </div>
                </div>
            </div>
        @endforeach



    </div>
@endsection
