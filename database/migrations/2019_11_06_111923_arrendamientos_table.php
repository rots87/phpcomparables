<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ArrendamientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblarrendamientos', function (Blueprint $table) {
            $table->bigIncrements('arr_id');
            $table->integer('arr_anio');
            $table->unsignedBigInteger('tipoarrendamiento_id');
            $table->integer('arr_mt2')->default('0');
            $table->decimal('arr_precio',8,2)->default('0');
            $table->string('arr_direccion');
            $table->string('arr_municipio')->nullable();
            $table->string('arr_departamento')->nullable();
            $table->string('arr_web');
            $table->string('arr_foto');
            $table->timestamps();

            $table->foreign('tipoarrendamiento_id')->references('tar_id')->on('tbltipoarrendamiento');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tblarrendamientos');
    }
}
