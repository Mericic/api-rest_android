<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\notesmodel;

class ControllerNotes extends Controller
{
    private $ID_note;
//    private $ID_note;

    public function consultation($id_User){
        return response()
            ->json(
                notesmodel::where('id_User','=',$id_User)->join('matiere', 'notes.id_matiere', '=', 'matiere.id_matiere')
                    ->get(),
                '200'
            );
    }

    public function ajout(Request $request, $id_User){

       $note = new notesmodel();
       $note->id_user = $id_User;
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

    public function suppression($id_Note){
        $note = notesmodel::find($id_Note);
        $note->delete();
        return 'supression'.$id_Note;
    }

    public function modfication(Request $request,$id_Note){
        $note = notesmodel::find($id_Note);
        $note->id_user = $request -> id_user;
        $note->id_matiere = $request -> id_matiere;
        $note->coef = $request -> coef;
        $note->quotient = $request -> quotient;
        $note->note = $request -> note;

        return $note->save();
    }

}
