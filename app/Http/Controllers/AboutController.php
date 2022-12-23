<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function show()
    {
        $title = "Welcome";
        $text = "This is my portfolio.";
        return view('about', compact('title', 'text'));
    }
}
