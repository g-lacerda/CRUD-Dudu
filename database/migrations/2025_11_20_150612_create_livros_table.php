<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLivrosTable extends Migration
{
    public function up()
    {
        Schema::create('livros', function (Blueprint $table) {
            $table->id('id_livro');
            $table->string('titulo');
            $table->unsignedBigInteger('id_autor');
            $table->unsignedBigInteger('id_editora');
            $table->year('ano_publicacao');
            $table->timestamps();

            $table->foreign('id_autor')->references('id_autor')->on('autores');
            $table->foreign('id_editora')->references('id_editora')->on('editoras');
        });
    }

    public function down()
    {
        Schema::dropIfExists('livros');
    }
}
