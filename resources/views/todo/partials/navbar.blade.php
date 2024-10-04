<div class="py-[2vh]  gap-x-10 flex items-center justify-end px-[2vw]">

    {{--  create  form --}}
    <form action="/todo/store" method="post" class=" px-[2vw] py-3 flex items-center  gap-x-10 ">
        @csrf
        <input placeholder="Insert Task ..." type="text" name="task"
            class="py-2 px-2 rounded-lg w-[20vw]  border-2 border-black">
        <button class=" bg-black px-10 py-2 rounded-lg text-white text-lg font-bold">Add</button>
    </form>
</div>
