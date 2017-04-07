<?php

namespace App\Http\Controllers\admin\whoarewe;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Image;
use App\Team;

class TeamController extends Controller
{
    public function index() {
        $team = Team::orderBy('id', 'desc')->get();
        return view('admin.whoarewe.team.team', compact('team'));
    }

    public function create(){
        return view('admin.whoarewe.team.add');
    }

    public function store(Request $request){
        $this->validate($request, ['text' => 'required|min:3','image' => 'required','name' => 'required']);
        $team = Team::orderBy('id', 'desc')->get();

            $team = new Team();
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
                    $img->save('./content/img/team/'.$fullImgName);
                } else {
                    return back()->withErrors('Please upload smaller images.');
                }
                $team->image = $fullImgName;
            }
            $team->name = $request['name'];
            $team->description = $request['text'];
            $team->save();

            return back()->withErrors('Team saved');


    }

    public function show(Team $team){
        return view('admin.whoarewe.team', compact('team'));
    }

    public function edit(Team $team){
        return view('admin.whoarewe.team.edit', compact('team'));
    }

    public function update(Request $request,Team $team){
        $this->validate($request, ['text' => 'required|min:3','name' => 'required']);
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
                $img->save('./content/img/services/'.$fullImgName);
            } else {
                return back()->withErrors('Please upload smaller images.');
            }
            unlink('./content/img/team/' . $team->image);
            $team->image = $fullImgName;
        }
        $team->name = $request['name'];
        $team->description = $request['text'];
        $team->save();
        return back()->withErrors('Team updated');
    }

    public function destroy(Request $request, Team $team) {


        // $team = Team::find($team->id);
        $fileExists = file_exists('./content/img/team/' . $team->image);
        if($team->image != ""){
            unlink('./content/img/team/' . $team->image);
        }
        $team->delete();
        return redirect()->back()->withErrors('Team deleted');
    }
}
