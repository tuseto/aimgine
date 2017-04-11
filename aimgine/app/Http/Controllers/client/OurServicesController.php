<?php

namespace App\Http\Controllers\client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Work\Category as WorkCategory;
use App\Models\Wedo\Category as WedoCategory;
use App\Models\Wedo\Service;

use App\Models\Whoarewe\Testimonial;


class OurServicesController extends Controller
{
    public function index($categoryname ,WedoCategory $wedocategory){

        $workCategories = WorkCategory::orderBy('position')->get();
        $wedoCategories = WedoCategory::orderBy('position')->get();

        $testimonials = Testimonial::where('onHome','=','1')->get();
        $services = Service::where('category_id','=',$wedocategory->id)->get();


        return view('client/ourservices',compact('workCategories','wedoCategories','testimonials','services'));

    }
}
