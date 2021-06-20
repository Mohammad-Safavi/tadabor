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
    public function getUrlAttribute(): string
    {
        return action('siteController@show_course', [$this->id, $this->slug]);
    }
}
