<?php

namespace App\Http\Controllers;

use App\Models\ToDo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
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
     */
    public function edit($id)
    {
        $todo = ToDo::findOrFail($id);
        return view('edit')->with('todo', $todo);;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'desc' => 'required',
            'picture'  => 'nullable',
            'delPicture' => 'nullable',
        ]);

        $todo = ToDo::findOrFail($id);
        $data = $request->all();

        $todo->name = $data['name'];
        $todo->desc = $data['desc'];
        $oldImagePath = public_path('/images/'.$todo->picture);

        if(isset($data['picture'])){ 
            if (File::exists($oldImagePath)) {
                File::delete($oldImagePath);
            }
            $imageName = time() . '.' . $request->picture->extension();
            $request->picture->move(public_path('images'), $imageName);
            $todo->picture = $imageName;
        }
        if(isset($data['delPicture'])){
            if (File::exists($oldImagePath)) {
                File::delete($oldImagePath);
            }
            $todo->picture = null;
        }
        $todo->save();

        session()->flash('success', 'Todo updated successfully');

        return redirect('/todos/'.$id);
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
