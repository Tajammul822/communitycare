<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;

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
}
