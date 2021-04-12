<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Auth;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/panel/manage/user';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

            $this->middleware('auth');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $messages=[
            'name.required'=> 'نوشتن نام اجباری است.',
            'name.max'=> 'نام شما نباید بیشتر از ۲۰ حرف باشد.',
            'username.required'=> 'نوشتن نام کاربری اجباری است.',
            'username.unique'=> 'این نام کاربری قبلا ثبت شده است.',
            'username.max'=> 'نام کاربری شما نباید بیشتر از ۳۰ حرف باشد.',
            'password.required'=> 'فیلد رمز عبور اجباری است.',
            'password.min'=> 'رمز عبور شما باید بیشتر از ۸ کاراکتر باشد.',
            'password.confirmed'=> 'رمز عبور همخوانی ندارد.',
        ];
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ],$messages);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'username' => $data['username'],
            'type' => $data['type'],
            'password' => Hash::make($data['password']),
        ]);

    }
}
