<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class message extends Model
{
    use HasFactory;
    protected $fillable = [
        'navbar_name' ,
        'name' ,
        'last_name',
        'phone',
        'text'
    ];

    public static $message = [
        'name.required' => 'لطفا فیلد نام را پر کنید.',
        'last_name.required' => 'لطفا فیلد نام خانوادگی را پر کنید.',
        'phone.required' => 'لطفا فیلد شماره تلفن را پر کنید.',
        'g-recaptcha-response.required' => 'فیلد کپچا اجباری است.',
        'g-recaptcha-response.captcha' => 'مشکل در کپچا! لطفا بار دیگری امتحان کنید.',
    ];

    public static $createRules = [
        'g-recaptcha-response' => 'required|captcha',
        'name' => 'required',
        'last_name' => 'required',
        'phone' => 'required',
    ];

}
