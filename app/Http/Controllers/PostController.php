<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::get();
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'detail'=>'required'
        ]);
        // dd($request->all());
        $post = new Post;
        $post->name = $request->input('name');
        $post->email = $request->input('email');
        $post->detail = $request->input('detail');
        $post->save();
        return redirect()->route('posts.index')->withSuccess('Data Inserted Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::where('id', $id)->first();
       return view('posts.edit', ['post'=>$post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'detail'=>'required'
        ]);
        // dd($request->all());
        $post = Post::where('id', $id)->first();

        $post->name = $request->input('name');
        $post->email = $request->input('email');
        $post->detail = $request->input('detail');
        $post->save();
        return redirect()->route('posts.index')->withSuccess('Data Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::where('id', $id)->first();
        $post->delete();
        return redirect()->back()->withSuccess('Deleted Successfully');
    }
}
