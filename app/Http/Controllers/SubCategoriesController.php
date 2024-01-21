<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\SubCategory;

class SubCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subcategories= SubCategory::with('categories')->get();
        return view('subcategories.index',compact('subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Categories::all();
        return view('subcategories.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category_id' => 'required|integer',
            'image' => 'required|mimes:jpeg,jpg,png,gif|max:10000',
        ]);
          // Name Image
          $imageName = time().'.'.$request->image->extension();
          $request->image->move(public_path('subcategories'),$imageName);
          // Data Insertion
          $subcategories = new SubCategory();
          $subcategories->name= $request->name;
          $subcategories->category_id=$request->category_id;
          $subcategories->image = $imageName;
          $subcategories->save();

          return redirect()->route('subcategories.index')->withSuccess('Sub Category Inserted Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories = SubCategory::all(); // Fetch all categories
        $subcategory = SubCategory::findOrFail($id); // Fetch the specific SubCategory by ID

        return view('subcategories.edit', compact('subcategory', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{

    $request->validate([
        'name' => 'required',
        'category_id' => 'required',
        'image' => 'nullable|mimes:jpeg,jpg,png,gif|max:10000',
    ]);

    $subcategory = SubCategory::find($id);
    if ($request->hasFile('image')) {
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('categories'), $imageName);
        $subcategory->image = $imageName;
    }

    $subcategory->name = $request->name;
    $subcategory->category_id = $request->category_id;
    $subcategory->save();

    return redirect()->route('subcategories.index')->withSuccess('Sub Category Updated Successfully');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $subcategory=SubCategory::where('id',$id)->first();
        $subcategory->delete();
        return back()->withDelete('Deleted Successfully');
    }
}
