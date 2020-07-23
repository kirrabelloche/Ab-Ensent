<?php

namespace App\Http\Controllers\Admin;

use Session;
use App\User;
use App\Cours;
use App\Classes;
use App\Filiere;
use App\Category;
use App\Departement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CoursController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){


        $this->middleware('auth');

    }
    public function getCours_class(){
        $users = User::all();
        $cours = Cours::all();
        $cours = Cours::with('user')->get();

        $cours = Cours::orderBy('id','desc')->paginate(8);
        return view('admin.cours.cours_class',compact('user_id') ,array('user'=>Auth::user()))->withcours($cours)->with('users', $users);
    }
    public function index()
    {
        $users = User::all();
        $classes = Classes::all();
        $cours = Cours::with('user')->get();
        $cours = Cours::with('classes')->get();
        $user_id = \App\User::whereHas('roles', function ($q) { $q->where('role_id', 3); } )->get()->pluck('name', 'id');
        return view('admin.cours.index',compact('user_id') ,array('user'=>Auth::user()))->withcours($cours)->with('users', $users);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $classes = Classes::all();
        $user_id = \App\User::whereHas('roles', function ($q) { $q->where('role_id', 3); } )->get()->pluck('name', 'id');
        return view('admin.cours.create',compact('user_id'), array('user'=>Auth::user()))->withClasses($classes)->with('users', $users);
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
            'user_id'=>'required|integer',
            'title'=>'required|max:255',
            'slug'=>'required|alpha_dash|min:5|max:255|unique:cours,slug',
            'body'=>'required',
            'classes_id'=>'required|integer',
            'filename' => 'required',
            'filename.*' => 'mimes:doc,pdf,docx,zip',
            'file'=> '',

        ));

        //store in the database
        $cours = User::all();

        $parameters = $request->except(['_token']);
        if($request->hasfile('filename'))

        {

           foreach($request->file('filename') as $file)

           {

               $name = time().'.'.$file->extension();

               $file->move(public_path().'/files/', $name);

               $data[] = $name;

           }

        }
        $cours->filename=json_encode($data);
        if($file = $request->file('file') )
        {
            $name = $file->getClientOriginalName();
            if($file->move('documents',$name))
            {
                $cours = new cours();
                $cours->title = $request->title;
                $cours->slug = $request->slug;
                $cours->user_id = $request->user_id;
                $cours->classes_id = $request->classes_id;

               //$post->tags()->sync($request->tags,true);
                $cours->body = $request->body;
                $cours->body = $request->body;
                $cours->file = $name;
                $cours->filename=json_encode($data);

                // $cours->user_id = auth()->id();
                //dd($cours);
                $cours->save();

               // $cours->filiere()->sync($request->filieres,false);



            }
        }
             $id = DB::getPdo()->lastInsertId();
        session::flash('success','The cours post was successfully serve!');
        return redirect()->route('admin.cours.show',compact('id','cours'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cours  $cours
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $teachers = \App\User::whereHas('roles', function ($q) { $q->where('role_id', 3); } )->get()->pluck('name', 'id');

        $depatements = Departement::all();
        $users = User::all();
        $classes=Classes::all();
        $cours = Cours::with('user')->get();
        $cours = Cours::with('classes')->get();
        $cours =cours::find($id);
       // dd($cours);

        return view('admin.cours.show' , array('user'=>Auth::user()))->withcours($cours)->with('users', $users)->withteachers($teachers);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cours  $cours
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {


        $cours =cours::find($id);
        $user_id = \App\User::whereHas('roles', function ($q) { $q->where('role_id', 3); } )->get()->pluck('name', 'id');



        $classes=Classes::all();
        $cls =array();
        foreach ($classes as $classe){
            $cls[$classe->id]=$classe->name;
        }



return view('admin.cours.edit',compact('user_id'))->withCours($cours)->withClasses($cls);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cours  $cours
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
            //validate the data
            $cours = cours::find($id);
            if($request->input('slug') ==$cours->slug){
                $this->validate($request,array(
                    'user_id'=>'required|integer',
                    'title'=>'required|max:255',
                    'classes_id'=>'required|integer',
                    'filename' => 'required',
                    'filename.*' => 'mimes:doc,pdf,docx,zip',
                    'file'=> '',
                ));

            }else{
                $this->validate($request,array(
                    'user_id'=>'required|integer',
                    'slug'=>'required|alpha_dash|min:5|max:255|unique:posts,slug',
                    'title'=>'required|max:255',
                    'classes_id'=>'required|integer',
                    'filename' => 'required',
                    'filename.*' => 'mimes:doc,pdf,docx,zip',
                    'file'=> '',
                ));

            }
            // save to data base
            $parameters = $request->except(['_token']);
        if($request->hasfile('filename'))

        {

           foreach($request->file('filename') as $file)

           {

               $name = time().'.'.$file->extension();

               $file->move(public_path().'/files/', $name);

               $data[] = $name;

           }

        }
        $cours->filename=json_encode($data);
        if($file = $request->file('file') )
        {
            $name = $file->getClientOriginalName();
            if($file->move('documents',$name))
            {
                $cours = new cours();
                $cours->title = $request->title;
                $cours->slug = $request->slug;
                $cours->user_id = $request->user_id;
                $cours->classes_id = $request->classes_id;

               //$post->tags()->sync($request->tags,true);
                $cours->body = $request->body;
                $cours->body = $request->body;
                $cours->file = $name;
                $cours->filename=json_encode($data);

                // $cours->user_id = auth()->id();
                dd($cours);
                $cours->save();

               // $cours->filiere()->sync($request->filieres,false);



            }
        }
             $id = DB::getPdo()->lastInsertId();


            // set flash message success rediriger ver data s
            $post =cours::find($id);
            return view('admin.cours.show')->withcours($cours);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cours  $cours
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cours $cours)
    {
        //
    }
}
