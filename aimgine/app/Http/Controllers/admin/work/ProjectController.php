<?php

namespace App\Http\Controllers\admin\work;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Work\Project;
use App\Models\Work\Category;
use App\Models\Work\ProjectGallery;
use Illuminate\Support\Facades\Response;
use Image;
use DB;

class ProjectController extends Controller
{
    public function index() {
        $projects = Project::orderBy('id', 'desc')->paginate(6);
        return view('admin.work.projects.projects', compact('projects'));
    }

    public function create(){
        $projects = Project::orderBy('id', 'desc')->get();
        $categories = Category::get();
        return view('admin.work.projects.add', compact('projects','categories'));
    }

    public function store(Request $request){
        $this->validate($request, ['name' => 'required|min:3',
        'image' => 'required',
        'description' => 'required',
        'link'=>'required|url']);

            $projectsGallery = new ProjectGallery();
            $project = new Project();

            $project->name = $request['name'];
            $project->category_id = $request['category'];

            $project->meta = $request['meta'];
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
                } catch (\Exception $ex) {
                  return back()->withErrors('Please upload .jpeg or .png images.');
                }
                if ($img->filesize() < 10000000) {
                    try {
                        $img->save('./content/img/projects/'.$fullImgName);
                    } catch (\Exception $e) {
                        return back()->withErrors('Cannot upload image');
                    }

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
                    DB::table('work_project_links')->insert(
                        ['project_id' => $project->id, 'linked_project_id' => $value]
                    );
                }
            }
            return back()->withErrors('Project saved');

    }

    public function show(Service $service){
    }

    public function edit(Project $project){
        $images = $project->images()->get();
        $projects = Project::where('id','!=',$project->id)->get();
        $linkedProjects = DB::table('work_project_links')->where('project_id', '=', $project->id)->get();
        $categories = Category::get();

        return view('admin.work.projects.edit', compact('project','images','projects','linkedProjects','categories'));
    }

    public function update(Request $request,Project $project){
        $this->validate($request, ['name' => 'required|min:3',
        'description' => 'required',
        'link'=>'required|url']);

        DB::table('work_project_links')->where('project_id', '=', $project->id)->delete();
        if(!empty($request['linkedProjects'])){
            foreach ($request['linkedProjects'] as $key => $value) {
                DB::table('work_project_links')->insert(
                    ['project_id' => $project->id, 'linked_project_id' => $value]
                );
            }
        }
        $project->category_id = $request['category'];
        $project->name = $request['name'];
        $project->description = $request['description'];
        $project->thumbnail = $request['imgthumb'];
        $project->link = $request['link'];
        $project->meta = $request['meta'];
        $project->save();

        return back()->withErrors('Project saved');
    }

    public function destroy(Request $request,Project $project) {

        $images = $project->images()->get();
        foreach($images as $image){
            $fileExists = file_exists('./content/img/projects/' . $image->image);
            if($fileExists){
                unlink('./content/img/projects/' . $image->image);
            }else{
                return redirect()->back()->withErrors('Something went wrong');
            }
        }
        DB::table('work_project_links')->where('project_id', '=', $project->id)->delete();
        $project->delete();
        return redirect()->back()->withErrors('Project deleted');
    }
}
