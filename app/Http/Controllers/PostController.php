<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Categories;
use App\Models\SubCategory;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with('category','sub_category')->get();
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Categories::all();
        $subcategories = SubCategory::all();

        return view('posts.create', compact('categories', 'subcategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
            // Validate the request data
            $request->validate([
                'category_id' => 'required',
                'subcategory_id' => 'required',
                'name' => 'required',
                'short_description' => 'required',
                'long_description' => 'required',
                'auther' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $post = new Post;
            $post->name = $request->input('name');
            $post->auther = $request->input('auther');
            $post->short_description = $request->input('short_description');
            $post->long_description = $request->input('long_description');
            $post->category_id = $request->input('category_id');
            $post->subcategory_id = $request->input('subcategory_id');

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time().'.'.$image->getClientOriginalExtension();
                $image->move(public_path('uploads'), $imageName);
                $post->image = 'uploads/'.$imageName;
            }

            $post->save();
            // Redirect back with a success message or handle as needed
            return redirect()->route('posts.index')->with('success', 'Post created successfully.');

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

        $categories = Categories::all();
        $subcategories = SubCategory::all();
        $posts = Post::findOrFail($id);
        return view('posts.edit', compact('posts', 'categories', 'subcategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'category_name' => 'required',
            'subcategory_name' => 'required',
            'post_name' => 'required',
            's_detail' => 'required',
            'l_detail' => 'required',
            'a_name' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // dd($request->all());
        $post = Post::findOrFail($id);

        $post->category_name = $request->input('category_name');
            $post->subcategory_name = $request->input('subcategory_name');
            $post->post_name = $request->input('post_name');
            $post->s_detail = $request->input('s_detail');
            $post->l_detail = $request->input('l_detail');
            $post->a_name = $request->input('a_name');

            // Handle file upload
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time().'.'.$image->getClientOriginalExtension();
                $image->move(public_path('uploads'), $imageName);
                $post->image = 'uploads/'.$imageName;
            }

            // Save the Post
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
