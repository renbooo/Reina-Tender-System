<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use App\Http\Requests;
use Session;
use Hash;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    //use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
            ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            ]);
    }

    /**
     * Get Login Page
     * Redirects if already logged in
     * @return view
     */
    public function getLogin()
    {
        if (Session::has('_user')) {
            return redirect('/');
        }

        return view('auth.auth.login');
    }

    /**
     * Handles submitting login form
     * @param  Request $request
     * @return redirect
     */
    public function postLogin(Request $request)
    {
        $validator = Validator::make($request->input(),
            [
            'email' => 'required',
            'password' => 'required'
            ]
            );
        if ($validator->fails()) {
            return redirect('/')->withErrors($validator->messages())->withInput();
        }
        $email = $request->input('email');
        $password = $request->input('password');
        $user = User::where(['email' => $email])->first();
        if (!$user || ! Hash::check($password,$user->password)) {
            return redirect('/')->withErrors('Invalid Login Credentials')->withInput();
        }
        Session::put('_user',$email);
        return redirect('/beranda_lelang');
    }

    /**
     * Logouts the user
     * @return redirect
     */
    public function getLogout()
    {
        Session::flush();

        return redirect('/');
    }

    /**
     * Get Register Page
     * @return view
     */
    public function getRegister()
    {
        if (Session::has('_user')) {
            return redirect('/beranda_lelang');
        }

        return view('auth.auth.register');
    }

    public function postRegister(Request $request)
    {
        $validator = validator::make($request->input(),
            [
            'email' => 'required|unique:users',
            'password' => 'required'
            ]
            );
        if ($validator->fails()) {
            return redirect('/auth/register')->withErrors($validator->errors())->withInput();
        }

        User::create(['email' => $request->input('email'), 'password' => Hash::make($request->input('password'))]);
        Session::put('_user',$request->input('email'));
        return redirect('/');
    }

}
