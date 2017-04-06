<?php

namespace App\Http\Controllers\admin\wedo;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\WedoServices;
use App\WedoCategories;

class ServicesController extends Controller
{
    public function index() {
        $services = WedoServices::orderBy('id', 'desc')->get();
        $categories = WedoCategories::orderBy('id', 'desc')->get();

        return view('admin.wedo.services.services', compact('services','categories'));
    }

    public function create(){
        $categories = WedoCategories::get();
        return view('admin.wedo.services.add',compact('categories'));
    }

    public function store(Request $request){
        $this->validate($request, ['name' => 'required|min:3','position' => 'required|unique:wedo_services']);
        $service = new WedoServices();
        $service->name = $request['name'];
        $service->position = $request['position'];
        $service->text = $request['text'];

        $service->category_id = $request['category'];
        $service->save();

        return back()->withErrors('Service saved');
    }



    public function edit(WedoServices $service){
        $categories = WedoCategories::orderBy('id', 'desc')->get();
        $articleContent = file_get_contents('content/articles/services/'.$service->text);
        return view('admin.wedo.services.edit', compact('service','categories','articleContent'));
    }

    public function update(Request $request,WedoServices $service){
        $this->validate($request, ['name' => 'required|min:3','position' => 'required']);
        $service->name = $request['name'];
        $service->position = $request['position'];
        $service->category_id = $request['category'];
        $service->save();
        return back()->withErrors('Service updated');
    }

    public function destroy(Request $request, WedoServices $service) {
        $service = WedoServices::find($service->id);
        unlink('./content/articles/services/' . $service->text);

        $service->delete();
        return redirect()->back()->withErrors('Service deleted');
    }
}
