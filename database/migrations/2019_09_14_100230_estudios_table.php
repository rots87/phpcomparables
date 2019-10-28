<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EstudiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblestudios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('cliente_id');
            $table->integer('anio');
            $table->integer('progreso')->default(0);
            /**
             * Los estados posibles serian:
             * En Maquetacion 1
             * En Proceso 2
             * Revision Interna 3
             * En Correccion Interna 4
             * Revision Cliente 5
             * En Correccion Cliente 6
             * Impresion 7
             * Entregado 8
             */
            //$table->string('encargado')->nullable(true);
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
        Schema::dropIfExists('tblestudios');
    }
}
