<?php

namespace App\Http\Controllers\admin\wedo;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Wedo\Category;

class CategoryController extends Controller
{
    public function index() {
        $categories = Category::orderBy('id', 'desc')->get();
        return view('admin.wedo.categories.categories', compact('categories'));
    }

    public function create(){
        return view('admin.wedo.categories.add');
    }

    public function store(Request $request){
        $this->validate($request, ['name' => 'required|min:3',
        'position' => 'required|unique:wedo_categories|digits_between:1,4']);
        $category = new Category();
        $category->metatags = $request['metatags'];
        $category->position = $request['position'];
        $category->name = $request['name'];
        $category->save();

        return back()->withErrors('Category saved');
    }



    public function edit(Category $category){
        return view('admin.wedo.categories.edit', compact('category'));
    }

    public function update(Request $request,Category $category){
        $this->validate($request, ['name' => 'required|min:3',
        'position' => 'required|unique:work_categories,position,'.$category->id.'|digits_between:1,4']);
        $category->position = $request['position'];
        $category->metatags = $request['metatags'];
        $category->name = $request['name'];
        $category->save();
        return back()->withErrors('Category updated');
    }

    public function destroy(Request $request, Category $category) {
        $category->delete();
        return redirect()->back()->withErrors('Category deleted');
    }
}
