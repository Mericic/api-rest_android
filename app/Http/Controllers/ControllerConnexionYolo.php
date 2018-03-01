<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ControllerConnexionYolo extends Controller
{
    public function connecteMoi(Request $request){
        $user = new User;
        $id = $user::where('email', $request->email)->get();
        return response()
            ->json(
                ['succeed'=>true,'id_user' => $id[0]->id]
            );
    }

    public function inscritMoi(Request $request){

        $user =  new User;
        if($user::exists($request->email)){
            return $this->connecteMoi($request);
        }

        $user->email = $request->email;
//        $user->name = $request->first_name.' '.$request->last_name;
        $user->name = "Jon Doe";
        $user->password = 'no password allowed';
        $user->save();
        $id = $user::where('email', $request->email)->get();
        return response()
            ->json(
                ['succeed'=>true,'id_user' => $id[0]->id]
            );
    }


}
