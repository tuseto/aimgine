<?php

namespace App\Http\Controllers\admin\wedo;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Wedo\Service;
use App\Models\Wedo\Category;

class ServiceController extends Controller
{
    public function index() {
        $services = Service::orderBy('id', 'desc')->get();
        $categories = Category::orderBy('id', 'desc')->get();

        return view('admin.wedo.services.services', compact('services','categories'));
    }

    public function create(){
        $categories = Category::get();
        return view('admin.wedo.services.add',compact('categories'));
    }

    public function store(Request $request){
        $this->validate($request, ['name' => 'required|min:3',
        'position' => 'required|unique:wedo_services|digits_between:1,4']);
        $service = new Service();
        $service->name = $request['name'];
        $service->position = $request['position'];
        $service->text = $request['text'];

        $service->category_id = $request['category'];
        $service->save();

        return back()->withErrors('Service saved');
    }



    public function edit(Service $service){
        $categories = Category::orderBy('id', 'desc')->get();
        $articleContent = file_get_contents('content/articles/services/'.$service->text);
        return view('admin.wedo.services.edit', compact('service','categories','articleContent'));
    }

    public function update(Request $request,Service $service){
        $this->validate($request, ['name' => 'required|min:3',
        'position' => 'required|unique:wedo_services,position,'.$service->id.'|digits_between:1,4']);
        $service->name = $request['name'];
        $service->position = $request['position'];
        $service->category_id = $request['category'];
        $service->save();
        return back()->withErrors('Service updated');
    }

    public function destroy(Request $request, Service $service) {
        $fileExists = file_exists('./content/articles/services/' . $service->text);
        if($fileExists){
            unlink('./content/articles/services/' . $service->text);
            $service->delete();
            return back()->withErrors('Service deleted');
        }else{
            return back()->withErrors('Something went wrong');
        }
    }
}
