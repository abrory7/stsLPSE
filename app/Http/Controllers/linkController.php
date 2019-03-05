<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class linkController extends Controller
{
  public function ongoing()
  {
      return view('ongoing');
  }
}
