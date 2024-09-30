@extends('layouts.index')

@section('content')
    <div class="h-screen heroMail    flex items-center justify-center">


        <div class="contact flex w-[70%] h-[80%] bg-[#04364a]/80 rounded-2xl">

            <div class="left w-[43%] px-8 flex flex-col  justify-center gap-y-16 h-full font-serif">
                <h1 class="text-white text-4xl leading-10  w-full">Lets Talk on Something <span class="text-[#61c7c1]">Great</span> Together</h1>
                <div class="flex flex-col items-start gap-y-5">

                    <div class="flex items-center gap-x-4  ">
                        <i class="bi bi-envelope text-[#61c7c1] text-2xl"></i>
                        <p class="text-white/70 mb-0">me@lionsgeek.com</p>
                    </div>
                    <div class="flex items-center gap-x-4  ">
                        <i class="bi bi-telephone text-[#61c7c1] text-2xl"></i>
                        <p class="text-white/70 mb-0">+212 6 xx- xx -xx -xx</p>
                    </div>
                    <div class="flex items-center gap-x-4  ">
                        <i class="bi bi-geo-alt-fill text-[#61c7c1] text-2xl"></i>
                        <p class="text-white/70 mb-0">Darna , wast derbna  , dar lewla la dar tanya - soni mzyan</p>
                    </div>
                    
                </div>
                <div class="SOCIAL flex gap-x-5">
                    <i class="bi bi-instagram text-[#61c7c1] text-2xl"></i>
                    <i class="bi bi-github text-[#61c7c1] text-2xl"></i>
                    <i class="bi bi-linkedin text-[#61c7c1] text-2xl"></i>
                </div>
            </div>


            <div class="right w-[55%] h-full flex items-center justify-center  ">

                <form action="/contact-us/store" method="post"
                    class="w-2/3 p-3 flex flex-col  justify-center gap-y-5  bg-white rounded-3xl ">
                    @csrf
                    <div class=" flex flex-col items-start gap-y-2 mt-2">
                        <label class="text-[#176b87] font-extrabold" for="">Name</label>
                        <input name="name"
                            class="border-b border-gray-400 h-8 px-2 focus:border-b  focus:outline-none w-full" required
                            type="text" placeholder="Insert a valid name">
                    </div>

                    <div class=" flex flex-col items-start gap-y-2 mt-2">
                        <label class="text-[#176b87] font-extrabold" for="">Email</label>
                        <input name="email"
                            class="border-b border-gray-400 h-8 px-2 focus:border-b  focus:outline-none w-full" required
                            type="email" placeholder="Insert a valid email">
                    </div>

                    <div class=" flex flex-col items-start gap-y-2 mt-2">
                        <label class="text-[#176b87] font-extrabold" for="">Phone number</label>
                        <input name="phone"
                            class="border-b border-gray-400 h-8 px-2 focus:border-b  focus:outline-none w-full" required
                            type="text" placeholder="Insert a valid Phone Number">
                    </div>

                    <div class=" flex flex-col items-start gap-y-2 mt-2">
                        <label class="text-[#176b87] font-extrabold" for="">Message</label>
                        <textarea class="border border-gray-400 w-full p-2" required placeholder="Inseret a valid message" name="message"
                            id=""></textarea>

                    </div>

                    <div class=" flex flex-col items-start gap-y-2 mt-2">

                        <select class=" w-full border-2 rounded-lg py-2 border-[#176b87]" required name="priority"
                            id="">

                            <option value="" selected disabled> Select Message Priority</option>
                            <option value="high">High</option>
                            <option value="medium"> Medium</option>
                            <option value="low"> Low</option>
                        </select>
                    </div>

                    <button class=" bg-[#176b87] text-white w-full py-2.5 rounded-full" type="submit">Send </button>
                </form>


            </div>

        </div>

    </div>
@endsection
