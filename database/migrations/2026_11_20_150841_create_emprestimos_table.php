<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmprestimosTable extends Migration
{
    public function up()
    {
        Schema::create('emprestimos', function (Blueprint $table) {
            $table->id('id_emprestimo');
            $table->unsignedBigInteger('id_livro');
            $table->date('data_emprestimo');
            $table->date('data_devolucao_prevista');
            $table->date('data_devolucao')->nullable();
            $table->string('status');
            $table->timestamps();

            $table->foreign('id_livro')->references('id_livro')->on('livros');
        });
    }

    public function down()
    {
        Schema::dropIfExists('emprestimos');
    }
}
