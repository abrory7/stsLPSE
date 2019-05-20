<?php $title = "Buat Tiket Laporan"; ?>
@extends('layout.base')
@section('content')
<div class="row">
    <div class="main-header">
        <h4>Buat Tiket Laporan</h4>
    </div>
</div>
<div class="card">
  <div class="card-block">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="row">
      <form action="{{route('storeTicket')}}" method="POST" enctype="multipart/form-data">
      {{ csrf_field() }}
        <div class="form-group">
          <label for="nama">Nama</label>
          <input id="nama" name="nama" type="text" class="form-control">
        </div>
        <div class="form-group">
          <label for="alamat">Alamat</label>
          <input id="alamat" name="alamat" type="text" class="form-control">
        </div>
        <div class="form-group">
          <label for="perusahaan">Perusahaan</label>
          <input id="perusahaan" name="perusahaan" type="text" class="form-control">
        </div>
        <div class="form-group">
          <label for="npwp">NPWP</label>
          <input id="npwp" name="npwp" type="text" class="form-control" placeholder="Contoh: 99.999.999.9-999.999">
        </div>
        <div class="form-group">
          <label for="no_telp">No. Telpon</label>
          <input id="no_telp" name="no_telp" type="text" class="form-control">
        </div>
        <div class="form-group">
          <label for="hp">No. HP</label>
          <input id="hp" name="hp" type="text" class="form-control">
        </div>
        <div class="form-group">
          <label for="fax">No. Fax</label>
          <input id="fax" name="fax" type="text" class="form-control">
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input id="email" name="email" type="email" class="form-control" placeholder="Contoh: nama@contoh.com">
        </div>
        <div class="form-group">
          <label for="username_spse">Username SPSE</label>
          <input id="username_spse" name="username_spse" type="text" class="form-control">
        </div>
        <div class="form-group">
          <label for="password_spse">Password SPSE</label>
          <input id="password_spse" name="password_spse" type="text" class="form-control">
        </div>
        <div class="form-group">
          <label for="nama_lelang">Nama Lelang</label>
          <input id="nama_lelang" name="nama_lelang" type="text" class="form-control">
        </div>
        <div class="form-group">
          <label for="kode_lelang">Kode Lelang</label>
          <input id="kode_lelang" name="kode_lelang" type="text" class="form-control">
        </div>
        <div class="form-group">
          <label for="nama_satuan_kerja">Nama Satuan Kerja</label>
          <input id="nama_satuan_kerja" name="nama_satuan_kerja" type="text" class="form-control">
        </div>
        <div class="form-group">
          <label for="subjek">Subjek</label>
          <input id="subjek" name="subjek" type="text" class="form-control">
        </div>
        <div class="form-group">
          <label for="pesan">Pesan</label>
          <textarea id="pesan" class="form-control" rows="5" name="pesan"> </textarea>
        </div>
        <div class="form-group">
          <label for="gambar">Lampiran Gambar atau Screenshot</label>
          <input type="file" id="gambar" name="gambar" class="form-control" accept="image/*">
        </div>
        <div class="form-group">
          <label>Kategori Masalah</label>
          <select name="kategori_id" class="form-control">
            @foreach($kategori as $kategori)
              <option value="{{$kategori->id}}">{{$kategori->kategori}}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="exampleFormControlInput1">Urgensi</label>
          <select name="urgensi" class="form-control">
            <option value="Normal">Normal</option>
            <option value="Penting">Penting</option>
            <option value="Darurat">Darurat</option>
          </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>
</div>
@stop
@section('AddScript')
<script type="text/javascript">
    function actnav() {
      var element = document.getElementById("create");
      element.classList.add("active");
    }
</script>
@stop
