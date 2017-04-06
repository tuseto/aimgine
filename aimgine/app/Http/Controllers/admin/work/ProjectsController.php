<?php

namespace App\Http\Controllers\admin\work;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\WorkProjects;
use App\ProjectsGallery;
use Illuminate\Support\Facades\Response;
use Image;
use DB;

class ProjectsController extends Controller
{
    public function index() {
        $projects = WorkProjects::orderBy('id', 'desc')->get();
        return view('admin.work.projects.projects', compact('projects'));
    }

    public function create(){
        $projects = WorkProjects::orderBy('id', 'desc')->get();
        return view('admin.work.projects.add', compact('projects'));
    }

    public function store(Request $request){
        $this->validate($request, ['name' => 'required|min:3','image' => 'required','description' => 'required']);

            $projectsGallery = new ProjectsGallery();
            $project = new WorkProjects();

            $project->name = $request['name'];
            $project->description = $request['description'];
            $project->link = $request['link'];

            $project->save();

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
                $project->thumbnail = $projectsGallery->id;
                $project->save();
            }
            if(!empty($request['linkedProjects'])){
                foreach ($request['linkedProjects'] as $key => $value) {
                    DB::table('project_links')->insert(
                        ['project_id' => $project->id, 'linked_project_id' => $value]
                    );
                }
            }



            return back()->withErrors('Project saved');


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

        // dd($request['imgthumb']);
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
        $project->thumbnail = $request['imgthumb'];
        $project->link = $request['link'];

        $project->save();
        return back()->withErrors('Project saved');

    }

    public function destroy(Request $request,WorkProjects $project) {
        $project = WorkProjects::find($project->id);
        DB::table('project_links')->where('project_id', '=', $project->id)->delete();
        $images = DB::table('projects_gallery')->where('project_id', '=', $project->id)->get();
        foreach($images as $image){
            $fileExists = file_exists('./content/img/projects/' . $image->image);
            unlink('./content/img/projects/' . $image->image);

        }
        $project->delete();
        return redirect()->back()->withErrors('Project deleted');
    }
}
