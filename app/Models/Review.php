<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'review_item_id',        
        'place_id',        
        'user_id',
    ];
}
