<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();

        $roles = [
            [
                'name' => 'admin',
                'label' => 'Administrador',
                'description' => 'Rol que brinda acceso a todas las funcionalidades del sistema',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'official',
                'label' => 'Funcionario',
                'description' => 'Rol para funcionarios, los cuales solamente acceden a las funcionalidades de sus formularios',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'hearer',
                'label' => 'Oyente',
                'description' => 'Rol para oyentes, este rol limita el acceso total al sistema, solamente pueden registrar asistencia en los formularios',
                'created_at' => $now,
                'updated_at' => $now,
            ]
        ];

        DB::table('roles')->insert($roles);
    }
}
