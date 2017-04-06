<?php

namespace App\Http\Controllers\admin\wedo;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\WedoCategories;
class CategoriesController extends Controller
{
    public function index() {
        $categories = WedoCategories::orderBy('id', 'desc')->get();
        return view('admin.wedo.categories.categories', compact('categories'));
    }

    public function create(){
        return view('admin.wedo.categories.add');
    }

    public function store(Request $request){
        $this->validate($request, ['name' => 'required|min:3','position' => 'required|unique:wedo_categories']);
        $category = new WedoCategories();
        $category->metatags = $request['metatags'];
        $category->position = $request['position'];
        $category->name = $request['name'];
        $category->save();

        return back()->withErrors('Category saved');
    }



    public function edit(WedoCategories $category){
        return view('admin.wedo.categories.edit', compact('category'));
    }

    public function update(Request $request,WedoCategories $category){
        $this->validate($request, ['name' => 'required|min:3','position' => 'required']);
        $category->position = $request['position'];
        $category->metatags = $request['metatags'];
        $category->name = $request['name'];
        $category->save();
        return back()->withErrors('Category updated');
    }

    public function destroy(Request $request, WedoCategories $category) {
        $category = WedoCategories::find($category->id);

        $category->delete();
        return redirect()->back()->withErrors('Category deleted');
    }
}
