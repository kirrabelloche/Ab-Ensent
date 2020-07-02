<?php

namespace App\Http\Controllers;

use App\Tag;
use Session;
use App\Post;
use App\User;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    public function __construct(){


        $this->middleware('auth');

    }

    public function getIndex2(){
        $users = User::all();
        $categories = Category::all();
        $tags = Tag::all();
        $posts = post::orderBy('id','desc')->paginate(3);
        return view('blog.index',  array('user'=>Auth::user()))->withPosts($posts)->with('users', $users)->withCategories($categories)->withTags($tags);

    }
//    public function getIndes(){
//        $posts = post::paginate(10);
//        return view('blog.index')->withPost($posts);
//
//
//    }
    public function getSingle($slug){
        $users = User::all();
        $tags = Tag::all();
        $categories = Category::all();
        $posts = post::orderBy('id','desc')->paginate(3);
        //on cherche dan la bd le slug
        $post = post::where('slug', '=',$slug)->first();
        //on retourne la vue en passant l'objet du post
        return view('blog.single', array('user'=>Auth::user()))->withPosts($posts)->with('users', $users)->withCategories($categories)->withTags($tags)->withPost($post);
    }
}
