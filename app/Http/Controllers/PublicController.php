<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    
    public function ViewDetail($idUser , Request $request)
    {
   
        
        if($idUser < 1)
        {
            return;
        }
        $data = User::where('id', $idUser)->first();

        if($data == null )
        {
            return;
        }
        return view("public.user.profile", compact("data"));

    }

   
}
