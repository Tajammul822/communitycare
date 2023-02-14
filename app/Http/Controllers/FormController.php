<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Form;
use Redirect;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Str;
use Auth;

class FormController extends Controller
{
    public function index()
    {
        $form = Form::all();
        return view('dashboard.forms.index', compact('form'));
    }

    public function create()
    {
        return view('dashboard.forms.create');
    }

    public function save(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);
        $id = Auth::user()->id;

        $form = new Form;
        $form->user_id =  $id;
        $form->title = $request->title;
        $form->slug = Str::slug($request->title . Str::random(40), '-');
        $form->description = $request->description;
        $form->save();

        return redirect()->route('admin/forms')->with('success', 'You have successfully created a form!');
    }

    public function edit($id)
    {
        $data['data'] = Form::Find($id);
        return view('dashboard.forms.edit', $data);
    }

    public function update(Request $request)
    {
        $id =  $request->form_id;
        $form                   = Form::find($id);
        $form->title        = $request->title;
        $form->slug        = Str::slug($request->title . Str::random(40), '-');
        $form->description        = $request->description;

        if ($form->save()) {
            return redirect()->route('admin/forms')->with('success', 'You have successfully updated the Form!');
        } else {
            return redirect()->route('admin/forms')->with('error', 'Sorry, Something went wrong');
        }
    }

    public function destroy($id)
    {
        Form::where("id", $id)->delete();
        return redirect()->route('admin/forms')->with('success', 'You have successfully deleted the Form!');
    }
}
