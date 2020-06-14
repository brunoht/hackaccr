<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventSchedule extends Model
{
    protected $fillable = [
        'event_id',
        'date_start',
        'time_start',
        'date_end',
        'time_end',
    ];
}
