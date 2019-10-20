<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;

class UserController extends Controller
{
    public function index(){

    	$users = User::all();
    	return view('backEnd.user.index',compact('users'));
    }

    public function  userRegister(){
    	$roles = \App\Role::all();
    	return view('backEnd.user.create',compact('roles'));
    }

    public function registerUser(Request $request){

 		$request->validate([
           'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role_id' => ['required'],
        ]);

        $role = Role::where('id',$request->role_id)->first();

    	 $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        $user->roles()->attach($role);

        return redirect('users')->with('success','User Added');
    }
}
