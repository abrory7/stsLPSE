<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\MessageSent;
use App\Aduan;
use App\Kategori;
use App\Ticket;
use App\StatusTicket;
use App\Solusi;
use App\Assign;
use App\Notif;
use App\Diskusi;
use App\Pesan;
use App\User;
use Auth;
use DateTime;
use DB;
use PDF;
use Carbon\Carbon;

class pimpinanController extends Controller
{
    public function daftarTiket(){
      $tickets = Ticket::orderBy('created_at', 'desc')->get();      
      return view('pimpinan.daftarTiket', compact('tickets'));
    }

    public function detailTiket($id_tiket){
      
      $ticket = Ticket::where('id', $id_tiket)->first();
      return view('pimpinan.detailTiket', compact('ticket'));
    }
}
