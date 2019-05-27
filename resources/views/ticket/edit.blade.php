<?php $title = "Edit Laporan"; ?>
@extends('layout.base')
@section('content')
<div class="row">
    <div class="main-header">
        <h4>Edit Laporan</h4>
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
      <form action="{{route('updateTicket', $edit->id)}}" method="POST" enctype="multipart/form-data" style="margin-left: 5px; margin-right: 5px;">
        @csrf
        @method('PUT')
        <div class="form-group col-md-6">
          <label for="nama">Nama</label>
          <input id="nama" name="nama" type="text" class="form-control" value="{{$edit->nama}}">
        </div>
        <div class="form-group col-md-6">
          <label for="alamat">Alamat</label>
          <input id="alamat" name="alamat" type="text" class="form-control" value="{{$edit->alamat}}">
        </div>
        <div class="form-group col-md-6">
          <label for="perusahaan">Nama Instansi/Perusahaan</label>
          <input id="perusahaan" name="perusahaan" type="text" class="form-control"  value="{{$edit->perusahaan}}">
        </div>
        <div class="form-group col-md-6">
          <label for="npwp">NPWP</label>
          <input id="npwp" name="npwp" type="text" class="form-control" placeholder="Contoh: 99.999.999.9-999.999"  value="{{$edit->npwp}}">
        </div>
        <div class="form-group col-md-4">
          <label for="no_telp">No. Telpon</label>
          <input id="no_telp" name="no_telp" type="text" class="form-control" value="{{$edit->no_telp}}">
        </div>
        <div class="form-group col-md-4">
          <label for="hp">No. HP</label>
          <input id="hp" name="hp" type="text" class="form-control" value="{{$edit->hp}}">
        </div>
        <div class="form-group col-md-4">
          <label for="fax">No. Fax</label>
          <input id="fax" name="fax" type="text" class="form-control" value="{{$edit->fax}}">
        </div>
        <div class="form-group col-md-4">
          <label for="email">Email</label>
          <input id="email" name="email" type="email" class="form-control" placeholder="Contoh: nama@contoh.com" value="{{$edit->email}}">
        </div>
        <div class="form-group col-md-4">
          <label for="username_spse">Username SPSE</label>
          <input id="username_spse" name="username_spse" type="text" class="form-control" value="{{$edit->username_spse}}">
        </div>
        <div class="form-group col-md-4">
          <label for="password_spse">Password SPSE</label>
          <input id="password_spse" name="password_spse" type="text" class="form-control" value="{{$edit->password_spse}}">
        </div>
        <div class="form-group col-md-6">
          <label for="nama_lelang">Nama Lelang</label>
          <input id="nama_lelang" name="nama_lelang" type="text" class="form-control" value="{{$edit->nama_lelang}}">
        </div>
        <div class="form-group col-md-6">
          <label for="kode_lelang">Kode Lelang</label>
          <input id="kode_lelang" name="kode_lelang" type="text" class="form-control" value="{{$edit->kode_lelang}}">
        </div>
        <div class="form-group col-md-12">
          <label for="nama_satuan_kerja">Nama Satuan Kerja</label>
          <input id="nama_satuan_kerja" name="nama_satuan_kerja" type="text" class="form-control" value="{{$edit->nama_satuan_kerja}}">
        </div>
        <div class="form-group col-md-12">
          <label for="subjek">Subjek</label>
          <input id="subjek" name="subjek" type="text" class="form-control" value="{{$edit->subjek}}">
        </div>
        <div class="form-group col-md-12">
          <label for="pesan">Pesan</label>
          <textarea id="pesan" class="form-control" rows="5" name="pesan">{{$edit->pesan}}</textarea>
        </div>
        <div class="form-group col-md-4">
          <label for="gambar">Lampiran Gambar atau Screenshot</label>
          <input type="file" id="gambar" name="gambar[]" multiple class="form-control" accept="image/*">
          <?php $prevpic = explode(',',$edit->gambar); ?>
          <sub>*Gambar sebelumnya:
            @foreach($prevpic as $key => $gmbrsblm)
            <a href="{{url('gambar/'.$gmbrsblm)}}" target="_blank"><u>gambar {{$key+1}}</u></a>&nbsp;
            @endforeach
          </sub>
        </div>
        <div class="form-group col-md-4">
          <label>Kategori Masalah</label>
          <select name="kategori_id" class="form-control">
            @foreach($kategori as $kategori)
              <option value="{{$kategori->id}}">{{$kategori->kategori}}</option>
            @endforeach
          </select>
          <sub>*Kategori sebelumnya: {{$edit->kategori->kategori}}</sub>
        </div>
        <br>
        <div class="col-md-12">
          <button type="submit" class="btn btn-primary col-md-3">Submit</button>
        </div>
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
