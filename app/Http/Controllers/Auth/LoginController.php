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
    protected $redirectTo = RouteServiceProvider::USER;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
	protected function validateLogin(Request $request)
	{
		$request->validate([
			$this->username() => 'required|string',
			'password' => 'required|string',
			'g-recaptcha-response' => new \App\Rules\CheckCaptcha,
		]);
	}
	public function username()
	{
		$identity = request()->get('email');
		$fieldName = filter_var($identity, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
		request()->merge([$fieldName => $identity]);
		return $fieldName;
	}
}
