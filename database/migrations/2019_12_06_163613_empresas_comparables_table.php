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
            $table->float('ingresos',12,2);
            $table->float('ingresos_financieros',12,2);
            $table->float('otros_ingresos',12,2);
            $table->float('gastos_venta',12,2);
            $table->float('gastos_admon',12,2);
            $table->float('gastos_finan',12,2);
            $table->float('otros_gastos',12,2);
            $table->float('isr',12,2);
            $table->float('reserva_legal',12,2);
            $table->float('gnd',12,2);
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
