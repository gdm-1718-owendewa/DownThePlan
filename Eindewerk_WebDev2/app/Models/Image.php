<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'image';
    protected $fillable = [
        'product_id',
        'user_id',
        'filepath',
        'filename',
    ];
    //
    public function product(){
        return $this->hasOne('App\Models\Product');
    }
}
