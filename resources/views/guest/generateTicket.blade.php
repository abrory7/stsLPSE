@section('title', 'Ticket')
@extends('guest.base')
@section('content')
<br>
<div class="container">
    <div class="card">
        <div class="card-block">
            <h4>Tiket anda telah dibuat </h4>
            Permintaan anda telah kami terima dan sedang diproses, nomor tiket permintaan anda adalah
            <br>               
            <h3><strong>{{$nomor}}</strong></h3>
            <br>            
            Simpan nomor tiket
            <br>
            Staf kami akan segera menangani aduan anda dalam 3 hari kerja. Anda dapat melakukan cek status tiket pada halaman<a href="{{route('guestIndexStatus')}}"> cek status tiket</a>
        </div>
    </div>
</div>


@endsection