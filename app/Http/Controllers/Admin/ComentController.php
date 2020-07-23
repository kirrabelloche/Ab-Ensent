<?php

namespace App\Http\Controllers\Admin;

use App\Coment;
use App\cours;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ComentController extends Controller
{
    public function store(Request $request)
    {
        $coment = new Coment;

        $coment->body = $request->body;
        

        $coment->user()->associate($request->user());

        $cours = cours::find($request->cours_id);
       // dd($cours, $coment);

        $cours->coments()->save($coment); 
        $cours->parent_id = $request->get('comment_id');
        return back();
    }
    public function replyStore(Request $request)
    {
        $reply = new Coment();

        $reply->body = $request->body;

        $reply->user()->associate($request->user());

        $reply->parent_id = $request->get('comment_id');

        $cours = cours::find($request->get('cours_id'));
       // dd($reply);

        $cours->coments()->save($reply);

        return back();

    }

}
