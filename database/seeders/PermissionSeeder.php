<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionSeeder extends Seeder
{
    /**
     * Create the initial roles and permissions.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'create']);
        Permission::create(['name' => 'edit']);
        Permission::create(['name' => 'delete']);
        Permission::create(['name' => 'create-rule']);
        Permission::create(['name' => 'edit-rule']);
        Permission::create(['name' => 'delete-rule']);
        Permission::create(['name' => 'create-permission']);
        Permission::create(['name' => 'edit-permission']);
        Permission::create(['name' => 'delete-permission']);
        Permission::create(['name' => 'create-user']);
        Permission::create(['name' => 'change-user-role']);
        Permission::create(['name' => 'change-user-permission']);
        Permission::create(['name' => 'suspend-user']);
        Permission::create(['name' => 'change-user-password']);

        // create roles and assign existing permissions

        $RegularUser = Role::create(['name' => 'regular-user']);
        $RegularUser->givePermissionTo('create',  'edit', 'delete', 'change-user-password');

        $admin = Role::create(['name' => 'admin']);
        $admin->givePermissionTo('create','edit', 'delete', 'create-user', 'change-user-role', 'suspend-user');

        $superAdmin = Role::create(['name' => 'Super-Admin']);
        // gets all permissions via Gate::before rule; see AuthServiceProvider

        // create demo users
        $suser = \App\Models\User::factory()->create([
            'name' => 'Super Admin',
            'email' => 'lsu@himelrana.com',
            'password' => bcrypt('@Pass123@su'),
        ]);
        $suser->assignRole($superAdmin);

        $auser = \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'ladmin@himelrana.com',
            'password' => bcrypt('@Pass123@admin'),
        ]);
        $auser->assignRole($admin);

        $ruser = \App\Models\User::factory()->create([
            'name' => 'User',
            'email' => 'user@himelrana.com',
            'password' => bcrypt('@Pass123@user'),
        ]);
        $ruser->assignRole($RegularUser);
    }
}
