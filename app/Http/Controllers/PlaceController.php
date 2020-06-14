<?php

namespace App\Http\Controllers;

use App\Models\Place;
use Illuminate\Http\Request;

class PlaceController extends ApiController
{
    public function __construct(Place $model)
    {
        $this->model = $model;
    }
}
