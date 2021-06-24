<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class conn extends Model
{
    use HasFactory;
    protected $table = 'conn';
    protected $fillable = [
        'user_id',
        'course_id',
    ];
}
