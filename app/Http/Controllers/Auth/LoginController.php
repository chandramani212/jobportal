<?php

namespace App\Http\Controllers\Auth;

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


    /**
     * If the redirect path needs custom generation logic you may define a redirectTo method instead of a redirectTo property:
     *
     * @return String path of url
     */
    
    // protected function redirectTo()
    // {
    //     return '/path';
    // }
    
    
    /**
     * by default, Laravel uses the email field for authentication. 
     * If you would like to customize this, you may define a username method on your LoginController
     * @return string column name for authentication
     */
    // public function username()
    // {
    //     return 'username';
    // }
    
    /**
     * You may also customize the "guard" that is used to authenticate and register users. 
     * To get started, define a guard method on your LoginController, RegisterController, 
     * and ResetPasswordController. The method should return a guard instance:
     *
     * use Illuminate\Support\Facades\Auth;
     *
     * @return guard
     */
    // protected function guard()
    // {
    //     return Auth::guard('guard-name');
    // }

}
