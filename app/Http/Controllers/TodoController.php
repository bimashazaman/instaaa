<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{


    public function index(){
        $todos= auth()->user()->todos()->orderBy('completed')->get();
        return view('todos.index')->with(['todos'=>$todos]);
    }


    public function create(){
        return view('todos.create');
    }


    public function edit(Todo $todo){


        return view('todos.edit', compact('todo'));
    }



    public function store(Request $request){

       $request->validate([
          'title'=>'required|max:255',
           'Details'=>'required'
       ]);
       auth()->user()->todos()->create($request->all());
        return redirect()->back()->with('message','Todo created successfully');
    }

    public function update(Request $request, Todo $todo){
        $request->validate([
            'title'=>'required|max:255',
        ]);
        $todo->update(['title'=>$request->title]);
        return redirect()->back()->with('message','updated');
    }

    public function complete(Todo $todo){
        $todo->update(['completed'=>true]);
        return redirect()->back()->with('message', 'task marked as completed');
    }

    public function incomplete(Todo $todo){
        $todo->update(['completed'=>false]);
        return redirect()->back()->with('message', 'task marked as Incompleted!');
    }

    public function delete(Todo $todo){
        $todo->delete();
        return redirect()->back()->with('message', 'Task deleted!');
    }

    public function show(Todo $todo){
        return view('todos.show',compact('todo'));
    }
    


}
