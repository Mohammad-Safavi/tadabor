<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'comment',
        'blog_id',
        'blog_title',
    ];
    public static $message = [
        'name.required' => 'فیلد نام اجباری است.',
        'comment.required' => 'فیلد دیدگاه اجباری است.',
        'captcha.required' => 'فیلد کپچا اجباری است.',
        'captcha.captcha' => 'کد کپچا نادرست است.',
        ];

    public static $createRules = [
        'captcha' => 'required',
        'name' => 'required',
        'comment' => 'required',
    ];
}
