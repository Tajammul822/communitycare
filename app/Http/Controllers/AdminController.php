<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{

    public function change_password(Request $request)
    {
        $id = Auth::user()->id;

        $validator = Validator::make($request->all(), [
            'old_password' => [
                'required', function ($attribute, $value, $fail) {
                    if (!Hash::check($value, Auth::user()->password)) {
                        return $fail(__('The current password is incorrect'));
                    }
                },
                'min:8',
                'max:30'
            ],
            'new_password' => 'required|min:8|max:30',
            'confirm_password' => 'required|same:new_password'
        ], [
            'old_password.required' => 'Enter your current password',
            'old_password.min' => 'Old password must have atleast 8 characters',
            'old_password.max' => 'Old password must not be greater than 30 characters',
            'new_password.required' => 'Enter new password',
            'new_password.min' => 'New password must have atleast 8 characters',
            'new_password.max' => 'New password must not be greater than 30 characters',
            'confirm_password.required' => 'ReEnter your new password',
            'confirm_password.same' => 'New password and Confirm new password must match'
        ]);


        if (!$validator->passes()) {

            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        } else {
            $update = User::find(Auth::user()->id)->update(['password' => Hash::make($request->new_password)]);

            if (!$update) {
                return redirect()->route('/user/profile/{id}', ['id' => $id])->with('error', 'Sorry, Something went wrong');
            } else {
                return redirect()->route('/user/profile/{id}', ['id' => $id])->with('success', 'You have successfully changed the Password!');
            }
        }
    }

    public function change_picture(Request $request)
    {

        $id = Auth::user()->id;
        $path = 'assets/images/profile/admin/';
        $file = $request->file('picture');
        $new_name = 'UIMG_' . date('Ymd') . uniqid() . '.jpg';
        //Upload new image
        $upload = $file->move(public_path($path), $new_name);
        if (!$upload) {
            return response()->json(['status' => 0, 'msg' => 'Something went wrong, upload new picture failed.']);
        } else {
            //Get Old picture
            $oldPicture = User::find(Auth::user()->id)->getAttributes()['picture'];

            if ($oldPicture != '') {
                if (\File::exists(public_path($path . $oldPicture))) {
                    \File::delete(public_path($path . $oldPicture));
                }
            }
            //Update DB
            $update = User::find(Auth::user()->id)->update(['picture' => $new_name]);

            if (!$upload) {
                return redirect()->route('/user/profile/{id}', ['id' => $id])->with('error', 'Sorry, Something went wrong');
            } else {
                return redirect()->route('/user/profile/{id}', ['id' => $id])->with('success', 'You have successfully updated the Image!');
            }
        }
    }

    public function update_details(Request $request)
    {
        $id  = Auth::user()->id;
        $user                   = User::find($id);
        $user->first_name            = $request->first_name;
        $user->last_name           = $request->last_name;
        $user->email        = $request->email;

        if ($user->save()) {

            return redirect()->route('/user/profile/{id}', ['id' => $id])->with('success', 'You have successfully updated the details!');
            //return redirect()->back()->with('user', $user);
        } else {
            return redirect()->route('/user/profile/{id}', ['id' => $id])->with('error', 'Sorry, Something went wrong');
        }
    }

    public function update_info(Request $request)
    {
        $id  = Auth::user()->id;
        $user                   = User::find($id);
        $user->address            = $request->address;
        $user->phone           = $request->phone;
        $user->zip_code        = $request->zip_code;
        $user->access_level        = $request->access_level;

        if ($user->save()) {

            return redirect()->route('/user/profile/{id}', ['id' => $id])->with('success', 'You have successfully updated the info!');
            //return redirect()->back()->with('user', $user);
        } else {
            return redirect()->route('/user/profile/{id}', ['id' => $id])->with('error', 'Sorry, Something went wrong');
        }
    }
}
