<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNoticiasTable extends Migration
{

	/**
	 * Executa as migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('noticias', function (Blueprint $table) {
			$table->engine = 'InnoDB';
			$table->increments('id')->unsigned();
			$table->unsignedInteger('user_id')->nullable();
			$table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
			$table->unsignedInteger('user_id_edited')->nullable();
			$table->foreign('user_id_edited')->references('id')->on('users')->onDelete('set null');
			$table->string('titulo');
			$table->string('slug');
			$table->text('introducao');
			$table->text('conteudo');
			$table->string('fonte')->nullable();
			$table->string('imagem')->nullable();
			$table->timestamps();
            $table->softDeletes();
		});
	}

	/**
	 * Reverter as migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('noticias');
	}

}
