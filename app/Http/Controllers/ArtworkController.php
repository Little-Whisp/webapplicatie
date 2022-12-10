<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Artwork;
use App\Models\Users;
use Illuminate\Http\Request;

class ArtworkController extends Controller
{

    // Get all the artworks
    public function index()
    {
        $artworks = Artwork::latest()->paginate(5);
        $categories = Category::all();
        return view('home', compact('artworks', 'categories'))->with('i', (request()->input('page', 1) - 1) * 5);
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
                ->where('title', 'LIKE', "%{$search}%")
                ->orWhere('description', 'LIKE', "%{$search}%")
                ->get();
        }
        if (!$searchCategories == null) {
            $i = 0;
            foreach ($searchCategories as $searchCategory)
                if ($i === 0) {
                    $i++;
                    $artworks = Artwork::query()
                        ->where('title', 'LIKE', "%{$search}%")
                        ->whereRelation('categories', 'categories.id', 'LIKE', "%{$searchCategory}%")
                        ->get();
                } elseif ($i > 0) {
                    $artworks = Artwork::query()
                        ->where('title', 'LIKE', "%{$search}%")
                        ->WhereRelation('categories', 'categories.id', 'LIKE', "%{$searchCategory}%")
                        ->get();
                }
        }

            // Return the search view with the results compacted
            return view('artworks', compact('artworks', 'categories'));

        }


    // Get the detail pages from an artwork
    public function view($id)
    {
        $artwork = Artwork::find($id);
        return view('artworks.view',compact('artwork'));
    }

    public function toggleVisibility($id)
    {
        $artwork = Artwork::find($id);
        $artwork->hidden_status = !$artwork->hidden_status;
        $artwork->save();
        session()->flash('alert', 'Successfully toggled a artwork!');

        return redirect(route('artworks'));
    }


    // Create a new artwork
    public function create()
    {
//        $categories = Category::all();
        return view('artworks.create');
    }


//    public function store(Request $request)
//    {
//        //Merge request to data
//        $data = $request->all();
//        $request->merge($data);
//
//        $validated = $this->validate($request,
//            [
//            'name' => 'required',
//            'detail' => 'required',
//            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
//            'user_id' => 'bail|required|exists:users,id',
//            'category_id' => 'bail|required',
//            'category_id.*' => 'bail|numeric|min:1|exists:categories,id'
//        ]);
//
//        $input = $request->all();
//
//        if ($image = $request->file('image')) {
//            $destinationPath = 'image/';
//            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
//            $image->move($destinationPath, $profileImage);
//            $input['image'] = "$profileImage";
//        }
//
//        Artwork::create($input);
//
//        $artwork = Artwork::create($validated);
////        $artwork->categories()->attach($validated['category_id']);
//        return redirect()->route('home')
//            ->with('success', 'Artwork created successfully.');
//    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }

        Artwork::create($input);

        return redirect()->route('home')
            ->with('success', 'Artwork created successfully.');
    }



    // Show edit page
    public function edit($id)
    {
        $artwork = Artwork::find($id);
        $categories = Category::all();
        $selectedCategories = $artwork->categories;
        return view('artworks.edit', compact('artwork', 'categories', 'selectedCategories'));
    }

    // Update the edited page
    public function update(Request $request, Artwork $artwork)
    {
        $validated = $this->validate($request,
            [
                'id' => 'bail|required|exists:products',
                'name' => 'required',
                'detail' => 'required',
                'category_id' => 'bail|required',
                'category_id.*' => 'bail|numeric|min:1|exists:categories,id'
            ]);
        $artwork = Artwork::find($validated['id']);
        $artwork->title = $validated['title'];
        $artwork->price = $validated['price'];
        $artwork->description = $validated['description'];
        $artwork->save();
        $artwork->categories()->sync($validated['category_id']);
        return redirect(route('artworks.view', $artwork->id));


        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        } else {
            unset($input['image']);
        }

        $artwork->update($input);

        return redirect()->route('home')
            ->with('success', 'Artworks updated successfully');
    }

    // Delete the page
    public function destroy($id)
    {
        Artwork::destroy($id);
        return redirect('home')->with('flash_message', 'Artwork deleted!');

    }
}


