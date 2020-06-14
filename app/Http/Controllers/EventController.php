<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends ApiController
{
    public function __construct(Event $model)
    {
        $this->model = $model;
    }
}
