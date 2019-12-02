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
            $table->bigIncrements('id');
            $table->integer('anio');
            $table->unsignedBigInteger('tipoarrendamiento_id');
            $table->integer('mt2')->default('0');
            $table->decimal('precio',8,2)->default('0');
            $table->string('direccion');
            $table->string('municipio')->nullable();
            $table->string('departamento')->nullable();
            $table->string('web');
            $table->string('foto');
            $table->timestamps();

            $table->foreign('tipoarrendamiento_id')->references('id')->on('tbltipoarrendamiento');
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
