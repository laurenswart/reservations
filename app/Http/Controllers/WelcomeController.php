<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Representation;
use App\Models\Show;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class WelcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $locations = Location::all();
        //$representations = Representation::orderBy('when', 'desc')->paginate(4);
        $nextRepresentations = Representation::where('when', '>', date('Y-m-d H:m:s'))->orderby('when','desc')->get()->reverse();
        $showsForSlider = Show::all();

        $popularShows = DB::select('SELECT futurShows.id, futurShows.title, futurShows.bookable, sum(places), futurShows.poster_url, futurShows.price  from 
        ( SELECT shows.id, shows.title, shows.poster_url, shows.price, shows.bookable from shows 
         join representations on representations.show_id = shows.id
         where  representations.when > CURRENT_TIMESTAMP
        ) as futurShows
    join representations on representations.show_id=futurShows.id
    join reservations on reservations.representation_id=representations.id
    group by futurShows.id');

    //dd($popularShows);

        return view('welcome',[
            'locations' => $locations,
            'nextRepresentations' => $nextRepresentations,
            'popularShows'=>$popularShows
        ]);

    }
}
