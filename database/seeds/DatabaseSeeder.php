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
        // $this->call(UsersTableSeeder::class);
        $this->truncateTables([
            'tblsector'
        ]);
        
        $this->call(SectorSeeder::class);
    }

    public function truncateTables(array $tables)
    {

        foreach ($tables as $table) {
            DB::table($table)->truncate();
        }

    }
}
