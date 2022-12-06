<?php

namespace App\Http\Controllers;

use App\Models\Artwork;
use Illuminate\Http\Request;

class ArtworkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Artworks = Artwork::latest()->paginate(5);

        return view('artworks.index',compact('artworks'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('artworks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

        return redirect()->route('artworks.index')
            ->with('success','Artwork created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Artwork  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Artwork $product)
    {
        return view('artworks.show',compact('artwork'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Artwork  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('artworks.edit',compact('artwork'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Artwork  $product
     * @return \Illuminate\Http\Response
     */
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
        }else{
            unset($input['image']);
        }

        $artwork->update($input);

        return redirect()->route('artworks.index')
            ->with('success','Artworks updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Artwork  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Artwork $artwork)
    {
        $artwork->delete();

        return redirect()->route('artworks.index')
            ->with('success','Product deleted successfully');
    }
}
