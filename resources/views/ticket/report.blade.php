<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>        
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="{{ asset('res/assets/plugins/bootstrap/css/bootstrap.min.css') }}">

    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('res/assets/css/custom.css') }}">

    <style>
    .wrapper-header{
        margin-left: 40px;
    }

    .diskusi{
        overflow-y: hidden;
    }
    </style>
</head>
<body>
<div class="wrapper-header">
    <table >
        <th >
            <img src="{{asset('res/assets/images/lpse-logo.png')}}" style="width: 150px; height: 125px;"></th>
        <th>
        <div class="title" style="padding-top:15px;">
            <h2>LPSE TICKETING SUPPORT SYSTEM <br> <span style="font-size: .79em;">LAPORAN TIKET #1512320</span> </h2>            
        </div>
        </th>        
    </table> 
</div>
<div class="content-wrapper">
    <hr>  
    <div class="card">
        <div class="card-block">
            <h3>Tiket #12345678</h3>
            <table class="table table-borderless">
                <tbody>
                <tr>
                <th>Status</th>
                    <td>
                        @if($tickets->finish == 0)
                            Terbuka
                        @else  
                            Ditutup
                        @endif
                    </td>

                    <th>Nama</th>
                    <td>{{$tickets->aduan->nama}}</td>
                </tr>
                <tr>
                <th>Prioritas</th>
                    <td>{{$tickets->urgensi}}</td>

                    <th>Email</th>
                    <td>{{$tickets->aduan->email}}</td>
                </tr>
                <tr>
                <th>Tanggal Dibuat</th>
                    <td>{{$tickets->created_at}}</td>

                    <th>Telepon</th>
                    <td>{{$tickets->aduan->no_telp}}</td>
                </tr>
            <tr>
            <th>Assigned To</th>
                    @php    
                        $user = DB::table('users')->where('id', $tickets->isAssigned->users_id)->first();                
                    @endphp
                    <td>{{$user->name}} ({{$user->jabatan}})</td>

                    <th>Kategori</th>
                    <td>
                        @if($tickets->aduan->kategori_id == 1)
                            Login Error
                        @elseif($tickets->aduan->kategori_id == 2)
                            Instalasi Jaringan
                        @else
                            Lainnya
                        @endif
                    </td>                    
                </tr>
                </tbody>
            </table>
        </div>
        <div class="card-block">  
            @foreach($diskusi as $diskusi)
                @php
                    if($diskusi->member == 1 || $diskusi->member == 2){
                        $user = DB::table('users')->where('id', $diskusi->member)->first()->jabatan;
                    }else{
                        $user = $diskusi->member;
                    }                    
                @endphp
                <table class="table">
                    <thead class="thead-dark">
                        <th>{{$user}}</th>
                    </thead>
                    <tbody>                        
                        <tr>
                        <td>{{$diskusi->pesan}}</td>
                        </tr>
                        
                    </tbody>                    
                </table>
                 <br>                
            @endforeach
        </div>
    </div>         
</div>

<script>    
    print();
</script>
</body>
</html>