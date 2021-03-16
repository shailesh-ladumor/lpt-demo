<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Grosv\LaravelPasswordlessLogin\LoginUrl;
use App\Mail\UserLoginMail;
use Illuminate\Support\Facades\Mail;
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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    function sendLoginLink(Request $request)
    {
        $email = $request->get('email');
        $user = User::where('email', '=', $email)->first();

        if(empty($user)){
            return back();
        }
        $generator = new LoginUrl($user);
        $data['url'] = $generator->generate();
        $data['user'] = $user;

        Mail::to($user->email)->send(new UserLoginMail($data));
        
        return back();
    }
}
