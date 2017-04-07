<?php

namespace App\Http\Controllers\admin\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApiController extends Controller
{
    public function newArticle(Request $request){
        $fileName = $request->fileName;
        $content = $request->textArea;
        $myfile = fopen("content/articles/services/".$fileName, "w") or die("Unable to open file!");
        fwrite($myfile, $content);
        fclose($myfile);
    }

    public function editOurApproach(Request $request){
        $fileName = $request->fileName;
        $content = $request->textArea;
        $myfile = fopen("content/articles/ourapproach/".$fileName, "w") or die("Unable to open file!");
        fwrite($myfile, $content);
        fclose($myfile);
        return("content/articles/ourapproach/".$fileName);
    }

}
