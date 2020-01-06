<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class GeneralEstudiosTable extends Migration
{
    /**
     * Run the migrations.
     * El progreso se mide por puntaje. son 8 puntos por cada estudio y cada uno es por las fases
     * en las que se encuentra
     * @return void
     */
    public function up()
    {
        Schema::create('tblgeneralestudios', function (Blueprint $table) {
            $table->bigIncrements('ges_id');
            $table->integer('ges_anio');
            $table->integer('ges_totalEPT')->default('0');
            $table->integer('ges_progreso');
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
        Schema::dropIfExists('tblgeneralestudios');
    }
}
