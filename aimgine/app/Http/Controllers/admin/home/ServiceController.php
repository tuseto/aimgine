<?php

namespace App\Http\Controllers\admin\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service;
use Image;
class ServiceController extends Controller
{
    public function index() {
        $services = Service::orderBy('id', 'desc')->get();
        return view('admin.home.service.services', compact('services'));
    }

    public function create(){
        return view('admin.home.service.add');
    }

    public function store(Request $request){
        $this->validate($request, ['text' => 'required|min:3','image' => 'required','position' => 'required|unique:services']);
        $services = Service::orderBy('id', 'desc')->get();
        if($services->count() >= 4){
            return back()->withErrors('You already have 4 services');
        }else{
            $service = new Service();
            if($request->file('image') !== null){
                $imgResource = $request->file('image');
                $imgName = $imgResource->getClientOriginalName();
                $randNum = rand();
                $fullImgName = $randNum.'_'.$imgName;
                //Used intervention image-----------------------------------//
                try {
                  $img = Image::make($imgResource);
                } catch (Exception $ex) {
                  return back()->withErrors('Please upload .jpeg or .png images.');
                }
                if ($img->filesize() < 10000000) {
                    $img->save('./content/img/services/'.$fullImgName);
                } else {
                    return back()->withErrors('Please upload smaller images.');
                }
                $service->svg = $fullImgName;
            }
            $service->position = $request['position'];
            $service->text = $request['text'];
            $service->save();

            return back()->withErrors('Service saved');
        }

    }

    public function show(Service $service){
        return view('admin.home.service', compact('slider'));
    }

    public function edit(Service $service){
        return view('admin.home.service.edit', compact('service'));
    }

    public function update(Request $request,Service $service){
        $this->validate($request, ['text' => 'required|min:3','position' => 'required']);
        if($request->file('image') !== null){
            $imgResource = $request->file('image');
            $imgName = $imgResource->getClientOriginalName();
            $randNum = rand();
            $fullImgName = $randNum.'_'.$imgName;
            //Used intervention image-----------------------------------//
            try {
              $img = Image::make($imgResource);
            } catch (Exception $ex) {
              return back()->withErrors('Please upload .jpeg or .png images.');
            }
            if ($img->filesize() < 10000000) {
                $img->save('./content/img/services/'.$fullImgName);
            } else {
                return back()->withErrors('Please upload smaller images.');
            }
            unlink('./content/img/services/' . $service->svg);
            $service->svg = $fullImgName;
        }
        $service->position = $request['position'];
        $service->text = $request['text'];
        $service->save();
        return back()->withErrors('Service updated');
    }

    public function destroy(Request $request, Service $service) {
        $service = Service::find($service->id);
        $fileExists = file_exists('./content/img/services/' . $service->svg);
        if($service->svg != ""){
            unlink('./content/img/services/' . $service->svg);
        }
        $service->delete();
        return redirect()->back()->withErrors('Service deleted');
    }
}
