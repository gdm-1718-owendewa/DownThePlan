<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table = 'product';
    protected $fillable = [
        'naam',
        'intro',
        'content',
        'category_id',
        'user_id',
        'goal',
        'deadline',
    ];
    public function images(){
        return $this->hasMany('App\Models\Image');
    }
    public function comments(){
        return $this->hasMany('App\Models\Comment');
    }
    public function category(){
        return $this->hasOne('App\Models\Category');
    }
}
