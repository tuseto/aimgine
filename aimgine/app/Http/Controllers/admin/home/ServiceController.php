<?php

namespace App\Http\Controllers\admin\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Home\Service;
use Image;

class ServiceController extends Controller
{
    public function index() {
        $services = Service::orderBy('id', 'desc')->get();
        return view('admin.home.service.services', compact('services'));
    }

    public function create(){
        $services = Service::orderBy('id', 'desc')->get();
        if($services->count() >= 4){
            return back()->withErrors('You already have 4 services');
        }else{
            return view('admin.home.service.add');
        }
    }

    public function store(Request $request){
        $this->validate($request, ['text' => 'required|min:3',
        'image' => 'required',
        'position' => 'required|unique:home_services|digits_between:1,4']);

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
              } catch (\Exception $ex) {
                  return back()->withErrors('Please upload .jpeg or .png images.');
                }
                if ($img->filesize() < 10000000) {
                    try{
                        $img->save('./content/img/services/'.$fullImgName);
                    }catch(\Exception $e){
                        return back()->withErrors('Cannot upload image');
                    }
                } else {
                    return back()->withErrors('Please upload smaller images.');
                }
                $service->svg = $fullImgName;
            }
            $service->position = $request['position'];
            $service->text = $request['text'];
            $service->save();
            $services = Service::orderBy('id', 'desc')->get();
            return view('admin.home.service.services', compact('services'))->withErrors('Service saved');
        }

    }

    public function show(Service $service){

    }

    public function edit(Service $service){
        return view('admin.home.service.edit', compact('service'));
    }

    public function update(Request $request,Service $service){
        $this->validate($request, ['text' => 'required|min:3',
        'position' => 'required|unique:home_services,position,'.$service->id.',id|digits_between:1,4']);
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
                try{
                    $img->save('./content/img/services/'.$fullImgName);
                }catch(\Exception $e){
                    return back()->withErrors('Cannot upload image');
                }
            } else {
                return back()->withErrors('Please upload smaller images.');
            }
            $fileExists = file_exists('./content/img/services/' . $service->svg);
            if($fileExists){
                unlink('./content/img/services/' . $service->svg);
                $service->svg = $fullImgName;
            }else{
                return back()->withErrors('Service image not found');
            }

        }
        $service->position = $request['position'];
        $service->text = $request['text'];
        $service->save();
        return back()->withErrors('Service updated');
    }

    public function destroy(Request $request, Service $service) {
        $fileExists = file_exists('./content/img/services/' . $service->svg);
        if($service->svg != "" && $fileExists){
            unlink('./content/img/services/' . $service->svg);
            $service->delete();
            return back()->withErrors('Service deleted');
        }
        return redirect()->back()->withErrors('Something went wrong');
    }
}
