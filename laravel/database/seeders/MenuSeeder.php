<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Menu;
use Carbon\Carbon;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Menu::insert([
            [
                'menu_group_id' => 1,
                'type'     => 'Backend',
                'title'     => 'Analytics Dashboard',
                'url'       => '/administrator/dashboard',
                'icon'      => 'icon ni ni-growth',
                'target'    => 'none',
                'position'  => '1',
                'created_by'=> '1',
                'updated_by'=> '1',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ],
            [
                'menu_group_id' => 2,
                'type'     => 'Backend',
                'title'     => 'Entry Penjualan',
                'url'       => '/administrator/penjualan',
                'icon'      => 'icon ni ni-cart',
                'target'    => 'none',
                'position'  => '1',
                'created_by'=> '1',
                'updated_by'=> '1',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ],
            [
                'menu_group_id' => 2,
                'type'     => 'Backend',
                'title'     => 'Daftar Penjualan',
                'url'       => '/administrator/daftar-penjualan',
                'icon'      => 'icon ni ni-list',
                'target'    => 'none',
                'position'  => '2',
                'created_by'=> '1',
                'updated_by'=> '1',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ],
            [
                'menu_group_id' => 2,
                'type'     => 'Backend',
                'title'     => 'Data Distributor',
                'url'       => '/administrator/distributor',
                'icon'      => 'icon ni ni-grid',
                'target'    => 'none',
                'position'  => '3',
                'created_by'=> '1',
                'updated_by'=> '1',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ],
            [
                'menu_group_id' => 2,
                'type'     => 'Backend',
                'title'     => 'Data Barang',
                'url'       => '/administrator/barang',
                'icon'      => 'icon ni ni-briefcase',
                'target'    => 'none',
                'position'  => '4',
                'created_by'=> '1',
                'updated_by'=> '1',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ],
            [
                'menu_group_id' => 2,
                'type'     => 'Backend',
                'title'     => 'User Manager',
                'url'       => '#',
                'icon'      => 'icon ni ni-users',
                'target'    => 'none',
                'position'  => '5',
                'created_by'=> '1',
                'updated_by'=> '1',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ],
            [
                'menu_group_id' => 2,
                'type'     => 'Backend',
                'title'     => 'Menu Manager',
                'url'       => '#',
                'icon'      => 'icon ni ni-grid-alt',
                'target'    => 'none',
                'position'  => '6',
                'created_by'=> '1',
                'updated_by'=> '1',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ],
            [
                'menu_group_id' => 2,
                'type'     => 'Backend',
                'title'     => 'Report',
                'url'       => '#',
                'icon'      => 'icon ni ni-book',
                'target'    => 'none',
                'position'  => '7',
                'created_by'=> '1',
                'updated_by'=> '1',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ],
            [
                'menu_group_id' => 3,
                'type'     => 'Backend',
                'title'     => 'Permissions',
                'url'       => '/administrator/permissions',
                'icon'      => 'icon ni ni-security',
                'target'    => 'none',
                'position'  => '1',
                'created_by'=> '1',
                'updated_by'=> '1',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ],
            [
                'menu_group_id' => 3,
                'type'     => 'Backend',
                'title'     => 'Setting',
                'url'       => '/administrator/settings',
                'icon'      => 'icon ni ni-setting',
                'target'    => 'none',
                'position'  => '2',
                'created_by'=> '1',
                'updated_by'=> '1',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ],
        ]);
    }
}
