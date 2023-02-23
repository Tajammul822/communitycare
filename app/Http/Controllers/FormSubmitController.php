<?php

namespace App\Http\Controllers;

use App\Models\ChwAssign;
use App\Models\FormSubmitAnswer;
use App\Models\FormSubmit;
use App\Models\User;
use App\Models\Question;
use Illuminate\Http\Request;

class FormSubmitController extends Controller
{
    public function index()
    {
        $form_submit = FormSubmit::all();
        return view('dashboard.submit.index', compact('form_submit'));
    }

    public function show($id)
    {
        $form_view = FormSubmitAnswer::where('form_submit_id', $id)->get();
        $form_submit = FormSubmit::where('id', $id)->first();
        $chw_list = User::where('access_level', 2)->get();
        return view('dashboard.submit.show', compact('form_view', 'form_submit', 'chw_list'));
    }

    public function assign(Request $request)
    {
        $form_id = $request->form_id;
        $chw_lists = new ChwAssign;
        $chw_lists->user_id          = $request->user_id;
        $chw_lists->form_id          = $form_id;
        if ($chw_lists->save()) {
            return redirect()->route('admin/submitted-form')->with('success', 'You have successfully assigned this assesment form to a CHW user!');
        } else {
            return redirect()->route('admin/submitted-form')->with('error', 'Sorry, Something went wrong');
        };
    }
}
