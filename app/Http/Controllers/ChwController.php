<?php

namespace App\Http\Controllers;

use App\Mail\AdminChwEmail;
use App\Mail\FeedbackChw;
use App\Models\ChwAssign;
use App\Models\FormSubmit;
use App\Models\FormSubmitAnswer;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\FormTask;
use Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use PDF;

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
        $app_link = env("APP_URL") . '/login';
        $sender_email = Auth::User()->email;

        $chw_data = ([
            'logo' => 'http://3.144.233.206/assets/images/default-monochrome.svg',
            'name' => $user->first_name,
            'password' => $request->password,
            'receiver_email' => $user->email,
            'sender_email' => $sender_email,
            'app_link' => $app_link
        ]);


        if ($user->save()) {
            $send = Mail::to($user->email)->send(new AdminChwEmail($chw_data));
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

        $email = $request->email;
        $name = $request->first_name;

        $sender_name = Auth::User()->first_name;
        $sender_email = Auth::User()->email;
        $data = ([
            'notes' => $request->notes,
            'follow_up_date' => $request->follow_up_date,
            'name' => $name,
            'receiver_email' => $email,
            'sender_name' => $sender_name,
            'sender_email' => $sender_email
        ]);

        $tasks->save();
        $send = Mail::to($email)->send(new FeedbackChw($data));
        if (session(key: 'show_chw_form')) {
            return redirect(session(key: 'show_chw_form'))->with('success', 'You have successfully setup the tasks for the form');
        }
    }

    static function get_assign_data_detail($assign_id)
    {
        $assign_data_detail = FormTask::where('assign_id', $assign_id)->get();
        return $assign_data_detail;
    }

    public function export_csv()
    {

        $fileName = 'chw_forms.csv';
        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );
        $columns = array('User Name', 'Email', 'Phone', 'Zip Code', 'Submit Date');
        $user_id = Auth::user()->id;
        $assign = DB::table('chw_assigns as c')
            ->leftJoin('form_submit as f', 'c.form_id', '=', 'f.form_id')
            ->select('f.first_name AS first_name', 'f.last_name as last_name', 'f.email as email', 'f.phone as phone', 'f.zip_code as zip_code', 'f.created_at as created_at')
            ->where('user_id', $user_id)->get();


        $callback = function () use ($assign, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);
            foreach ($assign as $user_details) {
                $row['User Name']    = $user_details->first_name . ' ' . $user_details->last_name;
                $row['Email']    = $user_details->email;
                $row['Phone']    = $user_details->phone;
                $row['Zip Code']    = $user_details->zip_code;
                $row['Submit Date']  = $user_details->created_at;
                fputcsv($file, array($row['User Name'], $row['Email'], $row['Phone'], $row['Zip Code'], $row['Submit Date']));
            }
            fclose($file);
        };
        return response()->stream($callback, 200, $headers);
    }

    public function export_pdf()
    {
        $user_id = Auth::user()->id;
        $pdf_data = DB::table('chw_assigns as c')
            ->leftJoin('form_submit as f', 'c.form_id', '=', 'f.form_id')
            ->select('f.first_name AS first_name', 'f.last_name as last_name', 'f.email as email', 'f.phone as phone', 'f.zip_code as zip_code', 'f.created_at as created_at')
            ->where('user_id', $user_id)->get();

        $data = [
            'title' => 'Details of CHW assigned assessment forms user details',
            'date' => date('m/d/Y'),
            'pdf_data' => $pdf_data
        ];

        $pdf = PDF::loadView('dashboard.chw_dashboard.pdf', $data);

        return $pdf->download('chw_forms.pdf');
    }
}
