<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableNotif extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notif', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBIgInteger('ticket_id');
            $table->bigInteger('notif')->default(0);
            $table->string('role');
            $table->foreign('ticket_id')->references('id')->on('ticket');
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
        Schema::dropIfExists('notif');
    }
}
