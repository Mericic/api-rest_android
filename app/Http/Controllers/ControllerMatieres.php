<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Matieres;

class ControllerMatieres extends Controller
{
    public function add(Request $request){
        $matiere = new Matieres();
        $matiere->nom_matiere = $request ->nom_matiere;
        $matiere->save();
        return response()
            ->json(
                ['succeed' => true]
            );
    }

    public function delete(Request $request){
        //on supprime la matière dans sa table, et toutes les notes qui lui sont associées
        $matiere = new Matieres();
        $matiere->where('id', $request->id)->delete();
        $notes = new Notes();
        $notes->where('id_matiere', $request->id)->delete();
        return response()
            ->json(
                ['succeed' => true]
            );
    }

    public function show(Request $request){
        return response()
            ->json(
                Matieres::all(),
                '200'
            );
    }
}
