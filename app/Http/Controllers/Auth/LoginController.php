<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use GuzzleHttp\Client;
use SimpleXMLElement;

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

    public function showLoginForm()
    {
        $login_url = config('app.url');
        $sso_url = "https://login.itb.ac.id/cas/login?service=$login_url/sso-login";
        return redirect($sso_url);
    }

    public function ssoLogin(Request $request)
    {
        if ($request->ticket) {
            if ($this->attemptLogin($request)) {
                return $this->sendLoginResponse($request);
            } else {
                $this->incrementLoginAttempts($request);
                return $this->sendFailedLoginResponse($request);
            }
        } else {
            return redirect('/login');
        }
    }

    protected function attemptLogin(Request $request)
    {
        $client = new Client(['base_uri' => 'https://login.itb.ac.id']);
        $response = $client->request('GET', '/cas/serviceValidate', [
            'query' => [
                'ticket' => $request->ticket,
                'service' => config('app.url') . '/sso-login'
            ]
        ]);

        if ($response->getStatusCode() == 200 && strpos($response->getBody(), 'authenticationFailure') === FALSE) {
            $res_xml_parsed = new SimpleXMLElement(str_ireplace('cas:', '', $response->getBody()));
            $sso_data = $res_xml_parsed->authenticationSuccess->attributes;

            $username = $res_xml_parsed->authenticationSuccess->user;
            $name = $sso_data->cn;
            $email = $sso_data->mail;
            $organization = $sso_data->ou;
            $itb_status = $sso_data->itbStatus;

            try {
                User::where('username', $username)->firstOrFail();
            } catch (\Throwable $th) {
                $this->create([
                    'name' => $name,
                    'email' => $email,
                    'username' => $username,
                    'organization' => $organization,
                    'itb_status' => $itb_status
                ]);
            }

            return $this->guard()->attempt(
                ['username' => $username, 'password' => ''],
                $request->filled('remember')
            );
        } else {
            return false;
        }
    }

    public function username()
    {
        return 'username';
    }

    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'username' => $data['username'],
            'organization' => $data['organization'],
            'itb_status' => $data['itb_status']
        ]);
    }
}
