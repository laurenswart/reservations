<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use App\Models\Category;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $categories = Category::all();

        return view('category.index', [
            'resource'=>'categories',
            'categories'=>$categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validation
        $validated = $request->validate([
            'name' => 'required|unique:categories|max:10',
        ]);
        
         //sauvegarder la categorie
         $category = Category::create([
            'name' => $validated['name'],
        ]);

        try{
            Redirect::route('categories_index');
        } catch (QueryException $e) {
            return view('categories.create');
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        if($category==null){
            return Redirect::route('categories_index');
        }

        return view('category.edit', ['category'=>$category]);
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
        //validation
        $validated = $request->validate([
            'name' => 'required|unique:categories|max:10',
        ]);
        
         //sauvegarder la categorie
        $category = Category::find($id);
        if($category==null){
            return Redirect::route('categories_index');
        }

        $category->name = $validated['name'];

        try{
            $category->save();
            return Redirect::route('categories_index');
        } catch (QueryException $e) {
            return view('category.edit', ['category'=>$category]);
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
