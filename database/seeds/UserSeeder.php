<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Cristopher Montero Jiménez',
            'email' => 'cmj@una.ac.cr',
            'phone' => 78876765,
            'position' => 'Administrador',
            'password' => Hash::make('admin'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ])->assignRole('admin');

        User::create([
            'name' => 'Adrián Ramírez Fernández',
            'email' => 'arf@una.ac.cr',
            'phone' => 89987867,
            'position' => 'Profesor',
            'password' => Hash::make('admin'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ])->assignRole('official');
    }
}
