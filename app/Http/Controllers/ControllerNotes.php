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
                Notes::where('id_user', $id_user)->join('matieres', 'notes.id_matiere', '=', 'matieres.id')
                    ->get(),
                '200'
            );
    }

    public function add(Request $request, $id_user){
        $note = new Notes();
        if($note::check($request) !== 'true')
            return response()->json(['succeed'=>false, 'message'=>$note::check($request)]);

        $machin = new Matieres();
        if($machin->check($request -> matiere) !== 'true')
            return response()->json(['succeed'=>false, 'message'=>$machin->check($request -> matiere)]);

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
        $note = Notes::where('id_note', $id_note)->delete();

                return response()
                ->json(
                   ['succeed' => true]
                 );
    }

    public function update(Request $request, $id_note){
        $note = new Notes();
        if($note::check($request) !== 'true')
            return response()->json(['succeed'=>false, 'message'=>$note::check($request)]);

        $note = Notes::where('id_note', $id_note)->update(
                       array(
                             "id_matiere" => $request-> matiere  ,
                             "coeff" =>  $request -> coeff,
                             "quotient" =>  $request -> quotient,
                             "note" =>  $request -> note
                             )
                       );


        return response()
        ->json(
           ['succeed' => true]
         );

    }


}
