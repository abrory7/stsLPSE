<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aduan extends Model
{
    protected $table = "aduan";
    protected $fillable = [
        'nama', 'alamat', 'perusahaan', 'npwp',
        'no_telp', 'hp', 'fax', 'email', 'username_spse', 
        'password_spse', 'nama_lelang', 'kode_lelang',
        'nama_satuan_kerja', 'pesan', 'subjek', 'gambar',
        'kategori_id'
    ];
}
