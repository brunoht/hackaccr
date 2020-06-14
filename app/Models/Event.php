<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'place_id',
        'media',
        'description',
        'url',
    ];
}
