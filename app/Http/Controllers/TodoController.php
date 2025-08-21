<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::all();
        return view('daftar-todo')->with([
            'nama' => 'orangs',
            'todos' => $todos
        ]);
    }

    public function store(Request $req)
    {
        $data = $req->all();
        $name = $data['name'];

        $todo = Todo::create([
            'name' => $name,
            'is_done' => false
        ]);

        return redirect('/todo');
    }

    public function destroy($idTodo)
    {

        $todo = Todo::findOrFail($idTodo);

        $todo->delete();

        return redirect('/todo');
    }

    public function edit($idTodo)
    {
        $todo = Todo::findOrFail($idTodo);


        return view('edit-todo', ['todo' => $todo]);
    }

    public function update(Request $request, $idTodo)
    {
        $todo = Todo::findOrFail($idTodo);

        $todo->update([
            'name' => $request->name,
            'is_done' => $request->is_done
        ]);


        return redirect()->route('todo.index');
    }

    public function updateDone(Request $request, $idTodo)
    {
        $todo = Todo::findOrFail($idTodo);

        $todo->update(
            [
                'is_done' => $request->is_done
            ]
        );

        return redirect()->route('todo.index');
    }
}
