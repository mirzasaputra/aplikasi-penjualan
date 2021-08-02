<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $developerRole = Role::create([
            'name' => 'Developer',
            'guard_name' => 'web',
            'is_default' => 'Y'
        ]);

        $administratorRole = Role::create([
            'name' => 'Administrator',
            'guard_name' => 'web',
            'is_default' => 'Y'
        ]);

        $developerRole->givePermissionTo(['read-dashboard', 'read-roles', 'create-roles', 'update-roles', 'delete-roles']);
        $developerRole->givePermissionTo(['read-permissions', 'create-permissions', 'update-permissions', 'delete-permissions']);
        $developerRole->givePermissionTo(['read-users', 'create-users', 'update-users', 'delete-users']);
        $developerRole->givePermissionTo(['read-penjualan']);
        $developerRole->givePermissionTo(['read-daftar-penjualan']);
        $developerRole->givePermissionTo(['read-barang', 'create-barang', 'update-barang', 'delete-barang']);
        $developerRole->givePermissionTo(['read-report-penjualan']);
        $developerRole->givePermissionTo(['read-menus', 'create-menus', 'update-menus', 'delete-menus']);
        $developerRole->givePermissionTo(['read-menu-groups', 'create-menu-groups', 'update-menu-groups', 'delete-menu-groups']);
        $developerRole->givePermissionTo(['read-sub-menus', 'create-sub-menus', 'update-sub-menus', 'delete-sub-menus']);
        $developerRole->givePermissionTo(['read-settings', 'update-settings']);
        $developerRole->givePermissionTo('read-dashboard');

        $administratorRole->givePermissionTo(['read-dashboard', 'read-roles', 'create-roles', 'update-roles', 'delete-roles']);
        $administratorRole->givePermissionTo(['read-dashboard', 'read-roles', 'create-roles', 'update-roles', 'delete-roles']);
        $administratorRole->givePermissionTo(['read-users', 'create-users', 'update-users', 'delete-users']);
        $administratorRole->givePermissionTo(['read-penjualan']);
        $administratorRole->givePermissionTo(['read-daftar-penjualan']);
        $administratorRole->givePermissionTo(['read-barang', 'create-barang', 'update-barang', 'delete-barang']);
        $administratorRole->givePermissionTo(['read-report-penjualan']);
        $administratorRole->givePermissionTo(['read-settings', 'update-settings']);
        $administratorRole->givePermissionTo('read-dashboard');
    }
}
