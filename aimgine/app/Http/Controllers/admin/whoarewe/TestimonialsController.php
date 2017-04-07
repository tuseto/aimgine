<?php

namespace App\Http\Controllers\admin\whoarewe;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Image;
use App\Testimonials;
use DB;

class TestimonialsController extends Controller
{
    public function index() {
        $testimonials = Testimonials::orderBy('id', 'desc')->get();
        return view('admin.whoarewe.testimonials.testimonials', compact('testimonials'));
    }

    public function create(){
        return view('admin.whoarewe.testimonials.add');
    }

    public function store(Request $request){
        $this->validate($request, ['client_name' => 'required|min:3','image' => 'required','text' => 'required']);

            $testimonials = new Testimonials();
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
                    $img->save('./content/img/testimonials/'.$fullImgName);
                } else {
                    return back()->withErrors('Please upload smaller images.');
                }
                $testimonials->image = $fullImgName;
            }
            $testimonials->client_name = $request['client_name'];
            $testimonials->person_name = $request['person_name'];
            $testimonials->position = $request['position'];
            $testimonials->description = $request['text'];
            $testimonials->save();

            return back()->withErrors('Testimonials saved');


    }

    public function show(Testimonials $testimonials){
        return view('admin.whoarewe.testimonials', compact('testimonials'));
    }

    public function edit(Testimonials $testimonial){
        return view('admin.whoarewe.testimonials.edit', compact('testimonial'));
    }

    public function update(Request $request,Testimonials $testimonial){
        $this->validate($request, ['client_name' => 'required|min:3','image' => 'required','text' => 'required']);
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
                $img->save('./content/img/testimonials/'.$fullImgName);
            } else {
                return back()->withErrors('Please upload smaller images.');
            }
            unlink('./content/img/testimonials/' . $testimonial->image);
            $testimonial->image = $fullImgName;
        }
        $testimonial->client_name = $request['client_name'];
        $testimonial->person_name = $request['person_name'];
        $testimonial->position = $request['position'];
        $testimonial->description = $request['text'];
        $testimonial->save();
        return back()->withErrors('Testimonial updated');
    }

    public function destroy(Request $request, Testimonials $testimonial) {

        $fileExists = file_exists('./content/img/testimonials/' . $testimonial->image);
        if($testimonial->image != ""){
            unlink('./content/img/testimonials/' . $testimonial->image);
        }
        $testimonial->delete();
        return redirect()->back()->withErrors('Testimonial deleted');
    }
}
