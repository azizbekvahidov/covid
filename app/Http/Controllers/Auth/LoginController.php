<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\SendMessage;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

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
    protected $redirectTo = '/admin';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $this->validateLogin($request);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.

        if (method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }
//        $this->authenticate($request);

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);
        return $this->sendFailedLoginResponse($request);
    }


    public function username()
    {
        return 'phone';
    }

    public function logout(Request $request)
    {
        $lang = app()->getLocale();
        $this->guard()->logout();

        $request->session()->invalidate();

        session(["locale" => $lang]);

        return $this->loggedOut($request) ?: redirect('/');
    }


    public function resetPassword(Request $request) {

        $message_text = null;
        $trim_phone_number = str_replace("(", "", str_replace(")", "", str_replace("-", "", $request->phone)));
        $phone_num = "998".$trim_phone_number;

        $password_str = Str::random(8);
        User::where("phone", $phone_num)->update([
            "password"  => bcrypt($password_str),
        ]);
        if (app()->getLocale() == "uz") {
            $message_text = "Sizni yangi parolingiz: ".$password_str;
        }
        elseif (app()->getLocale() == "ru") {
            $message_text = "Ваш новый пароль: ".$password_str;
        }
        $send = new SendMessage();
        $send->sendSMS($phone_num, $message_text);

        return response()->json(["status" => 1]);
    }

    public function changePassword(Request $request) {
        dd($request);
    }
}
