@section('title', 'Ticket')
@extends('guest.base')
@section('content')
<br>
<div class="container">
    <div class="card">
        <div class="card-block">
            <h4>Tiket anda telah dibuat.</h4>
            <h3><strong>{{$nomor}}</strong></h3>
        </div>
    </div>
</div>


@endsection