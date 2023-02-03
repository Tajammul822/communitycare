<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Answer;
use App\Models\Question;
use Auth;

class AnswerController extends Controller
{
    public function index()
    {
        $quest = Question::all();
        $answers = Answer::all();
        return view('dashboard.answers.index', compact('answers', 'quest'));
    }

    public function store(Request $request)
    {
        $question_id = $request->que_id;
        $answers = new Answer;
        $answers->question_id           = $question_id;
        $answers->answer        = $request->answer;
        if ($answers->save()) {
            return redirect()->route('admin/answers')->with('success', 'You have successfully added an Answer!');
        } else {
            return redirect()->route('admin/answers')->with('error', 'Sorry, Something went wrong');
        }
    }

    public function edit($id)
    {
        $data['data'] = Answer::Find($id);
        return view('dashboard.answers.edit', $data);
    }

    public function update(Request $request)
    {
        $id =  $request->answer_id;
        $answers                   = Answer::find($id);
        $answers->answer        = $request->answer;

        if ($answers->save()) {
            return redirect()->route('admin/answers')->with('success', 'You have successfully updated the Answer!');
        } else {
            return redirect()->route('admin/answers')->with('error', 'Sorry, Something went wrong');
        }
    }

    public function destroy($id)
    {
        Answer::where("id", $id)->delete();
        return redirect()->route('admin/answers')->with('success', 'You have successfully deleted the Answer!');
    }
}
