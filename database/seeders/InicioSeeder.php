<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InicioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('areas')->insert([
            'nombre' => 'Desarrollo'
        ]);

        DB::table('roles')->insert([
            'nombre' => 'Desarrollador Junior'
        ]);
    }
}
