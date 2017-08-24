<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use App\http\Requests\RegisterRequest;
use App\http\Requests\LoginRequest;
use Auth;

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

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }


    public function getRegister(){
        return view('auth.register');
    }

    public function postRegister(RegisterRequest $request){
        //dd($request);
        $thanhvien = new User;
        $thanhvien->name = $request->name;
        $thanhvien->email = $request->email;
        $thanhvien->address = $request->address;
        $thanhvien->password =bcrypt($request->password);
        $thanhvien->remember_token = $request->_token;
        $thanhvien->phone = $request->phone;
        $thanhvien->birthday = $request->birthday;
        $thanhvien->check = 1;
        $thanhvien->save();
        return redirect('');

    }
 
    public function getLogin (){
        return view('auth.login');
    }

    public function postLogin (LoginRequest $request){
        $auth = array(
                'email' => $request->email,
                'password' => $request->password,
                'check' => 1
            );
        if (Auth::attempt($auth)){
            return redirect('authentication/home');
                    }else{
            echo "fail";
        }
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
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    // protected function create(array $data)
    // {
    //     return User::create([
    //         'name' => $data['name'],
    //         'email' => $data['email'],
    //         'phone' => $data['phone'],
    //         'birthday' => $data['birthday'],
    //         'address' => $data['address'],
    //         //'token' => $data['token'],
    //         //'check' => $data['check'],
    //         'password' => bcrypt($data['password']),
    //     ]);
    // }
}
