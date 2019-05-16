@section('title', 'Cek Status Tiket')
@extends('guest.base')
@section('content')

<div class="container">
    <div class="card">
        <div class="card-block">
            <form action="{{route('guestCheckStatus')}}" method="POST">
            @csrf
                <div class="form-group">
                <label for="status">Masukkan Nomor Tiket</label>
                <input type="text" name="nomor_ticket" class="form-control">
                <button class="btn btn-primary" type="submit">Submit</button>
                </div>
            </form>
        
        </div>
    </div>

</div>

@endsection