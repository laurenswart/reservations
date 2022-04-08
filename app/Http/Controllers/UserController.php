<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    
    /**
     * Afficher les données personnelles de l'utilisateur authentifié
     * 
     * @return \Illuminate\Http\Response
     */
    public function account(){
        
        $user = Auth::user();
        return view('user.account', [
            'user' => $user,
        ]);
    }
}
