<?php

namespace App\Http\Controllers;

use App\Helpers\ValidationRules;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(User::class, 'user');
    }

    public function users()
    {
        $users = User::paginate(25);

        return view('user-table',compact('users'));
    }
    public function add(){

        return view('create');
    
       }
       public function add_user(Request  $request){

        // $request->validate(ValidationRules::storeUser());
    
            $user = User::create($request->only([
                'name', 'email', 'password'
            ]));
        
    
        if ($user->save()) {
    
             return redirect('user')->with('success', 'Saved User successfully');
            //return redirect()->back()->with('user', $user);
            
        } else {
            return redirect()->back()->with('error', 'Failed to save');
        }
    
    
       }

       public function edit($id){

        $data['data']=User::Find($id);
        return view('user_edit', $data);
    
    
       }

       public function edit_user(Request  $request){


        $user                   = User::find($request->id);
        $user-> name            = $request->name;
        $user-> email           = $request->email;
        $user-> password        = $request->password;
    
        if ($user->save()) {
    
            return redirect('user')->with('success', 'Data saved successfully');
            //return redirect()->back()->with('user', $user);
        } else {
            return redirect()->back()->with('error', 'Failed to save');
        }
    
    
       }
       public function delete($id){
        
    
        User::where("id",$id)->delete();
        
        return redirect()->back()->with('error', 'succefully deleted Subscriber');
    
       }
}
