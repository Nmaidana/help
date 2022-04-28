<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailAssistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_assists', function (Blueprint $table) {
            $table->id();
            $table->integer('id_assist');
            $table->foreign('id_assist')->references('id')->on('assists');
            $table->integer('id_user');
            $table->foreign('id_user')->references('id')->on('admin_users');
            $table->integer('id_state');
            $table->foreign('id_state')->references('id')->on('states');
            $table->string('solution');
            $table->date('date');
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
        Schema::dropIfExists('detail_assists');
    }
}
