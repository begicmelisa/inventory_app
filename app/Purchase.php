<?php

namespace App;
use App\Post;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{

    protected $fillable = [
        'name',
        'quantity_new',
        'post_id',
        'barcode',
        'price'
    ];

    public  function post(){
        return $this->belongsTo(Post::class);
    }
}
