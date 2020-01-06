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
            $table->bigIncrements('hcl_id');
            $table->unsignedBigInteger('cliente_id');
            $table->string('hcl_nombre', 100);
            $table->string('hcl_nombre_corto', 100)->nullable($value = true);
            $table->text('hcl_giro');
            $table->text('hcl_actividad_economica');
            $table->boolean('hcl_estatus')->default(true);
            $table->unsignedBigInteger('sector_id');
            $table->timestamps();

            /**
           * Seccion de llaves foraneas
           */

          $table->foreign('cliente_id')->references('cli_id')->on('tblclientes');
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
        Schema::dropIfExists('tblhistoricoclientes');
    }
}
