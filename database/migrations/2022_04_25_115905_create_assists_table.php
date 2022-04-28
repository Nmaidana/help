<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assists', function (Blueprint $table) {
            $table->id();
            $table->integer('heritage');
            $table->integer('id_user');
            $table->foreign('id_user')->references('id')->on('admin_users');
            $table->date('date');
            $table->integer('id_state');
            $table->foreign('id_state')->references('id')->on('states');
            $table->integer('id_category');
            $table->foreign('id_category')->references('id')->on('categories');
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
        Schema::dropIfExists('assists');
    }
}
