<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Form;
use App\Models\Answer;
use App\Models\Question;
use App\Models\FormAnswer;
use App\Models\FormQuestion;
use App\Models\FormSubmit;
use Redirect;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Str;
use Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\NotifyMail;
use App\Models\FormSubmitAnswer;
use Illuminate\Support\Facades\Validator;

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

    public function display($slug)
    {
        $form = Form::where('slug', $slug)->first();
        $id = $form->id;
        $question_list = FormQuestion::where('form_id', $id)->with('question_anwser')->get();

        return view('external.form.index', compact('question_list', 'form'));
    }

    static function get_answer($form_id, $question_id)
    {
        $answer = FormAnswer::where('form_id', $form_id)->where('question_id', $question_id)->get();
        return $answer;
    }

    public function form_submit(Request $request)
    {

        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'zip_code' => 'required|numeric',
            'best_describe' => 'required',
            'language' => 'required',
            'help' => 'required'

        ]);

        $form_id = $request->form_id;
        $form = new FormSubmit;
        $form->form_id =  $form_id;
        $form->first_name = $request->first_name;
        $form->last_name = $request->last_name;
        $form->email = $request->email;
        $form->phone = $request->phone;
        $form->zip_code = $request->zip_code;
        $form->best_describe = $request->best_describe;
        $form->language = $request->language;
        $form->help = $request->help;

        $question_answer = $request->responses;
        if ($form->save()) {

            foreach ($question_answer as $key => $value) {
                $form_answer = new FormSubmitAnswer;
                $form_answer->form_submit_id = $form->id;
                $form_answer->question_id = $key;
                $form_answer->answer_id = $value;
                $form_answer->save();
            }
        }

        return view('external.form.thankyou');
    }

    public function form_share(Request $request)
    {
        $form_id = $request->form_id;
        $form_slug = Form::where('id', $form_id)->first();
        $form_slug = $form_slug->slug;
        $form_link = env("APP_URL") . '/form/' . $form_slug;

        $email = $request->email;
        $name = $request->name;
        $sender_name = Auth::User()->first_name;
        $sender_email = Auth::User()->email;
        $data = ([
            'name' => $name,
            'receiver_email' => $email,
            'sender_name' => $sender_name,
            'sender_email' => $sender_email,
            'form_link' => $form_link
        ]);
        $send = Mail::to($email)->send(new NotifyMail($data));
        if ($send) {
            return redirect()->route('admin/forms')->with('success', 'You have successfully send the Form!');
        } else {
            return redirect()->route('admin/forms')->with('error', 'Sorry, Something went wrong!');
        }
    }
}
