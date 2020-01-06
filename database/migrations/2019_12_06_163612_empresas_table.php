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
            $table->bigIncrements('emp_id');
            $table->string('emp_nombre',80);
            $table->string('emp_nit',80);
            $table->string('emp_expediente',80);
            $table->string('emp_giro',80);
            $table->string('emp_last_ef',4)->nullable();
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
