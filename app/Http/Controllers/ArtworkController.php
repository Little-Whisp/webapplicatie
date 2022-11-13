<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

use App\Models\Artwork;

class ArtworkController extends Controller
{
    public function index()
    {
        return view('users.artwork');

    }


  //Here you can create request for artwork.
        public function store(Request $request)
    {

        // Validate the inputs
        $request->validate([
            'name' => 'required',
        ]);


        // ensure the request has a file before we attempt anything else.
        if ($request->hasFile('file')) {

            $request->validate([
                'image' => 'mimes:jpeg,bmp,png' // Only allow .jpg, .bmp and .png file types.
            ]);

            // Save the file locally in the storage/public/ folder under a new folder named /product
            $request->file->store('product', 'public');

            // Store the record, using the new file hashname which will be it's new filename identity.
            $posts = new Artwork([
                "name" => $request->get('name'),
                "file_path" => $request->file->hashName(),
            ]);
            $posts->save(); // Finally, save the record.

        }

        return view('users.artwork')
        ->with('success','Artwork request was created successfully.');

    }
}
