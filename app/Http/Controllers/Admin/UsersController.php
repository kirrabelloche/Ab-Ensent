<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\Role;
use App\user;
use App\Cours;
use App\Classes;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use Illuminate\Foundation\Console\Presets\Vue;

class UsersController extends Controller
{

    public function __construct(){


        $this->middleware('auth');

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function getWelcome()
    {
        return View('admin.users.welcome '  , array('user'=>Auth::user()));
    }

    public function getCourses()
    {
        $users = User::all();
        $classes = Classes::all();
        $cours = Cours::with('user')->get();
        $cours = Cours::with('classes')->get();
        $user_id = \App\User::whereHas('roles', function ($q) { $q->where('role_id', 3); } )->get();
        $etudiants = \App\User::whereHas('roles', function ($q) { $q->where('role_id', 5); } )->get();
        //$etudiants->paginate(4);
        //$etudiants = User::orderBy('id','desc')->paginate(4);
        //dd($etudiants);
        return View('admin.cours.courses ',compact('user_id'),compact('etudiants')  , array('user'=>Auth::user()))->withcours($cours)->with('users', $users);
    }

    public function index()
    {
        $users = User::all();
        return View('admin.users.index', array('user'=>Auth::user()))->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */




    public function create(user $user)
    {
           $roles = Role::all();
        return view('admin.users.create', array('user'=>Auth::user()), [
            'user' => $user,
            'roles' => $roles
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, user $user)
    {
        $user=User::create($request->all());
        $user->roles()->sync($request->roles);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request-> Hash::make('password');


        $user->save();
        return redirect()->route('admin.users.index', array('user'=>Auth::user()));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\user  $user
     * @return \Illuminate\Http\Response
     */
    public function show(user $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\user  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(user $user)
    {

       if( Gate::denies('edit-users')){
        return redirect()->route('admin.users.index ');
       }
       $roles = Role::all();

        return view('admin.users.edit' , [
            'user' => $user,
            'roles' => $roles

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\user  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, user $user)
    {
        $user->roles()->sync($request->roles);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();


        return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\user  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(user $user)
    {

        if( Gate::denies('delete-users')){
            return redirect()->route('admin.users.index');
           }


      $user->roles()->detach();
      $user->delete();

      return redirect()->route('admin.users.index');
    }
}
class UserCreateRequest extends Request {

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'username' => 'required|max:30|alpha|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:8'
        ];
    }

}
