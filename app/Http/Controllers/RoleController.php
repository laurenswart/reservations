<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();

        return view('backend.role.index', [
            'roles'=>$roles,
            'resource'=>'roles'
        ]);
    }


    function AddRole(Request $request)
    {
        /* Validating the input. */
        $request->validate([
            'type' => 'required|max:60|filled',
        ], [
            'type' => 'You must choose a name !',

        ]);

        Role::insertGetId([
            'role' => $request->type
        ]);

        // dd($request);

        return redirect()->back();
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
        $role = Role::find($id);

        return view('role.show', [
            'role'=>$role,
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
        $role = Role::find($id);

        return view('backend.role.edit', [
            'role'=>$role
        ]);
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
        $role_id = $request->id;

        /* Validating the input. */
        $request->validate([
            'type' => 'required|max:60|filled',
        ], [
            'type' => 'You must choose a name !',

        ]);

        Role::FindOrFail($role_id)->update([
            'role' => $request->type
        ]);



        return redirect()->route('manage-role');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        Role::findOrFail($id)->delete();

        return redirect()->route('manage-role');
    }
}
