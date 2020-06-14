<?php

namespace App\Http\Controllers;

use App\Models\Route;
use Illuminate\Http\Request;

class RouteController extends ApiController
{
    public function __construct(Route $model)
    {
        $this->model = $model;
    }
}
