<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCardapiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cardapios', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->unsignedInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->unsignedInteger('tipo_cardapios_id')->nullable();
            $table->foreign('tipo_cardapios_id')->references('id')->on('tipo_cardapios')->onDelete('set null');
            $table->string('nome', 100);
            $table->string('localizacao', 100);
            $table->text('descricao');
            $table->string('foto_cardapio', 100);
            $table->tinyInteger('ativo',0);
            $table->decimal('valor', 19,2);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tipo_cardapios');
    }
}
