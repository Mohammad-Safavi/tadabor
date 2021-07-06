<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class course extends Model
{
    use HasFactory;
    protected $fillable = [
        'title' ,
        'price' ,
        'category',
        'status' ,
        'teacher',
        'up',
        'slug' ,
        'keyword' ,
        'description',
        'name_pic'
    ];
    public static $message = [
        'title.required' => 'لطفا فیلد عنوان را پر کنید.',
        'title.max' => 'عنوان شما نباید بیشتر از ۷۰ حرف باشد.',
        'slug.required' => 'فیلد خروجی سئو اجباری است.',
        'slug.unique' => 'این خروجی سئو قبلا در پایگاه داده ثبت شده است؛ آن را تغییر دهید.',
        'price.required' => 'فیلد قیمت اجباری است.',
        'price.integer' => 'در فیلد قیمت عدد وارد کنید.(اعداد لاتین)',
        'teacher.required' => 'لطفا فیلد مدرس را پر کنید.',
        'teacher.max' => 'نام مدرس نباید بیشتر از ۷۰ حرف باشد.',
        'description.required' => 'فیلد توضیحات اجباری است.',
        'name_pic.required' => 'انتخاب تصویر شاخص اجباری است.',
        'name_pic.mimes' => 'فقط فایل های jpg , png قابل استفاده در تصویر شاخص است.',
    ];

    public static $createRules = [
        'title' => 'required|max:70',
        'slug' => 'required|unique:blogs',
        'price' => 'required|integer',
        'status' => 'required',
        'teacher' => 'required|max:70',
        'description' => 'required',
        'name_pic' => 'required|mimes:jpeg,jpg,png',
    ];
    public static $createRulesUpdate = [
        'title' => 'required|max:70',
        'slug' => 'required|unique:blogs',
        'price' => 'required|integer',
        'status' => 'required',
        'teacher' => 'required|max:70',
        'description' => 'required',
    ];
    public function getUrlAttribute(): string
    {
        return action('siteController@show_course', [$this->id, $this->slug]);
    }
}
