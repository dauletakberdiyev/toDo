<?php

namespace App\Http\Controllers;

use App\Models\ToDo;
use Illuminate\Http\Request;

class ToDoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {   
        $todos = ToDo::all();
        return view('main')->with('todos', $todos);
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'desc' => 'required',
            'picture'  => 'nullable',
        ]);
        
        $imageName = time().'.'.$request->picture->extension();
        $request->picture->move(public_path('images'), $imageName);

        $data = $request->all();
        $data['picture'] = $imageName;
        
        ToDo::create($data);

        session()->flash('success', 'WE did IT');

        return redirect('/todos');
    }

    /**
     * Display the specified resource.
     *
     */
    public function show($id)
    {
        $todo = ToDo::findOrFail($id);
        return view('detail')->with('todo', $todo);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ToDo  $toDo
     * @return \Illuminate\Http\Response
     */
    public function edit(ToDo $toDo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ToDo  $toDo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ToDo $toDo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ToDo  $toDo
     * @return \Illuminate\Http\Response
     */
    public function destroy(ToDo $toDo)
    {
        //
    }
}
