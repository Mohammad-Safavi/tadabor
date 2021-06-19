<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class file extends Model
{
    use HasFactory;
    protected $table = 'files';
    protected $fillable = [
        'name',
        'description',
        'file',
        'from_where',
        ];
}
