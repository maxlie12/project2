<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Bill extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bill', function (Blueprint $table) {
            $table->increments('idBill');
            $table->dateTime('time');
            $table->unsignedInteger('idStudent');
            $table->foreign('idStudent')->references('idStudent')->on('student');
            $table->unsignedInteger('idBook');
            $table->foreign('idBook')->references('idBook')->on('book');
            $table->tinyInteger('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bill');
    }
}