<?php

namespace App\Http\Controllers;

use App\Helpers\ValidationRules;
use App\Models\User;
use Illuminate\Http\Request;
use Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(User::class, 'user');
    }

    public function users()
    {
        $users = User::paginate(25);

        return view('dashboard.users.index', compact('users'));
    }
    public function new_user(Request  $request)
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
            return redirect()->route('user')->with('success', 'You have successfully added a user!');
        } else {
            return redirect()->route('user')->with('error', 'Sorry, Something went wrong');
        }
    }

    public function change($id)
    {
        $data['data'] = User::Find($id);
        return view('dashboard.users.edit', $data);
    }

    public function alter(Request  $request)
    {
        // echo $request->last_name;
        // exit;
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
            return redirect()->route('user')->with('success', 'You have successfully updated the details!');
        } else {
            return redirect()->route('user')->with('error', 'Sorry, Something went wrong');
        }
    }

    public function delete($id)
    {
        User::where("id", $id)->delete();
        return redirect()->route('user')->with('success', 'You have successfully deleted the User!');
    }

    public function profile($id)
    {
        $data['data'] = User::Find($id);
        return view('dashboard.profile.index', $data);
    }
}
