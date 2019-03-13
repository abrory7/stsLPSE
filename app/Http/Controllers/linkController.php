<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Aduan;
use App\Kategori;

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

    public function insert(Request $req){
        // dd($req->all());
        $aduan = Aduan::create($req->all());
        return "sukses insert";
    }
}
