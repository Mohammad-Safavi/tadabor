<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class item extends Model
{
    use HasFactory;
    protected $fillable = [
        'title' ,
        'url' ,
        'open_page'
    ];

    public static $message = [
            'title.required' => 'فیلد عنوان اجباری است.',
    ];

    public static $createRules = [
            'title' => 'required',
    ];

}
