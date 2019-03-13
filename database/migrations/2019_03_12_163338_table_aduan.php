<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableAduan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aduan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama');
            $table->string('alamat');
            $table->string('perusahaan');
            $table->string('npwp');
            $table->string('no_telp');            
            $table->string('hp');
            $table->string('fax')->nullable();
            $table->string('email')->nullable();
            $table->string('username_spse')->nullable();
            $table->string('password_spse')->nullable();
            $table->string('nama_lelang')->nullable();
            $table->string('kode_lelang')->nullable();
            $table->string('nama_satuan_kerja')->nullable();
            $table->longText('pesan');              
            $table->longText('subjek');
            $table->string('gambar')->nullable();
            $table->unsignedBigInteger('kategori_id');
            $table->foreign('kategori_id')->references('id')->on('kategori');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aduan');
    }
}
