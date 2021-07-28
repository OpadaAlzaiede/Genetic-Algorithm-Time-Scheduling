<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class userdata extends Controller
{
  public function index ($user)
  {
    dd(User::find($user));

  }
}
