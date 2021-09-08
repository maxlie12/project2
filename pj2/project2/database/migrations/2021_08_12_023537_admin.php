<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Admin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin', function (Blueprint $table) {
            $table->increments('idAdmin');
            $table->string('nameAdmin', 50);
            $table->string('userName', 20);
            $table->string('password', 20);
            $table->string('email', 50);
            $table->char('phone', 10);
            $table->tinyInteger('gender');
            $table->tinyInteger('status');
            $table->tinyInteger('role');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin');
    }
}
