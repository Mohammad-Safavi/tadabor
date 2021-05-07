<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class setting extends Model
{
    use HasFactory;
    protected $fillable = [
        'name' ,
        'keyword' ,
        'description',
    ];

    public static $message = [
        'name.required'=> 'لطفا فیلد نام را پر کنید.',
        'name.max'=> 'فیلد نام نمی تواند بیشتر از ۳۰ حرف باشد.',
        'description'=> 'لطفا فیلد توضیحات را پر کنید.',
    ];

    public static $createRules = [
        'name' => 'required|max:30',
        'description' => 'required',
    ];
}
