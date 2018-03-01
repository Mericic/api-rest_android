<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matieres extends Model
{
    protected $table = 'matieres';

    static public function check($id_matiere){

        $matiere = Matieres::where('id', $id_matiere)->get();
        if(!isset($matiere[0]))
            return 'matiere inexistante';

        return 'true';
    }
    
}
