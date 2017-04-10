<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pagetags;

class PagetagsController extends Controller
{
    public function index() {
        $pagetags = Pagetags::orderBy('id', 'desc')->get();
        return view('admin.pagetags.pagetags', compact('pagetags'));
    }

    public function create(){
        return view('admin.pagetags.add');
    }

    public function store(Request $request){
        $this->validate($request, ['name' => 'required|min:3',
        'meta' => 'required']);
        $pagetag = new Pagetags();
        $pagetag->name = $request['name'];
        $pagetag->meta = $request['meta'];
        $pagetag->save();
        return back()->withErrors('Tag saved');
    }


    public function edit(Pagetags $pagetag){
        return view('admin.pagetags.edit',compact('pagetag'));
    }

    public function update(Request $request,Pagetags $pagetag){
        $this->validate($request, ['name' => 'required|min:3',
        'meta' => 'required']);

        $pagetag->name = $request['name'];
        $pagetag->meta = $request['meta'];
        $pagetag->save();
        return back()->withErrors('Tag updated');
    }

    public function destroy(Request $request, Pagetags $pagetag) {
        $pagetag->delete();
        return redirect()->back()->withErrors('Tag deleted');
    }
}
