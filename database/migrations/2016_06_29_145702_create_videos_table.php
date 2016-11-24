<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideosTable extends Migration {

    public function up()
    {

        Schema::create('videos', function(Blueprint $table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->unsignedInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->unsignedInteger('user_id_edited')->nullable();
            $table->foreign('user_id_edited')->references('id')->on('users')->onDelete('set null');
            $table->string('link');
            $table->timestamps();
            $table->softDeletes();
        });
    }
    public function down()
    {
        Schema::drop('videos');
    }

}
