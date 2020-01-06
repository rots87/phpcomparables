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
            $table->bigIncrements('eco_id');
            $table->year('eco_ejercicio');
            $table->integer('eco_ingresos');
            $table->integer('eco_ingresos_financieros');
            $table->integer('eco_otros_ingresos');
            $table->integer('eco_costo_venta');
            $table->integer('eco_gastos_venta');
            $table->integer('eco_gastos_admon');
            $table->integer('eco_gastos_finan');
            $table->integer('eco_otros_gastos');
            $table->integer('eco_isr');
            $table->integer('eco_reserva_legal');
            $table->integer('eco_gnd');
            $table->unsignedBigInteger('empresa_id');
            $table->timestamps();

            $table->foreign('empresa_id')->references('emp_id')->on('tblempresa');
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
