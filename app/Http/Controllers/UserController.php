<?php

namespace App\Http\Controllers;

use Auth;
use Image;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function profile(){
        $users = User::all();

        return view('profile' , array('user'=>Auth::user()))->with('users', $users);
    }
    public function update_avatar(Request $request){
        $users = User::all();
        // Handle the user uplode avartar
        if($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save(public_path('/uploads/avatars/' . $filename));
            $user = Auth::user();
            $user->avatar = $filename;
            $user->save();
            return view('profile' , array('user'=>Auth::user()))->with('users', $users);

        }

    }
}
