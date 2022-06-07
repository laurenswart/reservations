<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Representation;
use App\Models\Location;
use App\Models\Show;

class AdminRepresentationController extends Controller
{
    /**
     * It returns the view of the representation table.
     */
    public function ViewRepresentation()
    {
        $representations = Representation::all();

        return view('backend.representation.representation_view', [
            'representations' => $representations,
        ]);
    }

    /**
     * It finds the representation with the id that is passed in the url and returns the view with the
     * representation and all locations.
     *
     * @param id The id of the representation you want to edit.
     *
     * @return The view 'backend.shows.shows_edit' is being returned.
     */
    public function EditRepresentation($id)
    {
        $representations = Representation::findOrFail($id);
        $locations = Location::all();
        return view('backend.representation.representation_edit', compact('representations', 'locations'));
    }


    /**
     * It takes the request, finds the show with the id in the request, and updates the show with the
     * new data
     *
     * @param Request request This is the request object that contains all the information about the
     * request.
     *
     * @return The show is being updated with the new information.
     */
    public function UpdateRepresentation(Request $request)
    {
        $representation_id = $request->id;

        Representation::findOrFail($representation_id)->update([
            'when' => $request->date,
            'location_id' => $request->location_id,
        ]);


        // dd($request);
        return redirect()->route('manage-representations');
    }


    /**
     * It finds the representation with the given id and deletes it
     *
     * @param id The id of the representation to delete.
     *
     * @return the view manage-show.blade.php
     */
    function DeleteRepresentation($id)
    {

        Representation::findOrFail($id)->delete();

        return redirect()->route('manage-representations');
    }

    /**
     * It takes a request, and inserts a new row into the database with the location_id and date from
     * the request
     *
     * @param Request request The request object.
     *
     * @return A redirect to the route 'manage-show'
     */
    public function StoreRepresentations(Request $request)
    {
        Representation::insertGetId([
            'location_id' => $request->location_id,
            'when' => $request->date,
            'show_id' => $request->show_id,
        ]);

        return redirect()->route('manage-representations');
    }

    public function AddRepresentations()
    {
        $locations = Location::all();
        $shows = Show::all();
        return view('backend.representation.representation_add', compact('locations','shows'));
    }
}
