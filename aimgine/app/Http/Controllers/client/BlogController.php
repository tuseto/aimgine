<?php

namespace App\Http\Controllers\client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Work\Category as WorkCategory;
use App\Models\Wedo\Category as WedoCategory;
use App\Models\Whoarewe\Testimonial;
use App\Models\Blog\Category as BlogCategory;
use App\Models\Blog\Article;

class BlogController extends Controller
{
    public function index(){

        $workCategories = WorkCategory::orderBy('position')->get();
        $wedoCategories = WedoCategory::orderBy('position')->get();

        $testimonials = Testimonial::where('onHome','=','1')->get();

        $blogCategories = BlogCategory::get();
        $articles = Article::get();

        return view('client/blog',compact('workCategories','wedoCategories','testimonials','blogCategories','articles'));

    }
    public function singleArticle($catName,$articlename, Article $article){

        $workCategories = WorkCategory::orderBy('position')->get();
        $wedoCategories = WedoCategory::orderBy('position')->get();

        $testimonials = Testimonial::where('onHome','=','1')->get();

        $blogCategories = BlogCategory::get();

        return view('client/blogSingleArticle',compact('workCategories','wedoCategories','testimonials','blogCategories','article'));

    }
    public function categoryArticles($catName, BlogCategory $category){

        $workCategories = WorkCategory::orderBy('position')->get();
        $wedoCategories = WedoCategory::orderBy('position')->get();

        $testimonials = Testimonial::where('onHome','=','1')->get();

        $blogCategories = BlogCategory::get();
        $articles = Article::where('category_id','=',$category->id)->get();

        return view('client/blog',compact('workCategories','wedoCategories','testimonials','blogCategories','articles'));

    }

}
