<?php

namespace App\Http\Controllers;

use App\Models\todo;
use App\Models\category;
use App\Http\Requests\StoretodoRequest;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $todos = Todo::orderBy('id','desc')->paginate();
        $categories = Category::with('todo')->get();
        return view('todo.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoretodoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoretodoRequest $request)
    {
        $todo= todo::create([
            'title' => $request->title,
            'category_id' => $request->category_id,
            'status'=> false
        ]);
        return redirect()->route('todo.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function show(todo $todo)
    {
        //
    }

    public function change(todo $todo)
    {
        if($todo->status){
            $todo->update([
                'status' => false,                
            ]);
        }else{
            $todo->update([
                'status' => true,
            ]);
        }
        return redirect()->route('todo.index');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function edit(todo $todo)
    {
        $categories = Category::with('todo')->get();
        $todos = Todo::orderBy('id','desc')->paginate();
        return view('todo.index', compact('categories','todo'));
    }
    public function editCategory(Category $category)
    {
        $categories = Category::with('todo')->get();
        $todos = Todo::orderBy('id','desc')->paginate();
        return view('todo.index', compact('categories','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatetodoRequest  $request
     * @param  \App\Models\todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function update(StoretodoRequest $request, todo $todo)
    {
        $todo->update([
            'title' => $request->title,
        ]);
        return redirect()->route('todo.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy(todo $todo)
    {
        $todo->delete();
        return to_route('todo.index');
    }
}
