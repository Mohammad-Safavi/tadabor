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
        'phone',
        'text'
    ];

    public static $message = [
        'name.required' => 'لطفا فیلد نام را پر کنید.',
        'phone.required' => 'لطفا فیلد شماره تلفن را پر کنید.',
        'text.required' => 'لطفا فیلد متن پیام را پر کنید.',
        'captcha.required' => 'فیلد کپچا اجباری است.',
        'captcha.captcha' => 'کد کپچا نادرست است.',
    ];

    public static $createRules = [
        'captcha' => 'required|captcha',
        'name' => 'required',
        'phone' => 'required',
        'text' => 'required',
    ];

}
