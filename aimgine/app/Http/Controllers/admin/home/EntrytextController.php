<?php

namespace App\Http\Controllers\admin\home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Home\Entrytext;


class EntrytextController extends Controller
{
        public function index() {
            $entrytexts = Entrytext::get();
            return view('admin.home.entrytext.entrytext', compact('entrytexts'));
        }

        public function create(){
            $entrytext = Entrytext::first();

            if($entrytext === null){
                return view('admin.home.entrytext.add');
            }else{
                return back()->withErrors('Entry text already exists');
            }
        }

        public function store(Request $request){
            $entrytexts = Entrytext::get();
            if($entrytexts->isEmpty()){
                $this->validate($request, ['text' => 'required|min:3']);
                $entrytext = new Entrytext();
                $entrytext->text = $request['text'];
                $entrytext->save();
                $entrytexts = Entrytext::get();
                return view('admin.home.entrytext.entrytext', compact('entrytexts'))->withErrors('Entrytext saved');
            }else{
                return back()->withErrors('Entrytext already exists');
            }

        }

        public function show(Entrytext $entrytext){

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
            $entrytext->delete();
            return redirect()->back()->withErrors('Entry text deleted');
        }
}
