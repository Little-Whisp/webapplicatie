<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Artwork;
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

        // Search in the title and body columns from the artworks table
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


    public function show($id)
    {
        $artwork = Artwork::find($id);

        return view('artwork.show', compact('artwork'));
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
        return view('artwork.create', compact('categories'));
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
                'image' => 'image|nullable|max:1999',
                'user_id' => 'bail|required|exists:users,id',
                'category_id' => 'bail|required',
                'category_id.*' => 'bail|required|max:255|exists:categories,id'
            ]);
        //Add and redirect
        $artwork = Artwork::create($validated);
        $artwork->categories()->attach($validated['category_id']);
        session()->flash('alert', 'Artwork successfully added.');
        return redirect('/portfolio');
    }

    public function edit($id)
    {
        $artwork = Artwork::find($id);
        $categories = Category::all();
        $selectedCategories = $artwork->categories;
        return view('artwork.edit', compact('artwork', 'categories', 'selectedCategories'));
    }

    public function update(Request $request)
    {
        $validated = $this->validate($request,
            [
                'id' => 'bail|required|exists:artworks',
                'name' => 'bail|required|max:255',
                'detail' => 'bail|required|max:255',
                'image' => 'required|image|file',
                'category_id' => 'bail|required',
                'category_id.*' => 'bail|required|max:255|exists:categories,id'
            ]);
        $artwork = Artwork::find($validated['id']);
        $artwork->name = $validated['name'];
        $artwork->detail = $validated['detail'];
        $artwork->image = $validated['image'];
        $artwork->save();
        $artwork->categories()->sync($validated['category_id']);
        return redirect(route('artworks.show', $artwork->id));
    }

    public function destroy(Request $request)
    {
        $validated = $this->validate($request,
            [
                'id' => 'bail|required|exists:artworks'
            ]);
        Artwork::destroy($validated);
        session()->flash('alert', 'Artwork successfully deleted.');
        return redirect('/portfolio');
    }

}
