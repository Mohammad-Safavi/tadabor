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

    ];

    public static $createRules = [

        'name' => 'required',
        'last_name' => 'required',
        'phone' => 'required',
    ];

}
