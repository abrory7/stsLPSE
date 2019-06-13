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
            <h3>
              <strong>
                <button style="padding-left: 0; border: none;" onclick="copyFunction('#nomor_tiket')" id="nomor_tiket">{{$nomor}}</button>
              </strong>
            </h3>
            <br>
            Simpan atau salin nomor tiket anda dengan melakukan klik pada nomor tiket diatas.
            <br>
            Staf kami akan segera menangani aduan anda dalam 3 hari kerja. Anda dapat melakukan cek status tiket pada halaman<a href="{{route('guestIndexStatus')}}"> cek status tiket</a>
        </div>
    </div>
</div>


@endsection
@section('addScript')
<script>
function copyFunction(element) {
  var $temp = $("<input>");
  $("body").append($temp);
  $temp.val($(element).text()).select();
  document.execCommand("copy");
  $temp.remove();
  alert("Nomor tiket berhasil disalin");
}
</script>
@endsection
