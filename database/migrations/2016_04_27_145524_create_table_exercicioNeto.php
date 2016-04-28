<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableExercicioNeto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exercicio', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('idProdutos', 255);
            $table->string('idCliente', 255);
            $table->string('idFunc', 255);
            $table->string('Valor', 255);
            $table->integer('Quantidade');
            $table->date('DataVenda', 255);
            $table->string('TipoPagamneto', 255);
            $table->rememberToken();
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
        Schema::drop('exercicio');
    }
}
