<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;


use App\Models\Users;


class UsersController extends Controller
{

    public function index()
    {
        $users = Users::select('id', 'name', 'email')->get();
        return view('library.users', compact('users'));
    }

//    public function create(){
//        return view('library.create');
//    }
//
//    public function delete(){
//        return view('library.create');
//    }

//    public function store(Request $request){
//        $request -> Validator ([
//            'title' => 'required',
//        ]);
//    }

}



