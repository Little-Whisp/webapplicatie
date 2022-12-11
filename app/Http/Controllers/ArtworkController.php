<?php

namespace App\Http\Controllers;

use App\Models\Artwork;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class ArtworkController extends Controller
{

    public function index()
    {
        $artworks = Artwork::all();
        $categories = Category::all();
        return view('artworks', compact('artworks', 'categories'));
    }

    public function search(Request $request)
    {
        $categories = Category::all();
        // Get the search value from the request
        $search = $request->input('search');
        $searchCategories = $request->input('searchCategory');
        $artworks = null;

        // Search in the title and body columns from the products table
        if (!$search == null) {
            $artworks = Artwork::query()
                ->where('name', 'LIKE', "%{$search}%")
                ->orWhere('detail', 'LIKE', "%{$search}%")
                ->get();
        }

        if (!$searchCategories == null) {
            $i = 0;
            foreach ($searchCategories as $searchCategory)
                if ($i === 0) {
                    $i++;
                    $artworks = Artwork::query()
                        ->where('name', 'LIKE', "%{$search}%")
                        ->whereRelation('categories', 'categories.id', 'LIKE', "%{$searchCategory}%")
                        ->get();
                } elseif ($i > 0) {
                    $artworks = Artwork::query()
                        ->where('name', 'LIKE', "%{$search}%")
                        ->WhereRelation('categories', 'categories.id', 'LIKE', "%{$searchCategory}%")
                        ->get();
                }

        }

        // Return the search view with the results compacted
        return view('artworks', compact('artworks', 'categories'));
    }


    public function view($id)
    {
        $artwork = Artwork::find($id);

        return view('artwork.view', compact('artwork'));
    }

    public function toggleVisibility($id)
    {
        $artwork = Artwork::find($id);
        $artwork->hidden_status = !$artwork->hidden_status;
        $artwork->save();
        session()->flash('alert', 'Successfully toggled a artwork!');

        return redirect(route('artworks.index'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('artworks.create', compact('categories'));
    }

    public function store(Request $request)
    {
        //Merge request to data
        $data = $request->all();
        $request->merge($data);

        //Validate request
        $validated = $this->validate($request,
            [
                'name' => 'bail|required|max:255',
                'detail' => 'bail|required|max:255',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'user_id' => 'bail|required|exists:users,id',
                'category_id' => 'bail|required',
                'category_id.*' => 'bail|numeric|min:1|exists:categories,id'
            ]);
        //Add and redirect
        $artwork  = Artwork::create($validated);
        $artwork ->categories()->attach($validated['category_id']);
        session()->flash('alert', 'Artwork successfully added.');
        return redirect('/artwork');
    }

    public function edit($id)
    {
        $artwork  = Artwork::find($id);
        $categories = Category::all();
        $selectedCategories = $artwork ->categories;
        return view('artworks.edit', compact('artwork', 'categories', 'selectedCategories'));
    }

    public function update(Request $request)
    {
        $validated = $this->validate($request,
            [
                'name' => 'bail|required|max:255',
                'detail' => 'bail|required|max:255',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'user_id' => 'bail|required|exists:users,id',
                'category_id' => 'bail|required',
                'category_id.*' => 'bail|numeric|min:1|exists:categories,id'
            ]);
        $artwork = Artwork::find($validated['id']);
        $artwork ->name = $validated['title'];
        $artwork ->detail = $validated['detail'];
        $artwork ->image = $validated['image'];
        $artwork ->save();
        $artwork ->categories()->sync($validated['category_id']);
        return redirect(route('artworks.view', $artwork->id));
    }

    public function destroy(Request $request)
    {
        $validated = $this->validate($request,
            [
                'id' => 'bail|required|exists:artworks'
            ]);
        Artwork::destroy($validated);
        session()->flash('alert', 'Artwork successfully deleted.');
        return redirect('/artwork');
    }

}


