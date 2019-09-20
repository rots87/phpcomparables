<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class HistoricoClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblhistoricoclientes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('cliente_id');
            $table->string('nombre', 100);
            $table->string('nombre_corto', 100)->nullable($value = true);
            $table->text('giro');
            $table->text('actividad_economica');
            $table->boolean('estatus')->default(true);
            $table->integer('sector_id');
            $table->timestamps();

            /**
           * Seccion de llaves foraneas
           */

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
        Schema::dropIfExists('tblhistoricoclientes');
    }
}
