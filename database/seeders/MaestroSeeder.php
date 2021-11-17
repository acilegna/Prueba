<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class MaestroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('maestros')->insert([

            'nombre' => 'Luis',
            'apePat' => 'Ruiz',
            'apeMat' => 'Nuñez',
            'telefono' => '3312485921',
            'edad' => 15,
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString()


        ]);
    }
}
