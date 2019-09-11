<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblclientes', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->string('nombre', 100);
          $table->string('nombre_corto', 100)->nullable($value = true);
          $table->text('giro');
          $table->text('actividad_economica');
          $table->boolean('estatus')->default(true);
          $table->unsignedBigInteger('sector_id');
          $table->integer('anio'); //Esta es la ultima oferta aceptada
          $table->softDeletes();
          $table->timestamps();

          /**
           * Seccion de llaves foraneas
           */

          $table->foreign('sector_id')->references('id')->on('tblsector');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tblclientes');
    }
}
