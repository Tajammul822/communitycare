<?php

namespace App\Http\Controllers;

use App\Models\FormQuestion;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FormQuestionController extends Controller
{
    public function index($id)
    {

        $data['data'] = FormQuestion::where('form_id', $id)->get();
        $data['questions'] = Question::all();

        Session::put('index_url', request()->fullUrl());
        return view('dashboard.forms.questions.index', $data);
    }

    public function save(Request $request)
    {
        $question_id = $request->que_id;
        $form_id = $request->form_id;
        $form_data = new FormQuestion;
        $form_data->form_id           = $form_id;
        $form_data->question_id        = $question_id;
        if ($form_data->save()) {
            return redirect()->route('admin/forms/questions/{id}', ['id' => $form_id])->with('success', 'You have successfully added a Question!');
        } else {
            return redirect()->route('admin/forms/questions/{id}', ['id' => $form_id])->with('error', 'Sorry, Something went wrong');
        }
    }

    public function edit($id)
    {
        $data['questions'] = Question::all();
        return view('dashboard.forms.questions.edit', $data);
    }

    public function update(Request $request)
    {
        $question_id = $request->que_id;
        $form_id = $request->form_id;
        $form_data = FormQuestion::find($form_id);
        $form_data->question_id        = $question_id;
        $form_data->save();
        if (session(key: 'index_url')) {
            return redirect(session(key: 'index_url'))->with('success', 'You have successfully updated the Question!');
        }
    }

    public function destroy($id)
    {

        FormQuestion::where("id", $id)->delete();
        if (session(key: 'index_url')) {
            return redirect(session(key: 'index_url'))->with('success', 'You have successfully removed the Question!');
        }
    }
}
