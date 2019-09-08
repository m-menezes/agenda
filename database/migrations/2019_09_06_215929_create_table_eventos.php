<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableEventos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eventos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('titulo');
            $table->string('descricao');
            $table->enum('status',['andamento','encerrado'])->default('andamento');
            $table->dateTime('data_inicio');
            $table->dateTime('data_prazo');
            $table->dateTime('data_conclusao');
            $table->timestamps();
            $table->unsignedBigInteger('responsavel');
            $table->foreign('responsavel')->references('id')->on('users');
            // ->onDelete('cascade')
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('eventos');
    }
}
