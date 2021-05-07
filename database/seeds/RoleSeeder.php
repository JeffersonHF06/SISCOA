<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

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
       $role1 = Role::create([
           'name' => 'admin',
           'label' => 'Administrador',
           'description' => 'Rol para administradores'
        ]);

       //Official role
       $role2 = Role::create([
           'name' => 'official',
           'label' => 'Funcionario',
           'description' => 'Rol para funcionarios'
        ]);

       //Assign Roles permission
       Permission::create(['name' => 'view_roles'])->assignRole('admin');
       Permission::create(['name' => 'assign_roles'])->assignRole('admin');

       //Users crud permissions
       Permission::create(['name' => 'view_user'])->assignRole('admin');
       Permission::create(['name' => 'create_user'])->assignRole('admin');
       Permission::create(['name' => 'edit_user'])->syncRoles(['admin','official']);
       Permission::create(['name' => 'delete_user'])->assignRole('admin');
       Permission::create(['name' => 'change_password'])->assignRole('admin');

    }
}
