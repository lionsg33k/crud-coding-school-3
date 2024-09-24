<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("student.student");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        request()->validate([
            "name" => "required",
            "age" => "required|integer",
            "email" => "required |unique:students,email",
            "phone" => "required",
            "campus" => "required",
            "school" => "required",
            "gender" => "required|in:male,female",
            "level" => "required|integer",
            "terms" => "required|boolean"
        ]);

        Student::create([
            "name" => $request->name,
            "age" => $request->age,
            "email" => $request->email,
            "phone" => $request->phone,
            "campus" => $request->campus,
            "school" => $request->school,
            "gender" => $request->gender,
            "level" => $request->level,
            "terms" => $request->terms
        ]);

        return redirect()->route("home");
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //
    }
}
