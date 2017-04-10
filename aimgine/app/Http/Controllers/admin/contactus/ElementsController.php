<?php

namespace App\Http\Controllers\admin\contactus;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Contactus\Element;

class ElementsController extends Controller
{
    public function index() {
        $elements = Element::get();
        return view('admin.contactus.elements.elements', compact('elements'));
    }

    public function create(){

        return view('admin.contactus.elements.add');
    }

    public function store(Request $request){
        $this->validate($request, ['name' => 'required',
        'element' => 'required']);

        $element = new Element();
        $element->element_name = $request['name'];
        $element->element = $request['element'];
        $element->save();

        return back()->withErrors('Element saved');
    }


    public function edit(Element $element){
        return view('admin.contactus.elements.edit', compact('element'));
    }

    public function update(Request $request,Element $element){
        $this->validate($request, ['name' => 'required',
        'element' => 'required']);

        $element->element_name = $request['name'];
        $element->element = $request['element'];
        $element->save();
        return back()->withErrors('Element updated');
    }

    public function destroy(Request $request, Element $element) {
        $element->forms()->detach();
        $element->delete();
        return back()->withErrors('Element removed');
    }
}
