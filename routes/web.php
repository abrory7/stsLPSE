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

Route::get('/', function () {
    return view('index');
})->name('index');
Route::get('ongoing', 'linkController@ongoing')->name('ongoing');
Route::get('buat_tiket', 'linkController@create')->name('createTicket');
Route::get('track', 'linkController@track')->name('trackTicket');
Route::get('tiket_selesai', 'linkController@finished')->name('finishedTicket');
Route::get('test', function(){
    $stats = DB::table('status_ticket')->where('ticket_id', 1)->first();
    $status_arr = explode(",", $stats->status);

    return view('test', compact('status_arr'));
});