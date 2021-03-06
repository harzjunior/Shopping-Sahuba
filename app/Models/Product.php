<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    //
    use SoftDeletes;

    protected $fillable=[
        'name','condition','negotiable','expiry_date','price_id','user_id','category_id','details'
    ];

    protected $dates = ['created_at', 'updated_at', 'expiry_date','deleted_at'];

    public function medias(){
        return $this->belongsToMany('App\Models\Media');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function price(){
        return $this->belongsTo('App\Models\Price');
    }

    public function product_link(){
        return '/product/'.str_slug($this->name,'-').'/'.$this->id;
    }
}
