<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['categories'] = Categories::get();

        return view('categories.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([

            'name'=>'required',
            'image'=>'required|mimes:jpeg,jpg,png,gif|max:10000'
        ]);
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('categories'),$imageName);

        // Categories::create($request->all());
        $categories=new Categories;
        $categories->image=$imageName;
        $categories->name=$request->name;
        $categories->save();
        // dd($request->all());
        return redirect()->route('categories.index')->withSuccess('Category Inserted Successfully');
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
        $categories=Categories::where('id',$id)->first();
        return view('categories.edit',['categories'=>$categories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([

            'name'=>'required',
            'image'=>'nullable|mimes:jpeg,jpg,png,gif|max:10000',
        ]);

        $categories=Categories::where('id',$id)->first();
        if($request->hasFile('image'))
        {
            $imageName=time().'.'.$request->image->extension();
            $request->image->move(public_path('categories'),$imageName);
        }
        $categories->image = $imageName;
        $categories->name = $request->name;
        $categories->save();

        return redirect()->route('categories.index')->withSuccess('Category Inserted Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category=Categories::where('id',$id)->first();
        $category->delete();
        return back()->withDelete('Category Deleted Successfully');
    }
}
