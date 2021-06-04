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
            'name' => 'Administrador',
            'email' => 'admin@gmail.com',
            'phone' => 78876765,
            'password' => Hash::make('Admin1234'),
            'role_id' => '1',
            'position_id' => '1',
            'career_id' => '1',
            'role_id' => '1',
            'is_active' => true,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        // User::create([
        //     'name' => 'Carlos Villegas Fernández',
        //     'email' => 'cvf@gmail.com',
        //     'phone' => 89987867,
        //     'position' => 'Profesor',
        //     'password' => Hash::make('Professor1234'),
        //     'role_id' => '2',
        //     'created_at' => Carbon::now(),
        //     'updated_at' => Carbon::now()
        // ]);

        // User::create([
        //     'name' => 'Mariana Castro Gutierrez',
        //     'email' => 'mcg@gmail.com',
        //     'phone' => 89987867,
        //     'position' => 'Oyente',
        //     'password' => Hash::make('Listener1234'),
        //     'role_id' => '3',
        //     'created_at' => Carbon::now(),
        //     'updated_at' => Carbon::now()
        // ]);
    }
}
