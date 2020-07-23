<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()

    {
        $countries = DB::table('country')->pluck("name","id");
        return view('home',compact('countries'));
    }

     public function getStates(Request $request) {
        $id = $request->route()->parameter('extra_id_param');
        $states = DB::table("state")->where("country_id",$id)->pluck("name","id");

        return json_encode($states);

    }
}
