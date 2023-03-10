<?php

namespace App\Http\Controllers;

use App\Models\ChwAssign;
use App\Models\FormSubmitAnswer;
use App\Models\FormSubmit;
use App\Models\User;
use App\Models\Form;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\FormAssignChw;
use Illuminate\Support\Facades\Auth;
use PDF;

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
        $user_id = $request->user_id;
        $chw_lists = new ChwAssign;
        $chw_lists->user_id          = $request->user_id;
        $chw_lists->form_id          = $form_id;
        $chw_data = User::where('id', $user_id)->first();
        $email = $chw_data->email;
        $name = $chw_data->first_name;
        $form_data = Form::where('id', $form_id)->first();
        $slug = $form_data->slug;
        $title = $form_data->title;
        $form_link = env("APP_URL") . '/form/' . $slug;

        $sender_name = Auth::User()->first_name;
        $sender_email = Auth::User()->email;

        $data = ([
            'name' => $name,
            'title' => $title,
            'receiver_email' => $email,
            'sender_name' => $sender_name,
            'sender_email' => $sender_email,
            'form_link' => $form_link
        ]);

        if ($chw_lists->save()) {
            $send = Mail::to($email)->send(new FormAssignChw($data));
            return redirect()->route('admin/submitted-form')->with('success', 'You have successfully assigned this assesment form to a CHW user!');
        } else {
            return redirect()->route('admin/submitted-form')->with('error', 'Sorry, Something went wrong');
        };
    }

    public function export_csv()
    {

        $fileName = 'admin_forms.csv';
        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );
        $columns = array('User Name', 'Email', 'Phone', 'Zip Code', 'Submit Date');
        $assign = FormSubmit::all();


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

        $pdf_data = FormSubmit::all();;

        $data = [
            'title' => 'Form submitted user details',
            'date' => date('m/d/Y'),
            'pdf_data' => $pdf_data
        ];

        $pdf = PDF::loadView('dashboard.submit.pdf', $data);

        return $pdf->download('admin_forms.pdf');
    }
}
