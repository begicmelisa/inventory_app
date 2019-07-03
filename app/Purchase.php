<?php

namespace App;
use App\Post;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{

    protected $fillable = [
        'quantity_new',
        'post_id',
        'user_id',
        'barcode',
        'price',
        'postTitle',
        'postUser',
        'purchase_id'
    ];

    public  function post(){
        return $this->belongsTo(Post::class);
    }

    public  function user(){
        return $this->belongsTo(User::class);
    }
}
