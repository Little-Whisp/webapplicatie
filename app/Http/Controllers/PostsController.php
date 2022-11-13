<?php

namespace App\Http\Controllers;


use App\Models\artwork;
use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{

    //Here you can view made artwork requests
    public function index()
    {
        $posts = Artwork::select('id', 'name', 'file_path')->get();
        return view('users.posts', compact('posts'));
    }

    public function edit(Artwork $posts)
    {
        $posts = Artwork::find($posts);
        return view('users.edit')->with('posts', $posts);
    }

    public function update(Request $request, Artwork $posts)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $posts->update($request->all());

        return redirect()->route('posts.update')->with('succes', 'Post updated successfully');

    }



public function destroy($id)
{
    Artwork::destroy($id);
    return redirect('posts')->with('flash_message', 'Artwork deleted!');

}

}

