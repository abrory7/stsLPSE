<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableSolusi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solusi', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('aduan_id');
            $table->unsignedBigInteger('users_id');
            $table->string('solusi');
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('solusi');
    }
}
