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

class linkController extends Controller
{
    // PAKAI TAB PLEASE

    public function ongoing()
    {
        $tickets = Ticket::where('finish', 0)->get();
        return view('ticket.ongoing', compact('tickets'));
    }

    public function received()
    {
        if(Auth::user()->role == 1){
            $receives = Assign::all();
        }else{
            $receives = Assign::where('users_id', Auth::user()->id)->get();
        }
        return view('ticket.received', compact('receives'));
    }
    public function discuss($id_ticket)
    {
        $diskusiticket = Diskusi::where('ticket_id', $id_ticket)->first();
        $tickets = Ticket::where('id', $id_ticket)->first();
        if(StatusTicket::where('ticket_id', $id_ticket)->where('status', 3)->first() == NULL){
            StatusTicket::create([
                'ticket_id' => $id_ticket,
                'status' => 3
            ]);
        }
        $listmember = explode(',', $diskusiticket->member);
        $diskusi = Pesan::where('diskusi_id', $diskusiticket->id)->get();
        $member = User::whereNotIn('id', $listmember)->get();
        $chatAble = True;
        return view('ticket.discuss', compact('diskusiticket', 'listmember', 'diskusi', 'member', 'chatAble', 'tickets'));

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
        $statusTicket->status = 4;
        $statusTicket->save();

        $closeticket->save();
        return redirect()->route('ongoingTicket');
    }

    public function assignTicket(Request $req){
        $assign = new Assign();
        $notif = new Notif();
        $diskusi = new Diskusi();
        $pesansistem = new Pesan();
        $statusTicket = new StatusTicket();

        // store table "Assign"
        $assign->users_id = $req->assignTo;
        $assign->ticket_id = $req->ticket_id;
        $assign->save();

        // buat "status ticket"
        $statusTicket->ticket_id = $req->ticket_id;
        $statusTicket->status = "2";
        $statusTicket->save();

        // tambah notif
        $notif->ticket_id = $req->ticket_id;
        $notif->role = $req->assignTo;
        $notif->notif = 1;
        $notif->save();


        $assignedUser = User::where('id', $req->assignTo)->first();
        $diskusi->ticket_id = $req->ticket_id;
        $diskusi->member = ($assignedUser->role == 1 ? '1' : '1,'.$assignedUser->role);   // Check jika yg di assign bukan member
        $diskusi->save();

        $diskusi_id = Diskusi::where('ticket_id', $req->ticket_id)->first();
        $pesansistem->diskusi_id = $diskusi_id->id;
        $pesansistem->member = 1;
        $pesansistem->pesan = '(SISTEM) Tiket #'.$req->nomor_ticket.' telah diarahkan kepada '.$assignedUser->name.' @'.$assignedUser->jabatan .' untuk selanjutnya dapat ditindaklanjuti.';
        $pesansistem->save();

        return redirect()->route('ongoingTicket');
    }


    public function inviteDiscuss(Request $req, $id_diskusi){
        $invite = Diskusi::find($id_diskusi);
        $oldmembers = $invite->member;
        $invite->member = $oldmembers.','.$req->member;

        $invite->save();

        return redirect()->route('discussTicket', $id_diskusi);
    }

    public function discussFinished($id_ticket){
        $diskusiticket = Diskusi::where('ticket_id', $id_ticket)->first();
        $tickets = Ticket::where('id', $id_ticket)->first();
        if(StatusTicket::where('ticket_id', $id_ticket)->where('status', 3)->first() == NULL){
            StatusTicket::create([
                'ticket_id' => $id_ticket,
                'status' => 3
            ]);
        }
        $listmember = explode(',', $diskusiticket->member);
        $diskusi = Pesan::where('diskusi_id', $diskusiticket->id)->get();
        $member = User::whereNotIn('id', $listmember)->get();
        return view('ticket.finishedDiscussion', compact('tickets', 'diskusiticket', 'listmember', 'diskusi', 'member', 'chatAble'));
    }

    public function sendChat(Request $req){
        $diskusi = Diskusi::where('id', $req->diskusi_id)->first();
        $pesan = new Pesan();

        $pesan->diskusi_id = $diskusi->id;
        $pesan->pesan = $req->pesan;
        $pesan->member = $req->member;

        $pesan->save();

        event(new MessageSent($pesan->pesan, $pesan->diskusi_id, $pesan->member, $pesan->created_at));
        $data = [
            "message" => "success tersimpan"
        ];
        return $data;
    }
    public function chart(){
      //total data perkategori
      $cat = Aduan::distinct()->get(['kategori_id']);
      $cat1 = Aduan::pluck('kategori_id')->unique()->toArray(); //menghitung total data perkategori
      $countcat = []; //menghitung total data perkategori
      foreach($cat1 as $kategori_id){
        $countcat[$kategori_id] = count(Aduan::where('kategori_id', '=', $kategori_id)->get());//menghitung total data perkategori
      }

      //total data perbulan
      $month = Ticket::pluck('created_at')->toArray();
      $dates = array_unique(array_map(function($date) {
          return DateTime::createFromFormat('Y-m-d H:i:s', $date)->format('F');
      }, $month));
      $monthlyData =  Ticket::Select([DB::raw("DATE_FORMAT(created_at, '%Y-%m') AS 'date'"),
                      DB::raw("COUNT(id) AS 'count'"),
                      ])
                      ->groupBy('date')
                      ->orderBy('date', 'ASC')
                      ->where('finish', '=', '1')
                      ->get();

      //total tiket belum selesai perurgensi
      $urg = Ticket::distinct()->where('finish', 0)->get(['urgensi']);
      $darurattotal = count(Ticket::where('finish', 0)->where('urgensi', 'Darurat')->get());
      $pentingtotal = count(Ticket::where('finish', 0)->where('urgensi', 'Penting')->get());
      $normaltotal = count(Ticket::where('finish', 0)->where('urgensi', 'Normal')->get());
      $arrurg = [$darurattotal, $pentingtotal, $normaltotal];
      $urgtotal = array_sum($arrurg);

      //total tiket selesai
      $totalfinish = count(Ticket::where('finish', 1)->get());

      //Penyelesai tiket
      $assignedUser = Assign::all();
      $solvers = [];
      foreach($assignedUser as $user){
        if($user->assignedTicket->finish == 1){            
           $solvers[$user->assignedUser->jabatan][] = $user->assignedUser->name;
        }
      }        
      
      //Average First Response Time
      $assignedTicketTotal = Assign::all();
      $TotalResponseTime = 0;
      foreach($assignedTicketTotal as $ticket){                    
        $selisih = Carbon::createFromFormat('Y-m-d H:s:i', $ticket->created_at)->diffInMinutes($ticket->assignedTicket->created_at); 
        $TotalResponseTime += $selisih;
      }
      $avgFirstResponseTime = (int) floor($TotalResponseTime/count($assignedTicketTotal));      

      return view('test', compact('cat', 'countcat', 'dates', 'monthlyData', 'urg', 'arrurg', 'urgtotal', 'totalfinish' ,'solvers', 'avgFirstResponseTime'));
    }

    public function print(Request $req){
        $diskusiticket = Diskusi::where('ticket_id', $req->ticket)->first();
        $tickets = Ticket::where('id', $req->ticket)->first();
        $listmember = explode(',', $diskusiticket->member);
        $diskusi = Pesan::where('diskusi_id', $diskusiticket->id)->get();
        $member = User::whereNotIn('id', $listmember)->get();
        return view('ticket.report', compact('tickets', 'diskusiticket', 'listmember', 'diskusi', 'member'));
    }
}
