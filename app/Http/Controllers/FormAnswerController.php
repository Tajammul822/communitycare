<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\FormQuestion;
use App\Models\Question;
use App\Models\FormAnswer;
use App\Models\Answer;


class FormAnswerController extends Controller
{
    public function index($id, $form_id)
    {

        $data['data'] = FormAnswer::where('form_id', $form_id)->where('question_id', $id)->get();
        $data['answers'] = Answer::where('question_id', $id)->get();

        Session::put('index_answer', request()->fullUrl());
        return view('dashboard.forms.answers.index', $data);
    }

    public function save(Request $request)
    {

        $form_id = $request->form_id;
        $form_data = new FormAnswer;
        $form_data->form_id           = $form_id;
        $form_data->answer_id        = $request->answer_id;
        $form_data->question_id        = $request->question_id;
        $form_data->save();
        if (session(key: 'index_answer')) {
            return redirect(session(key: 'index_answer'))->with('success', 'You have successfully added an Answer!');
        }
    }

    public function edit($id)
    {

        $data['answers'] = Answer::all();
        return view('dashboard.forms.answers.edit', $data);
    }

    public function update(Request $request)
    {

        $form_id = $request->form_id;
        $form_data = FormAnswer::find($form_id);
        $form_data->answer_id        = $request->answer_id;
        $form_data->save();
        if (session(key: 'index_answer')) {
            return redirect(session(key: 'index_answer'))->with('success', 'You have successfully updated the Answer!');
        }
    }

    public function delete($id)
    {
        FormAnswer::where("id", $id)->delete();
        if (session(key: 'index_answer')) {
            return redirect(session(key: 'index_answer'))->with('success', 'You have successfully removed the Answer!');
        }
    }
}
