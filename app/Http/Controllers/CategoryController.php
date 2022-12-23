<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Category::class, Category::class);
    }


    public function index() {
        $categories = Category::all();
        return view('categories')->with('categories', $categories);
    }


    public function create () {
        return view('category.create');
    }

    public function show($id) {
        $category = Category::find($id);
        return view('category.show', compact('category'));
    }


    public function store(Request $request){
        //Merge request to data
        $data = $request->all();
        $request->merge($data);

        //Validate request
        $this->validate($request,
            [
                'name' => 'bail|required|unique:categories|max:255',
                'description' => 'nullable'
            ]);
        //Add and redirect
        Category::create($request->all());
        return redirect('/categories');
    }


    public function edit($id)
    {
        $category = Category::find($id);
        return view('category.edit', compact('category'));
    }


    public function update(Request $request)
    {
        $validated = $this->validate($request,
            [
                'id' => 'bail|required|exists:categories',
                'name' => 'bail|required|max:255',
                'description' => 'nullable'
            ]);
        $category = Category::find($validated['id']);
        $category->name = $validated['name'];
        $category->description = $validated['description'];
        $category->save();
        return redirect('/categories');
    }


    public function destroy(Request $request)
    {
        $validated = $this->validate($request,
            [
                'id' => 'bail|required|exists:categories'
            ]);
        Category::destroy($validated['id']);
        return redirect('/categories');
    }
}

