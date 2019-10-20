<?php

use Illuminate\Database\Seeder;
use App\Permission;
use App\Role;
use App\User;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = new Role();
        $role->slug = 'admin';
        $role->name = 'Adminitration';
        $role->save();
    }
}
