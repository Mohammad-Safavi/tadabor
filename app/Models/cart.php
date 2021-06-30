<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
    use HasFactory;
    protected $primaryKey = "id_cart";
    protected $table = 'cart';
    protected $fillable = [
        'user_id',
        'course_id',
    ];
}
