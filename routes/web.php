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

Auth::routes();
Route::get('/', function () {
    return view('index');
})->name('index')->middleware('auth');
Route::get('/home', 'HomeController@index')->name('home');

// Group prefix ini berhubungan dengan tiket e.g CRUD, track, status tiket
// contoh aksesnya localhost:8000/tiket/"create" <= sesuai dengan method
// https://laravel.com/docs/5.8/routing#route-group-prefixes
// Penamaan "name" pakai style camelCase.
Route::prefix('tiket')->group(function(){
    Route::get('create', 'linkController@create')->name('createTicket');
    Route::post('insert', 'linkController@insert')->name('insertTicket');
    Route::get('track', 'linkController@track')->name('trackTicket');
    Route::get('ongoing', 'linkController@ongoing')->name('ongoingTicket');
    Route::get('finish', 'linkController@finished')->name('finishedTicket');
    Route::post('delete', 'linkCOntroller@delete')->name('deleteTicket');
});