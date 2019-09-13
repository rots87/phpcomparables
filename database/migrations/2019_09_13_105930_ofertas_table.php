<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OfertasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblofertas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->year('anio');
            $table->unsignedInteger('cliente_id');
            $table->string('estatus')->default('ENVIADA');
            $table->timestamps();
            $table->foreign('cliente_id')->references('id')->on('tblclientes');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tblofertas');
    }
}
