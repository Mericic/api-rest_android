<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\notesmodel;

class notes extends Controller
{
    private $ID_note;
//    private $ID_note;

    public function consultation($id_User){
        return response()
            ->json(
                notesmodel::where('id_User','=',$id_User)
                    ->get(),
                '200'
            );
    }

    public function ajout(Request $request, $id_User){
//        $values = json_decode($request->getContent(), true);
        $note = new notesmodel();

        $note->id_user = $request -> id_user;
        $note->id_matiere = $request -> id_matiere;
        $note->coef = $request -> coef;
        $note->quotient = $request -> quotient;
        $note->note = $request -> note;
        return $note->save();
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
