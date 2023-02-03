<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use Auth;

class QuestionController extends Controller
{


    /**
     * Store a new user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $questions = Question::all();
        return view('dashboard.questions.index', compact('questions'));
    }

    public function store(Request $request)
    {
        $user_id = Auth::user()->id;
        $question                   = new Question;
        $question->user_id           = $user_id;
        $question->question        = $request->question;

        if ($question->save()) {
            return redirect()->route('admin/questions')->with('success', 'You have successfully added a question!');
        } else {
            return redirect()->route('admin/questions')->with('error', 'Sorry, Something went wrong');
        }
    }

    public function edit($id)
    {
        $data['data'] = Question::Find($id);
        return view('dashboard.questions.edit', $data);
    }
    public function update(Request $request)
    {
        $id =  $request->question_id;
        $user_id = Auth::user()->id;
        $question                   = Question::find($id);
        $question->user_id           = $user_id;
        $question->question        = $request->question;

        if ($question->save()) {
            return redirect()->route('admin/questions')->with('success', 'You have successfully updated the question!');
        } else {
            return redirect()->route('admin/questions')->with('error', 'Sorry, Something went wrong');
        }
    }

    public function destroy($id)
    {
        Question::where("id", $id)->delete();
        return redirect()->route('admin/questions')->with('success', 'You have successfully deleted the question!');
    }
}
