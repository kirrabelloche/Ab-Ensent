<?php

namespace App\Http\Controllers;

use App\Filiere;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class departementController extends Controller
{


    public function getDepatement()
    {
        $departements = DB::table("departements")->pluck("name","id");
        return view('posts.create',compact('departements'));
    }

  public function getFiliere(Request $request)
    {
        $filieres = DB::table("filieres")
            ->where("departement_id",$request->departement_id)
            ->pluck("name","id");
            return response()->json($filieres);
    }

    public function filires(Request $request)
    {
        $departement_id = $request->input('departement_id');

        $filieres = Filiere::where('departement_id', '=',$departement_id )->get();
        return response()->json($filieres);
    }


}
