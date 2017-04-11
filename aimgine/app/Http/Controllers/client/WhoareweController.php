<?php

namespace App\Http\Controllers\client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Work\Category as WorkCategory;
use App\Models\Whoarewe\Testimonial;
use App\Models\Wedo\Category as WedoCategory;
use App\Models\Whoarewe\Team;

class WhoareweController extends Controller
{
    public function team(){
        $workCategories = WorkCategory::orderBy('position')->get();
        $wedoCategories = WedoCategory::orderBy('position')->get();
        $team = Team::get();
        $testimonials = Testimonial::get();


        return view('client.whoarewe',compact('workCategories','wedoCategories','testimonials','team'));
    }
    public function testimonials(){
        $workCategories = WorkCategory::orderBy('position')->get();
        $wedoCategories = WedoCategory::orderBy('position')->get();


        $testimonials = Testimonial::get();

        return view('client.whoareweTestimonials',compact('workCategories','wedoCategories','testimonials'));
    }
    public function ourapproach(){
        $workCategories = WorkCategory::orderBy('position')->get();
        $wedoCategories = WedoCategory::orderBy('position')->get();

        $testimonials = Testimonial::get();

        $fileName = 'ourapproach.txt';
        $ourapproach = file_get_contents("content/articles/ourapproach/".$fileName);
        // dd($ourapproach);
        return view('client.whoareweApproach',compact('workCategories','wedoCategories','testimonials','ourapproach'));
    }
}
