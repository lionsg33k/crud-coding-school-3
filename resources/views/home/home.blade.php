@extends('layouts.index')

@section('content')
    

@foreach ($students as $student)
    <h1>hello {{ $student->name }}</h1>
@endforeach
@endsection