<?php

namespace App;
use App\Purchase;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Sale;

class Post extends Model
{

    use SoftDeletes;

    protected $fillable = [
        'title',
        'content',
        'category_id',
        'author',
        'featured',
        'price',
        'purchasePrice',
        'barcode',
        'quantity',
   ];

    public function tags(){
        return $this->belongsToMany('App\Tag');
    }

    public function getFeaturedAttribute($featured){
        return asset($featured);
    }

    protected $dates=['deleted_at'];

    public function  category(){
        return $this->belongsTo('App\Category');
    }

    public  function purchase() {
        return $this->hasMany(Purchase::class);
    }


    public  function sales() {
        return $this->hasMany(Sale::class);
    }



}
