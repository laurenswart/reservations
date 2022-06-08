<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Show;
use App\Models\Location;
use Carbon\Carbon;
use Image;

class AdminShowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shows = Show::all();
        return view('backend.shows.shows_view', [
            'shows' => $shows
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


    public function add()
    {
        $locations = Location::all();
        $categories = Category::all();
        return view('backend.shows.shows_add', compact('locations','categories'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        /* Validating the input. */
        $request->validate([
            'title' => 'required|max:60|filled',
            'description' => 'required|max:500|filled',
            'price' => 'required',
            'location_id' => 'required',
            'bookable' => 'required',
            'slug' => 'required',
            'poster_url' => 'required',
        ], [
            'type' => 'You must choose a name !',
            'description' => 'You must put a description !',
            'price' => 'You must choose a price !',
            'location_id' => 'You must choose a location !',
            'bookable' => 'Choose between yes or no !',
            'Slug' => 'The slug is required !',
            'poster_url' => "Don't Forget to choose an image !",

        ]);

        Show::insertGetId([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'location_id' => $request->location_id,
            'category_id' => $request->category_id,
            'bookable' => $request->bookable,
            'slug' => $request->slug,
            'poster_url' => $request->poster_url
        ]);

        return redirect()->route('manage-show');
    }

    public function LocationAdd()
    {
        $locations = Location::all();
        return view('backend.shows.shows_add', compact('locations','categories'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $show = Show::find($id);

        //Récupérer les artistes du spectacle et les grouper par type
        $collaborateurs = [];

        foreach ($show->artistTypes as $at) {
            $collaborateurs[$at->type->type][] = $at->artist;
        }


        return view('show.show', [
            'show' => $show,
            'collaborateurs' => $collaborateurs,
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
        $shows = Show::findOrFail($id);
        $locations = Location::all();
        $categories = Category::all();
        return view('backend.shows.shows_edit', compact('shows', 'locations','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

         /* It's validating the input. */


        $show_id = $request->id;

        Show::findOrFail($show_id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'location_id' => $request->location_id,
            'category_id' => $request->category_id,
            'slug' => $request->slug,
            'price' => $request->price,
            'bookable' => $request->bookable,
        ]);

        //dd($request->category_id);
        // dd($request);
        return redirect()->route('manage-show');
    }

    function delete($id)
    {

        Show::findOrFail($id)->delete();

        return redirect()->route('manage-show');
    }
}
