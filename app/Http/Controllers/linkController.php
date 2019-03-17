<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Aduan;
use App\Kategori;
use App\Ticket;
use App\StatusTicket;
use App\Solusi;
use App\Assign;
use App\Notif;
use Auth;

class linkController extends Controller
{
    // PAKAI TAB PLEASE

    public function ongoing()
    {
        $tickets = Ticket::where('finish', 0)->get();        
        return view('ticket.ongoing', compact('tickets'));
    }

    public function create()
    {
        $kategori = Kategori::all();
        return view('ticket.create', compact('kategori'));
    }

    public function track($nomor_ticket)
    {
        $ticket = Ticket::where('nomor_ticket', $nomor_ticket)->first();
        $ticket_status = StatusTicket::where('ticket_id', $ticket->id)->get();
        return view('ticket.track', compact('ticket_status'));
    }

    public function solution($id_aduan)
    {
        $ticket = Ticket::where('id', $id_aduan)->first();
        return view('ticket.solution', compact('ticket'));
    }

    public function finished()
    {
        $tickets = Ticket::where('finish', 1)->get();        
        return view('ticket.finished', compact('tickets'));
    }

    public function store(Request $req){

        // Insert aduan
        $aduan = new Aduan();
        $aduan->kategori_id = $req->kategori_id;
        $aduan->nama = $req->nama;
        $aduan->alamat = $req->alamat;
        $aduan->perusahaan = $req->perusahaan;
        $aduan->npwp = $req->npwp;
        $aduan->no_telp = $req->no_telp;
        $aduan->hp = $req->hp;
        $aduan->fax = $req->fax;
        $aduan->email = $req->email;
        $aduan->username_spse = $req->username_spse;
        $aduan->password_spse = $req->password_spse;
        $aduan->nama_lelang = $req->nama_lelang;
        $aduan->kode_lelang = $req->kode_lelang;
        $aduan->nama_satuan_kerja = $req->nama_satuan_kerja;
        $aduan->gambar = $req->gambar; // Belum dibuat type file
        $aduan->pesan = $req->pesan;
        $aduan->subjek = $req->subjek;
        $aduan->save();

        // Buat Ticket
        $ticket = new Ticket();
        $ticket->aduan_id = $aduan->id;
        $ticket->urgensi = $req->urgensi;
        $ticket->nomor_ticket = time();
        $ticket->expire = date('d-m-Y', strtotime(Date('d-m-Y'). ' + 2 days'));
        $ticket->save();

        //update status ticket
        // kode status : 1. Diterima Helpdesk; 2. apalah; 3. apalah;
        $statusTicket = new StatusTicket();
        $statusTicket->ticket_id = $ticket->id;
        $statusTicket->status = "1";
        $statusTicket->save();
        return redirect()->route('ongoingTicket');
    }

    public function solusi(Request $req){
        $solusi = new Solusi();
        $solusi->ticket_id =  $req->ticket_id;
        $solusi->users_id = Auth::user()->id;
        $solusi->solusi = $req->solusi;
        $solusi->save();
        return redirect()->route('ongoingTicket');
    }

    public function close(Request $req){        
        $closeticket = Ticket::find($req->nomor_ticket);
        $closeticket->finish = 1;
        
        $statusTicket = new StatusTicket();
        $statusTicket->ticket_id = $closeticket->id;
        $statusTicket->status = 5;
        $statusTicket->save();
        
        $closeticket->save();
        return redirect()->route('ongoingTicket');
    }

    public function assignTicket(Request $req){
        $assign = new Assign();
        $notif = new Notif();
        
        $assign->users_id = $req->assignTo;
        $assign->ticket_id = $req->ticket_id;

        $notif->ticket_id = $req->ticket_id;
        $notif->role = $req->assignTo;
        $notif->notif = 1;

        $notif->save();
        $assign->save();

        return redirect()->route('ongoingTicket');
    }
}
