<?php

namespace App\Http\Controllers;

use App\User;
use App\Cours;
use App\Classes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CoursController extends Controller
{
    public function __construct(){


        $this->middleware('auth');

    }

    public function getIndex2(){
        $users = User::all();
        $cours = Cours::all();
        $cours = Cours::with('user')->get();

        $cours = Cours::orderBy('id','desc')->paginate(8);
        return view('cours.index',compact('user_id') ,array('user'=>Auth::user()))->withcours($cours)->with('users', $users);

    }
//    public function getIndes(){
//        $posts = post::paginate(10);
//        return view('blog.index')->withPost($posts);
//
//
//    }
    public function getSingle($slug){
        $users = User::all();
        $classes = Classes::all();
        $cours = cours::with('Classes')->get();
        $courses = Cours::with('user')->get();
        $cours = Cours::with('classes')->get();
        $user_id = \App\User::whereHas('roles', function ($q) { $q->where('role_id', 3); } )->get();
        
        $etudiants = \App\User::whereHas('roles', function ($q) { $q->where('role_id', 5); } )->get();

        $cours = Cours::with('user')->get();
        //on retourne la vue en passant l'objet cours
       // $cours = Cours::orderBy('id','desc')->paginate(2);
        //on cherche dan la bd le slug
        $cours = cours::where('slug', '=',$slug)->first();
        //$user_id = \App\User::whereHas('roles', function ($q) { $q->where('role_id', 3); } )->get()->pluck('name', 'id');
        //dd($cours);

        $users = \App\User::whereHas('roles', function ($q) { $q->where('role_id', 5); } )->get()->pluck('name', 'id');
        //on retourne la vue en passant l'objet cours
        return view('cours.single',compact('user_id'),compact('etudiants')  , array('user'=>Auth::user()))->withcours($cours)->withcourses($courses)->with('users', $users);
    }
}
