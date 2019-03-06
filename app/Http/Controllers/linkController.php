<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class linkController extends Controller
{
  public function ongoing()
  {
      return view('ticket.ongoing');
  }
  public function createTicket()
  {
      return view('ticket.create');
  }

  public function trackTicket()
  {
      return view('ticket.track');
  }
}
