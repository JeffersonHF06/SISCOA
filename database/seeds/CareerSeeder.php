<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class CareerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();

        $carrers = [
            [
                'name' => 'Administración de Empresas',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Química Industrial',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Ingeniería en Sistemas',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Estudios Generales',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Cursos de Servicio',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Administrativos',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Otro',
                'created_at' => $now,
                'updated_at' => $now,
            ]
        ];

        DB::table('careers')->insert($carrers);
    }
}
