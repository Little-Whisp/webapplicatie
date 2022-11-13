<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

use App\Models\Detail;

class DetailController extends Controller
{

public function index ()
{


    $details = Detail::select('id')->get();

    return view($tags = [
        1 => [
            "artdetails" => ['Illustration', 'Splash Art', 'Sci-fi',]
        ],

        2 => [
            "artdetails" => ['Concept Art', 'Character Design', 'Fantasy', 'Creatures',]
        ],

        3 => [
            "artdetails" => ['Illustration', 'Visual Development', 'Animals',]
        ],

        4 => [
            "artdetails" => ['Concept art', 'Nature', 'Matte Painting']
        ],

        5 => [
            "artdetails" => ['Splash art', 'Fantasy',]
        ],
        6 => [
            "artdetails" => ['Fan Art', 'Fantasy', 'Illustration',]


        ], compact('details')

    ]);

}

}
