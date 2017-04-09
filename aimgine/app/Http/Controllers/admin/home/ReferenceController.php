<?php

namespace App\Http\Controllers\admin\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Whoarewe\Testimonial;

class ReferenceController extends Controller
{
    public function index() {
        $testimonials = Testimonial::get();
        return view('admin.home.references.references',compact('testimonials'));
    }

    public function update(Request $request){
        $testimonials = Testimonial::get();
        $newReferences = $request->references;

        if($newReferences === null){
            foreach ($testimonials as $testimonial) {
                $testimonial->onHome = 0;
                $testimonial->save();
            }
        }else{
            foreach ($testimonials as $testimonial) {
                foreach ($newReferences as $key => $value) {
                    if($testimonial->id == $value){
                        $testimonial->onHome = 1;
                        $testimonial->save();
                        break;
                    }else{
                        $testimonial->onHome = 0;
                        $testimonial->save();
                    }
                }
            }
        }

        $testimonials = Testimonial::get();
        return view('admin.home.references.references',compact('testimonials','references'))->withErrors('References updated');
    }


}
