<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = [
        'quantity_new',
        'post_id',
        'user_id',
        'barcode',
        'price',
        'postTitle',
        'postUser'
    ];


    public  function post(){
        return $this->belongsTo(Post::class);
    }

    public  function user(){
        return $this->belongsTo(User::class);
    }
}
