<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class file extends Model
{
    use HasFactory;
    protected $table = 'files';
    protected $guarded = array();
    protected $fillable = [
        'name',
        '_token',
        'description',
        'file',
        'type',
        'time',
        'price',
        'from_where',
        ];
}
