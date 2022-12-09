<?php

namespace App\Http\Controllers;

use App\Models\Artwork;
use Illuminate\Http\Request;

class ArtworkController extends Controller
{

    // Get all the artworks
    public function index()
    {
        $artworks = Artwork::latest()->paginate(5);
        return view('home', compact('artworks',))->with('i', (request()->input('page', 1) - 1) * 5);
    }


    // Get the detail pages from an artwork
    public function view(Artwork $artwork)
    {
        return view('artworks.view',compact('artwork'));
    }

    // Create a new artwork
    public function create()
    {
        return view('artworks.create');
    }


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
    public function edit(Artwork $artwork)
    {
        return view('artworks.edit', compact('artwork'));
    }

    // Update the edited page
    public function update(Request $request, Artwork $artwork)
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required'
        ]);

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


