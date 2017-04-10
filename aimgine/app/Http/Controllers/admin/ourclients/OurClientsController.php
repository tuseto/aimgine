<?php

namespace App\Http\Controllers\admin\ourclients;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Ourclients\Ourclient;
use App\Models\Work\Project;
use DB;
use Image;

class OurClientsController extends Controller
{
    public function index() {
        $ourclients = Ourclient::orderBy('id', 'desc')->paginate(5);
        return view('admin.ourclients.ourclients', compact('ourclients'));
    }

    public function create(){
        $projects = Project::get();
        $linkedProjects = DB::table('ourclient_projects')->get();
        return view('admin.ourclients.add',compact('projects','linkedProjects'));
    }

    public function store(Request $request){
        $this->validate($request, ['name' => 'required',
        'image' => 'required']);

        $ourclient = new Ourclient();
        if($request->file('image') !== null){
            $imgResource = $request->file('image');
            $imgName = $imgResource->getClientOriginalName();
            $randNum = rand();
            $fullImgName = $randNum.'_'.$imgName;
            // //Used intervention image-----------------------------------//
            try {
              $img = Image::make($imgResource);
            } catch (\Exception $ex) {
              return back()->withErrors('Please upload .jpeg or .png images.');
            }
            if ($img->filesize() < 10000000) {
                try{
                    $img->save('./content/img/ourclients/'.$fullImgName);
                }catch(\Exception $e){
                    return back()->withErrors('Cannot upload image');
                }
            } else {
                return back()->withErrors('Please upload smaller images.');
            }
            $ourclient->logo = $fullImgName;
        }

        $ourclient->name = $request['name'];
        $ourclient->save();
        if(!empty($request['linkedProjects'])){
            foreach ($request['linkedProjects'] as $key => $value) {
                DB::table('ourclient_projects')->insert(
                    ['ourclient_id' => $ourclient->id, 'project_id' => $value]
                );
            }
        }

        return back()->withErrors('Client saved');
    }

    public function show(Slider $slider){

    }

    public function edit(Ourclient $ourclient){
        $projects = Project::get();
        $linkedProjects = DB::table('ourclient_projects')->where('ourclient_id', '=', $ourclient->id)->get();
        return view('admin.ourclients.edit', compact('ourclient','linkedProjects','projects'));
    }

    public function update(Request $request,Ourclient $ourclient){
        $this->validate($request, ['name' => 'required']);
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
                try{
                    $img->resize(1400, 430)->save('./content/img/ourclients/'.$fullImgName);
                }catch(\Exception $e){
                    return back()->withErrors('Cannot upload image');
                }
            } else {
                return back()->withErrors('Please upload smaller images.');
            }
            $fileExists = file_exists('./content/img/ourclients/' . $ourclient->logo);
            if($fileExists){
                unlink('./content/img/ourclients/' . $ourclient->logo);
                $ourclient->logo = $fullImgName;
            }else{
                return back()->withErrors('Logo image not found');
            }

        }
        DB::table('ourclient_projects')->where('ourclient_id', '=', $ourclient->id)->delete();
        if(!empty($request['linkedProjects'])){
            foreach ($request['linkedProjects'] as $key => $value) {
                DB::table('ourclient_projects')->insert(
                    ['ourclient_id' => $ourclient->id, 'project_id' => $value]
                );
            }
        }
        $ourclient->name = $request['name'];
        $ourclient->save();
        return back()->withErrors('Ourclient updated');
    }

    public function destroy(Request $request, Ourclient $ourclient) {
        $fileExists = file_exists('./content/img/ourclients/' . $ourclient->logo);
        if($ourclient->logo != "" && $fileExists){
            unlink('./content/img/ourclients/' . $ourclient->logo);
            $ourclient->delete();
            DB::table('ourclient_projects')->where('ourclient_id', '=', $ourclient->id)->delete();
            return back()->withErrors('Slider deleted');
        }
        return back()->withErrors('Something went wrong');
    }
}
