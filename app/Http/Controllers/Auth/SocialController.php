<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Socialite;

class SocialController extends Controller
{

	/**
     * Handle Social Login
     * 
     * @param $social
     * @return Redirect to specific Social login page
     */
    public function socialLogin($social)
    {
       return Socialite::driver($social)->redirect();
    }


    /**
    * Obtain the user information from Social Logged in.
    * @param $social
    * @return Response
    */
 
   	public function socialLoginCallback($social)
   	{
        $userSocial = Socialite::driver($social)->user();
        $user = User::where(['email' => $userSocial->getEmail()])->first();
        if($user){
            Auth::login($user);
            return redirect()->action('HomeController@index');
        }else{
            return view('auth.register',['name' => $userSocial->getName(), 'email' => $userSocial->getEmail()]);
        }
    }

}
