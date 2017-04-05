<?php

namespace App\Http\Controllers\admin\home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Entrytext;


class EntrytextController extends Controller
{
        public function index() {
            $entrytexts = Entrytext::orderBy('id', 'desc')->get();
            return view('admin.home.entrytext.entrytext', compact('entrytexts'));
        }

        public function create(){
            $entrytexts = Entrytext::orderBy('id', 'desc')->get();
            return view('admin.home.entrytext.add');
        }

        public function store(Request $request){
            $entrytexts = Entrytext::orderBy('id', 'desc')->get();
            if($entrytexts->isEmpty()){
                $this->validate($request, ['text' => 'required|min:3']);
                $entrytext = new Entrytext();
                $entrytext->text = $request['text'];
                $entrytext->save();

                return back()->withErrors('Entrytext saved');
            }else{
                return back()->withErrors('Entrytext already exists');
            }

        }

        public function show(Entrytext $entrytext){
            return view('admin.home.entrytext', compact('entrytext'));
        }

        public function edit(Entrytext $entrytext){
            return view('admin.home.entrytext.edit', compact('entrytext'));
        }

        public function update(Request $request,Entrytext $entrytext){
            $this->validate($request, ['text' => 'required|min:3']);
            $entrytext->text=$request['text'];

            $entrytext->save();
            return back()->withErrors('Entry text updated');
        }

        public function destroy(Request $request, Entrytext $entrytext) {
            $entrytext = Entrytext::find($entrytext->id);
            $entrytext->delete();
            return redirect()->back()->withErrors('Entry text deleted');
        }
}
