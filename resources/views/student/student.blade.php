@extends('layouts.index')

@section('content')
    <h1>Create Student</h1>
    <hr><br><br>
    <form action="/student/store" method="post">
        @csrf

        <div>
            <label for="">name</label> :
            <input name="name" required type="text" placeholder="please insert a valid name">
        </div>
        <br><br>



        <div>
            <label for="">age</label> :
            <input name="age" required type="number" placeholder="please insert a valid age">
        </div>
        <br><br>


        <div>
            <label for="">Email</label> :
            <input name="email" required type="email" placeholder="please insert a valid email">
        </div>
        <br><br>


        <div>
            <label for="">Phone</label> :
            <input name="phone" required type="text" placeholder="please insert a valid Phone number">
        </div>
        <br><br>


        <div>
            <label for="">School</label> <br><br>

            <div>
                <label for="">coding school</label> :
                <input value="coding" name="school"  type="checkbox">
                <label for="">media school</label> :
                <input value="media" name="school"  type="checkbox">
            </div>

        </div>
        <br><br>


        <div>
            <label for="">gende</label> <br> <br>

            <div>
                <label for="">male</label> :
                <input value="male" name="gender" required type="radio">
                <label for="">female</label> :
                <input value="female" name="gender" required type="radio">
            </div>

        </div>
        <br><br>


        <div>
            <label for=""> your English level</label> :
            <input name="level" required min="0" max="100" type="range"
                placeholder="please insert a valid name">
        </div>
        <br><br>

        <select name="campus" id="">
            <option selected disabled value=""> choose campus </option>
            <option value="casablanca">casablanca</option>
            <option value="bruxel">bruxel</option>
            <option value="amsterdam">amsterdam</option>
        </select>
        <br><br>

        <div>
            <label for="">Accept terms ?</label> :
            {{-- <input required type="checkbox"> --}}

            <div>
                <label for="">yes</label> :
                <input value="1" name="terms" required type="radio">
                <label for="">no</label> :
                <input value="0" name="terms"required type="radio">
            </div>
        </div>
        <br><br>



        <button type="submit">Save</button>
    </form>
@endsection
