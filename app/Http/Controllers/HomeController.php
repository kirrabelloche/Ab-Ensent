<?php

namespace App\Http\Controllers;
use App\Post;
use App\User;
use App\Cours;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()

    {
        $users = User::all();
        $posts = post::all();
        $posts = post::with('user')->get();
        $posts = post::orderBy('id','desc')->paginate(4);
        $cours = Cours::all();
        $cours = Cours::with('user')->get();
        $cours = Cours::orderBy('id','desc')->paginate(8);
        return view('home',  array('user'=>Auth::user()))->withposts($posts)->with('users', $users)->withCours($cours);
    }


}
