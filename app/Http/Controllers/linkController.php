<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class linkController extends Controller
{
  public function ongoing()
  {
      return view('ticket.ongoing');
  }
  public function create()
  {
      return view('ticket.create');
  }

  public function track()
  {
      return view('ticket.track');
  }
  public function finished()
  {
      return view('ticket.finished');
  }
}
