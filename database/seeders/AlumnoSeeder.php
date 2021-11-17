<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AlumnoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('alumnos')->insert([
            'num_control' => '010',
            'nombre' => 'Angelica',
            'apePat' => 'Ruiz',
            'apeMat' => 'Nuñez',
            'Telefono' => '3310485916',
            'edad' => 15,
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString()


        ]);
    }
}
