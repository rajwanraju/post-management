<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    protected function authenticated(Request $request, $user)
    {

        $auth_user = $request->user();
        $roles = $auth_user->roles()->get();
  
        $user_role = $roles[0]->slug;
        // dd($user_role);
         if($user->hasRole('admin')){
            return redirect('/'.$user_role.'/Dashboard');
        }
        else if($user->hasRole('author')){
            return redirect('/'.$user_role.'/Dashboard');
        }
        else if($user->hasRole('editor')){
            return redirect('/'.$user_role.'/Dashboard');
        }
        else if($user->hasRole('user')){
            return redirect()->back();
        }

        else{
            return redirect('/');
        }
    }

    use AuthenticatesUsers;



    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
