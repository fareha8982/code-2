<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class bookmodel extends Model
{
    protected $fillable = 
    [
        
        'name',
        'desciption',
        'price',
        'image',
        'pdf',
        'author'

    ];
}
