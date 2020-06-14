<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReviewItem extends Model
{
    protected $fillable = [
        'name',
        'description',
        'type',
        'review_category_id',
        'icon',
    ];
}
