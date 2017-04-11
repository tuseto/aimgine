<?php

namespace App\Http\Controllers\client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Work\Category as WorkCategory;
use App\Models\Wedo\Category as WedoCategory;
use App\Models\Whoarewe\Testimonial;
use App\Models\Ourclients\Ourclient;

class OurclientsController extends Controller
{
    public function index(){

        $workCategories = WorkCategory::orderBy('position')->get();
        $wedoCategories = WedoCategory::orderBy('position')->get();

        $testimonials = Testimonial::where('onHome','=','1')->get();
        $clients = Ourclient::get();

        return view('client/ourclients',compact('workCategories','wedoCategories','testimonials','clients'));

    }
}
