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
        $tasks = Todo::latest()->paginate(5);
        return view('Todo.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Todo.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'min:3', 'unique:' . Todo::class],
            'description' => ['required', 'string', 'min:3', 'max:100'],
        ]);

        Todo::create($data);

        return to_route('todo.index')->with([
            'newTask' => 'New Task Added Successfully',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $task = Todo::findOrFail($id);
        return view('Todo.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $task = Todo::find($id);
        return view('Todo.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => ['required', 'string', 'min:3'],
            'description' => ['required', 'string', 'min:3', 'max:100'],
        ]);

        Todo::findOrFail($id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'is_completed' => $request->complete,
        ]);

        return to_route('todo.index')->with([
            'updateTask' => 'Task Updated Successfully',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Todo::findOrFail($id)->delete($id);
        return to_route('todo.index')->with([
            'delTask' => 'Task Deleted Successfully',
        ]);
    }
}
