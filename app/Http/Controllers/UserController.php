<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function editProfile($id){
        $user = User::find($id);

        return view('editProfile')->with('user',$user);
    }

    public function saveProfile(Request $request, $id){

        return back();
    }
}
