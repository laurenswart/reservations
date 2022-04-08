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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
        //récupérer le type à modifier
        $type = Type::find($id);

        if($type==null){
            return Redirect::route('types.index');
        }

        //validation
        $validated = $request->validate([
            'type' => 'required|max:60',
        ]);
        //sauvegarder
        $type->type = $validated['type'];
        try{
            $type->save();
            return view('type.show',[
                'type' => $type,
            ]);
        } catch (QueryException $e) {
            return view('type.edit',[
                'type' => $type,
            ]);
        }
    }
}
