<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;


use App\Models\Users;


class UsersController extends Controller
{

    public function index()
    {
        $users = Users::select('id', 'name', 'email')->get();
        return view('users.index', compact('users'));

    }

    public function makeAdmin(Users $user)
    {
        $user->role = 'admin';
        $user->save();
        session()->flash('alert', 'User successfully made administrator.');

        return redirect(route('users'));
    }

    public function verifyUser(Users $user)
    {
        $user->verified_status = 1;
        $user->save();
        session()->flash('alert', 'Your account is now verified, you can now add new products using the button below!');

        return redirect(route('products.index'));
    }


}



