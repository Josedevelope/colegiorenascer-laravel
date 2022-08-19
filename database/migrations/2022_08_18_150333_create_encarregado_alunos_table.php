<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEncarregadoAlunosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('encarregado_alunos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("aluno_id");
            $table->foreign('aluno_id')->references('id')->on('alunos');
            $table->unsignedBigInteger("encarregado_id");
            $table->foreign('encarregado_id')->references('id')->on('encarregados');
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
        Schema::dropIfExists('encarregado_alunos');
    }
}
