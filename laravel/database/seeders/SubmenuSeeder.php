<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Submenu;
use Carbon\Carbon;

class SubmenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Submenu::insert([
            [
                'menu_id'   => 6,
                'title'     => 'Users',
                'url'       => '/administrator/users',
                'target'    => 'none',
                'position'  => '1',
                'created_by'=> '1',
                'updated_by'=> '1',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ],
            [
                'menu_id'   => 6,
                'title'     => 'Roles',
                'url'       => '/administrator/roles',
                'target'    => 'none',
                'position'  => '2',
                'created_by'=> '1',
                'updated_by'=> '1',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ],
            [
                'menu_id'   => 7,
                'title'     => 'Menu',
                'url'       => '/administrator/menus',
                'target'    => 'none',
                'position'  => '1',
                'created_by'=> '1',
                'updated_by'=> '1',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ],
            [
                'menu_id'   => 7,
                'title'     => 'Sub Menu',
                'url'       => '/administrator/sub-menus',
                'target'    => 'none',
                'position'  => '2',
                'created_by'=> '1',
                'updated_by'=> '1',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ],
            [
                'menu_id'   => 7,
                'title'     => 'Menu Groups',
                'url'       => '/administrator/menu-groups',
                'target'    => 'none',
                'position'  => '3',
                'created_by'=> '1',
                'updated_by'=> '1',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ],
            [
                'menu_id'   => 8,
                'title'     => 'Report Penjualan',
                'url'       => '/administrator/report-penjualan',
                'target'    => 'none',
                'position'  => '1',
                'created_by'=> '1',
                'updated_by'=> '1',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ],
        ]);
    }
}
