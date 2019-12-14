<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use App\User;

use Auth;
use Socialite;

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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    
    public function redirectToProvider()
    {
        
        return Socialite::driver('github')->redirect();
        
    }
    
    public function handleProviderCallback()
    {
        $github_user = Socialite::driver('github')->user();
        
        $user = $this->userFindOrCreate($github_user);
        
        Auth::login($user, true);
        
        return redirect($this->redirectTo);

        // $user->token;
        //dd($user);
    }
    
    public function userFindOrCreate($github_user){
        $user = User::where('provider_id', $github_user->id)->first();
        
        if(!$user)
        {
            $user = new User;
            $user->name = $github_user->getNickname();
            $user->email = $github_user->getEmail();
            $user->provider_id = $github_user->getId();
            $user->save();
        }
        return $user;
    }
}
