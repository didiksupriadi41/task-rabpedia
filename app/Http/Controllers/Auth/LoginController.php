<?php

namespace App\Http\Controllers\Auth;

<<<<<<< HEAD
use Illuminate\Http\Request;
=======
>>>>>>> develop
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
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

    public function showLoginForm(Request $request)
    {
        if (
            method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request)
        ) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if ($request->ticket) {
            if ($this->attemptLogin($request)) {
                return $this->sendLoginResponse($request);
                // return view('auth.login', ['ticket' => $request->ticket]);
            }
            $this->incrementLoginAttempts($request);
            return $this->sendFailedLoginResponse($request);
        } else {
            $login_url = config('app.url');
            $sso_url = "https://login.itb.ac.id/cas/login?service=$login_url/login";
            return redirect($sso_url);
        }
    }

    protected function attemptLogin(Request $request)
    {
        #TODO: Check ticket
        return true;
    }
}
