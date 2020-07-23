<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Coment;

class ComentController extends Controller
{
    public function store(Request $request)
    {
    	$request->validate([
            'body'=>'required',
        ]);
   
        $input = $request->all();
        $input['user_id'] = auth()->user()->id;
    
        Coment::create($input);
   
        return back();
    }
}
