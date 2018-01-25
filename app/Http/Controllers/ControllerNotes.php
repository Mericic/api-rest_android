<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notes;

class ControllerNotes extends Controller
{
    private $ID_note;
//    private $ID_note;

    public function show($id_user){
        return response()
            ->json(
                Notes::where('id_user','=',$id_user)->join('matieres', 'notes.id_matiere', '=', 'matieres.id_matiere')
                    ->get(),
                '200'
            );
    }

    public function add(Request $request, $id_user){

       $note = new Notes();
       $note->id_user = $id_user;
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
        $note->id_matiere = $request -> id_matiere;
        $note->coef = $request -> coef;
        $note->quotient = $request -> quotient;
        $note->note = $request -> note;

        return $note->save();
    }

}
