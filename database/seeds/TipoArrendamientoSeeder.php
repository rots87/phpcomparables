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
            'tar_nombre' => 'BODEGAS',
        ]));

        DB::table('tbltipoarrendamiento')->insert(([
            'tar_nombre' => 'LOCAL COMERCIAL',
        ]));

        DB::table('tbltipoarrendamiento')->insert(([
            'tar_nombre' => 'TERRENOS',
        ]));

        DB::table('tbltipoarrendamiento')->insert(([
            'tar_nombre' => 'VEHICULOS',
        ]));
    }
}
