<?php

namespace App\Http\Controllers\client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Work\Category as WorkCategory;
use App\Models\Wedo\Category as WedoCategory;
use App\Models\Home\Slider;
use App\Models\Home\Entrytext;
use App\Models\Whoarewe\Testimonial;
use App\Models\Home\Service;


class IndexController extends Controller
{
    public function index(){
        $workCategories = WorkCategory::orderBy('position')->get();
        $wedoCategories = WedoCategory::orderBy('position')->get();
        $entrytext = Entrytext::first();
        $testimonials = Testimonial::where('onHome','=','1')->get();
        $slider = Slider::orderBy('position')->get();
        $services = Service::orderBy('position')->get();
        return view('client/index',compact('workCategories','wedoCategories','slider','entrytext','testimonials','services'));
    }
}
