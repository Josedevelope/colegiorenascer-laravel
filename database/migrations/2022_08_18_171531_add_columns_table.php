<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('alunos', function (Blueprint $table) {
            $table->string("status_to");// VER SE AINDA É INSCRITO OU ALUNO
            $table->string("bi_file");
            $table->string("foto_perfil");
            $table->string("belog_to_us");// SE FOI MATRICULADO
            $table->date("date_belog_to_us");// DATA DA MATRÍCULA
            //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('alunos', function (Blueprint $table) {
            //
        });
    }
}
