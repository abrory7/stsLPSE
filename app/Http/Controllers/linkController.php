<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Aduan;
use App\Kategori;
use App\Ticket;
use App\StatusTicket;

class linkController extends Controller
{
    // PAKAI TAB PLEASE    
    
    public function ongoing()
    {
        return view('ticket.ongoing');
    }

    public function create()
    {   
        $kategori = Kategori::all();
        return view('ticket.create', compact('kategori'));
    }

    public function track()
    {
        return view('ticket.track');
    }

    public function finished()
    {
        return view('ticket.finished');
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
        $ticket->nomor_ticket = time();
        $ticket->save();

        //update status ticket 
        // kode status : 1. Diterima Helpdesk; 2. apalah; 3. apalah;
        $statusTicket = new StatusTicket();
        $statusTicket->ticket_id = $ticket->id;
        $statusTicket->status = "1";
        $statusTicket->save();
        return redirect()->route('home');
    }
}
