<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class discount extends Model
{
    use HasFactory;
    protected $table = 'discount';
    protected $fillable = ['code' , 'value'];
    public static $message = [
        'code.required' => 'لطفا فیلد کد را پر کنید.',
        'value.required' => 'لطفا فیلد مقدار را پر کنید.',
        'value.integer' => 'در فیلد مقدار فقط عدد وارد کنید. (عدد لاتین)',
        'value.max' => 'مقدار شما نباید بیشتر از ۹۹ باشد.',
        'value.min' => 'مقدار شما نباید کمتر از ۱ باشد.',
    ];

    public static $createRules = [
        'code' => 'required',
        'value' => 'required|integer|max:99|min:1',
       
    ];
}
