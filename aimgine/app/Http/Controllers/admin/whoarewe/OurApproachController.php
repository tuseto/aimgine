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
    public function edit(Request $request){


        $fileName = $request->fileName;
        dd($fileName);
        $content = $request->textArea;
        dd($content);
        $myfile = fopen("content/articles/ourapproach/".$fileName, "w") or die("Unable to open file!");
        fwrite($myfile, $content);
        fclose($myfile);

        echo "success";
    }


}
