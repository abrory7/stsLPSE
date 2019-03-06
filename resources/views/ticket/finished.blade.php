@extends('layout.base')
@section('content')
<div class="row">
    <div class="main-header">
        <h4>Tiket Selesai</h4>
    </div>
</div>
<div class="card">
    <div class="card-block">
        <div class="row">
            <div class="col-sm-12 table-responsive">
                <sup>Klik no. tiket untuk melacak tiket</sup>
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>No. Tiket</th>
                        <th>Urgensi</th>
                        <th>Judul Laporan</th>
                        <th>Kategori</th>
                        <th>Dibuat Pada</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>1</td>
                        <td><a href="{{ route('trackTicket') }}" data-toggle="tooltip" data-trigger="hover" data-placement="top" title="Lacak Tiket Ini"><u>9999</u></a></td>
                        <td class="bg-danger">Darurat</td>
                        <td>Lupa Password</td>
                        <td>Akun</td>
                        <td>5 Maret 2018</td>
                    </tr>
                    <tr>
                      <td>2</td>
                      <td><a href="{{ route('trackTicket') }}" data-toggle="tooltip" data-trigger="hover" data-placement="top" title="Lacak Tiket Ini"><u>999</u></a></td>
                      <td class="bg-warning">Penting</td>
                      <td>Lupa Password</td>
                      <td>Akun</td>
                      <td>5 Maret 2018</td>
                    </tr>
                    <tr>
                      <td>3</td>
                      <td><a href="{{ route('trackTicket') }}" data-toggle="tooltip" data-trigger="hover" data-placement="top" title="Lacak Tiket Ini"><u>999</u></a></td>
                      <td class="bg-primary">Sedang</td>
                      <td>Lupa Password</td>
                      <td>Akun</td>
                      <td>5 Maret 2018</td>
                    </tr>
                    <tr>
                      <td>4</td>
                      <td><a href="{{ route('trackTicket') }}" data-toggle="tooltip" data-trigger="hover" data-placement="top" title="Lacak Tiket Ini"><u>999</u></a></td>
                      <td>Normal</td>
                      <td>Lupa Password</td>
                      <td>Akun</td>
                      <td>5 Maret 2018</td>
                    </tr>
                    <tr>
                      <td>5</td>
                      <td><a href="{{ route('trackTicket') }}" data-toggle="tooltip" data-trigger="hover" data-placement="top" title="Lacak Tiket Ini"><u>999</u></a></td>
                      <td>Normal</td>
                      <td>Lupa Password</td>
                      <td>Akun</td>
                      <td>5 Maret 2018</td>
                    </tr>
                    <tr>
                      <td>6</td>
                      <td><a href="{{ route('trackTicket') }}" data-toggle="tooltip" data-trigger="hover" data-placement="top" title="Lacak Tiket Ini"><u>999</u></a></td>
                      <td>Normal</td>
                      <td>Lupa Password</td>
                      <td>Akun</td>
                      <td>5 Maret 2018</td>
                    </tr>
                    <tr>
                      <td>7</td>
                      <td><a href="{{ route('trackTicket') }}" data-toggle="tooltip" data-trigger="hover" data-placement="top" title="Lacak Tiket Ini"><u>999</u></a></td>
                      <td>Normal</td>
                      <td>Lupa Password</td>
                      <td>Akun</td>
                      <td>5 Maret 2018</td>
                    </tr>
                    <tr>
                      <td>8</td>
                      <td><a href="{{ route('trackTicket') }}" data-toggle="tooltip" data-trigger="hover" data-placement="top" title="Lacak Tiket Ini"><u>999</u></a></td>
                      <td>Normal</td>
                      <td>Lupa Password</td>
                      <td>Akun</td>
                      <td>5 Maret 2018</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop
