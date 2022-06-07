<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Artist;

class AdminArtistController extends Controller
{
    public function ViewArtist()
    {
        $artists = Artist::all();
        return view('backend.artist.artist_view', [
            'artists' => $artists,
        ]);
    }
    public function ArtistEdit($id)
    {
        $artists = Artist::findOrFail($id);
        return view('backend.artist.artist_edit', compact('artists'));
    }

    public function UpdateArtist(Request $request)
    {
        $artist_id = $request->id;

        Artist::findOrFail($artist_id)->update([
            'information' => $request->information,
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
        ]);


        //dd($request);
        return redirect()->route('manage-artist');
    }

    function DeleteArtist($id)
    {

        Artist::findOrFail($id)->delete();

        return redirect()->route('manage-representations');
    }

    public function StoreArtist(Request $request)
    {
        Artist::insertGetId([
            'informations' => $request->informations,
            'firstname' => $request->firtname,
            'lastname' => $request->lastname,
        ]);

        return redirect()->route('manage-representations');
    }

    public function AddArtist()
    {
        $artists = Artist::all();
        return view('backend.representation.representation_add', compact('artists'));
    }

}
