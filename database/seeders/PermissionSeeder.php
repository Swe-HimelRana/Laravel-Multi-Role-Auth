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
        Permission::create(['name' => 'subscribe']);
        Permission::create(['name' => 'unsubscribe']);

        // create roles and assign existing permissions
        // $superAdmin = Role::create(['name' => 'superadmin']);
        // $superAdmin->givePermissionTo('create','edit', 'delete', 'subscribe', 'unsubscribe');

        $RegularUser = Role::create(['name' => 'regular-user']);
        $RegularUser->givePermissionTo('create', 'subscribe', 'unsubscribe');

        $admin = Role::create(['name' => 'admin']);
        $admin->givePermissionTo('create','edit', 'subscribe', 'unsubscribe');

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
