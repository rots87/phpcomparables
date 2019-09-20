<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->truncateTables([
            'tblsector'
        ]);
        $this->call(SectorSeeder::class);
    }

    public function truncateTables(array $tables)
    {
        DB::statement("SET foreign_key_checks=0"); //Esta linea es solo para MySQL/MariaDB
        foreach ($tables as $table) {
            DB::table($table)->truncate();
        }
        DB::statement("SET foreign_key_checks=1"); //Esta linea es solo para MySQL/MariaDB
    }
}
