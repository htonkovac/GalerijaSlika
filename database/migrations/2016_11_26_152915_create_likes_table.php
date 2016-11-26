<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('likes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id', false, true); //autoincrement i unsigned
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('image_id', false, true); //autoincrement i unsigned
            $table->foreign('image_id')->references('id')->on('images');
            $table->unique(array('user_id','image_id'));
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
        Schema::dropIfExists('likes');
    }
}
