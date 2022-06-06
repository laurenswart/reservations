<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    function IndexCategory()
    {
        $categories = Category::all();

        return view('backend.category.category_view', [
            'categories' => $categories,
        ]);
    }


    function AddCategory(Request $request)
    {
        /* Validating the input. */
        $request->validate([
            'type' => 'required|max:60|filled',
        ], [
            'type' => 'You must choose a name !',

        ]);

        Category::insertGetId([
            'type' => $request->type
        ]);

        // dd($request);

        return redirect()->back();
    } //end method


    function EditCategory($id)
    {
        $category = Category::find($id);

        return view('backend.category.category_edit', compact('category'));
    } //end method

    function UpdateCategory(Request $request)
    {
        $category_id = $request->id;

        /* Validating the input. */
        $request->validate([
            'type' => 'required|max:60|filled',
        ], [
            'type' => 'You must choose a name !',

        ]);

        Category::FindOrFail($category_id)->update([
            'type' => $request->type
        ]);



        return redirect()->route('manage-category');
    } //end method


    function DeleteCategory($id)
    {
        Category::findOrFail($id)->delete();

        return redirect()->route('manage-category');
    }
}
