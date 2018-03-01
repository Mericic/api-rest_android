<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class User extends Model
{
    protected $table = 'users';

    static public function exists($email){
        $variable_nommee_avec_passion = User::where('email', $email)->get();
        if(isset($variable_nommee_avec_passion[0]))
            return true;

        return false;
    }
}
