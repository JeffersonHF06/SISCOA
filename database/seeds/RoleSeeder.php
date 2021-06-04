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
        //Admin role
        DB::table('roles')->insert([
            'name' => 'admin',
            'label' => 'Administrador',
            'description' => 'Rol que brinda acceso a todas las funcionalidades del sistema',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        //Official role
        DB::table('roles')->insert([
            'name' => 'official',
            'label' => 'Funcionario',
            'description' => 'Rol para funcionarios, los cuales solamente acceden a las funcionalidades de sus formularios',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        //Hearer role
        DB::table('roles')->insert([
            'name' => 'hearer',
            'label' => 'Oyente',
            'description' => 'Rol para oyentes, este rol limita el acceso total al sistema, solamente pueden registrar asistencia en los formularios',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
