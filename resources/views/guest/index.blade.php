@section('title', 'LPSE Support Ticketing System')
@extends('guest.base')
@section('content')
<div class="card">
        <div class="card-block">
        <div class="container">
            <div class="row"><center><h2>LPSE Support Ticketing System</h2></center></div>
            <p>In order to streamline support requests and better serve you, we utilize a support ticket system. Every support request is assigned a unique ticket number which you can use to track the progress and responses online. For your reference we provide complete archives and history of all your support requests. A valid email address is required to submit a ticket.
            </p>
        
        </div>
        <center>
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                <h2>Buat Tiket Baru</h2>
                <a href="{{route('guestCreateTicket')}}" class="btn btn-success">Buat Tiket Baru</a>
                <p>Please provide as much detail as possible so we can best assist you. To update a previously submitted ticket, please login.</p>
                </div>
                <div class="col-sm-6">
                <h2>Cek Status Tiket</h2>
                <a href="#" class="btn btn-primary">Cek Status Tiket</a>
                <p>We provide archives and history of all your current and past support requests complete with responses.</p>
                </div>
            </div>
        </div>
        </center>

        </div>
    </div>    
@endsection