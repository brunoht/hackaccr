<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends ApiController
{
    public function __construct(Review $model)
    {
        $this->model = $model;
    }
}
