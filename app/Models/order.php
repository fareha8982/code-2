<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    protected $fillable= [
        'user_name',
        'book_name',
        'user_address',
        'user_phone',
        'payment_method',
        'payment_status',
    ];


    public function user(){
        return $this->belongsTo(User::class);
    }

    public function bookmodel(){
        return $this->belongsTo(Book::class);
    }

}
