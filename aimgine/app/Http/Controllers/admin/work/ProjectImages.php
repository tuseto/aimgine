<?php

namespace App\Http\Controllers\admin\work;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Image;
use DB;
use App\WorkProjects;
use App\ProjectsGallery;

class ProjectImages extends Controller
{
    public function index(WorkProjects $project) {
        $images = DB::table('projects_gallery')->where('project_id', '=', $project->id)->get();
        return view('admin.work.projects.images', compact('images','project'));
    }

    public function create(){
        $projects = WorkProjects::orderBy('id', 'desc')->get();
        return view('admin.work.projects.add', compact('projects'));
    }

    public function store(Request $request,WorkProjects $project){
            $projectsGallery = new ProjectsGallery();

            if($request->file('image') !== null){
                $imgResource = $request->file('image');
                $imgName = $imgResource->getClientOriginalName();
                $randNum = rand();
                $fullImgName = $randNum.'_'.$imgName;
                //Used intervention image-----------------------------------//
                try {
                  $img = Image::make($imgResource);
                } catch (Exception $ex) {
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

            }



            return back()->withErrors('Image saved');


    }

    public function show(Service $service){
        return view('admin.home.service', compact('slider'));
    }

    public function edit(WorkProjects $project){
        $images = DB::table('projects_gallery')->where('project_id', '=', $project->id)->get();
        $projects = DB::table('work_projects')->where('id','!=',$project->id)->get();
        $linkedProjects = DB::table('project_links')->where('project_id', '=', $project->id)->get();


        return view('admin.work.projects.edit', compact('project','images','projects','linkedProjects'));
    }

    public function update(Request $request,WorkProjects $project){
        $this->validate($request, ['name' => 'required|min:3','description' => 'required']);




        // dd($request['linkedProjects']);
        DB::table('project_links')->where('project_id', '=', $project->id)->delete();
        if(!empty($request['linkedProjects'])){
            foreach ($request['linkedProjects'] as $key => $value) {
                DB::table('project_links')->insert(
                    ['project_id' => $project->id, 'linked_project_id' => $value]
                );
            }
        }
        $project->name = $request['name'];
        $project->description = $request['description'];

        $project->save();
        return back()->withErrors('Project saved');

    }

    public function destroy(Request $request, $prj, $img) {
        // dd($img);
        $images = DB::table('projects_gallery')->where('id', '=', $img)->get();

        DB::table('projects_gallery')->where('id', '=', $img)->delete();
        foreach($images as $image){
            $fileExists = file_exists('./content/img/projects/' . $image->image);
            unlink('./content/img/projects/' . $image->image);

        }

        return redirect()->back()->withErrors('Image deleted');
    }
}
