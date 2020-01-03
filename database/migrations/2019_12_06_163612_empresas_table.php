<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EmpresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblempresa', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre',80);
            $table->string('nit',80);
            $table->string('expediente',80);
            $table->string('giro',80);
            $table->string('last_ef',4)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tblempresa');
    }
}
