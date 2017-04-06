<?php

namespace App\Http\Controllers\admin\work;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\WorkCategories;
class CategoriesController extends Controller
{
    public function index() {
        $categories = WorkCategories::orderBy('id', 'desc')->get();
        return view('admin.work.categories.categories', compact('categories'));
    }

    public function create(){
        return view('admin.work.categories.add');
    }

    public function store(Request $request){
        $this->validate($request, ['name' => 'required|min:3','position' => 'required|unique:work_categories']);
        $category = new WorkCategories();
        $category->metatags = $request['metatags'];
        $category->position = $request['position'];
        $category->name = $request['name'];
        $category->save();

        return back()->withErrors('Category saved');
    }



    public function edit(WorkCategories $category){
        return view('admin.work.categories.edit', compact('category'));
    }

    public function update(Request $request,WorkCategories $category){
        $this->validate($request, ['name' => 'required|min:3','position' => 'required|unique:work_categories']);
        $category->position = $request['position'];
        $category->metatags = $request['metatags'];
        $category->name = $request['name'];
        $category->save();
        return back()->withErrors('Category updated');
    }

    public function destroy(Request $request, WorkCategories $category) {
        $category = WorkCategories::find($category->id);

        $category->delete();
        return redirect()->back()->withErrors('Category deleted');
    }
}
