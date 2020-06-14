<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends ApiController
{
    public function __construct(User $user)
    {
        $this->model = $user;
    }
}
