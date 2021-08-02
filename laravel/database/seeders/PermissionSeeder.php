<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::insert([
            ['name' => 'read-dashboard', 'guard_name' => 'web', 'is_default' => 'Y',],
            ['name' => 'read-roles', 'guard_name' => 'web', 'is_default' => 'Y'],
            ['name' => 'create-roles', 'guard_name' => 'web', 'is_default' => 'Y'],
            ['name' => 'update-roles', 'guard_name' => 'web', 'is_default' => 'Y'],
            ['name' => 'delete-roles', 'guard_name' => 'web', 'is_default' => 'Y'],
            ['name' => 'read-permissions', 'guard_name' => 'web', 'is_default' => 'Y'],
            ['name' => 'create-permissions', 'guard_name' => 'web', 'is_default' => 'Y'],
            ['name' => 'update-permissions', 'guard_name' => 'web', 'is_default' => 'Y'],
            ['name' => 'delete-permissions', 'guard_name' => 'web', 'is_default' => 'Y'],
            ['name' => 'read-users', 'guard_name' => 'web', 'is_default' => 'Y'],
            ['name' => 'create-users', 'guard_name' => 'web', 'is_default' => 'Y'],
            ['name' => 'update-users', 'guard_name' => 'web', 'is_default' => 'Y'],
            ['name' => 'delete-users', 'guard_name' => 'web', 'is_default' => 'Y'],
            ['name' => 'read-menus', 'guard_name' => 'web', 'is_default' => 'Y'],
            ['name' => 'create-menus', 'guard_name' => 'web', 'is_default' => 'Y'],
            ['name' => 'update-menus', 'guard_name' => 'web', 'is_default' => 'Y'],
            ['name' => 'delete-menus', 'guard_name' => 'web', 'is_default' => 'Y'],
            ['name' => 'read-menu-groups', 'guard_name' => 'web', 'is_default' => 'Y'],
            ['name' => 'create-menu-groups', 'guard_name' => 'web', 'is_default' => 'Y'],
            ['name' => 'update-menu-groups', 'guard_name' => 'web', 'is_default' => 'Y'],
            ['name' => 'delete-menu-groups', 'guard_name' => 'web', 'is_default' => 'Y'],
            ['name' => 'read-sub-menus', 'guard_name' => 'web', 'is_default' => 'Y'],
            ['name' => 'create-sub-menus', 'guard_name' => 'web', 'is_default' => 'Y'],
            ['name' => 'update-sub-menus', 'guard_name' => 'web', 'is_default' => 'Y'],
            ['name' => 'delete-sub-menus', 'guard_name' => 'web', 'is_default' => 'Y'],
            ['name' => 'read-settings', 'guard_name' => 'web', 'is_default' => 'Y'],
            ['name' => 'update-settings', 'guard_name' => 'web', 'is_default' => 'Y'],
            ['name' => 'read-penjualan', 'guard_name' => 'web', 'is_default' => 'Y'],
            ['name' => 'read-daftar-penjualan', 'guard_name' => 'web', 'is_default' => 'Y'],
            ['name' => 'read-barang', 'guard_name' => 'web', 'is_default' => 'Y'],
            ['name' => 'create-barang', 'guard_name' => 'web', 'is_default' => 'Y'],
            ['name' => 'update-barang', 'guard_name' => 'web', 'is_default' => 'Y'],
            ['name' => 'delete-barang', 'guard_name' => 'web', 'is_default' => 'Y'],
            ['name' => 'read-report-penjualan', 'guard_name' => 'web', 'is_default' => 'Y'],
        ]);
    }
}
