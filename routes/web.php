<?php


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

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
use Carbon\Carbon;

Auth::routes();
Route::get('/', function () {
    if(Auth::user()->role == 3){
        // DASHBOARD UNTUK PIMPINAN
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

      //total tiket belum selesai
      $totalunfinish = count(Ticket::where('finish', 0)->get());
      //total tiket selesai
      $totalfinish = count(Ticket::where('finish', 1)->get());
      //total tiket selesai minggu ini
      $totalweek = Ticket::whereBetween('updated_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()] )
                          ->where('finish', 1)
                          ->count();
      //total tiket selesai tahun ini
      $totalyear = Ticket::whereBetween('updated_at', [Carbon::now()->startOfYear(), Carbon::now()->endOfYear()] )
                          ->where('finish', 1)
                          ->count();

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
      $avgFirstResponseTime = count($assignedTicketTotal) > 0 ? (int) floor($TotalResponseTime/count($assignedTicketTotal)) : 0;

      return view('index', compact('cat', 'countcat', 'dates', 'monthlyData', 'urg', 'arrurg', 'urgtotal', 'totalunfinish', 'totalfinish', 'totalweek', 'totalyear', 'solvers', 'avgFirstResponseTime'));

    }else{
        //DASHBOARD UNTUK VERIFIKATOR, ADMIN SISTEM, HELPDESK, ADMIN PPE.
        $allTicket = Ticket::where('finish', 0)->get();
            foreach($allTicket as $ticket){
                if(date('Y-m-d H:i:s', strtotime($ticket->expire)) <= Carbon::now()){
                    $ticket = Ticket::where('id', $ticket->id)->update([
                        'finish' => 2,
                    ]);
                }
            }
        $recent = Assign::where('users_id', Auth::user()->id)->take(5)->latest()->get();
        $darurat = Ticket::where('finish', 0)->where('urgensi', 'Darurat')->get();
        $received = Assign::where('users_id', Auth::user()->id)->get();
        $weekly = Ticket::where('finish', 1)->whereBetween('updated_at',
                [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->get();
        $monthly = Ticket::where('finish', 1)->whereBetween('updated_at',
                [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])->get();
        $yearly = Ticket::where('finish', 1)->whereBetween('updated_at',
                [Carbon::now()->startOfYear(), Carbon::now()->endOfYear()])->get();


        return view('index', compact('allTicket', 'recent', 'darurat', 'weekly', 'monthly', 'yearly', 'received'));
    }
})->name('index')->middleware('auth');
Route::get('/tes', 'linkController@chart');

// Group prefix ini berhubungan dengan tiket e.g CRUD, track, status tiket
// contoh aksesnya localhost:8000/tiket/"create" <= sesuai dengan method
// https://laravel.com/docs/5.8/routing#route-group-prefixes
// Penamaan "name" pakai style camelCase.

Route::get('daftar-tiket', 'pimpinanController@daftarTiket')->name('daftarTiketPimpinan');
Route::get('detail-tiket/{id_tiket}', 'pimpinanController@detailTiket')->name('detailTiketPimpinan');

Route::prefix('guest')->group(function(){
    Route::get('/', 'guestController@index')->name('guestNewTicket');
    Route::get('tiket-baru', 'guestController@baru')->name('guestCreateTicket');
    Route::post('tiket-baru', 'guestController@create')->name('guestCreateTicket');
    Route::get('success/{nomor}', 'guestController@success')->name('guestSuccess');
    Route::get('cek-status', 'guestController@status')->name('guestIndexStatus');
    Route::post('status/', 'guestController@cekStatus')->name('guestCheckStatus');
    Route::get('status/{nomor_ticket}', 'guestController@viewStatus')->name('guestViewStatus');
    Route::post('status/chat', 'guestController@sendChat')->name('guestSendChat');
});

Route::prefix('tiket')->group(function(){
    Route::get('create', 'linkController@create')->name('createTicket');
    Route::get('edit/{id}', 'linkController@edit')->name('editTicket');
    Route::post('store', 'linkController@store')->name('storeTicket');
    Route::put('edit/update/{idaduan}', 'linkController@editAduan')->name('updateTicket');
    Route::get('track/{nomor_ticket}', 'linkController@track')->name('trackTicket');
    Route::get('ongoing', 'linkController@ongoing')->name('ongoingTicket');
    Route::get('finish', 'linkController@finished')->name('finishedTicket');
    Route::post('delete', 'linkController@delete')->name('deleteTicket');
    Route::get('solution/{id_aduan}', 'linkController@solution')->name('solutionTicket');
    Route::post('addsolusi/{tiket_id}', 'linkController@solusi')->name('addSolution');
    Route::post('close', 'linkController@close')->name('closeTicket');
    Route::post('assignTicket', 'linkController@assignTicket')->name('assignTicket');
    Route::get('received', 'linkController@received')->name('receivedTicket');
    Route::get('received/diskusi/{id_ticket}', 'linkController@discuss')->name('discussTicket');
    Route::get('received/diskusi/detail/{id_ticket}', 'linkController@detailTicket')->name('detailTicket');
    Route::put('received/diskusi/invite/{id_diskusi}', 'linkController@inviteDiscuss')->name('inviteMember');
    Route::post('received/diskusi/sendMessage', 'linkController@sendChat')->name('sendChat');
    Route::get('diskusi/selesai/{id_ticket}', 'linkController@discussFinished')->name('finishedDiscussion');
    Route::get('report/{id_ticket}', 'linkController@reportDiscussion');
    Route::get('reportstats', 'linkController@stats');
    Route::POST('print/', 'linkController@print')->name('printTicket');
    Route::post('destroy', 'linkController@destroy')->name('destroyTicket');
    Route::get('detail/{id}', 'linkController@detailTicketOngoing')->name('detailTicketOngoing');
});

Route::get('/test', function(){
    $date = Ticket::where('id', 1)->first()->created_at->format('d-m-Y');
    $result = date('d-m-Y');
    //date('d-m-Y', strtotime($date. ' + 2 days'));
    return $result;
});


Route::get('/a', function(){
    $password = Hash::make('password');
    return $password;
});
