<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;
    protected $fillable = ['title' , 'of'];
    public static $message = [
        'title.required' => 'لطفا فیلد را پر کنید.',
        'title.max' => 'عنوان شما نباید بیشتر از ۶۰ حرف باشد.',
    ];

    public static $createRules = [
        'title' => 'required|max:60',
    ];
}
