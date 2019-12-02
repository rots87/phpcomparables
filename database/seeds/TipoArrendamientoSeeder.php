<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoArrendamientoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbltipoarrendamiento')->insert(([
            'nombre' => 'BODEGAS',
        ]));

        DB::table('tbltipoarrendamiento')->insert(([
            'nombre' => 'LOCAL COMERCIAL',
        ]));

        DB::table('tbltipoarrendamiento')->insert(([
            'nombre' => 'TERRENOS',
        ]));

        DB::table('tbltipoarrendamiento')->insert(([
            'nombre' => 'VEHICULOS',
        ]));
    }
}
