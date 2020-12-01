<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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

    //set the remember me cookie to 12 hour
    protected function sendLoginResponse(Request $request)
    {
        if(isset($request->remember)){
            $customCookieInMinutes = 720;
            $rememberMeCookie = \Auth::getRecallerName();
            $cookieJar = $this->guard()->getCookieJar();
            $cookieValue = $cookieJar->queued($rememberMeCookie)->getValue();
            $cookieJar->queue($rememberMeCookie, $cookieValue, $customCookieInMinutes);
        }

        $request->session()->regenerate();

        $this->clearLoginAttempts($request);

        if ($response = $this->authenticated($request, $this->guard()->user())) {
            return $response;
        }

        return $request->wantsJson()
                    ? new JsonResponse([], 204)
                    : redirect()->intended($this->redirectPath());
    }

    // change the redirect route after logged out
    public function loggedOut(Request $request)
    {
        return redirect('/home');
    }
}
