<?php

namespace App\Http\Controllers;

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
}
