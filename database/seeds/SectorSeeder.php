<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class SectorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('tblsector')->insert([
          'nombre' => 'ASEGURADORAS',
      ]);

      DB::table('tblsector')->insert([
          'nombre' => 'BANCOS',
      ]);

      DB::table('tblsector')->insert([
          'nombre' => 'AFP´S',
      ]);

      DB::table('tblsector')->insert([
          'nombre' => 'ASOCIACIONES COOPERATIVAS',
      ]);

      DB::table('tblsector')->insert([
          'nombre' => 'ASOCIACIONES COOPERATIVAS DE AHORRO Y CREDITO',
      ]);

      DB::table('tblsector')->insert([
          'nombre' => 'COMERCIO',
      ]);

      DB::table('tblsector')->insert([
          'nombre' => 'INDUSTRIA',
      ]);

      DB::table('tblsector')->insert([
          'nombre' => 'SERVICIOS',
      ]);

      DB::table('tblsector')->insert([
          'nombre' => 'ALMACENES GENERALES DE DEPOSITO',
      ]);

      DB::table('tblsector')->insert([
          'nombre' => 'CASA CORREDORA DE BOLSA',
      ]);

      DB::table('tblsector')->insert([
          'nombre' => 'FUNDACIONES Y ASOCIACIONES SIN FINES DE LUCRO',
      ]);

      DB::table('tblsector')->insert([
          'nombre' => 'GOBIERNO',
      ]);

      DB::table('tblsector')->insert([
          'nombre' => 'TITULARIZADORAS',
      ]);

      DB::table('tblsector')->insert([
          'nombre' => 'DEPOSITO DE VALORES',
      ]);

      DB::table('tblsector')->insert([
          'nombre' => 'GARANTÍA RECÍPROCA',
      ]);

      DB::table('tblsector')->insert([
          'nombre' => 'INVERSIONISTAS',
      ]);

      DB::table('tblsector')->insert([
          'nombre' => 'FIDEICOMISOS',
      ]);

      DB::table('tblsector')->insert([
          'nombre' => 'AGROPECUARIO',
      ]);

      DB::table('tblsector')->insert([
          'nombre' => 'FONDO DE SANEAMIENTO Y FORTALECIMIENTO FINANCIERO',
      ]);

      DB::table('tblsector')->insert([
          'nombre' => 'BANCO COOPERATIVO, INTERMEDIARIO FINANCIERO NO BANCARIO',
      ]);

      DB::table('tblsector')->insert([
          'nombre' => 'FONDOS DE TITULARIZACIÓN DE ACTIVOS',
      ]);

      DB::table('tblsector')->insert([
          'nombre' => 'BANCO CENTRAL DE RESERVA',
      ]);
    }

}
