<?php

namespace App\Http\Controllers\admin\whoarewe;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class OurApproachController extends Controller
{
    public function index() {
        $fileName = 'ourapproach.txt';
        $ourApproach = file_get_contents("content/articles/ourapproach/".$fileName);
        return view('admin.whoarewe.ourapproach.ourapproach',compact('ourApproach'));
    }

}
