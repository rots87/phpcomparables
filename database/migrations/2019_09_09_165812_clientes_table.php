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
          $table->bigIncrements('cli_id');
          $table->string('cli_nombre', 100);
          $table->string('cli_nombre_corto', 100)->nullable($value = true);
          $table->text('cli_giro');
          $table->text('cli_actividad_economica');
          $table->boolean('cli_estatus')->default(true);
          $table->unsignedBigInteger('sector_id');
          $table->integer('cli_anio')->nullable($value = true); //Esta es la ultima oferta aceptada
          $table->softDeletes();
          $table->timestamps();

          /**
           * Seccion de llaves foraneas
           */

          $table->foreign('sector_id')->references('sec_id')->on('tblsector');
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
