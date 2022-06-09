<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Show;
use App\Models\User;
use App\Models\Location;
use App\Models\Role;
use App\Models\RoleUser;

use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Image;
use Illuminate\Support\Str;


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
            'title' => 'required|max:60|filled|unique:shows',
            'description' => 'required|max:500|filled',
            'price' => 'required',
            'location_id' => 'required',
            'bookable' => 'required',
            'poster_url' => 'required|image',
        ], [
            'type' => 'You must choose a name !',
            'description' => 'You must put a description !',
            'price' => 'You must choose a price !',
            'location_id' => 'You must choose a location !',
            'bookable' => 'Choose between yes or no !',
            'poster_url' => "Don't Forget to choose an image !",

        ]);
        //dd($request->post());

        $slug = Str::slug($request->title,'-');
        //save image
        $extension = $request->file('poster_url')->getClientOriginalExtension();
        $filename = $slug.'.'.$extension; 
        $path = Storage::disk('public')->putFileAs('images/show_posters', $request->file('poster_url'), $filename);
        //dd($path);
        //create show
        Show::insertGetId([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'location_id' => $request->location_id,
            'category_id' => $request->category_id,
            'bookable' => $request->bookable,
            'slug' => $slug,
            'poster_url' => $filename
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
    /**
     * It gets all the users from the database and returns them to the view.
     * 
     * @return The view is being returned.
     */
    public function getUser()
    {
        $users = User::all();
        return view('backend.user.index', [
            'users' => $users
        ]);
    }

  /**
   * It takes the id of a user, finds the user, gets all the roles, and returns a view with the user
   * and roles.
   * 
   * @param id The id of the user you want to edit
   * 
   * @return The user and roles are being returned.
   */
    public function editRole($id){
        $user = User::findOrFail($id);
        $roles = Role::all();
        return view('backend.user.edit', compact('user', 'roles'));
    }

    public function updateRole(Request $request ){
        
        $user_id = $request->input('userId');
        $role_id = $request->role_id;
        RoleUser::create([
            'user_id' => $user_id,
            'role_id' => $role_id
        ]);
        // return response()->json(['status' => "modifié"]);
        return redirect()->route('manage-user');
    }
}
