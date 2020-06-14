<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    protected $fillable = [
        'user_id',
        'local',
        'parent_route_id',
    ];
}
