@extends('guest.base')

@section('title', 'Buat Tiket Baru')
@section('content')

    <div class="container">
        <div class="card">
            <div class="card-block">
                <h1>Buat Tiket Baru</h1>
                <p>Tolong isi form berikut untuk membuat tiket baru.</p>
                <br>
                <form action="{{route('guestCreateTicket')}}" method="POST">
                @csrf
                <div class="form-group">
          <label for="exampleFormControlInput1">Nama</label>
          <input name="nama" type="text" class="form-control">
        </div>
        <div class="form-group">
          <label for="exampleFormControlInput1">Alamat</label>
          <input name="alamat" type="text" class="form-control">
        </div>
        <div class="form-group">
          <label for="exampleFormControlInput1">Perusahaan</label>
          <input name="perusahaan" type="text" class="form-control">
        </div>
        <div class="form-group">
          <label for="exampleFormControlInput1">NPWP</label>
          <input name="npwp" type="text" class="form-control">
        </div>
        <div class="form-group">
          <label for="exampleFormControlInput1">no_telp</label>
          <input name="no_telp" type="text" class="form-control">
        </div>
        <div class="form-group">
          <label for="exampleFormControlInput1">HP</label>
          <input name="hp" type="text" class="form-control">
        </div>
        <div class="form-group">
          <label for="exampleFormControlInput1">Fax</label>
          <input name="fax" type="text" class="form-control">
        </div>
        <div class="form-group">
          <label for="exampleFormControlInput1">Email</label>
          <input name="email" type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
        </div>
        <div class="form-group">
          <label for="exampleFormControlInput1">Username SPSE</label>
          <input name="username_spse" type="text" class="form-control">
        </div>
        <div class="form-group">
          <label for="exampleFormControlInput1">Password SPSE</label>
          <input name="password_spse" type="text" class="form-control">
        </div>
        <div class="form-group">
          <label for="exampleFormControlInput1">Nama Lelang</label>
          <input name="nama_lelang" type="text" class="form-control">
        </div>
        <div class="form-group">
          <label for="exampleFormControlInput1">Kode Lelang</label>
          <input name="kode_lelang" type="text" class="form-control">
        </div>
        <div class="form-group">
          <label for="exampleFormControlInput1">Nama Satuan Kerja</label>
          <input name="nama_satuan_kerja" type="text" class="form-control">
        </div>
        <div class="form-group">
          <label for="exampleFormControlInput1">Subjek</label>
          <input name="subjek" type="text" class="form-control">
        </div>
        <div class="form-group">
          <label for="exampleFormControlInput1">Pesan</label>
          <textarea class="form-control" rows="5" name="pesan"> </textarea>
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
                <button class="btn btn-success" type="submit">Submit</button>
                </form>
            
            </div>

        </div>
    </div>
@endsection