<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'category',
        'text',
        'name_pic',
        'comment',
        'slug',
        'keyword',
    ];

    public function getUrlAttribute(): string
    {
        return action('siteController@show_blog', [$this->id, $this->slug]);
    }

    public static $message = [
        'title.required' => 'لطفا فیلد عنوان را پر کنید.',
        'title.max' => 'عنوان شما نباید بیشتر از ۱۲۰ حرف باشد.',
        'slug.required' => 'فیلد خروجی سئو اجباری است.',
        'slug.unique' => 'این خروجی سئو قبلا در پایگاه داده ثبت شده است؛ آن را تغییر دهید.',
        'name_pic.required' => 'انتخاب تصویر شاخص اجباری است.',
        'name_pic.mimes' => 'فقط فایل های jpg , png قابل استفاده در تصویر شاخص است.',
    ];

    public static $createRules = [
        'title' => 'required|max:120',
        'slug' => 'required|unique:blogs',
        'name_pic' => 'required|mimes:jpeg,jpg,png',
    ];
    public static $createRulesUpdate = [
        'title' => 'required|max:120',
        'slug' => 'required',
        'name_pic' => 'mimes:jpeg,jpg,png',
    ];
    public function CalculationReadingTime($text)
    {
        $words_per_minute = 200;
        $word = count( explode(" ", strip_tags( $text ) ) );
        return ceil($word / $words_per_minute);
    }

}
