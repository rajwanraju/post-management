<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use Auth;

class AdminController extends Controller
{
    public function dashboard(){

    	  if(userRole(Auth::user()->id)=="admin"){
    	$posts = Post::all();
    	$var_2nd = Post::whereNull('editor_id')->get();
    	$var_3rd = Post::where('status',1)->get();
    	$var_4th = User::whereNotIn('id',[1])->get();
    }

       elseif(userRole(Auth::user()->id)=="editor"){
       	$posts = Post::where('editor_id',Auth::user()->id)->get();
    	$var_2nd = Post::where('editor_id',Auth::user()->id)->where('status',4)->get();
    	$var_3rd = Post::where('editor_id',Auth::user()->id)->where('status',1)->get();
    	$var_4th = Post::where('editor_id',Auth::user()->id)->where('status',3)->get();
       }
       elseif(userRole(Auth::user()->id)=="author"){
       	$posts = Post::where('user_id',Auth::user()->id)->get();
    	$var_2nd = Post::where('user_id',Auth::user()->id)->where('status',4)->get();
    	$var_3rd = Post::where('user_id',Auth::user()->id)->where('status',1)->get();
    	$var_4th = Post::where('user_id',Auth::user()->id)->where('status',3)->get();
       }

       else{

         return redirect('/');

       }
    	
        return view('backEnd.dashboard.index',compact('posts','var_2nd','var_3rd','var_4th'));
    }
}
