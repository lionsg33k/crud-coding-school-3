<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $todos = Todo::all();

        $randomColor = array("#fec971" , "#fe9b72" , "#e4ef8e" , "#00d4fd" , "#b693fc");

        foreach ($todos as $todo) {
            $todo->color = $randomColor[array_rand($randomColor)];
        }



        return view("todo.todo", compact("todos"));
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
            "task" => "required"
        ]);

        Todo::create([
            "task" => $request->task
        ]);

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Todo $todo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Todo $todo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Todo $todo)
    {
        //

        // dd("done");
        request()->validate([
            "task" => "required"
        ]);

        $todo->update([
            "task" => $request->task
        ]);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Todo $todo)
    {
        //
        $todo->delete();
        return back();
    }
}
