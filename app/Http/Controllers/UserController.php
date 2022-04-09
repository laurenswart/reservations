<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\QueryException;
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

    /**
     * Show the form for editing the account details
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $user = Auth::user();

        return view('user.edit', [
            'user'=>$user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //récupérer l'utilisateur à modifier
        $user = User::find(Auth::id());

        //validation
        $validated = $request->validate([
            'firstname' => 'required|max:60',
            'lastname' => 'required|max:60',
            'email' => 'required|unique:users,email,'.$user->id.'|max:100',
            'login' => 'required|unique:users,login,'.$user->id.'|max:30',
            'langue' => 'required|in:en,nl,fr'
        ]);
        //sauvegarder
        $user->firstname = $validated['firstname'];
        $user->lastname = $validated['lastname'];
        $user->email = $validated['email'];
        $user->login = $validated['login'];
        $user->langue = $validated['langue'];
        try{
            $user->save();
            return view('user.account',[
                'user' => $user,
            ]);
        } catch (QueryException $e) {
            return view('user.edit',[
                'user' => $user,
            ]);
        }
    }
}
