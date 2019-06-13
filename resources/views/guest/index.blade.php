@section('title', 'LPSE Support Ticketing System')
@extends('guest.base')
@section('content')
<div class="card">
        <div class="card-block">
        <div class="container">
            <div class="row"><center><h2>LPSE Support Ticketing System</h2></center></div>
            <p>
            Untuk melayani anda dengan lebih baik, 
            kami menggunakan support ticket system (sistem tiket dukungan). 
            Setiap permintaan dukungan diberikan nomor tiket unik 
            yang dapat anda gunakan untuk melacak kemajuan dari aduan anda secara online. 
            Untuk referensi Anda, kami menyediakan arsip lengkap dan riwayat semua permintaan dukungan Anda. 
            Diperlukan alamat email yang valid untuk mengirimkan tiket.
            </p>        
        </div>
        <center>
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                <h2>Buat Tiket Baru</h2>
                <a href="{{route('guestCreateTicket')}}" class="btn btn-success">Buat Tiket Baru</a>
                <p>Tolong jelaskan aduan anda sedetil mungkin agar kami dapat membantu anda. </p>
                </div>
                <div class="col-sm-6">
                <h2>Cek Status Tiket</h2>
                <a href="{{route('guestIndexStatus')}}" class="btn btn-primary">Cek Status Tiket</a>
                <p>Untuk dapat melihat perkembangan aduan anda, masukan nomor tiket yang telah dibuat di halaman cek status tiket </p>
                </div>
            </div>
        </div>
        </center>

        </div>
    </div>    
@endsection