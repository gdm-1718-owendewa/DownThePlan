<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Spotlight extends Model
{
    //
    protected $table = 'spotlight';

    protected $fillable = [
        'product_id',
        'imagePath',
        'imageName',
    ];
}
