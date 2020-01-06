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
          'sec_nombre' => 'ASEGURADORAS',
      ]);

      DB::table('tblsector')->insert([
          'sec_nombre' => 'BANCOS',
      ]);

      DB::table('tblsector')->insert([
          'sec_nombre' => 'AFP´S',
      ]);

      DB::table('tblsector')->insert([
          'sec_nombre' => 'ASOCIACIONES COOPERATIVAS',
      ]);

      DB::table('tblsector')->insert([
          'sec_nombre' => 'ASOCIACIONES COOPERATIVAS DE AHORRO Y CREDITO',
      ]);

      DB::table('tblsector')->insert([
          'sec_nombre' => 'COMERCIO',
      ]);

      DB::table('tblsector')->insert([
          'sec_nombre' => 'INDUSTRIA',
      ]);

      DB::table('tblsector')->insert([
          'sec_nombre' => 'SERVICIOS',
      ]);

      DB::table('tblsector')->insert([
          'sec_nombre' => 'ALMACENES GENERALES DE DEPOSITO',
      ]);

      DB::table('tblsector')->insert([
          'sec_nombre' => 'CASA CORREDORA DE BOLSA',
      ]);

      DB::table('tblsector')->insert([
          'sec_nombre' => 'FUNDACIONES Y ASOCIACIONES SIN FINES DE LUCRO',
      ]);

      DB::table('tblsector')->insert([
          'sec_nombre' => 'GOBIERNO',
      ]);

      DB::table('tblsector')->insert([
          'sec_nombre' => 'TITULARIZADORAS',
      ]);

      DB::table('tblsector')->insert([
          'sec_nombre' => 'DEPOSITO DE VALORES',
      ]);

      DB::table('tblsector')->insert([
          'sec_nombre' => 'GARANTÍA RECÍPROCA',
      ]);

      DB::table('tblsector')->insert([
          'sec_nombre' => 'INVERSIONISTAS',
      ]);

      DB::table('tblsector')->insert([
          'sec_nombre' => 'FIDEICOMISOS',
      ]);

      DB::table('tblsector')->insert([
          'sec_nombre' => 'AGROPECUARIO',
      ]);

      DB::table('tblsector')->insert([
          'sec_nombre' => 'FONDO DE SANEAMIENTO Y FORTALECIMIENTO FINANCIERO',
      ]);

      DB::table('tblsector')->insert([
          'sec_nombre' => 'BANCO COOPERATIVO, INTERMEDIARIO FINANCIERO NO BANCARIO',
      ]);

      DB::table('tblsector')->insert([
          'sec_nombre' => 'FONDOS DE TITULARIZACIÓN DE ACTIVOS',
      ]);

      DB::table('tblsector')->insert([
          'sec_nombre' => 'BANCO CENTRAL DE RESERVA',
      ]);
    }

}
