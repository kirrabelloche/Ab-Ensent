<?php

namespace App\Http\Controllers;
use App\Tag;
use Session;
use App\Like;
use App\Post;
use App\User;



use App\Filiere;
use App\Category;
use App\Departement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function __construct(){


        $this->middleware('auth');

    }

    public function index()
    {
        $users = User::all();
        $posts = post::all();
        return view('posts.index',  array('user'=>Auth::user()))->withposts($posts)->with('users', $users);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $categories = Category::all();
        $tags = Tag::all();
        $depatements = Departement::all();
        $filieres = Filiere::all();

        return view('posts.create', array('user'=>Auth::user()))->withCategories($categories)->withTags($tags)->withDepartements($depatements)->withFilieres($filieres)->with('users', $users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

            $this->validate($request,array(
                'title'=>'required|max:255',
                'slug'=>'required|alpha_dash|min:5|max:255|unique:posts,slug',
                'category_id'=>'required|integer',
                'body'=>'required',
                'file'=> '',
                'departement'=> ''
            ));

            //store in the database

            $parameters = $request->except(['_token']);
            if($file = $request->file('file') )
            {
                $name = $file->getClientOriginalName();
                if($file->move('documents',$name))
                {
                    $post = new post();
                    $post->title = $request->title;
                    $post->slug = $request->slug;
                    $post->category_id = $request->category_id;
                    $post->departement_id = $request->departement;

                   //$post->tags()->sync($request->tags,true);
                    $post->body = $request->body;
                    $post->file = $name;
                    $post->user_id = auth()->id();
                    $post->save();
                    $post->tags()->sync($request->tags,false);
                    $post->filiere()->sync($request->filieres,false);



                }
            }
            $id = DB::getPdo()->lastInsertId();

            session::flash('success','The blog post was successfully serve!');
            return redirect()->route('posts.show',compact('id','post'));




    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $users = User::all();
        $post =post::find($id);
        return view('posts.show' , array('user'=>Auth::user()))->withpost($post)->with('users', $users);

    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {





                $post =post::find($id);
                $categories=Category::all();
                $cats =array();
                foreach ($categories as $category){
                    $cats[$category->id]=$category->name;
                }


                $departements=Departement::all();
                $deps =array();
                foreach ($departements as $donnee){
                    $deps[$donnee->id]=$donnee->name;
                }

                $filieres = Filiere::all();
                $fils = array();
                foreach($filieres as $filiere){
                    $fils[$filiere->id]=$filiere->name;
                }

                $tags = Tag::all();
                $tags2 = array();
                foreach($tags as $tag){
                    $tags2[$tag->id]=$tag->name;


        }



        return view('posts.edit')->withPost($post)->withCategories($cats)->withTags($tags2)->withDepartements($deps)->withFilieres($fils);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        //validate the data
        $post = post::find($id);
        if($request->input('slug') ==$post->slug){
            $this->validate($request,array(
                'title'=>'required|max:255',
                'category_id'=>'required|integer',
                'departement'=> '',
                'body'=>'required',
                'file'=> ''

            ));

        }else{
            $this->validate($request,array(
                'title'=>'required|max:255',
                'slug'=>'required|alpha_dash|min:5|max:255|unique:posts,slug',
                'category_id'=>'required|integer',
                'departement'=> '',
                'body'=>'required',
                'file'=> ''
            ));

        }



        // save to data base




        $post = post::find($id);
        $post->title = $request->input('title');
        $post->slug = $request->input('slug');
        $post->category_id = $request->input('category_id');
        $post->departement_id = $request->input('departement_id');;
        $post->body = $request->input('body');
        $post->file = $request->input('file');

        $post->save();
        if(isset($request->tags)){
            $post->tags()->sync($request->tags);
        }else{
            $post->tags()->sync(array());
        }
        if(isset($request->filieres)){
            $post->filiere()->sync($request->filieres);
        }else{
            $post->filiere()->sync(array());
        }




        // set flash message success rediriger ver data s
        $post =post::find($id);
        return view('posts.show')->withpost($post);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = post::find($id);
        $post->tags()->detach();
        $post->filiere()->detach();
        $post->delete();
        session::flash('success', 'The post was succefully deled. ');
        return redirect()->route('posts.index');
    }

}
