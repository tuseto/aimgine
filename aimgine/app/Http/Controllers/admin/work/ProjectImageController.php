<?php

namespace App\Http\Controllers\admin\work;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Image;
use App\Models\Work\Project;
use App\Models\Work\ProjectGallery;

class ProjectImageController extends Controller
{
    public function index(Project $project) {
        $images = $project->images()->get();
        return view('admin.work.projects.images', compact('images','project'));
    }

    public function store(Request $request,Project $project){
            $projectsGallery = new ProjectGallery();

            if($request->file('image') !== null){
                $imgResource = $request->file('image');
                $imgName = $imgResource->getClientOriginalName();
                $randNum = rand();
                $fullImgName = $randNum.'_'.$imgName;
                //Used intervention image-----------------------------------//
                try {
                  $img = Image::make($imgResource);
              } catch (\Exception $ex) {
                  return back()->withErrors('Please upload .jpeg or .png images.');
                }
                if ($img->filesize() < 10000000) {
                    $img->save('./content/img/projects/'.$fullImgName);
                } else {
                    return back()->withErrors('Please upload smaller images.');
                }
                $projectsGallery->image = $fullImgName;
                $projectsGallery->project_id = $project->id;
                $projectsGallery->save();
                return back()->withErrors('Image saved');
            }

            return back()->withErrors('No new image to add');
    }

    public function destroy(Request $request, $prj, ProjectGallery $image) {

        $fileExists = file_exists('./content/img/projects/' . $image->image);
        if($fileExists){
            unlink('./content/img/projects/' . $image->image);
            $image->delete();
            return redirect()->back()->withErrors('Image deleted');
        }else{
            return redirect()->back()->withErrors('Something went wrong');
        }

    }
}
