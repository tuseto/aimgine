<?php

namespace App\Http\Controllers\client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Work\Category as WorkCategory;
use App\Models\Work\Project as Project;
use App\Models\Work\ProjectGallery as Images;
use App\Models\Whoarewe\Testimonial;

use App\Models\Wedo\Category as WedoCategory;


class WorkController extends Controller
{
    public function index(){
        $workCategories = WorkCategory::orderBy('position')->get();
        $wedoCategories = WedoCategory::orderBy('position')->get();
        $projects = Project::get();
        $testimonials = Testimonial::get();

        $images = Images::get();
        return view('client.projects',compact('projects','workCategories','wedoCategories','images','testimonials'));
    }

    public function showCategory($catname,WorkCategory $category){
        $workCategories = WorkCategory::orderBy('position')->get();
        $wedoCategories = WedoCategory::orderBy('position')->get();
        $projects = Project::where('category_id','=',$category->id)->get();
        $testimonials = Testimonial::get();

        $images = Images::get();
        return view('client.projects',compact('projects','workCategories','wedoCategories','images','testimonials'));
    }

    public function showProject($catname,$projectname,Project $project){
        $workCategories = WorkCategory::orderBy('position')->get();
        $wedoCategories = WedoCategory::orderBy('position')->get();

        $testimonials = Testimonial::get();
        $relProjects = $project->relatedProjects()->get();
        $images = Images::get();
        $projectImages = $images->where('project_id',$project->id);
        // dd($projectImages);
        return view('client.project',compact('projects','workCategories','wedoCategories','images','testimonials','project','relProjects','projectImages'));
    }
}
