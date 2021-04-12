<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class blog extends Model
{
    use HasFactory;
    protected $fillable = ['title','category' , 'text' , 'name_pic','slug'];
    public function getUrlAttribute(): string
    {
        return action('BlogController@show', [$this->id, $this->slug]);
    }

}
