<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EmpresasComparablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblempresacomparable', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->year('ejercicio');
            $table->integer('ingresos');
            $table->integer('ingresos_financieros');
            $table->integer('otros_ingresos');
            $table->integer('costo_venta');
            $table->integer('gastos_venta');
            $table->integer('gastos_admon');
            $table->integer('gastos_finan');
            $table->integer('otros_gastos');
            $table->integer('isr');
            $table->integer('reserva_legal');
            $table->integer('gnd');
            $table->unsignedBigInteger('empresa_id');
            $table->timestamps();

            $table->foreign('empresa_id')->references('id')->on('tblempresa');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tblempresacomparable');
    }
}
