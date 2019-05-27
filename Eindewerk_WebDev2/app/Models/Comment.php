<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $table = 'comments';
    protected $fillable = [
        'product_id',
        'user_id',
        'user_name',
        'comment',
    ];
    public function product(){
        return $this->belongsTo('App\Models\Product');
    }
}
