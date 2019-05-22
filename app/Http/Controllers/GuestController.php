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
use App\Diskusi;
use App\Pesan;
use App\User;
use Auth;
use DateTime;
use DB;
use PDF;
use Carbon\Carbon;

class GuestController extends Controller
{

    public function index(){
        return view('guest.index');
    }

    public function baru(){
        $kategori = Kategori::all();
        return view('guest.newTicket', compact('kategori'));
    }

    public function success($nomor_ticket){
        $nomor = $nomor_ticket;
        return view('guest.generateTicket', compact('nomor'));
    }

    public function status(){
        return view('guest.cekStatus');
    }

    public function cekStatus(Request $req){

        $ticket = Ticket::where('nomor_ticket', $req->nomor_ticket)->first();
        $ticket_status = StatusTicket::where('ticket_id', $ticket->id)->get();
        $diskusiticket = Diskusi::where('ticket_id', $ticket->id)->first();
        $diskusi = Pesan::where('diskusi_id', $diskusiticket->id)->get();
        $solusi = Solusi::where('ticket_id', $ticket->id)->first();

        return view('guest.trackTicket', compact('ticket_status', 'diskusi', 'ticket', 'diskusiticket', 'solusi'));
    }

    public function create(Request $req){
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

        if(!empty($req->gambar)){
          for($i = 0; $i < count($req->gambar); $i++){
            $gambar[$i] = $req->gambar[$i];
            $ext[$i] = $gambar[$i]->getClientOriginalExtension();
            $newName[$i] = 'gmbr'.Carbon::parse(Carbon::now())->format('d-m-Y His').' '.(1+$i).'.'.$ext[$i];
            $gambar[$i]->move('gambar',$newName[$i]);
            $arrgambar[] = $newName[$i];
          }
          $aduan->gambar = implode(',', $arrgambar);
        }
        else{

        }

        $aduan->pesan = $req->pesan;
        $aduan->subjek = $req->subjek;
        $validation = $req->validate([
            'nama' => 'required',
            'alamat' => 'required|min:10',
            'perusahaan' => 'required|min:10',
            'npwp' => 'required|max:20',
            'hp' => 'required|max:15',
            'email' => 'required|email',
            'subjek' => 'required|min:10',
            'pesan' => 'required|min:10',
            'gambar.*' => 'image|max:5120',
        ]);
        $aduan->save();

        // Buat Ticket
        $ticket = new Ticket();
        $ticket->isGuest = 1;
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


        //select helpdesk
        $helpdesk = User::where('role', 1)->first();

        //Assign Helpdesk
        $assign = new Assign();
        $assign->users_id = $helpdesk->id;
        $assign->ticket_id = $ticket->id;
        $assign->save();

        //Buat diskusi baru
        $diskusi = new Diskusi();
        $diskusi->ticket_id = $ticket->id;
        $diskusi->member = 1; // Assign helpdesk ke diskusi
        $diskusi->save();

        $newTicket = $ticket->nomor_ticket;

        return redirect()->route('guestSuccess', compact('newTicket'));
    }

    public function sendChat(Request $req){
        $diskusi = Diskusi::where('id', $req->diskusi_id)->first();
        $pesan = new Pesan();

        $pesan->diskusi_id = $diskusi->id;
        $pesan->pesan = $req->pesan;
        $pesan->member = $req->member;

        $pesan->save();

        event(new MessageSent($pesan->pesan, $pesan->diskusi_id, $pesan->member, $pesan->created_at, $req->sender));

        $data = [
            "message" => "success tersimpan"
        ];
        return $data;
    }
}
