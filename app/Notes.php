<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Notes extends Model
{
    protected $table = 'notes';

    static public function check(Request $request){
        if($request->note > $request->quotient)
            return 'note doit être inferieure au quotient';

        return 'true';
    }
}
