<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $fillable = [
        'id',
        'image',
        'title',
        'description',
        'features',
        'created_at',
    ];
}
