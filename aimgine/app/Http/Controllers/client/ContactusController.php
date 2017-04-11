<?php

namespace App\Http\Controllers\client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Work\Category as WorkCategory;
use App\Models\Wedo\Category as WedoCategory;
use App\Models\Whoarewe\Testimonial;
use App\Models\Contactus\Form;
class ContactusController extends Controller
{
    public function index(){

        $workCategories = WorkCategory::orderBy('position')->get();
        $wedoCategories = WedoCategory::orderBy('position')->get();

        $testimonials = Testimonial::where('onHome','=','1')->get();
        $form = Form::first();
        if($form !== null){
            $elements=$form->elements()->get();

        }


        return view('client/contactus',compact('workCategories','wedoCategories','testimonials','elements'));

    }
}
