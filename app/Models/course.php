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
        'slug' ,
        'keyword' ,
        'description',
        'name_pic'
    ];
}
