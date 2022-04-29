<?php

namespace App\Http\Controllers;

use App\Models\Representation;
use App\Models\Show;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    // : JsonResponse
    public function search(Request $request)
    {
            if ($request->search && $request->fromDate) {
                $shows = Show::where('title', $request->search)
                    ->whereDate('created_at', '=', $request->fromDate)
                    ->get();
                return redirect()->route('shows_index')->with("status" ,"la représentation de ". $request->search. "du" . $request->fromDate. "est  introuvable");
            }
            // dd($request->search,$request->fromDate);

            elseif ($request->search) {
                $shows = Show::where('title', $request->search)->get();
            } elseif ($request->fromDate) {  // affiche toutes les représentations de cette date
                $shows = Show::whereDate('created_at', '=', $request->fromDate)
                    ->orWhere('title', $request->search)
                    ->get();
            } elseif ($request->price) {   // affiche toutes les représentation dont les prix sont  inferieurs ou = au prix indiqué par le client 
                $shows = Show::where('price', '<=', $request->price)->get();
            } else {
                $shows = Show::all()->sortBy([
                    ['created_at', 'desc'],

                ]);
            }
            return view('show.search', [
                'shows' => $shows,
            ]);
            
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shows = Show::paginate(3);
        return view('show.index', [
            'shows' => $shows,
            'resource' => 'shows',
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
        //
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
        //
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
