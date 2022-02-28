<?php

namespace App\Http\Controllers;

use App\Models\Locality;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class LocalityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $localities = Locality::all();

        return view('locality.index', [
            'localities'=>$localities,
            'resource'=>'localities'
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
        $locality = Locality::find($id);

        return view('locality.show', [
            'locality'=>$locality
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
        $locality = Locality::find($id);

        return view('locality.edit', [
            'locality'=>$locality
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
        //récupérer le role à modifier
        $locality = Locality::find($id);

        if($locality==null){
            return Locality::route('localities.index');
        }

        //validation
        $validated = $request->validate([
            'locality' => 'required|max:60',
            'postal_code' => 'required|max:6',
        ]);
        //sauvegarder
        $locality->locality = $validated['locality'];
        $locality->postal_code = $validated['postal_code'];
        try{
            $locality->save();
            return view('locality.show',[
                'locality' => $locality,
            ]);
        } catch (QueryException $e) {
            return view('locality.edit',[
                'locality' => $locality,
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
