<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notes;
use App\Matieres;

class ControllerNotes extends Controller
{

    public function show($id_user){

        return response()
            ->json(
                Notes::find($id_user)->join('matieres', 'notes.id_matiere', '=', 'matieres.id')
                    ->get(),
                '200'
            );
    }

    public function add(Request $request, $id_user){

       $note = new Notes();
       $note->id = $id_user;
       $note->id_matiere = $request -> matiere;
       $note->coeff = $request -> coeff;
       $note->quotient = $request -> quotient;
       $note->note = $request -> note;
       $note->save();

       return response()
       ->json(
          ['succeed' => true]
        );

    }

    public function delete($id_note){
        $note = Notes::find($id_note);
        $note->delete();
        return 'supression'.$id_note;
    }

    public function update(Request $request,$id_note){
        $note = Notes::find($id_note);
        $note->id_user = $request -> id_user;

        $nom_matiere = Matieres::select("id_matiere")->where("nom_matiere", $request-> nom_matiere)->first();
        $note->id_matiere = Matieres::select("id_matiere")->where("nom_matiere", $nom_matiere)->first();
        $note->coef = $request -> coef;
        $note->quotient = $request -> quotient;
        $note->note = $request -> note;



        return $note->save();
    }

    public function matieres(){
        return response()
            ->json(
                Matieres::all(),
                '200'
            );
    }

}
