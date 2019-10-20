<?php

use Illuminate\Database\Seeder;
use App\Permission;
use App\Role;
use App\User;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::where('slug', 'admin')->first();

$createTasks = new Permission();
$createTasks->slug = 'create-tasks';
$createTasks->name = 'Create Tasks';
$createTasks->save();
$createTasks->roles()->attach($role);

$editTask = new Permission();
$editTask->slug = 'edit-tasks';
$editTask->name = 'Edit Tasks';
$editTask->save();
$editTask->roles()->attach($role);

$deleteTask = new Permission();
$deleteTask->slug = 'delete-tasks';
$deleteTask->name = 'Delete Tasks';
$deleteTask->save();
$deleteTask->roles()->attach($role);
    }
}
