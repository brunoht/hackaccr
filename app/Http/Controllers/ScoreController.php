<?php

namespace App\Http\Controllers;

use App\Models\Score;
use Illuminate\Http\Request;

class ScoreController extends ApiController
{
    public function __construct(Score $model)
    {
        $this->model = $model;
    }
}
