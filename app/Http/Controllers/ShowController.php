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
        $search_prod = $request->search;
        // if ($search_prod != '') {
        //     $shows = Show::where('title', 'like', '%' . $search_prod . '%')->get();
        //     if ($shows) {
        //         return view('show.search', [
        //             'shows' => $shows,
        //         ]);
        //     } 
        // } else {
        //     return redirect()->back();
        // }
        if ($search_prod && $request->fromDate) {
            $shows = Show::where('title', 'like', '%' . $request->search . '%')
                ->whereDate('created_at', '=', $request->fromDate)
                ->get();
         
        }
        // dd($request->search,$request->fromDate);

        elseif ($request->search) {
            $shows = Show::where('title', 'like', '%' . $request->search . '%')->get();
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
     * affiche tous les spectacles 
     */
    public function show_list()
    {
        $shows = Show::select('title')->get();
        $data = [];
        foreach ($shows as $item) {
            $data[] = $item['title'];
        }
        return $data;
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

        //get shows with a same artist
        $artist_ids = $show->artistTypes->pluck('artist_id');
        foreach(Show::all() as $row){
            if(count($row->artistTypes->whereIn('artist_id', $artist_ids)) > 0 && $row->id!=$id){
                $similarShows[] = $row;
            }
        }

        return view('show.show', [
            'show' => $show,
            'collaborateurs' => $collaborateurs,
            'resource'=>$show->title,
            'similarShows' => $similarShows
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
