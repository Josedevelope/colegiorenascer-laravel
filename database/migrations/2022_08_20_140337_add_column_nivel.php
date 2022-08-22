<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnNivel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ensinos', function (Blueprint $table) {
            //
            $table->integer("nivel");
            $table->string('Area',100)->nullable();
            $table->string('image')->nullable();
            $table->string('Saida')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ensinos', function (Blueprint $table) {
            //
        });
    }
}
