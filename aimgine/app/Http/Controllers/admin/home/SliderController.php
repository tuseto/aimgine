<?php

namespace App\Http\Controllers\admin\home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Slider;
use Image;

class SliderController extends Controller
{
    public function index() {
        $sliders = Slider::orderBy('id', 'desc')->paginate(20);
        return view('admin.home.slider.sliders', compact('sliders'));
    }

    public function create(){
        return view('admin.home.slider.addSlider');
    }

    public function store(Request $request){
        $this->validate($request, ['text' => 'required|min:3','image' => 'required','position' => 'required|unique:sliders']);
        $slider = new Slider();
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
                $img->resize(800, 470)->save('./content/img/sliders/'.$fullImgName);
            } else {
                return back()->withErrors('Please upload smaller images.');
            }
            $slider->image = $fullImgName;
        }
        $slider->position = $request['position'];
        $slider->text = $request['text'];
        $slider->save();

        return back()->withErrors('Slider saved');
    }

    public function show(Slider $slider){
        return view('admin.home.slider', compact('slider'));
    }

    public function edit(Slider $slider){
        return view('admin.home.slider.edit', compact('slider'));
    }

    public function update(Request $request,Slider $slider){
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
                $img->resize(800, 470)->save('./content/img/sliders/'.$fullImgName);
            } else {
                return back()->withErrors('Please upload smaller images.');
            }
            unlink('./content/img/sliders/' . $slider->image);
            $slider->image = $fullImgName;
        }
        $slider->position = $request['position'];
        $slider->text = $request['text'];
        $slider->save();
        return back()->withErrors('Slider updated');
    }

    public function destroy(Request $request, Slider $slider) {
        $slider = Slider::find($slider->id);
        $fileExists = file_exists('./content/img/sliders/' . $slider->image);
        if($slider->image != ""){
            unlink('./content/img/sliders/' . $slider->image);
        }
        $slider->delete();
        return redirect()->back()->withErrors('Slider deleted');
    }
}
