<?php

namespace App\Http\Controllers;

use App\Models\FormAction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Models\ChwAssign;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class PhaseController extends Controller
{



    public function phase(Request $request)
    {

        $id = Auth::user()->id;
        $chw_users = User::where('access_level', 2)->get();
        $chw_form = ChwAssign::where('user_id', $id)->get();

        return view('dashboard.chw_dashboard.phase.index', compact('chw_users', 'chw_form'));
    }

    public function show_phase_content($user_id, $assign_id)
    {
        $one_actions = FormAction::where('assign_id', $assign_id)->where('user_id', $user_id)->where('phase', 1)->get();
        $two_actions = FormAction::where('assign_id', $assign_id)->where('user_id', $user_id)->where('phase', 2)->get();

        $first_engage = DB::table('form_tasks')->select('first_engage')->where('assign_id', $assign_id)->where('user_id', $user_id)->get();

        return view('dashboard.chw_dashboard.phase.show', compact('one_actions', 'two_actions', 'first_engage'));
    }


    public function add_phase_one(Request $request)
    {

        $actions = new FormAction();
        $actions->user_id          = $request->user_id;
        $actions->assign_id          = $request->assign_id;
        $actions->phase          = '1';
        $actions->important_date          = $request->important_date;
        $actions->contact_next          = $request->contact_next;

        $actions->save();

        return redirect()->action([PhaseController::class, 'show_phase_content'], ['assign_id' =>  $request->assign_id, 'user_id' => $request->user_id])
            ->with('success', 'You have successfully setup the actions for the submission in phase I');
    }

    public function add_phase_two(Request $request)
    {

        $actions = new FormAction();
        $actions->user_id          = $request->user_id;
        $actions->assign_id          = $request->assign_id;
        $actions->phase          = '2';
        $actions->important_date          = $request->important_date;
        $actions->contact_next          = $request->contact_next;

        $actions->save();

        return redirect()->action([PhaseController::class, 'show_phase_content'], ['assign_id' =>  $request->assign_id, 'user_id' => $request->user_id])
            ->with('success', 'You have successfully setup the actions for the submission in phase II');
    }
}
