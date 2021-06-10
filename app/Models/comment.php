<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'last_name',
        'comment',
        'blog_id',
        'blog_title',
    ];
    public static $message = [
        'name.required' => 'فیلد نام اجباری است.',
        'last_name.required' => 'فیلد نام خانوادگی اجباری است.',
        'comment.required' => 'فیلد متن اجباری است.',
        'captcha.required' => 'فیلد کپچا اجباری است.',
        'captcha.captcha' => 'کد کپچا نادرست است.',
        ];

    public static $createRules = [
        'captcha' => 'required',
        'name' => 'required',
        'last_name' => 'required',
        'comment' => 'required',
    ];
}
