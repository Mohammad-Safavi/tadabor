<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class conn extends Model
{
    use HasFactory;
    protected $table = 'conns';
    public $timestamps = false;
    protected $fillable = [
        'user_id',
        'course_id',
        'create_at',
        'update_at',
    ];
}
