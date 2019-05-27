<?php $title = "Detail Tiket"; ?>
@extends('layout.base')
@section('content')


<div class="row">
    <div class="main-header">
        <h4>Detail Tiket #{{$ticket->nomor_ticket}}</h4>
    </div>
</div>
<div class="card">
    <div class="card-block">
    @php
        $assginedUser = $ticket->isAssigned == NULL ? 'Belum Ada' : $ticket->isAssigned->assignedUser->jabatan;
    @endphp
    <p>Ditugaskan Kepada : <b>{{$assginedUser}}</b></p>
    <table class="table table-borderless">
    <tbody>
        <tr>
            <th>Nama</td>
            <td>{{$ticket->aduan->nama}}</td>

            <th>Username SPSE</th>
            <td>{{$ticket->aduan->username_spse}}</td>
        </tr>
        <tr>
            <th>Alamat</th>
            <td>{{$ticket->aduan->alamat}}</td>

            <th>Password SPSE</th>
            <td>{{$ticket->aduan->password_spse}}</td>
        </tr>
        <tr>
            <th>Perusahaan</th>
            <td>{{$ticket->aduan->perusahaan}}</td>

            <th>Nama Lelang</th>
            <td>{{$ticket->aduan->nama_lelang}}</td>
        </tr>
        <tr>
            <th>NPWP</th>
            <td>{{$ticket->aduan->npwp}}</td>

            <th>Kode Lelang</th>
            <td>{{$ticket->aduan->kode_lelang}}</td>
        </tr>
        <tr>
            <th>No Telp</th>
            <td>{{$ticket->aduan->no_telp}}</td>

            <th>Nama Satuan Kerja</th>
            <td>{{$ticket->aduan->nama_satuan_kerja}}</td>
        </tr>
        <tr>
            <th>HP</th>
            <td>{{$ticket->aduan->hp}}</td>

            <th>Pesan</th>
            <td>{{$ticket->aduan->pesan}}</td>
        </tr>
        <tr>
            <th>Fax</th>
            <td>{{$ticket->aduan->fax}}</td>

            <th>Subjek</th>
            <td>{{$ticket->aduan->subjek}}</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>{{$ticket->aduan->email}}</td>

            <th>Lampiran</th>
            <?php $gambar = explode(',', $ticket->aduan->gambar); ?>
            <td>
              @foreach($gambar as $key => $gmbr)
              <a href="{{ url('/gambar/'.$gmbr) }}" target="_blank" class="btn btn-default"><i class="icon-picture"></i> Gambar {{$key+1}}</a>
              @endforeach
            </td>
        </tr>
        <tr>
            <th></th>
            <td></td>

            <th>Kategori Permasalahan</th>
            <td>{{$ticket->aduan->kategori->kategori}}</td>
        </tr>
    </tbody>

</table>
    </div>
</div>

@endsection
