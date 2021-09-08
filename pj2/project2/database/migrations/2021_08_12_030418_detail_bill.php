<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DetailBill extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detailBill', function (Blueprint $table) {
            $table->increments('idDetailBill');
            $table->foreign('idDetailBill')->references('idBill')->on('bill');
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
        Schema::dropIfExists('detailBill');
    }
}
