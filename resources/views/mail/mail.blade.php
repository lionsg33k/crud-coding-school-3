@extends('layouts.index')


@section('content')
    <div class="h-screen heroMail bg-[#04364a]">
        @include('mail.partials.navbar')

        <div class="h-24 border-b border-white px-5">

            <form class="flex items-center gap-x-5" action="/contact/mail/filter" method="post">
                @csrf


                <select class="w-1/4 p-2  border-white" name="priority" id="">
                    <option selected value="all">All</option>
                    <option value="high">High</option>
                    <option value="medium">Medium</option>
                    <option value="low">Low</option>
                </select>

                <select class="w-1/4 p-2  border-white" name="dateSort" id="">
                    <option selected value="latestFirst">Latest First</option>
                    <option selected value="oldestFirst">Oldest First</option>

                </select>

                <button class="text-white bg-[#176b87] py-2  w-1/6" type="submit">Sort</button>
            </form>
        </div>


        <div class=" h-[75vh] overflow-y-auto">

            @foreach ($mails as $mail)
                <div
                    class=" py-4 border-b {{ $mail->read ? 'bg-black/50' : 'bg-black/80' }} border-white px-5 flex  items-center justify-between gap-5">



                    <div class="flex items-center  gap-x-3 h-full">
                        <form action="/contact/mail/update/{{ $mail->id }}" method="post">
                            @csrf @method('PUT')
                            <input name="read" @checked($mail->read == true) class="markAsRead w-4 h-4" type="checkbox">
                            <button class="hidden">save</button>
                        </form>
                        <p class="text-white mb-0 text-lg">{{ $mail->name }}</p>
                    </div>

                    <div class="w-2/3">
                        <p class="{{ $mail->read ? 'text-white/60' : 'text-white' }} text-lg mb-0 truncate  ">
                            {{ $mail->message }}</p>
                    </div>

                    <div class="flex items-center gap-x-5 ">
                        <p class="text-white/60 mb-0">{{ $mail->created_at->format('y-m-d') }}</p>

                        <form action="/contact/mail/destroy/{{ $mail->id }}" method="post">
                            @csrf @method('DELETE')
                            <button class="bg-red-500 hover:bg-red-700 py-1 text-white px-3 rounded-lg"
                                type="submit">Delete</button>
                        </form>
                    </div>



                </div>
            @endforeach

        </div>

    </div>
@endsection
