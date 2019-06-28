<?php

namespace App;
use App\Post;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $fillable = [
        'post_id',
        'date',
        'quantity_new'
         ];
    public function  post(){
        return $this->belongsTo(Post::class);
    }


}
