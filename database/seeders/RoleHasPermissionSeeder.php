<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleHasPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sadmin = Role::findById(1);
        $sadmin->givePermissionTo('create');
        $sadmin->givePermissionTo('edit');
        $sadmin->givePermissionTo('show');
        $sadmin->givePermissionTo('delete');

        $admin = Role::findById(2);
        $admin->givePermissionTo('create');
        $admin->givePermissionTo('edit');
        $admin->givePermissionTo('show');
        $admin->givePermissionTo('delete');

        $editor = Role::findById(3);
        $editor->givePermissionTo('create');
        $editor->givePermissionTo('show');

        $user = Role::findById(4);
        $user->givePermissionTo('show');
    }
}
