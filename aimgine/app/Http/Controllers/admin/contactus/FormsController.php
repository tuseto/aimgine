<?php

namespace App\Http\Controllers\admin\contactus;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Contactus\Form;
use App\Models\Contactus\Element;

class FormsController extends Controller
{
    public function index() {
        $forms = Form::get();

        foreach($forms as $form){
            $elArray[$form->id] = array();
            $elements = $form->elements()->get();
            foreach($elements as $el){
                array_push($elArray[$form->id],$el->element_name);
            }
        }
        // dd($elArray);

        return view('admin.contactus.forms.forms', compact('forms','elements','elArray'));
    }

    public function create(){
        $elements = Element::get();
        return view('admin.contactus.forms.add',compact('elements'));
    }

    public function store(Request $request){
        $this->validate($request, ['name' => 'required']);

        $form = new Form();
        $form->name = $request['name'];
        $form->published = 0;

        $form->save();

        return back()->withErrors('Form saved');
    }


    public function edit(Form $form){
        $elements = Element::get();
        $formEl = $form->elements()->get();
        return view('admin.contactus.forms.edit', compact('elements','form','formEl'));
    }

    public function update(Request $request,Form $form){

        if($request['formElements'] !== null){
            $form->elements()->sync($request['formElements']);
        }else{
            $form->elements()->detach();
        }

        $form->name = $request['name'];
        $form->save();

        return back()->withErrors('Form updated');
    }

    public function destroy(Request $request, Form $form) {
        $form->elements()->detach();
        $form->delete();
        return back()->withErrors('Form deleted');
    }
}
