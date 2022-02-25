<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Representation;
use App\Models\Show;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
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
        $nextRepresentations = Representation::where('when', '>', date('Y-m-d H:m:s'))->orderby('when','desc')->take(4)->get()->reverse();
        $showsForSlider = Show::all();

        return view('welcome',[
            'locations' => $locations,
            'nextRepresentations' => $nextRepresentations,
            'showsForSlider' => $showsForSlider,
        ]);

    }
}
