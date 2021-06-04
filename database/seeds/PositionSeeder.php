<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();

        $positions = [
            [
                'name' => 'Académico',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Administrativo',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Estudiante',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Otro',
                'created_at' => $now,
                'updated_at' => $now,
            ]

        ];

        DB::table('positions')->insert($positions);
    }
}
