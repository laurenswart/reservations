<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    function IndexCategory ()
    {
        $categories = Category::all();

        return view('backend.category.category_view', [
            'categories'=> $categories,
        ]) ;
    }


    function AddCategory (Request $request)
    {
        $request->validate([
            'type' => 'required',
        ], [
            'type' => 'You must choose a name !',

        ]);

        Category::insert([
           'type' => $request->type
        ]);

        return redirect()->back();

    }//end method


    function EditCategory ($id)
    {
        $category = Category::find($id);

        return view('backend.category.category_edit', compact('category'));
    }//end method

    function UpdateCategory (Request $request)
    {
        $category_id = $request->id;

        Category::FindOrFail($category_id)->update([
            'type'=> $request->type
        ]);

        return redirect()->route('manage-category');

    }//end method
}
