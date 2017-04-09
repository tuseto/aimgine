<?php

namespace App\Http\Controllers\admin\home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Home\Slider;
use Image;

class SliderController extends Controller
{
    public function index() {
        $sliders = Slider::orderBy('id', 'desc')->paginate(5);
        return view('admin.home.slider.sliders', compact('sliders'));
    }

    public function create(){
        return view('admin.home.slider.add');
    }

    public function store(Request $request){
        $this->validate($request, ['text' => 'required|min:3',
        'image' => 'required',
        'position' => 'required|unique:home_sliders|digits_between:1,4']);

        $slider = new Slider();
        if($request->file('image') !== null){
            $imgResource = $request->file('image');
            $imgName = $imgResource->getClientOriginalName();
            $randNum = rand();
            $fullImgName = $randNum.'_'.$imgName;
            // //Used intervention image-----------------------------------//
            try {
              $img = Image::make($imgResource);
            } catch (\Exception $ex) {
              return back()->withErrors('Please upload .jpeg or .png images.');
            }
            if ($img->filesize() < 10000000) {
                try{
                    $img->resize(1400, 430)->save('./content/img/sliders/'.$fullImgName);
                }catch(\Exception $e){
                    return back()->withErrors('Cannot upload image');
                }
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

    }

    public function edit(Slider $slider){
        return view('admin.home.slider.edit', compact('slider'));
    }

    public function update(Request $request,Slider $slider){
        $this->validate($request, ['text' => 'required|min:3',
        'position' => 'required|unique:home_sliders,position,'.$slider->id.',id|digits_between:1,4']);
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
                    $img->resize(1400, 430)->save('./content/img/sliders/'.$fullImgName);
                }catch(\Exception $e){
                    return back()->withErrors('Cannot upload image');
                }
            } else {
                return back()->withErrors('Please upload smaller images.');
            }
            $fileExists = file_exists('./content/img/sliders/' . $slider->image);
            if($fileExists){
                unlink('./content/img/sliders/' . $slider->image);
                $slider->image = $fullImgName;
            }else{
                return back()->withErrors('Slider image not found');
            }

        }
        $slider->position = $request['position'];
        $slider->text = $request['text'];
        $slider->save();
        return back()->withErrors('Slider updated');
    }

    public function destroy(Request $request, Slider $slider) {
        $fileExists = file_exists('./content/img/sliders/' . $slider->image);
        if($slider->image != "" && $fileExists){
            unlink('./content/img/sliders/' . $slider->image);
            $slider->delete();
            return back()->withErrors('Slider deleted');
        }
        return back()->withErrors('Something went wrong');
    }
}
