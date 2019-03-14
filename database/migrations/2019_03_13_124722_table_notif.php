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
            $table->unsignedBIgInteger('assign_id');
            $table->bigInteger('notif_hd')->default(0);            
            $table->bigInteger('notif_adsis')->default(0);
            $table->bigInteger('notif_adppe')->default(0);
            $table->bigInteger('notif_verifikator')->default(0);
            $table->bigInteger('notif_pimpinan')->default(0);
            $table->foreign('assign_id')->references('id')->on('assign');
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
