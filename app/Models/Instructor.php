<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    protected $fillable = [
        'name',
        'socialmedia',
        'photo',
        'major'
    ];
    protected $casts = [
        'socialmedia' => 'array', // Laravel otomatis akan menangani data ini sebagai array atau JSON
    ];
}
