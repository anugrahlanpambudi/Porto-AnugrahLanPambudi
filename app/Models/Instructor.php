<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    protected $fillable = [
        'name',
        'socialmedia',
        'photo',
        'major',
        'sosmed_urls'
    ];
    protected $casts = [
        'socialmedia' => 'array', // Laravel otomatis akan menangani data ini sebagai array atau JSON
        'sosmed_urls' => 'array', // Laravel otomatis akan menangani data ini sebagai array atau JSON
    ];
}
