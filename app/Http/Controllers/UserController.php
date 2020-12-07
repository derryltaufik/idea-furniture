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
        $request->validate([
            'name' => ['required', 'string', 'min:6'],
            'address' => ['required', 'string', 'min:10'],
            'gender' => ['required', 'in:Male,Female'],
            'date_of_birth' => ['required', "before:today", 'date']
        ]);

        $user = User::find($id);
        $user->name = $request->name;
        $user->address = $request->address;
        $user->gender = $request->gender;
        $user->date_of_birth = $request->date_of_birth;
        $user->save();

        return back()->with('success','Profile has been added');
    }
}
