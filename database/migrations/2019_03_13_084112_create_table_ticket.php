<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTicket extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticket', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('aduan_id');
            $table->string('nomor_ticket');
            $table->string('urgensi');
            $table->string('expire');
            $table->integer('finish')->default(0);
            $table->integer('isGuest')->default(0);
            $table->foreign('aduan_id')->references('id')->on('aduan')->onDelete('cascade');
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
        Schema::dropIfExists('ticket');
    }
}
