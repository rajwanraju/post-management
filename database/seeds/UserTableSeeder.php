<?php

use Illuminate\Database\Seeder;
use App\Permission;
use App\Role;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::where('slug','admin')->first();
        // $perm = Permission::where('slug','create-tasks')->first();;

        $user = new User();
        $user->name = 'Admin';
        $user->email = 'admin@gmail.com';
        $user->password = bcrypt('secret');
        $user->save();
        $user->roles()->attach($role);
    }
}
