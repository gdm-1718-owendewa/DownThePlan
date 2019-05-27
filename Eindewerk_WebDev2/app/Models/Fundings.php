<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fundings extends Model
{
    //
    protected $table = 'fundings';
    protected $fillable = [
        'amount',
        'product_id',
        'user_id',
        'user_name',
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
