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
        $now = Carbon::now();

        $users = [
            [
                'name' => 'Administrador',
                'email' => 'admin@gmail.com',
                'phone' => 78876765,
                'password' => Hash::make('password'),
                'role_id' => '1',
                'position_id' => '1',
                'career_id' => '1',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'Carlos Villegas Fernández',
                'email' => 'cvf@gmail.com',
                'phone' => 89987867,
                'password' => Hash::make('password'),
                'role_id' => '2',
                'position_id' => '2',
                'career_id' => '2',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'Mariana Castro Gutierrez',
                'email' => 'mcg@gmail.com',
                'phone' => 89987867,
                'password' => Hash::make('password'),
                'role_id' => '3',
                'position_id' => '3',
                'career_id' => '3',
                'created_at' => $now,
                'updated_at' => $now
            ]
        ];

        DB::table('users')->insert($users);
    }
}
