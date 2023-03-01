<?php

namespace App\Http\Controllers;

use App\Models\ChwAssign;
use App\Models\FormSubmit;
use App\Models\FormSubmitAnswer;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\FormTask;
use Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class ChwController extends Controller
{
    public function index()
    {
        $users = User::where('access_level', 2)->get();
        return view('dashboard.chw.index', compact('users'));
    }

    public function store(Request  $request)
    {

        $user                   = new User;
        $user->first_name          = $request->first_name;
        $user->last_name        = $request->last_name;
        $user->email        = $request->email;
        $user->address        = $request->address;
        $user->phone        = $request->phone;
        $user->zip_code        = $request->zip_code;
        $user->access_level        = $request->access_level;
        $user->password        = Hash::make($request->password);

        if ($user->save()) {
            return redirect()->route('/admin/chw')->with('success', 'You have successfully added a CHW user!');
        } else {
            return redirect()->route('/admin/chw')->with('error', 'Sorry, Something went wrong');
        }
    }

    public function change($id)
    {
        $data['data'] = User::Find($id);
        return view('dashboard.chw.edit', $data);
    }

    public function update(Request  $request)
    {
        $id = $request->user_id;
        $user = User::Find($id);
        $user->first_name          = $request->first_name;
        $user->last_name        = $request->last_name;
        $user->email        = $request->email;
        $user->address        = $request->address;
        $user->phone        = $request->phone;
        $user->zip_code        = $request->zip_code;
        $user->access_level        = $request->access_level;
        $user->password        = Hash::make($request->password);

        if ($user->save()) {
            return redirect()->route('/admin/chw')->with('success', 'You have successfully updated CHW user details!');
        } else {
            return redirect()->route('/admin/chw')->with('error', 'Sorry, Something went wrong');
        }
    }

    public function delete($id)
    {
        User::where("id", $id)->delete();
        return redirect()->route('/admin/chw')->with('success', 'You have successfully deleted the CHW user!');
    }

    // chw dashboard module
    public function dashboard()
    {
        $id = Auth::user()->id;
        $chw_users = User::where('access_level', 2)->get();
        $chw_form = ChwAssign::where('user_id', $id)->get();
        //dd($chw_form);

        return view('dashboard.chw_dashboard.dashboard', compact('chw_users', 'chw_form'));
    }

    static function get_assign_data($assign_id)
    {
        $assign_data = FormTask::where('assign_id', $assign_id)->get();
        return $assign_data;
    }


    public function assign_form()
    {
        $id = Auth::user()->id;
        $chw_form = ChwAssign::where('user_id', $id)->get();
        return view('dashboard.chw_dashboard.assign.index', compact('chw_form'));
    }

    public function assign_show($form_id, $user_id, $id)
    {
        $chw_form = ChwAssign::where('user_id', $user_id)->where('form_id', $form_id)->get();
        $assign_user = FormSubmit::where('form_id', $form_id)->first();
        $form_submit_id = $assign_user->id;
        $assign_data = FormSubmitAnswer::where('form_submit_id', $form_submit_id)->get();

        Session::put('show_chw_form', request()->fullUrl());

        return view('dashboard.chw_dashboard.assign.show', compact('assign_user', 'assign_data', 'chw_form'));
    }

    public function add_task(Request  $request)
    {
        $tasks = new FormTask;
        $tasks->user_id          = $request->user_id;
        $tasks->assign_id        = $request->assign_id;
        $tasks->notes        = $request->notes;
        $tasks->follow_up_date        = $request->follow_up_date;
        $tasks->save();
        if (session(key: 'show_chw_form')) {
            return redirect(session(key: 'show_chw_form'))->with('success', 'You have successfully setup the tasks for the form');
        }
    }

    static function get_assign_data_detail($assign_id)
    {
        $assign_data_detail = FormTask::where('assign_id', $assign_id)->get();
        return $assign_data_detail;
    }
}
