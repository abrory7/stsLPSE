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

use App\Ticket;
use Carbon\Carbon;

Auth::routes();
Route::get('/', function () {

    $allTicket = Ticket::where('finish', 0)->get();        
        foreach($allTicket as $ticket){            
            if(date('Y-m-d H:i:s', strtotime($ticket->expire)) <= Carbon::now()){
                $ticket = Ticket::where('id', $ticket->id)->update([
                    'finish' => 2,
                ]);
            }
        }

    return view('index');

})->name('index')->middleware('auth');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/tes', 'linkController@chart');

// Group prefix ini berhubungan dengan tiket e.g CRUD, track, status tiket
// contoh aksesnya localhost:8000/tiket/"create" <= sesuai dengan method
// https://laravel.com/docs/5.8/routing#route-group-prefixes
// Penamaan "name" pakai style camelCase.



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
    Route::post('store', 'linkController@store')->name('storeTicket');
    Route::get('track/{nomor_ticket}', 'linkController@track')->name('trackTicket');
    Route::get('ongoing', 'linkController@ongoing')->name('ongoingTicket');
    Route::get('finish', 'linkController@finished')->name('finishedTicket');
    Route::post('delete', 'linkController@delete')->name('deleteTicket');
    Route::get('solution/{id_aduan}', 'linkController@solution')->name('solutionTicket');
    Route::post('addsolusi', 'linkController@solusi')->name('addSolution');
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
