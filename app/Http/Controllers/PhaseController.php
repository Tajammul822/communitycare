<?php

namespace App\Http\Controllers;

use App\Models\FormAction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class PhaseController extends Controller
{
    public function select_phase(Request $request)
    {
        $user_id = $request->user_id;
        $assign_id = $request->assign_id;

        Session::put('show_phase_add', request()->fullUrl());

        if ($request->phase_name == 1) {
            return view('dashboard.chw_dashboard.phase.phase1.index', compact('user_id', 'assign_id'));
        } else {
            return view('dashboard.chw_dashboard.phase.phase2.index', compact('user_id', 'assign_id'));
        }
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

        return redirect()->action([PhaseController::class, 'phase_one_actions'], ['assign_id' =>  $request->assign_id, 'user_id' => $request->user_id])
            ->with('success', 'You have successfully setup the actions for the submission');
    }

    public function phase_one_actions($assign_id, $user_id)
    {

        $one_actions = FormAction::where('assign_id', $assign_id)->where('user_id', $user_id)->where('phase', 1)->get();
        Session::put('show_phase_one', request()->fullUrl());

        return view('dashboard.chw_dashboard.phase.phase1.show', compact('one_actions'));
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

        return redirect()->action([PhaseController::class, 'phase_two_actions'], ['assign_id' =>  $request->assign_id, 'user_id' => $request->user_id])
            ->with('success', 'You have successfully setup the actions for the submission');
    }

    public function phase_two_actions($assign_id, $user_id)
    {

        $two_actions = FormAction::where('assign_id', $assign_id)->where('user_id', $user_id)->where('phase', 2)->get();
        Session::put('show_phase_two', request()->fullUrl());

        return view('dashboard.chw_dashboard.phase.phase2.show', compact('two_actions'));
    }
}
