<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use App\Models\Type;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ArtistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $artists = Artist::all();
        
        return view('artist.index',[
            'artists' => $artists,
            'resource' => 'artistes',
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $artist = Artist::find($id);
        
        return view('artist.show',[
            'artist' => $artist,
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $artist = Artist::find($id);
        $allTypes = Type::all();
        $checkedTypes = $artist->types()->pluck('types.id')->toArray();

        return view('artist.edit', [
            'artist'=>$artist,
            'allTypes'=>$allTypes,
            'checkedTypes'=>$checkedTypes
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //récupérer l'artiste à modifier
        $artist = Artist::find($id);

        if($artist==null){
            return Redirect::route('artists.index');
        }
        
        //récupérer les données entrantes
        $firstname = $request->input('firstname');
        $lastname = $request->input('lastname');
        $selectedTypes = $request->input('types');

        //validation
        $validated = $request->validate([
            'firstname' => 'required|max:60',
            'lastname' => 'required|max:60',
        ]);

        //sauvegarder les types choisis
        $artist->types()->syncWithoutDetaching($selectedTypes);

        //sauvegarder l'artiste
        $artist->firstname = $validated['firstname'];
        $artist->lastname = $validated['lastname'];
        try{
            $artist->save();
            return view('artist.show',[
                'artist' => $artist,
            ]);
        } catch (QueryException $e) {
            return view('artist.edit',[
                'artist' => $artist,
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
